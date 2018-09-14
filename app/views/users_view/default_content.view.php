<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 12/09/2018
 * Time: 14:49
 */
?>

<link rel="stylesheet" href="app/public/css/user_styles/user_address_details.css">

<?php
echo "<h1>Welcome " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "</h1>";
?>
<p>Please use the links on the side to navigate to your account details. </p>

<div class="address_card_holder">
    <h1>Account Information</h1>

    <div class="address_container">
        <h3 class="address_card_header">Shipping Address</h3>
        <div class="address_card_content">
            <?php
            if (isset($first_name)
                && isset($last_name)
                && isset($email)
                && isset($street_address)
                && isset($city)
                && isset($postcode)
                && isset($country)
                && isset($phone_number)
            ) {
                echo "<p>" . $first_name . " " . $last_name . "</p>";
                echo "<p>" . $email . "</p>";
                echo "<p>" . $street_address . "</p>";
                echo "<p>" . $city . "</p>";
                echo "<p>" . $postcode . "</p>";
                echo "<p>" . $country . "</p>";
                echo "<p>" . $phone_number . "</p>";
            } else {
                echo "<div class='li_content'>";
                echo "<li>";
                echo "<i class='small_nav fas fa-user-circle'></i>";
                echo "Please fill out the <a href='user_account?nav=address_details'><i class='fas fa-user-circle'></i> Address Info</a> Section";
                echo "</li>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <div class="address_container">
        <h3 class="address_card_header">Billing Address</h3>
        <div class="address_card_content">
            <?php
            if (isset($bill_first_name)
                && isset($bill_last_name)
                && isset($bill_email)
                && isset($bill_street_address)
                && isset($bill_city)
                && isset($bill_postcode)
                && isset($bill_country)
                && isset($bill_phone_number)
            ) {
                echo "<p>" . $bill_first_name . " " . $bill_last_name . "</p>";
                echo "<p>" . $bill_email . "</p>";
                echo "<p>" . $bill_street_address . "</p>";
                echo "<p>" . $bill_city . "</p>";
                echo "<p>" . $bill_postcode . "</p>";
                echo "<p>" . $bill_country . "</p>";
                echo "<p>" . $bill_phone_number . "</p>";
            } else {
                echo "<div class='li_content'>";
                echo "<li>";
                echo "<i class='small_nav fas fa-user-circle'></i>";
                echo "Please fill out the <a href='user_account?nav=billing_details'><i class='fas fa-user-circle'></i> Billing Info</a> Section";
                echo "</li>";
                echo "</div>";
            }
            ?>
        </div>
    </div>


</div>
<br>