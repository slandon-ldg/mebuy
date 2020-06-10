<?php

namespace App\Controllers;

use App\Core\App;

class OrdersController
{
    // create an order
    // to create an order needs,

    // view an order
    public function user_get_all_orders()
    {
        $users = App::get('database')->selectAllFrom('users');

        return view('users_view/order_details', [
            'users' => $users
        ]);
    }

    // delete an order

    // bid on an order

    // buy an order

}