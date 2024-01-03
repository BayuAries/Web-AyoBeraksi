<?php

namespace App\Http\Middleware;

use App\Helpers\PermissionHelper;
use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $permitted = PermissionHelper::isHavePermission($permission);

        if ($permitted) {
            return $next($request);

        }

        $message = 'Anda tidak memiliki hak akses';

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json(['messages' => $message, 'permit' => $permitted], 403);
        }

        abort(403, $message);
    }
}
