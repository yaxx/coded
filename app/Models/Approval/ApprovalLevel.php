<?php

namespace App\Models\Approval;

use Illuminate\Database\Eloquent\Model;

class ApprovalLevel extends Model
{
    protected $table = 'approval_level';
    protected $primaryKey = 'approval_level_id';

    protected $fillable = ['approval_level', 'created_by' ];
}
