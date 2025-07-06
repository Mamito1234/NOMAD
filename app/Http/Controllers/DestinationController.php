<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function saved()
    {
        return view('destinations.saved'); // saved favorites
    }
}
