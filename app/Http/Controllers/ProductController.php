<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function features()
    {
        return view('pages.product.features');
    }   

    public function integrations()
    {
        return view('pages.product.integrations');
    }

    public function courses()
    {
        return view('pages.courses');
    }   
}
