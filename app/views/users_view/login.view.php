<link rel="stylesheet" href="app/public/css/user_styles/login_modal_popup.css">

<div id="login_modal" class="modal">
    <form method="post" class="modal_content" action="login">
        <input type="email" class="login_form_textfield"
               id="login_email" name="login_email"
               placeholder="Email Address" required>

        <br>

        <input type="password" class="login_form_textfield"
               id="login_password" name="login_password"
               placeholder="Password" required>

        <br>

        <button class="login_form_submit_button" style="vertical-align:middle"><span>Submit</span></button>

        <span class="close" title="Close Modal">&times;</span>
    </form>
</div>
