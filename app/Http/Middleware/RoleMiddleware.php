<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Импортируем фасад Auth
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Проверяем роль пользователя
        if (Auth::check() && Auth::user()->role !== $role) {
            // Если роль не совпадает, возвращаем ошибку 403
            abort(403);
        }

        // Если роль соответствует, продолжаем выполнение запроса
        return $next($request);
    }
}
