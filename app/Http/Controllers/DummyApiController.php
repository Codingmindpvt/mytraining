<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DummyApiController extends Controller
{
    //
    function getdata()
    {
        return ["name"=>"ashwani","email"=>"ashwani@gmail.com","address"=>"kanpur"];
    }
}
