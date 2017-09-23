<!--Styles-->
<link href="<?= LOCAL . "public/css/sign-up/create.css"; ?>" rel="stylesheet" type="text/css">


<?php //require_once(PUBLIC_PATH . "view/about/index.php"); ?>
<?php //require_once(PUBLIC_PATH . "view/team/index.php"); ?>

<?php //for ($i = 0; $i < 5; $i++) {?>

<div id="page-banner">
    <img src="<?= LOCAL . "public/img/clinic2.jpg"; ?>">
</div>

<div class="container-fluid" id="sign-up-form-container">
    <form id="sign-up-form" method="post" class="section">
        <h4>Sign-up</h4>

        <h5>Username</h5>
        <input id="username" type="text" class="form_text_input">
        <label class="error-msg" id="error_username"></label>

        <h5>Password</h5>
        <input id="password" type="password" class="form_text_input">
        <label class="error-msg" id="error_password"></label><br>

        <input id="sign-up-button" type="button" value="sign-up" class="form_button">
    </form>
</div>

<?php //} ?>