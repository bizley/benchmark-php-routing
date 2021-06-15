<?php

namespace Benchmark_Routing;

use yii\caching\FileCache;
use yii\web\Request;
use yii\web\UrlManager;

class Yii2_Cached extends Benchmark
{
	function runRouting(string $route) : array
	{
		$matcher = new UrlManager([
		    'rules' => $this->loadedRoutes(),
            'enablePrettyUrl' => true,
            'cache' => [
                'class' => FileCache::class,
                'cachePath' => '/tmp'
            ]
        ]);

		return $matcher->parseRequest(new Request(['pathInfo' => $route]));
	}

	function loadedRoutes() : array
	{
		return include __DIR__ . '/yii2-routes.php';
	}
}
