<?php

namespace App\models\Approval;

use Illuminate\Database\Eloquent\Model;

class ClientApproval extends Model
{
    protected $table = 'client_services';
    protected $primaryKey = 'id_services';

    protected $fillable = [
       'service_name',
       'service_code',
       'country_code',
       'state_code',
       'client_contact_person',
       'client_email',
       'client_phone',
        'service_logo_url',
    ];


}
