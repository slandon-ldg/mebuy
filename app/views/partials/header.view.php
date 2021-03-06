<!doctype html>
<html lang="en">
<head>
    <title>MeBuy</title>
    <link rel="stylesheet" href="app/public/css/styles.css">
    <link rel="stylesheet" href="app/public/css/header_style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width">
</head>

<header>
    <a href="/">Logo</a>

    <div class="header_div">
        <i class="fas fa-shopping-cart"></i>

        <div class="search-container">
            <form action="/">
                <input class="header_text" type="text" placeholder="Search..." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

</header>

<?php
ob_start();
if (!session_id()) session_start();
require('nav.view.php');

if (isset($error)) {
    echo "<div class='error'>
          <strong class='error_message'>"
          . $error .
          "</strong>
          </div>";
} else if (isset($success)) {
    echo "<div class='success'><h3 class='success_message'>" . $success . "</h3></div>";
}
?>

<body>