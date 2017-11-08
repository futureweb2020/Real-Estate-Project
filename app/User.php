<?php

namespace App;

use Auth;
use Validator;
use Hash;
use Mail;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static function do_register($input)
    {
        $validator = Validator::make($input, [
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|min:6|max:255',
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            // return redirect('register')
            //             ->withErrors($validator)
            //             ->withInput();
            return array('status' => 'error', 'message' => $validator->errors()->first());
//            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        if($input['type'] == 0)
        {
            // return redirect('register')
            //     ->withInput();
            return array('status' => 'error', 'message' => 'You must select how you want to use this application.');
//            return response()->json(['status' => 'error', 'message' => 'You must select how you want to use this application.']);
        }

        $u = new User;
        $u->first_name = $input['first_name'];
        $u->last_name = $input['last_name'];
        $u->email = $input['email'];
        $u->type = $input['type'];
        $u->password = Hash::make($input['password']);
        $u->save();

        Mail::send('emails.welcome',[],function($message) use ($input) {
            $message->to($input['email'],$input['first_name'].' '.$input['last_name'])->subject('Welcome!');
        });

        return array('status' => 'done');
//        return response()->json(['status'=>'done']);
    }

    public static function do_login($input)
    {
        $creds = array('email' => $input['email'], 'password' => $input['password']);
        if(Auth::attempt($creds))
        {
            return array('status' => 'done');
        }

        return array('status' => 'error', 'message' => 'Email/Password incorrect');
    }

    public static function do_logout()
    {
        if(!Auth::guest())
        {
            Auth::logout();
        }

        return redirect('/');
    }
}
