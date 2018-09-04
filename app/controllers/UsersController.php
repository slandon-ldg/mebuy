<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 22/08/2018
 * Time: 16:51
 */

namespace App\Controllers;

use App\Core\App;

class UsersController
{
    // index page // Get Functionality //
    public function user_registration_page()
    {
        return view('users_view/register');
    }
    // Post Functionality //
    public function user_registration()
    {
        $pword = $_POST['pword'];
        $hash  = password_hash($pword, PASSWORD_BCRYPT);

        // need to change this back to correct page after successful login
        App::get('database')->insert('users', [
            'first_name'    => $_POST['fname'],
            'last_name'     => $_POST['lname'],
            'email_address' => $_POST['email'],
            'password'      => $hash
        ]);

        return view("index", [
            'user_name' => $_POST['fname']
        ]);
    }

    // Get Functionality //
    public function user_login_page()
    {
        return view('users_view/user_login');
    }
    // Post Functionality //
    public function user_login()
    {
        $user_email = $_POST['login_email'];
        $user_pword = $_POST['login_password'];

        $test = App::get('database')->checkUserLoginDetails($user_email, $user_pword);

        if (!$test) {
            return view("index", [
                'error' => 'Incorrect Username or Password. Please try again'
            ]);
        }
        return view('users_view/user_dashboard');
    }

    // Get Functionality // User Logout //
    public function user_logout()
    {
        session_start();
        session_destroy();
        return view('index');
    }

    // Get Functionality //
    public function user_account_page()
    {
        return view('users_view/user_dashboard');
    }

}