<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 16/08/2018
 * Time: 22:43
 */

namespace App\Core;

/**
 * Class Request
 * @package App\core
 */
class Request
{
    /**
     * @return string
     */
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    /**
     * @return mixed
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD']; // Get or Post
    }

}