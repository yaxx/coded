<?php

namespace App\Http\Controllers\Approval;

use Illuminate\Http\Request;
use App\models\Approval\ClientApproval;
use App\Http\Controllers\Controller;

class ApproveClientController extends Controller
{
    public function approveclient(){

        $client =ClientApproval::get();
        return view('setup.client_approval',compact('client'));
    }
}
