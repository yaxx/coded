<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use App\Models\Setup\BudgetItemCategory;
use App\Models\Setup\Agency;

class BudgetItem extends Model
{
    protected $table = 'budget_items';
    protected $primaryKey = 'budget_item_id';

    protected $fillable = [
        'budget_item', 
        'budget_item_category_id', 
        'reference_no', 
        'budget_item_description', 
        'agency_id', 
        'service_id',
        'created_by', 
        'uuid',
        'enabled',
        'deleted'];

    ////////////////////// returns the budget cagetory /////////////////
    public function budget_category()
    {
        return $this->belongsTo(BudgetItemCategory::class,'budget_item_category_id','budget_item_category_Id');
    }

     ////////////////////// returns the agency /////////////////
     public function agency()
     {
         return $this->belongsTo(Agency::class,'agency_id','agency_id');
     }

}
