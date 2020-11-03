<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\TblAccPoints;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $url = explode('/',$data['url']);
        $referral_id = preg_split("/\D+/", "$url[4] ")[0];

        $data['acc_inv'] = $referral_id;
        $data['acc_type'] = $url[5];

        return Validator::make($data, [
            'url' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tbl_accounts'],
            'acc_inv' =>['required'],
            'acc_type'=>['required','numeric','between:1,3'],
            'username' => ['required', 'unique:tbl_accounts'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'fb_link' => ['required'],
        ]);
    }

    protected function validatorForAdmin(array $data)
    {
       
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tbl_accounts'],
            'username' => ['required', 'unique:tbl_accounts'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $url = explode('/',$data['url']);
        $referral_id = preg_split("/\D+/", "$url[4] ")[0];
  
        return User::create([
            //'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'acc_type' => $url[5],
            'acc_inv' => $referral_id,
            'password' => Hash::make($data['password']),
            'acc_fb_link' => $data['fb_link'],

        ]);
    }

    protected function createAdmin(array $data)
    {
       
        return User::create([
            'email' => $data['email'],
            'username' => $data['username'],
            'acc_type' => 4,
            'acc_inv' => 0,
            'password' => Hash::make($data['password']),

        ]);
    }

    protected function insert_acc_pt($data){
        return TblAccPoints::create([
            //'name' => $data['name'],
            'pt_acc' => $data->id,
            'acc_load' => '0',
            'acc_com' => '0',
        ]);
    }
}
