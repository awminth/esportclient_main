<?php
    include("config.php");
    include(root."master/header.php");
?>
<!-- <section class="container pb-5 mb-lg-3 bg-success mt-1"> -->
<!-- One item + Dots + Loop (defaults) -->
<div class="tns-carousel tns-nav-enabled m-2">
    <div class="tns-carousel-inner" style="height:190px;">
        <img src="<?=roothtml.'lib/images/1.jpg'?>" alt="Alt text" style="height: 100%;" class="rounded-3">
        <img src="<?=roothtml.'lib/images/2.jpg'?>" alt="Alt text" style="height: 100%;" class="rounded-3">
        <img src="<?=roothtml.'lib/images/3.jpg'?>" alt="Alt text" style="height: 100%;" class="rounded-3">
    </div>
</div>

<!-- play to click -->
<div class="container">
    <div class="row">
        <div class="col-6 tns-item tns-slide-active">
            <article class="card border-0">
                <div class="card-img-top position-relative overflow-hidden"><a class="d-block" href="#"><img
                            src="<?=roothtml.'lib/images/4.jpg'?>" alt="Product image"></a>
                </div>
                <div class="card-body">
                    <h3 class="product-title mb-2 fs-base text-center"><a class="d-block text-truncate"
                            href="#">Aesthetic
                            art collage</a></h3>
                </div>
            </article>
        </div>

        <div class="col-6 tns-item tns-slide-active">
            <article class="card border-0">
                <div class="card-img-top position-relative overflow-hidden"><a class="d-block" href="#"><img
                            src="<?=roothtml.'lib/images/4.jpg'?>" alt="Product image"></a>
                </div>
                <div class="card-body">
                    <h3 class="product-title mb-2 fs-base text-center"><a class="d-block text-truncate"
                            href="#">Aesthetic
                            art collage</a></h3>
                </div>
            </article>
        </div>
    </div>
</div>




<?php
    include(root."master/footer.php");
?>