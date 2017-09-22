<!--Styles-->
<link href="<?= LOCAL . "public/css/sign-up/create.css"; ?>" rel="stylesheet" type="text/css">


<form id="sign-up-form" method="post"  class="section">
    <h4>Sign-up</h4>

    <h5>Username</h5>
    <input id="user_name" type="text" name="user_name" class="form_text_input">
    <label class="error_msg" id="error_msg_username"></label>

    <h5>Password</h5>
    <input id="password" type="password" name="password" class="form_text_input">
    <label class="error_msg" id="error_msg_password"></label><br>

    <input id="sign-up-button" type="button" value="sign-up" class="form_button">
</form>