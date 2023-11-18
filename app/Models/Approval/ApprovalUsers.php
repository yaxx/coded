<?php

namespace App\Models\Approval;

use Illuminate\Database\Eloquent\Model;

use App\Models\Approval\ApprovalName;
use App\Models\Approval\ApprovalLevel;
use App\User;

class ApprovalUsers extends Model
{
    protected $table = 'approval_users';
    protected $primaryKey = 'approval_user_id';

    protected $fillable = ['user_id', 'approval_name_id','approval_level_id','uuid','enabled','deleted', 'created_by' ];

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

  
}
