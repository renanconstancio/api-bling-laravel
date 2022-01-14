<?php

/**
 *
 * Create your routes to specify the site, aka the database connection.
 * app/Http/routes.php
 */

app('router')->get('/{connection}/', function () {
  return app('db')->getDefaultConnection();
});