<?php

namespace App\Models\TaxMandate;

use Illuminate\Database\Eloquent\Model;

class RevenueInvoices extends Model
{
protected $table = 'revenue_mandates';
    protected $primaryKey = 'revenue_manadates_id';
  public $timestamps = false;
   protected $fillable = ['ref_no', 'tax_id', 'revenue_id', 'description', 'amount', 'amount_paid', 'date_log', 'invoice_number', 'locked', 'paid', 'service_id', 'registered_by', 'registered_on', 'revenue_month', 'revenue_year', 'revenue_day', 'date_generated', 'taxpayer_name', 'revenue_code', 'batch_no', 'amount_rebet'];

}
