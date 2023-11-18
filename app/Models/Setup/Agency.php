<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use App\Models\Setup\AgencyType;

class Agency extends Model
{
    protected $table = 'agencies';
    protected $primaryKey = 'agency_id';

   protected $fillable = ['agency_type_id','agency_name','amount','bank_name','account_name','account_no','service_id','created_by', 'uuid','enabled','deleted'];

   ////////////////////// returns the agency type /////////////////
   public function agency_type()
   {
        return $this->belongsTo(AgencyType::class,'agency_type_id','agency_type_id');
   }
   public function imprest() {
     return $this->hasMany('App\Models\Imprest', 'agency_id');
 }
   
  
}
