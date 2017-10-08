<input type="hidden" id="new-csrf-token" value="<?= sessionize_csrf_token(); ?>">
<footer class="container-fluid" id="footer-main-container">
    <div class="row">

        <div class="col-sm-2 col-sm-offset-1">
            <h4>Services</h4>

            <h5><a class="footer-services" href="#cosmetic-service">Cosmetic</a></h5>
            <h5><a class="footer-services" href="#implant-service">Implant</a></h5>
            <h5><a class="footer-services" href="#restoration-service">Restorative</a></h5>
            <h5><a class="footer-services" href="#root-canal-service">Root Canal Therapy</a></h5>

            <h5><a class="footer-services" href="#emergency-service">Emergency</a></h5>
            <h5><a class="footer-services" href="#children-service">Children</a></h5>
            <h5><a class="footer-services" href="#x-ray-service">X-Ray</a></h5>
            <h5><a class="footer-services" href="#mouthguard-service">Mouthguard</a></h5>

<!--            <h5><a class="footer-services" data-toggle="modal" data-target="#cosmetics-modal">Cosmetic</a></h5>-->
<!--            <h5><a class="footer-services" data-toggle="modal" data-target="#implant-modal">Implant</a></h5>-->
<!--            <h5><a class="footer-services" data-toggle="modal" data-target="#restoration-modal">Restorative</a></h5>-->
<!--            <h5><a class="footer-services" data-toggle="modal" data-target="#root-canal-modal">Root Canal</a></h5>-->
<!--            <h5><a class="footer-services" data-toggle="modal" data-target="#cosmetics-modal">Emergency</a></h5>-->
<!--            <h5><a class="footer-services" data-toggle="modal" data-target="#cosmetics-modal">Children</a></h5>-->
<!--            <h5><a class="footer-services" data-toggle="modal" data-target="#cosmetics-modal">X-Ray</a></h5>-->
<!--            <h5><a class="footer-services" data-toggle="modal" data-target="#cosmetics-modal">Mouthguard</a></h5>-->



        </div>



        <div class="col-sm-2">
            <h4>Business Hours</h4>
            <h5>Monday to Friday</h5>
            <h5>9:00 AM to 6:00 PM</h5>

            <br>

            <h5>Saturday</h5>
            <h5>10:00 AM to 4:00 PM</h5>
        </div>



        <div class="col-sm-2">
            <h4>Contact Us</h4>
            <h5>Dawes Place Dental Clinic</h5>
            <h5>78 Bretton Rd</h5>
            <h5>East York, ON</h5>
            <h5>M4H 9K9</h5>
            <h5>(416) 824-8036</h5>
            <h5>dawesplace@bucadjavierdental.ca</h5>

            <br>

            <h5>Halsey Dental Clinic</h5>
            <h5>81 Halsey Rd</h5>
            <h5>Markham, ON</h5>
            <h5>L6E 1V9</h5>
            <h5>(647) 887-6400</h5>
            <h5>halsey@bucadjavierdental.ca</h5>
        </div>



        <div class="col-sm-2">
            <h4>Forms</h4>
            <h5><a href="#dental">Patient Information Form</a></h5>
            <h5><a href="#dental">Dental History Form</a></h5>
            <h5><a href="#dental">New Patient Questionnare</a></h5>
        </div>



        <div class="col-sm-2">
            <h4>Accounts</h4>
            <h5><a href="<?= LOCAL . "public/view/login/index.php"; ?>">Log-in</a></h5>
            <h5><a href="<?= LOCAL . "public/view/sign-up/index.php"; ?>">Sign-up</a></h5>
            <h5><a href="<?= LOCAL . "public/controller/LogoutController.php"; ?>">Log-out</a></h5>
        </div>



    </div>

    <hr  class="col-sm-10 col-sm-offset-1">



    <div class="row">
        <h5 id="my-copyright" class="col-sm-10 col-sm-offset-1">Copyright &copy; 2017 Bucad-Javier Inc. All rights reserved.</h5>
    </div>
</footer>






<!--cs-->
<link href="<?= LOCAL . "public/css/layouts/footer.css"; ?>" rel="stylesheet">

<!--js-->
<!--<script src="--><?//= LOCAL . "public/js/services/read.js"; ?><!--"></script>-->

</div><!--<div id="my-wrapper">-->


<!--Widgets-->
<?php require_once(PUBLIC_PATH . "view/widgets/index.php"); ?>

</body>

</html>