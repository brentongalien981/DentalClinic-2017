<!--START: Tooth-whitening collapse link-->
<div class="product-accordion-links">
    <h4>
        <a data-toggle="collapse"
           data-parent="#products-accordion"
           href="#tooth-whitening-details"
           class="tooth-whitening-link categories-title">
            <img src="<?= LOCAL . "public/img/icons/toothbrush.svg"; ?>" class="category-title-icons">Tooth Whitening
        </a>
    </h4>
</div>
<!--END: Tooth-whitening collapse link-->


<!--START: Whitening details-->
<div id="tooth-whitening-details" class="collapse product-category-container-details">


    <!--Sub-Category: Take-Home Whitening-->
    <?php require_once(PUBLIC_PATH . "view/products/sub-categories/tooth-whitening/take-home-whitening.php"); ?>

    <!--Sub-Category: Whitening Toothpaste-->
    <?php require_once(PUBLIC_PATH . "view/products/sub-categories/tooth-whitening/whitening-toothpaste.php"); ?>

    <!--Sub-Category: Shade Guides-->
    <?php require_once(PUBLIC_PATH . "view/products/sub-categories/tooth-whitening/shade-guides.php"); ?>


</div>
<!--END: Whitening details-->