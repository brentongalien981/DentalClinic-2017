<!--{{--<div class="" id="contact-main-container">--}} -->
    <!--{{--<div class="row">--}} -->
        <!--{{--<h3 class="text-left col-sm-4 col-sm-offset-1" id="contact-title">Contact Us</h3>--}} -->
        <!--{{--</div>--}} -->
    <!--{{--</div>--}} -->


<div id="contact-main-container" class="">
</div>

<div id="map">
</div>

<div id="contact-details-container" class="row">
    <!--{{-- START: Dental Clinic Contact Info --}} -->
    <div class="col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-left">

        <div class="card my-contact-details slideanim">
            <div class="header header-info" id="my-contact-content">

                <div class="row">

                    <!--{{--<h4 class="col-sm-1 label label-warning"><i class="fa fa-handshake-o"></i></h4>--}} -->


                    <h4 id="contact-us-title" class="col-sm-10 label-danger"><i class="fa fa-handshake-o"></i> Contact Us</h4>

                </div>

                <div class="row">

                    <h4 class="col-sm-1"><i class="fa fa-home"></i></h4>
                    <!--{{--<i class="fa fa-home col-sm-1"></i>--}} -->


                    <h4 class="col-sm-10">Dawes Place Dental Clinic</h4>

                </div>


                <div class="row">
                    <p class="col-sm-1"><i class="fa fa-map-marker"></i></p>

                    <p class="col-sm-10">105-50 Thorncilffe Park Dr<br>
                        East York, ON<br>
                        L6E 1V5
                    </p>
                </div>


                <div class="row">
                    <p class="col-sm-1"><i class="fa fa-phone"></i></p>

                    <p class="col-sm-10">(416) 824-8036</p>
                </div>


                <div class="row">
                    <p class="col-sm-1"><i class="fa fa-envelope-open-o"></i></p>

                    <p class="col-sm-10">dawesplace@dental.com</p>
                </div>


            </div>
        </div>

    </div>
    <!--{{-- END: Dental Clinic Contact Info --}} -->
</div>




<!--Sub-menus-->
<?php require_once(PUBLIC_PATH . "view/contact/sub-menus/message-form.php"); ?>



<!--cs-->
<link href="<?= LOCAL . "public/css/contact/index.css"; ?>" rel="stylesheet">

<!--js-->
<script src="<?= LOCAL . "public/js/contact/read.js"; ?>"></script>

<!--Google Maps Script-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiGK_MjaHlQwgJd7BH9zA--d7O4phGwHY&callback=initMap">
</script>