<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function clearCache()
    {
        Artisan::call('cache:clear');
        return "Cache is cleared";
    }
}
