<?php //require_once(PUBLIC_PATH . "/controller/services/x.php"); ?>

<link href="<?= LOCAL . "/public/css/company_info.css"; ?>" rel="stylesheet" type="text/css">

<div class="container-fluid text-center" id="company">


    <div>
        <img id="company-banner" class="" src="<?= LOCAL . "public/img/clinic3.jpg"; ?>">

        <div id="my-company-mask">
        </div>


        <div id="header-descriptions" class="container container-fluid">

            <div class="row">

                <div class="col-sm-4 col-sm-offset-2 col-xs-10 col-xs-offset-2 text-left">
                    <h2 id="company-name">Dawes Place Dental</h2>

                    <h4>
                        Dr. Rowena Bucad-Javier<br>
                        &amp; Associates
                    </h4>
                    <button class="btn btn-danger btn-md"><a href="#">Book Now</a></button>
                </div>


                <div class="col-sm-4 col-sm-offset-2 col-xs-10 col-xs-offset-2 text-left" id="banner-contact">

                    <div class="row">
                        <p class="col-sm-1 col-xs-1"><i class="fa fa-map-marker"></i></p>

                        <p class="col-sm-11 col-xs-11">105-50 Thorncilffe Park Dr<br>
                            East York, ON<br>
                            L6E 1V5
                        </p>
                    </div>


                    <div class="row">
                        <p class="col-sm-1 col-xs-1"><i class="fa fa-phone"></i></p>

                        <p class="col-sm-11 col-xs-11">(416) 824-8036</p>
                    </div>


                    <div class="row">
                        <p class="col-sm-1 col-xs-1"><i class="fa fa-envelope-open-o"></i></p>

                        <p class="col-sm-11 col-xs-11">dawesplace@dental.com</p>
                    </div>


                </div>

            </div>

        </div>

    </div>


</div>


<!--js-->
<script src="<?= LOCAL . "/public/js/company_info/read.js"; ?>"></script>
<script src="<?= LOCAL . "/public/js/company_info/tasks.js"; ?>"></script>