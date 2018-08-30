<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        echo dirname(realpath(dirname($_SERVER['SCRIPT_FILENAME'])));
    }
}