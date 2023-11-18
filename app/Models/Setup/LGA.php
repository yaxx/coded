<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class LGA extends Model
{
    protected $table = 'local_goverment_area';
    protected $primaryKey = 'id_lga';

    protected $fillable = ['lga_id', 'lga', 'lga_class','state_id','created_by','created_at','updated_at','updated_by'];
}
