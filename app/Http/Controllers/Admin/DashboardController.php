<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Dashboard Index
     *
     * @return View
     */
    public function index()
    {	
        return view('admin.dashboard');
    }
}
