<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenderUploads extends Model
{
    
        protected $table = 'tender_minute_uploads';
        protected $primaryKey = 'minute_id';
    
        protected $fillable = [
            'minute_id',
            'venue',
            'uploaded_by',
            'date',
            'file',
           
    
        ];
    
}
