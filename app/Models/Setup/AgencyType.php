<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class AgencyType extends Model
{
    protected $table = 'agency_types';
    protected $primaryKey = 'agency_type_id';

    protected $fillable = ['agency_type', 'created_by','enabled','deleted'];
}
