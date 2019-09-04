<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index() {
        $apps = Application::all();
        return view('welcome')->with(compact('apps'));
    }
}
