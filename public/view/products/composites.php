<!--START: composites collapse link-->
<div class="product-accordion-links">
    <h4>
        <a data-toggle="collapse"
           data-parent="#products-accordion"
           href="#composites-details"
           class="composites-link categories-title">
            <img src="<?= LOCAL . "public/img/icons/tooth-outline (1).svg"; ?>" class="category-title-icons">Composites
        </a>
    </h4>
</div>
<!--END: composites collapse link-->


<!--START: composites details-->
<div id="composites-details" class="collapse product-category-container-details">


    <!--One-product sub-category: Uveneer-->
    <?php require_once(PUBLIC_PATH . "view/products/sub-categories/composites/uveneer.php"); ?>

    <!--One-product sub-category: Composite-gun-->
    <?php require_once(PUBLIC_PATH . "view/products/sub-categories/composites/composite-gun.php"); ?>



</div>
<!--END: composites details-->