<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */



    /** New code */
    private $openRoutes = ['/', 'about', '/{id}'];


    /** Old code */
	public function handle($request, Closure $next)
	{


		/** New code */
        foreach($this->openRoutes as $route) {

            if ($request->is($route)) {
                return $next($request);
            }
        }

		/** Old code */
		return parent::handle($request, $next);
	}

}
