<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
	/**
	 * Do whatever processing this filter needs to do.
	 * By default it should not return anything during
	 * normal execution. However, when an abnormal state
	 * is found, it should return an instance of
	 * CodeIgniter\HTTP\Response. If it does, script
	 * execution will end and that Response will be
	 * sent back to the client, allowing for error pages,
	 * redirects, etc.
	 *
	 * @param RequestInterface $request
	 * @param array|null       $arguments
	 *
	 * @return mixed
	 */
	public function before(RequestInterface $request, $arguments = null)
	{
		// if already logged in, redirect from login and signup to user profile page
		$exceptionRouteList = ['login', 'signup'];

		if (session()->get('isLoggedIn')) {
			foreach ($exceptionRouteList as $exceptRoute) {
				if ($this->isMatchedUrl(route_to($exceptRoute), $request)) {
					return redirect()->route('userProfile');
				}
			}
		}

		// check if user is not logged in
		if (!session()->get('isLoggedIn')) {
			// don't redirect user back to login/signup do avoid infinite loop
			foreach ($exceptionRouteList as $exceptRoute) {
				if ($this->isMatchedUrl(route_to($exceptRoute), $request)) {
					return $request;
				}
			}

			return redirect()->route('login');
		}
	}

	/**
	 * Allows After filters to inspect and modify the response
	 * object as needed. This method does not allow any way
	 * to stop execution of other after filters, short of
	 * throwing an Exception or Error.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param array|null        $arguments
	 *
	 * @return mixed
	 */
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}

	private function isMatchedUrl(string $route, RequestInterface $request) {
		return site_url($route) === (string)$request->uri;
	}
}
