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
                    <i id="login_btn" class="small_nav fas fa-user-circle"></i>
                    <a href="user_details"><i class="fas fa-user-circle"></i> Personal</a>
                </li>
            </div>
            <div class="li_content">
                <li>
                    <i class="small_nav fas fa-home"></i>
                    <a href="user_address"><i class="fas fa-home"></i> Address</a>
                </li>
            </div>
            <div class="li_content">
                <li>
                    <i class="small_nav far fa-credit-card"></i>
                    <a href="user_bill_address"><i class="far fa-credit-card"></i> Billing</a>
                </li>
            </div>
        </ul>
    </nav>

    <!-- Default Dynamic Section -->
    <div id="default-content" class="dynamic-content">
        <h1>Welcome </h1>
        <?php echo "<h1>Welcome " . $_SESSION['user_email'] . "</h1>"; ?>
    </div>
    <!-- Dynamic Section 1 -->
    <div id="apples" class="dynamic-content">
        I like apples
    </div>
    <!-- Dynamic Section 2 -->
    <div id="oranges" class="dynamic-content">
        I like oranges
    </div>
    <!-- Dynamic Section 3 -->
    <div id="bananas" class="dynamic-content">
        I like bananas
    </div>

</section>

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript">
    // Parse the URL parameter
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
    // Give the parameter a variable name
    var dynamicContent = getParameterByName('nav');

    $(document).ready(function() {

        // Check if the URL parameter is apples
        if (dynamicContent == 'apples') {
            $('#apples').show();
        }
        // Check if the URL parameter is oranges
        else if (dynamicContent == 'oranges') {
            $('#oranges').show();
        }
        // Check if the URL parameter is bananas
        else if (dynamicContent == 'bananas') {
            $('#bananas').show();
        }
        // Check if the URL parmeter is empty or not defined, display default content
        else {
            $('#default-content').show();
        }
    });
</script>

<?php require('app/views/partials/footer.view.php');
