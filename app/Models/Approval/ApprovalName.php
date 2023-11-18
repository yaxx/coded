<?php

namespace App\Models\Approval;

use Illuminate\Database\Eloquent\Model;

class ApprovalName extends Model
{
    protected $table = 'approval_name';
    protected $primaryKey = 'approval_name_id';

    protected $fillable = ['approval_name', 'created_by' ];
}
