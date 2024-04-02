<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->isPetugas()) {
            return redirect()->route('petugas.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function petugasDashboard()
    {
        return view('petugas.dashboard');
    }

    public function userDashboard()
    {
        return view('user.dashboard');
    }
}
