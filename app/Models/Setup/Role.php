<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
protected $table = 'roles';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'label', 'client_type','created_at','updated_at'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
