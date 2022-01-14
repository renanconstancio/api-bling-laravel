<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;

class DatabaseConnectionChooser
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {

    /** @var Route $route */
    $route = app('router')->getRoutes()->match($request);

    $connection = $route->parameter('connection');

    if ($connection)
      app('db')->setDefaultConnection($connection);


    return $next($request);
  }
}