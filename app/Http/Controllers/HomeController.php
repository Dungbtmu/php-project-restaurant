<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function recipe()
    {
        return view('recipe');
    }

    public function award()
    {
        return view('award');
    }

    public function header()
    {
        return view('header');
    }

    public function footer()
    {
        return view('footer');
    }
}