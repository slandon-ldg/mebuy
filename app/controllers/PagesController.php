<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 16/08/2018
 * Time: 22:55
 */

namespace App\Controllers;

class PagesController
{
    public function home()
    {
        return view('index');
    }
}