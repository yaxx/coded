<?php

namespace App\Models\Contractor;

use Illuminate\Database\Eloquent\Model;

class ContractorSetup extends Model
{
    protected $table = 'contractors';
    protected $primaryKey = 'contractor_id';

    protected $fillable = [
        'contractor_id',
        'company_name',
        'email',
        'tin_number',
        'phone',
        'sector',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'staff_designation',
        'street',
        'city',
        'state',
        'country',
        'cac_certificate',
    ];
}
