<!--Styles-->
<link href="<?= LOCAL . "public/css/login/read.css"; ?>" rel="stylesheet" type="text/css">


<div id="page-banner">
    <img src="<?= LOCAL . "public/img/clinic2.jpg"; ?>">
</div>



<div class="container-fluid" id="login-form-container">
    <form id="login-form" method="post" class="section">
        <h4>Log-in</h4>

        <h5>Username</h5>
        <input id="username" type="text" class="form_text_input">
        <label class="error-msg" id="error_username"></label>

        <h5>Password</h5>
        <input id="password" type="password" class="form_text_input">
        <label class="error-msg" id="error_password"></label><br>

        <input id="login-button" type="button" value="Log-in" class="btn btn-sm btn-primary">
    </form>
</div>

