<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $roles = Role::where('id', auth()->user()->role_id)->first();
        if ($roles->name !== $role) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
        return $next($request);
    }
}
