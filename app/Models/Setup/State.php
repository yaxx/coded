<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name','abbreviation','code','country'];

}
