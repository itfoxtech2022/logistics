<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function createTransport(){
        return view('transport.create');
    }
}
