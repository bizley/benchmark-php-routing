<?php

namespace Benchmark_Routing;

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Symfony extends Benchmark
{
	function runRouting(string $route) : array
	{
		$matcher = new UrlMatcher(
			$this->loadedRoutes(),
			new RequestContext()
			);

		return $matcher->match($route);
	}

	function loadedRoutes() : RouteCollection
	{
		return include __DIR__ . '/symfony-routes.php';
	}
}
