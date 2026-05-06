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

        // Allow users to view/edit/update their own staff profile even if they don't have
        // global module permissions (common for staff self-service accounts).
        if ($user && $module === 'staff_profile' && in_array($action, ['view', 'edit'], true)) {
            $routeStaffProfile = $request->route('staffProfile');

            // With route-model binding this can be a StaffProfile model; otherwise it may be an id.
            $routeStaffProfileId = null;
            if (is_object($routeStaffProfile) && property_exists($routeStaffProfile, 'id')) {
                $routeStaffProfileId = $routeStaffProfile->id;
            } elseif (is_scalar($routeStaffProfile)) {
                $routeStaffProfileId = (int) $routeStaffProfile;
            }

            if ($routeStaffProfileId && $user->staffProfile && (int) $user->staffProfile->id === (int) $routeStaffProfileId) {
                return $next($request);
            }
        }

        if (!$user || !$user->hasPermission($module, $action)) {
            abort(403, 'Unauthorized access. You do not have permission to perform this action.');
        }

        return $next($request);
    }
}
