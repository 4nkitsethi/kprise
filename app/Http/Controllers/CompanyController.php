<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function about()
    {
        return view('pages.company.aboutUs');
    }

    public function team()
    {
        return view('pages.company.team');
    }

    public function careers()
    {
        return view('pages.company.careers');
    }
}
