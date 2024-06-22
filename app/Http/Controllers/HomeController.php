<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        /* if (auth()->user()->rol_id == 2) {
            return redirect()->route('student.index');
        } */
        $interactionsTotal = 42;
        $fincasTotal = 2;
        $usersTotal = User::whereMonth('created_at', Carbon::now()->month)->count();

        return view('admin.stadistics.dashboard', compact('interactionsTotal', 'fincasTotal', 'usersTotal'));
    }
}
