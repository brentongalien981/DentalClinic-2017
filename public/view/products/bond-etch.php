<!--START: bond-etch collapse link-->
<div class="product-accordion-links">
    <h4>
        <a data-toggle="collapse"
           data-parent="#products-accordion"
           href="#bond-etch-details"
           class="bond-etch-link categories-title">
            <img src="<?= LOCAL . "public/img/icons/dentist-tools.svg"; ?>" class="category-title-icons">Bond / Etch
        </a>
    </h4>
</div>
<!--END: bond-etch collapse link-->


<!--START: bond-etch details-->
<div id="bond-etch-details" class="collapse product-category-container-details">


    <!--Sub-Category: Bonding Systems-->
    <?php require_once(PUBLIC_PATH . "view/products/sub-categories/bond-etch/bonding-systems.php"); ?>

    <!--Sub-Category: SE Primer-->
    <?php require_once(PUBLIC_PATH . "view/products/sub-categories/bond-etch/se-primer.php"); ?>

    <!--Sub-Category: CHX Antibacterial Solution-->
    <?php require_once(PUBLIC_PATH . "view/products/sub-categories/bond-etch/antibacterial-solution.php"); ?>


</div>
<!--END: bond-etch details-->