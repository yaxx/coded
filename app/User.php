<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname',
        'firstname',
        'middlename',
        'name',
        'username',
        'password',
        'email',
        'procurement_entity',
        'user_phone',
        'remember_token',
        'service_id',
        'service_code',
        'created_at',
        'updated_at',
        'allowmobilelogin',
        'allowdesktoplogin',
        'first_use',
        'agency_id',
        'is_admin',
        'is_supervisor',
        'prev_username',
        'procurement_entity',
        'updated_by',
        'inactive',
        'created_by',
        'reset_token',
        'reset_expiry_date',
        'uuid',
        'is_procurement_officer',
        'is_contractor',
        'account_name',
        'bank_name',
        'account_no',
        'group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function roles()
    {
        return $this->hasMany("App\Models\Setup\RoleUser","user_id","users.id")->select(["role_id",DB::raw("(select name from roles as r where r.id = role_id limit 1) as name")]);
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}