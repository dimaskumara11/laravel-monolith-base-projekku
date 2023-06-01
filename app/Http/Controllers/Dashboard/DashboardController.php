<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SppdModel;

class DashboardController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $title = "Dashboard";
        $breadcrumb = [];
        return view('cpanel_admin.pages.dashboard',compact("title","breadcrumb"));
    }
}
