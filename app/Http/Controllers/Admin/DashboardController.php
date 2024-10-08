<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        return view('admin.dashboard.index', compact('usersCount'));
    }
}
