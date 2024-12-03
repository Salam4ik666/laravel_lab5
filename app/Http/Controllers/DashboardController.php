<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Получаем роль текущего пользователя
        $user = Auth::user();
        
        // Если пользователь администратор, получаем всех пользователей
        if ($user->role == 'admin') {
            $users = User::all();  // Получаем всех пользователей
        } else {
            $users = null;  // Для обычного пользователя пусто
        }

        // Передаем данные в представление
        return view('dashboard', compact('users'));
    }
}

