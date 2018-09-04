<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 16/08/2018
 * Time: 22:40
 */

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
              Connection::make(
                  App::get('config')['database'])
));

// Custom method to generate the view needed
// Use this method inside the Controller class to return the view
/**
 * @param $name
 * @param array $data
 * @return view
 */
function view($name, $data = [])
{
    extract($data);
    return require "app/views/{$name}.view.php";
}

/**
 * @param $name
 * @param array $data
 * @return twig view
 */
function twigView($name, $data = [])
{
    extract($data);
    return require "app/views/twig/{$name}.twig";
}

/**
 * @param $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}