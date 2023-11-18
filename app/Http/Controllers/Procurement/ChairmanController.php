<?php

namespace App\Http\Controllers\procurement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChairmanController extends Controller
{
    public function index()
    {      

       return view('procurement.bureau_chairman');

    }
}

