<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use DB;

class User extends Authenticatable
{
	use Notifiable, HasRoles;

	protected $guard_name = 'web'; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'password_updated_at', 'session_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getOrganizationsList(){
        $user = $this;
        $my_org_id = -1;
        if($user->can('Vehículos - Solo su Organización')){
            $my_org_id = $user->organization_id;
        }

        $organization_ids = DB::table('organizations')->pluck('id');
        $organization_ids = $organization_ids->filter(function($organization_id) use ($user,$my_org_id)
            {
                return ($organization_id == 1 && $user->can('Vehículos para pacientes de Cardiopatía')) ||
                        ($organization_id == 2 && $user->can('Vehículos para la Jardinería'))||
                        ($organization_id == 3 && $user->can('Vehículos para Ventas'))||
                        ($organization_id == 4 && $user->can('Vehículos Eco-amigables'))||
                        ($organization_id == 5 && $user->can('Vehículos para Trasporte Urbano 1'))||
                        ($organization_id == 6 && $user->can('Vehículos para Trasporte Urbano 2'))||
                        ($organization_id == $my_org_id);
            });
        return $organization_ids;
    }
}
