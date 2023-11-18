<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class EconomicActivity extends Model
{
    protected $table = 'economic_activities';
    protected $primaryKey = 'id_economic_activity';

    protected $fillable = ['economic_activity_id', 'economic_activiity', 'tax_payer_type','service_id','created_by','created_at', 'updated_by', 'updated_at','organization_id'];
}
