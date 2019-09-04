<?php

namespace App\Http\Controllers;

use App\Application;
use App\AppUser;
use App\Category;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index() {
        $apps = Application::all();
        $categories = Category::all();
        $users = AppUser::all();
        return view('welcome')->with(compact('apps','categories','users'));
    }
}
