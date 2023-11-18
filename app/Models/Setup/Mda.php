<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Mda extends Model
{

    protected $table = 'mdas';
    protected $primaryKey = 'id';

    protected $fillable = ['name',  'client_type', 'created_at', 'updated_at'];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }


}