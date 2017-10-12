<div class="container-fluid" id="products-main-container">

    <!-- Title-->
    <div class="row">
        <div class="col-sm-9 col-sm-offset-1">
            <h2 id="about-title">Products</h2>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">


            <div id="products-accordion" class="products-accordions">


                <div class="products-container">

                    <?php require_once(PUBLIC_PATH . "view/products/tooth-whitening.php"); ?>

                    <?php require_once(PUBLIC_PATH . "view/products/bond-etch.php"); ?>

                    <?php require_once(PUBLIC_PATH . "view/products/composites.php"); ?>

                </div>

            </div>


        </div>
    </div>


</div>


<!--cs-->
<link href="<?= LOCAL . "public/css/products/index.css"; ?>" rel="stylesheet">

<!--js-->
<script src="<?= LOCAL . "public/js/products/read.js"; ?>"></script>
<script src="<?= LOCAL . "public/js/products/tasks.js"; ?>"></script>