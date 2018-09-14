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
            'success' => 'Account Created, now please log in'
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

        $checkUserDetails        = App::get('database')->getUserActiveShippingDetails();
        $checkUserBillingDetails = App::get('database')->getUserActiveBillingDetails();

        return view('users_view/user_dashboard', [
            'first_name'          => $checkUserDetails['fname'],
            'last_name'           => $checkUserDetails['lname'],
            'email'               => $checkUserDetails['email'],
            'street_address'      => $checkUserDetails['street_address'],
            'city'                => $checkUserDetails['city'],
            'postcode'            => $checkUserDetails['postcode'],
            'country'             => $checkUserDetails['country'],
            'phone_number'        => $checkUserDetails['phone_number'],
            'bill_first_name'     => $checkUserBillingDetails['bill_fname'],
            'bill_last_name'      => $checkUserBillingDetails['bill_lname'],
            'bill_email'          => $checkUserBillingDetails['bill_email'],
            'bill_street_address' => $checkUserBillingDetails['bill_street_address'],
            'bill_city'           => $checkUserBillingDetails['bill_city'],
            'bill_postcode'       => $checkUserBillingDetails['bill_postcode'],
            'bill_country'        => $checkUserBillingDetails['bill_country'],
            'bill_phone_number'   => $checkUserBillingDetails['bill_phone_number']
        ]);
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
        $checkUserDetails        = App::get('database')->getUserActiveShippingDetails();
        $checkUserBillingDetails = App::get('database')->getUserActiveBillingDetails();

        return view('users_view/user_dashboard', [
            'first_name'          => $checkUserDetails['fname'],
            'last_name'           => $checkUserDetails['lname'],
            'email'               => $checkUserDetails['email'],
            'street_address'      => $checkUserDetails['street_address'],
            'city'                => $checkUserDetails['city'],
            'postcode'            => $checkUserDetails['postcode'],
            'country'             => $checkUserDetails['country'],
            'phone_number'        => $checkUserDetails['phone_number'],
            'bill_first_name'     => $checkUserBillingDetails['bill_fname'],
            'bill_last_name'      => $checkUserBillingDetails['bill_lname'],
            'bill_email'          => $checkUserBillingDetails['bill_email'],
            'bill_street_address' => $checkUserBillingDetails['bill_street_address'],
            'bill_city'           => $checkUserBillingDetails['bill_city'],
            'bill_postcode'       => $checkUserBillingDetails['bill_postcode'],
            'bill_country'        => $checkUserBillingDetails['bill_country'],
            'bill_phone_number'   => $checkUserBillingDetails['bill_phone_number']
        ]);
    }

    // Post Functionality //
    public function user_update_personal_info()
    {
        $user_fname = $_POST['update_fname'];
        $user_lname = $_POST['update_lname'];
        $user_email = $_POST['update_email'];

        $update = App::get('database')->updateUserPersonalDetails($user_fname, $user_lname, $user_email);

        if (!$update) {
            return view("index", [
                'error' => 'Error please try again'
            ]);
        }

        $checkUserDetails        = App::get('database')->getUserActiveShippingDetails();
        $checkUserBillingDetails = App::get('database')->getUserActiveBillingDetails();

        return view('users_view/user_dashboard', [
            'first_name'          => $checkUserDetails['fname'],
            'last_name'           => $checkUserDetails['lname'],
            'email'               => $checkUserDetails['email'],
            'street_address'      => $checkUserDetails['street_address'],
            'city'                => $checkUserDetails['city'],
            'postcode'            => $checkUserDetails['postcode'],
            'country'             => $checkUserDetails['country'],
            'phone_number'        => $checkUserDetails['phone_number'],
            'bill_first_name'     => $checkUserBillingDetails['bill_fname'],
            'bill_last_name'      => $checkUserBillingDetails['bill_lname'],
            'bill_email'          => $checkUserBillingDetails['bill_email'],
            'bill_street_address' => $checkUserBillingDetails['bill_street_address'],
            'bill_city'           => $checkUserBillingDetails['bill_city'],
            'bill_postcode'       => $checkUserBillingDetails['bill_postcode'],
            'bill_country'        => $checkUserBillingDetails['bill_country'],
            'bill_phone_number'   => $checkUserBillingDetails['bill_phone_number']
        ]);
    }

    // Post Functionality //
    public function user_update_address_info()
    {
        $street      = $_POST['address_street'];
        $city        = $_POST['address_city'];
        $postcode    = $_POST['address_postcode'];
        $country     = $_POST['address_country'];
        $phonenumber = $_POST['address_phonenumber'];

        if (isset($_POST['active_shipping_address'])) {
            $active_shipping_address = 1;
        } else {
            $active_shipping_address = 0;
        }

        $address = App::get('database')->updateUserAddressDetails($street, $city, $postcode, $country, $phonenumber, $active_shipping_address);

        if (!$address) {
            return view("index", [
                'error' => 'Error please try again'
            ]);
        }

        $checkUserDetails        = App::get('database')->getUserActiveShippingDetails();
        $checkUserBillingDetails = App::get('database')->getUserActiveBillingDetails();

        return view('users_view/user_dashboard', [
            'first_name'          => $checkUserDetails['fname'],
            'last_name'           => $checkUserDetails['lname'],
            'email'               => $checkUserDetails['email'],
            'street_address'      => $checkUserDetails['street_address'],
            'city'                => $checkUserDetails['city'],
            'postcode'            => $checkUserDetails['postcode'],
            'country'             => $checkUserDetails['country'],
            'phone_number'        => $checkUserDetails['phone_number'],
            'bill_first_name'     => $checkUserBillingDetails['bill_fname'],
            'bill_last_name'      => $checkUserBillingDetails['bill_lname'],
            'bill_email'          => $checkUserBillingDetails['bill_email'],
            'bill_street_address' => $checkUserBillingDetails['bill_street_address'],
            'bill_city'           => $checkUserBillingDetails['bill_city'],
            'bill_postcode'       => $checkUserBillingDetails['bill_postcode'],
            'bill_country'        => $checkUserBillingDetails['bill_country'],
            'bill_phone_number'   => $checkUserBillingDetails['bill_phone_number']
        ]);
    }

}