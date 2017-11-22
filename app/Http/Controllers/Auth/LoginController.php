<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use App\Models\Configuration;
use Auth;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/
	
	use AuthenticatesUsers;
	
	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'logout']);
	}


	public function redirectPath()
    {
        $fecha_actual = Carbon::now();
        // $fecha_last_update =  Carbon::createFromFormat('Y-m-d H:i:s',Auth::user()->password_updated_at);
       	 
        
        // if($fecha_actual->diffInDays($fecha_last_update)>=3){
        //     return 'cambiar/password';
        // }
        // else{
            return '/';
        // }
    }
}
