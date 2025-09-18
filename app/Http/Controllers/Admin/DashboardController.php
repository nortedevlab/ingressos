<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Event;
use App\Models\User;
use Illuminate\View\View;

/**
 * Dashboard do administrador global
 */
class DashboardController extends Controller
{
    public function index(): View
    {
        $companies = Company::count();
        $events = Event::count();
        $users = User::count();

        return view('admin.dashboard', compact('companies','events','users'));
    }
}
