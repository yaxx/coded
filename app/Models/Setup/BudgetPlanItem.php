<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class BudgetPlanItem extends Model
{
    protected $table = 'budget_plan_items';
    protected $primaryKey = 'budget_plan_item_id';

    protected $fillable = [ 'budget_reference_no', 'budget_plan_reference_no', 'budget_plan_item_description','agency_id', 'service_id','created_by',
                             'uuid','enabled','deleted' ,'amount', 'budget_id'];

}
