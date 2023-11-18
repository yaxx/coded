<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imprest extends Model
{
    
    protected $table = 'imprest_payments';
    protected $primaryKey = 'agency_id';

   protected $fillable = ['agency_name','amount','bank_name','account_name','account_no','service_id','paid_by', 'uuid','deleted','month'];

   ////////////////////// returns the agency type /////////////////
   public function agency_type()
   {
        return $this->belongsTo(AgencyType::class,'agency_type_id','agency_type_id');
   }
   public function imprest() {
     return $this->hasMany('App\Models\Imprest', 'agency_id');
 }
   
  
}

