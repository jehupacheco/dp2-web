<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Organization;
use Carbon\Carbon;

class Client extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['email', 'name', 'lastname', 'phone', 'profile_img_url', 'gender', 'height', 'heart_illness', 'heart_frecuency', 'tools'];

    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public function rentings()
    {
        return $this->hasMany('App\Models\Renting');
    }

    public function travels()
    {
        return $this->hasMany('App\Models\Travel');
    }

    public function activeTravels()
    {
        return $this->travels()->where('ended_at', null);
    }

    public function readings()
    {
        return $this->hasManyThrough('App\Models\Reading', 'App\Models\Travel');
    }

    public function getOrgName()
    {
        $org = Organization::find($this->organization_id);

        return $org->name;
    }

    public function getOrgNameById($org_id)
    {
        $org = Organization::find($org_id);

        return $org->name;
    }

    public function objectives()
    {
        return $this->hasMany('App\Models\Objective');
    }

    public function reminders()
    {
        return $this->hasMany('App\Models\Reminder');
    }

    public function currentObjectives()
    {
        return $this->objectives()->where('ends_at', '>=', Carbon::now());
    }
}
