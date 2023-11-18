<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class BudgetItemCategory extends Model
{
    protected $table = 'budget_item_categories';
    protected $primaryKey = 'budget_item_category_Id';

    protected $fillable = ['budget_item_category','service_id','created_by', 'uuid','enabled','deleted'];

}
