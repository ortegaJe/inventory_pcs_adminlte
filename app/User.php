<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cc','name', 'last_name', 'nick_name', 'email',
        'password', 'phone', 'campus_id', 'rol', 'position',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role)
    {
        $this->roles()->sync($role, false);
    }

    public function haveRol()
    {
        return $this->roles->flatten()->pluck('name')->unique();
    }

    public function adminlte_image()
    {
        $user_login_avatar = '/upload/' . Auth::user()->image;
        return $user_login_avatar;
    }

    public function adminlte_desc()
    {
        /*$rol = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.rol_id')
            ->select('roles.id', 'roles.rol_name')
            ->get();

        $getrol = Auth::user()->$rol;*/
        return Auth::user()->work_function;
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }
}
