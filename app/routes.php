<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 16/08/2018
 * Time: 22:33
 */

// Main Page //
$router->get('', 'PagesController@home');

// User Pages e.g Registration, Login etc //
$router->get('register', 'UsersController@user_registration_page');
$router->post('register', 'UsersController@user_registration');

$router->get('login', 'UsersController@user_login_page');
$router->post('login', 'UsersController@user_login');

$router->get('logout', 'UsersController@user_logout');

$router->get('user_account', 'UsersController@user_account_page');

$router->post('update_personal_info', 'UsersController@user_update_personal_info');
$router->post('update_address_info', 'UsersController@user_update_address_info');
$router->post('update_bill_address_info', 'UsersController@user_update_bill_address_info');