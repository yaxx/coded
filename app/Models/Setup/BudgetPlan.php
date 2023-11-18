<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use App\Models\Setup\Agency;

class BudgetPlan extends Model
{
    protected $table = 'budgets_plans';
    protected $primaryKey = 'budget_plan_id';

    protected $fillable = ['budget_plan_reference_no', 'budget_plan_name', 'agency_id', 'plan_year','plan_month', 'total_amount', 'total_count', 'prev_total_amount', 'service_id','created_by', 'uuid','enabled','deleted'];


     ////////////////////// returns the agency /////////////////
     public function agency()
     {
         return $this->belongsTo(Agency::class,'agency_id','agency_id');
     }

}
