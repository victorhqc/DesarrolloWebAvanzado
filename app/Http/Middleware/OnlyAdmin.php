<?php

namespace App\Http\Middleware;

use Closure;

class OnlyAdmin
{
    /**
     * Si no es administrador, es redirigido a "/"
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if (
            !isset($user) ||
            !$user->is_admin()
        ) {
            return redirect('products');
        }

        return $next($request);
    }
}
