<?php

namespace App\Models\Approval;

use Illuminate\Database\Eloquent\Model;

use App\Models\Approval\ApprovalName;
use App\Models\Approval\ApprovalLevel;
use App\User;
use App\Models\Setup\Budget;

class ApprovalRequest extends Model
{
    protected $table = 'approval_requests';
    protected $primaryKey = 'approval_request_id';

    protected $fillable = ['reference_no', 'user_id','phone_no', 'email', 'approval_name_id', 'approval_level_id', 'month', 'year', 'total_amount', 'total_count', 'prev_total_amount', 'can_approve', 'service_id', 'uuid','enabled','deleted', 'created_by' ];

    // returns the approval name
    public function approval_name()
    {
         return $this->belongsTo(ApprovalName::class,'approval_name_id','approval_name_id');
    }

   // returns the approval level info
    public function approval_level()
    {
         return $this->belongsTo(ApprovalLevel::class,'approval_level_id','approval_level_id');
    }

    // returns the user info
    public function user_info()
    {
         return $this->belongsTo(User::class,'user_id','id');
    }

     // returns the first budget from the reference number
     public function first_budget()
     {
        return $this->belongsTo(Budget::class,'reference_no','budget_reference_no');
     }

     public function budgets()
     {
     return $this->hasMany(Budget::class,'budget_reference_no','reference_no');

     }
  
}
