<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use Illuminate\Http\Request;

class AuthAdmin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
	 */
	public function handle(Request $request, Closure $next)
	{
		if (null !== Admin::getCurrent()) {
			return $next($request);
		}

		return redirect()->route('admin.auth.signin');
	}
}
