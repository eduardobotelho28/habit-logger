<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SiteController extends Controller
{
    
    public function index() : View
    {
        return view('home');
    }

    public function dashboard() : View
    {

        $habits = Auth::user()->habits()->with('habitLogs')->get();

        return view('dashboard', compact('habits'));
    }   

}
