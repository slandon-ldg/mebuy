<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 12/09/2018
 * Time: 14:49
 */
?>

<?php
echo "<h1>Welcome " . $_SESSION['user_id'] . "</h1>";
echo "<h1>Welcome " . $_SESSION['first_name'] . "</h1>";
echo "<h1>Welcome " . $_SESSION['last_name'] . "</h1>";
echo "<h1>Welcome " . $_SESSION['user_email'] . "</h1>";
?>
<p>Please use the links on the side to navigate to your account details. </p>

<?php
//if (isset($_POST['address_street'])  || isset($_POST['address_city']) || isset($_POST['address_postcode']) || isset($_POST['address_country']) || isset($_POST['address_phonenumber']) || isset($_POST['active_shipping_address'])){
//    echo "<h1>" . $_SESSION['user_id'] . "</h1>";
//    echo "<h1>" . $_POST['address_street'] . "</h1>";
//    echo "<h1>" . $_POST['address_city'] . "</h1>";
//    echo "<h1>" . $_POST['address_postcode'] . "</h1>";
//    echo "<h1>" . $_POST['address_country'] . "</h1>";
//    echo "<h1>" . $_POST['address_phonenumber'] . "</h1>";
//    if (isset($_POST['active_shipping_address'])) {
//        echo "<h1>" . $_POST['active_shipping_address'] . "</h1>";
//    } else {
//        echo "address not set to default shipping address";
//    }
//}
?>
