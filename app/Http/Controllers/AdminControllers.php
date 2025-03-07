<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminTable;
class AdminControllers extends Controller
{
    public function index()
    {
        $admin = AdminTable::first();
        return view('admin.dashboard', compact('admin'));
    }

}
