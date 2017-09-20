<div class="container-fluid text-left" id="services-main-container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 id="services-title" class="">Our Servies</h2>
        </div>

    </div>


    <div class="row">
        <div class="col-md-10 col-md-offset-1">


            <div id="cosmetic-service" class="card services-card slideanim">

                <div class="row">



                    <div class="col-md-5 card-img-container">
                        <!--Card image-->
                        <div class="">
                            <img src="<?= LOCAL . "public/img/services-cosmetic.jpg"; ?>" class="img-fluid services-img">
                        </div>
                        <!--/.Card image-->
                    </div>


                    <div class="col-md-7 card-block-description-container">
                        <!--Card content-->
                        <div class="card-block card-block-description align-middle">
                            <!--Title-->
                            <h3 class="card-title">Cosmetic</h3>
                            <!--Text-->
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the
                                Some quick example text to build on the card title and make up the bulk of the
                                Some quick example text to build on the card title and make up the bulk of the
                                card's content.
                            </p>

                            <h5 class="text-success service-person">~ Dr. Rowena Javier</h5>

                            <!-- Button trigger modal -->
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cosmetics-modal">
                                view more
                            </button>
                        </div>
                        <!--/.Card content-->
                    </div>


                </div>

            </div>


            <div id="implant-service" class="card services-card slideanim">

                <div class="row">

                    <div class="col-md-5 card-img-container">
                        <!--Card image-->
                        <div class="">
                            <img src="<?= LOCAL . "public/img/services-implant.jpg"; ?>" class="img-fluid services-img">
                        </div>
                        <!--/.Card image-->
                    </div>


                    <div class="col-md-7 card-block-description-container">
                        <!--Card content-->
                        <div class="card-block card-block-description align-middle">
                            <!--Title-->
                            <h3 class="card-title">Implant</h3>
                            <!--Text-->
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the
                                Some quick example text to build on the card title and make up the bulk of the
                                Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>

                            <h5 class="text-info service-person">~ Dr. Lea Bucad</h5>

                            <!-- Button trigger modal -->
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#implant-modal">
                                view more
                            </button>
                        </div>
                        <!--/.Card content-->
                    </div>


                </div>

            </div>


            <div id="restoration-service" class="card services-card slideanim">

                <div class="row">


                    <div class="col-md-5 card-img-container">
                        <!--Card image-->
                        <div class="">
                            <img src="<?= LOCAL . "public/img/services-restoration.jpg"; ?>" class="img-fluid services-img">
                        </div>
                        <!--/.Card image-->
                    </div>


                    <div class="col-md-7 card-block-description-container">
                        <!--Card content-->
                        <div class="card-block card-block-description align-middle">
                            <!--Title-->
                            <h3 class="card-title">Restoration</h3>
                            <!--Text-->
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the
                                Some quick example text to build on the card title and make up the bulk of the
                                Some quick example text to build on the card title and make up the bulk of the
                                card's content.
                            </p>

                            <h5 class="text-danger service-person">~ CEO Dexter Javier</h5>

                            <!-- Button trigger modal -->
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#restoration-modal">
                                view more
                            </button>

                        </div>
                        <!--/.Card content-->
                    </div>


                </div>

            </div>


        </div>
    </div>
</div>


<!--Modals / Sub-services-->
<?php require_once(PUBLIC_PATH . "view/services/sub-services/cosmetics.php"); ?>
<?php require_once(PUBLIC_PATH . "view/services/sub-services/implant.php"); ?>


<!--cs-->
<link href="<?= LOCAL . "public/css/services/index.css"; ?>" rel="stylesheet">

<!--js-->
<script src="<?= LOCAL . "public/js/services/read.js"; ?>"></script>






