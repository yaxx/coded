<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Model;


class CompanyRegistration extends Model
{
     protected $table = 'revenue_payers';
    protected $primaryKey = 'taxpayer_id';
    public $timestamps = false;
   protected $fillable = ['revenue_payer_rin', 'revenue_payer_name', 'revenue_payer_tin', 'mobile_number', 'email_addresss', 'revenue_payer_type_id', 'economic_activity', 'preferred_notification_method', 'revenue_payer_status', 'service_id', 'passwordr', 'contactaddress', 'lga_id', 'city_id', 'state_id', 'bvn', 'revenue_payer_fname', 'revenue_payer_lname', 'revenue_payer_mname'];

}
