<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
    public function getProjectTitle($refNo = null)
    {
     
        // $list = DB::table("budget_plan_items as i")->distinct()->join("budgets as b","i.budget_reference_no","b.budget_reference_no")->selectRaw("b.budget_id as id, b.budget_item as name,total_amount as amount,i.budget_plan_item_description as item")->where("i.budget_plan_reference_no", $refNo)->get();
        $list = DB::table("budget_plan_items")->select("amount","budget_plan_item_description as item", 'budget_plan_item_id as id')->where("budget_plan_reference_no", $refNo)->get();
        $hmtl ='<option value="" disabled selected>Select project
        title </option>';
        foreach($list as $x):
            $hmtl .= ' <option value="'.$x->id.'" data-amount="'.$x->amount.'">'.$x->item.'</option>';
        endforeach;
        echo $hmtl;
    }
}