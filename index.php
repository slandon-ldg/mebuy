<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 16/08/2018
 * Time: 22:24
 */

use App\Core\{Router, Request};

// Load in the required files
require 'vendor/autoload.php';
require 'core/bootstrap.php';


Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());
