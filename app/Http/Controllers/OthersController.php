<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OthersController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function getOthers()
    {
        return view('admin.others.others');
    }
}
