<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatioController extends Controller
{
    /**
     * chatio room inside.
     */
    public function room()
    {
        return view('room');
    }
}
