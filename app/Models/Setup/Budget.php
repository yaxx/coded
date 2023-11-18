<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budgets';
    protected $primaryKey = 'budget_id';

    protected $fillable = ['budget_reference_no', 'budget_name', 'agency_name', 'budget_year', 'total_amount', 'total_count', 'prev_total_amount', 'budget_item', 'service_id','created_by', 'uuid','enabled','deleted'];

}
