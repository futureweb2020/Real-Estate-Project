<?php

namespace App;

use Auth;
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

    public static function do_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255|emali',
            'password' => 'required|min:6|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput($request->except('password'));
        }

        if($request->type == 0)
        {
            return redirect('register')
                ->withInput($request->except('passwrod'));
        }

        $u = new User;
        $u->first_name = $request->first_name;
        $u->last_name = $request->last_name;
        $u->email = $request->email;
        $u->type = $request->type;
        $u->password = Hash::make($request->password);
        $u->save();

        if($request->type == 1)
        {
            return redirect('dashboard/landlord');
        }
        else
        {
            return redirect('dashboard/tenant');
        }
    }

    public static function do_login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return $response()->json('auth' => 'logged in');
        }

        return $response()->json('auth' => 'not logged in');
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
