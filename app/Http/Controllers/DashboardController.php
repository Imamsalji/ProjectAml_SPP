<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;



class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_user = User::all()->count();
        return view('dashboard', compact('jumlah_user'));
    }

}
