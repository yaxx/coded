<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = '_cities';
    protected $primaryKey = 'cities_id';
    public $timestamps = false;
    protected $fillable = ['city','local_government_id','registered_on','authorized_on','authorized_by','city_id','lga_id','service_id','session_id','organization_id'];
}
