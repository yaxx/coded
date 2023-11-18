<?php

namespace App\Models\Approval;

use Illuminate\Database\Eloquent\Model;

class FundRequestModel extends Model
{
    protected $table = 'fund_request';
    protected $primaryKey = 'request_id';

    protected $fillable = [
        'request_id',
        'expense_head',
        'requested_amount',
        'status',
        'description',
        'doc',
       

    ];
}
