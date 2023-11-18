<?php

namespace App\Models\Procurement;

use Illuminate\Database\Eloquent\Model;

class GoodsPlan extends Model
{
    protected $table = 'procurement_plan';
    protected $primaryKey = 'plan_id';

    protected $fillable = [
        'plan_id',
        'budget_id',
        'budget_plan_reference_no',
        'procurement_officer_number',
        'project_location',
        'project_cost',
        'project_status',
        'package_number',
        'lot_number',
        'bid_invitation_date',
        'bid_opening_date',
        'submission_of_evaluation_period',
        'bid_closing_date',
        'certifiable_amount',
        'contract_signature',
        'contract_offer',
        'mobilization',
        'goods_arrival',
        'final_acceptance',
        'bill_of_quantity',
        'budget_available',
        'procurement_method'

    ];


}