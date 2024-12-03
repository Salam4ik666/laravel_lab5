<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Получаем всех пользователей, кроме администратора
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.users.index', compact('users'));
    }
}
