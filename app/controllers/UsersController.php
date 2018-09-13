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
        // Need to check if email already exists when creating account, don't want duplicate email accounts
        // could be done similar to the way that log in is achieved, store in a variable
        // inside of QueryBuilder, use it to return true or false whether duplicate emails
        $pword = $_POST['pword'];
        $hash  = password_hash($pword, PASSWORD_BCRYPT);

        $email_check = App::get('database')->checkUserRegistrationDetails($_POST['email']);

        if (!$email_check) {
            return view("index", [
                'error' => 'Email already exists'
            ]);
        }

        App::get('database')->insert('users', [
            'first_name'    => $_POST['fname'],
            'last_name'     => $_POST['lname'],
            'email_address' => $_POST['email'],
            'password'      => $hash
        ]);

        return view("index", [
            'error' => 'Account Created'
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