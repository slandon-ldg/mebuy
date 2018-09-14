<!--/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 31/08/2018
 * Time: 14:31
 */-->

<?php require('app/views/partials/header.view.php'); ?>
<link rel="stylesheet" href="app/public/css/user_styles/user_dashboard_style.css">

<section>
    <nav class="userdashboard_nav">
        <ul>
            <div class="li_content">
                <li>
                    <i class="small_nav fas fa-user-circle"></i>
                    <a href="user_account">Dashboard</a>
                </li>
            </div>
            <div class="li_content">
                <li>
                    <i class="small_nav fas fa-user-circle"></i>
                    <a href="user_account?nav=personal_details"><i class="fas fa-user-circle"></i> Personal</a>
                </li>
            </div>
            <div class="li_content">
                <li>
                    <i class="small_nav fas fa-home"></i>
                    <a href="user_account?nav=address_details"><i class="fas fa-home"></i> Address</a>
                </li>
            </div>
            <div class="li_content">
                <li>
                    <i class="small_nav far fa-credit-card"></i>
                    <a href="user_account?nav=billing_details"><i class="far fa-credit-card"></i> Billing</a>
                </li>
            </div>
            <div class="li_content">
                <li>
                    <i class="small_nav far fa-clipboard"></i>
                    <a href="user_account?nav=order_details"><i class="far fa-clipboard"></i> Your Orders</a>
                </li>
            </div>
        </ul>
    </nav>

    <!-- Default Dynamic Section -->
    <article id="default-content" class="dynamic-content">
        <?php require('app/views/users_view/default_content.view.php') ?>
    </article>
    <!-- Dynamic Section 1 -->
    <article id="personal_details" class="dynamic-content">
        <?php require('app/views/users_view/personal_details.view.php') ?>
    </article>
    <!-- Dynamic Section 2 -->
    <article id="address_details" class="dynamic-content">
        <?php require('app/views/users_view/address_details.view.php') ?>
    </article>
    <!-- Dynamic Section 3 -->
    <article id="billing_details" class="dynamic-content">
        <?php require('app/views/users_view/billing_details.view.php') ?>
    </article>
    <!-- Dynamic Section 4 -->
    <article id="order_details" class="dynamic-content">
        <?php require('app/views/users_view/order_details.view.php') ?>
    </article>

</section>

<?php require('app/views/partials/footer.view.php');
