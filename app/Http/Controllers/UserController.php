<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(int $user_id): view
    {
        //dd($user_id);
        return view('welcome');
    }
}
