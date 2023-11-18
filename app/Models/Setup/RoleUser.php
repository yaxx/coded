<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
  protected $table = 'role_user';
    protected $primaryKey = 'role_user_id';
	
	protected $fillable = ['user_id', 'role_id','created_at','updated_at', 'created_by', 'updated_by', 'service_id'];

}
