<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //
    public function index()
    {
        $productos = Task::all();
        $areas = Areas::all();
        $users = User::all();

        return view('admin.tablero', compact(
            'productos',
            'areas',
            'users'
        ));
    }
}
