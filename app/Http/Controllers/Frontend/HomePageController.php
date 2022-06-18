<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class HomePageController extends Controller
{
    public function index()
    {
        return redirect()->route('login');
    }


    public function pageError()
    {
        return View::make('pages.error.404');
    }


}
