<?php

// Main Page //
$router->get('', 'PagesController@home');

// User Pages e.g Registration, Login etc //
$router->get('register', 'UsersController@user_registration_page');
$router->post('register', 'UsersController@user_registration');

$router->get('login', 'UsersController@user_login_page');
$router->post('login', 'UsersController@user_login');

$router->get('logout', 'UsersController@user_logout');

$router->get('user_account', 'UsersController@user_account_page');

$router->get('user_personal_details', 'UsersController@user_personal_info');
$router->post('update_personal_info', 'UsersController@user_update_personal_info');

$router->get('user_address_details', 'UsersController@user_address_info');
$router->post('update_address_info', 'UsersController@user_update_address_info');

$router->get('user_bill_address_details', 'UsersController@user_bill_address_info');
$router->post('update_bill_address_info', 'UsersController@user_update_bill_address_info');

$router->get('user_order_details', 'OrdersController@user_get_all_orders');