<?php
namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Revenuestream extends Model
{
 protected $table = 'revenue_streams';
    protected $primaryKey = 'revenue_stream_id';
    protected $fillable = ['revenue_stream', 'asset_type', 'service_id','created_at','updated_at', 'updated_by', 'created_by','uuid','account_id'];

}
