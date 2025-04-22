<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle(Request $request, Closure $next, string $module, string $action)
    {
        $user = Auth::user();

        if (!$user || !$user->hasPermission($module, $action)) {
            abort(403, 'Unauthorized access. You do not have permission to perform this action.');
        }

        return $next($request);
    }
}
