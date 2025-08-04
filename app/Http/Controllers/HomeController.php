<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class Homecontroller extends Controller
{
    public function index()
    {   
        return view('home');
    }
}