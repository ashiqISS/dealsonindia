<link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl; ?>/css/jquery.fancybox.css">
<style>
        .product_thumb ul li {
                width: 88px;
                height: 88px;
                border: 1px solid #ccc;
                background-color: #f7f7f7;
                margin-bottom: 5px;
        }
</style>
<script src="<?= Yii::app()->baseUrl ?>/js/jquery.min.js"></script>
<?php
$folder = Yii::app()->Upload->folderName(0, 1000, $products->id);
?>
<section class="product-view">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h2><?php echo $products->product_name; ?></h2>

                        </div>
                        <div class="col-xs-12">
                                <?php if (Yii::app()->user->hasFlash('success')): ?>
                                        <div class="alert alert-success mesage">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                        </div>
                                <?php endif; ?>
                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                        <div class="alert alert-danger mesage">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>sorry!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
                                        </div>
                                <?php endif; ?>
                        </div>
                        <div class="col-xs-5 col-sm-12 col-md-5 for-mob">
                                <div class="pro">
                                        <div class="product_thumb hidden-xs">
                                                <ul id="gal1">
                                                        <?php
                                                        //  $folder = Yii::app()->Upload->folderName(0, 1000, $product->id);
                                                        $big = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $products->id . '/gallery/big';
                                                        $bigg = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $products->id . '/gallery/big/';
                                                        $thu = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $products->id . '/gallery/small';
                                                        $thumbs = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $products->id . '/gallery/small/';
                                                        $zoo = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $products->id . '/gallery/zoom';
                                                        $zoom = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $products->id . '/gallery/zoom/';
                                                        $file_display = array('jpg', 'jpeg', 'png', 'gif');
                                                        if (file_exists($big) == false) {

                                                        } else {
                                                                $dir_contents = scandir($big);
                                                                $i = 0;
                                                                foreach ($dir_contents as $file) {
                                                                        $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                                        if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
                                                                                ?>
                                                                                <li>
                                                                                        <a href="#" data-image="<?php echo $bigg . $file; ?>" data-zoom-image="<?php echo $zoom . $file; ?>" class="">
                                                                                                <img src="<?php echo $thumbs . $file; ?>" alt=""> </a>
                                                                                </li>
                                                                                <?php
                                                                        }
                                                                        ?>



                                                                        <?php
                                                                }
                                                                $i++;
                                                        }
                                                        ?>

                                                </ul>
                                        </div>
                                        <?php
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $products->id);
                                        ?>

                                        <?php
                                        if (!empty($dir_contents)) {

                                                foreach ($dir_contents as $file1) {

                                                }
                                                ?>
                                                <div class="product_big_image hidden-xs"> <img src="<?php echo $bigg . $file1; ?>" id="laksyah_zoom" data-zoom-image="<?php echo $zoom . $file1; ?>" alt=""/>

                                                </div>
                                        <?php } else { ?>

                                                <div class="product_big_image"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $products->id ?>/big.<?= $products->main_image ?>" id="laksyah_zoom" data-zoom-image="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $products->id ?>/zoom.<?= $products->main_image ?>" alt=""/>
                                                </div>
                                        <?php } ?>


                                        <div class="clearfix"></div>

                                        <div class="visible-xs">
                                                <div class="gallery">
                                                        <?php if (file_exists($big) == false) { ?>
                                                                <div class = "item"> <img src = "<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $products->id ?>/big.<?= $products->main_image ?>" id = "laksyah_zoom" data-zoom-image = "<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/big.<?= $product->main_image ?>"></div>
                                                                <?php
                                                        } else {
                                                                $dir_contents = scandir($big);
                                                                $i = 0;
                                                                foreach ($dir_contents as $file) {
                                                                        $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                                        if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
                                                                                ?>
                                                                                <div class="item">
                                                                                        <div class="main">
                                                                                                <img src="<?php echo $bigg . $file; ?>"  >

                                                                                        </div>
                                                                                </div>
                                                                                <?php
                                                                        }
                                                                        ?>



                                                                        <?php
                                                                }
                                                                $i++;
                                                        }
                                                        ?>

                                                </div>

                                        </div>




                                </div>

                        </div>

                        <div class="col-xs-7 col-sm-12 col-md-7 for-mob">
                                <div class="soon">
                                        <img class="exp sd" src="<?= Yii::app()->baseUrl; ?>/images/soon.png">
                                        <h5><?php echo $products->product_name; ?></h5>
                                        <div class="detail">
                                                <div class="detail-1">
                                                        <span class="sans">Product Code</span>
                                                </div>

                                                <div class="detail-2">
                                                        <span class="sans">:</span>
                                                </div>
                                                <div class="detail-3">
                                                        <span class="sansz"><?php echo $products->product_code; ?></span>
                                                </div>

                                        </div>
                                        <div class="detail">
                                                <div class="detail-1">
                                                        <span class="sans">Deal Published</span>
                                                </div>

                                                <div class="detail-2">
                                                        <span class="sans">:</span>
                                                </div>
                                                <div class="detail-3">
                                                        <span class="sansz"><?php echo $time; ?></span>
                                                </div>

                                        </div>


                                        <div class="detail">
                                                <div class="detail-1">
                                                        <span class="sans">Price</span>
                                                </div>

                                                <div class="detail-2">
                                                        <span class="sans">:</span>
                                                </div>
                                                <div class="detail-3">
                                                        <span class="sans3"><?php echo Yii::app()->Discount->Discount($products); ?></span>
                                                </div>

                                        </div>

                                        <div class="clearfix"></div>
                                        <div class="wishlist">
                                                <ul>
                                                        <input type = "hidden" value = "<?= $products->canonical_name; ?>" id="cano_name_<?= $products->id; ?>" name="cano_name">
                                                        <li><a class="cart1 add_to_cart"  id="<?= $products->id; ?>">Add to cart</a></li>
                                                        <li><a class="cart2 add_to_wishlist" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/products/Wishlist/id/<?= $products->id; ?>">Add to wish list</a></li>
                                                </ul>
                                        </div>


                                        <div class="stars">
                                                <ul>
                                                        <li><i class="fa stars fa-star"></i></li>
                                                        <li><i class="fa stars fa-star"></i></li>
                                                        <li><i class="fa stars fa-star"></i></li>
                                                        <li><i class="fa stars fa-star-o"></i></li>
                                                        <li><i class="fa stars fa-star-o"></i></li>
                                                </ul>
                                        </div>

                                        <ul>
                                                <li><a href="#"><i class="fa dev fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa dev fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa dev fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa dev fa-linkedin"></i></a></li>
                                        </ul>


                                </div>
                        </div>
                </div>
</section>







<section class="description">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Product Description</h1>
                                <p><?php echo $products->description; ?></p>


                        </div>
                </div>


                <div class="row">
                        <div class="col-xs-12">
                                <h1>Technical Details</h1>
                        </div>
                        <?php foreach ($product_features as $product_feature) { ?>
                                <div class="col-xs-12 col-sm-6">
                                        <div class="ink">
                                                <div class="ins1"><?php echo $product_feature->feature_heading; ?></div>
                                                <div class="ins2"><?php echo $product_feature->feature_disc; ?></div>
                                        </div>
                                </div>
                        <?php } ?>


                </div>






        </div>
</section>



<section class="deals-products">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h4>reviews</h4>
                                <form class="form-inline" role="form">
                                        <div class="form-group">
                                                <input type="email" class="form-review" id="email" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                                <input type="email" class="form-review" id="pwd" placeholder="Email address">
                                        </div>
                                        <div class="form-group">
                                                <textarea class="form-comment" rows="5" id="comment" placeholder="Comment"></textarea>
                                        </div>
                                        <div class="form-group">
                                                <input class="reviews" type="submit" value="Submit">

                                        </div>

                                </form>
                        </div>
                </div>
        </div>
</section>










<section class="deals-products">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">

                                <h4>You may also like</h4>
                                <div class="moreproducts">

                                        <?php
                                        $i = 1;
                                        foreach ($you_may_also_like as $product) {
                                                ?>
                                                <div class="item lak">
                                                        <div class="main">
                                                                <div class="mob deals-effects">
                                                                        <div class="deals-effect">
                                                                                <?php if ($product->main_image != "") { ?>
                                                                                        <img class="zoom"  src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                                                                                        echo Yii::app()->Upload->folderName(0, 1000, $product->id)
                                                                                        ?>/<?php echo $product->id; ?>/main.<?php echo $product->hover_image; ?>" alt=""/>
                                                                                     <?php } ?>
                                                                                <div class="overlay"></div>
                                                                                <div class="buy">
                                                                                        <?php if ($product->product_type == 2) { ?>
                                                                                                <?php echo CHtml::link('Buy Now', array('products/Detail/', 'name' => $product->canonical_name), array('class' => 'buybtn')); ?>
                                                                                        <?php } else { ?>
                                                                                                <a class="buybtn" target="_blank" href="<?php echo $product->deal_link; ?>">Buy Now</a>
                                                                                        <?php } ?>
                                                                                </div>
                                                                        </div>
                                                                        <h2><?php echo $product->product_name; ?></h2>
                                                                        <div class="star">
                                                                                <ul>
                                                                                        <li><i class="fa stars fa-star"></i></li>
                                                                                        <li><i class="fa stars fa-star"></i></li>
                                                                                        <li><i class="fa stars fa-star"></i></li>
                                                                                        <li><i class="fa stars fa-star-o"></i></li>
                                                                                        <li><i class="fa stars fa-star-o"></i></li>
                                                                                </ul>
                                                                        </div>
                                                                        <div class="blocked">
                                                                                <div class="social">
                                                                                        <ul>
                                                                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                        </ul>
                                                                                </div>

                                                                                <div class="price">
                                                                                        <h3><?php echo $product->price; ?></h3>
                                                                                </div>
                                                                        </div>
                                                                </div>


                                                        </div>
                                                </div>

                                        <?php } ?>



                                </div>
                        </div>
                </div>
        </div>
</section>


<script>

        $(document).ready(function () {

                $('.gallery').slick({
                        slidesToShow: 1,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        slidesToScroll: 1,
                        pauseOnHover: true,
//            prevArrow: '<i id="prev_slide_3" class="fa fa-chevron-left"></i>',
//            nextArrow: '<i id="next_slide_3" class="fa fa-chevron-right"></i>',
                        responsive: [
                                {
                                        breakpoint: 1000,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 2
                                        }
                                },
                                {
                                        breakpoint: 800,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                },
                                {
                                        breakpoint: 480,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                }
                        ]
                });

        });

</script>
<script>
        $(document).ready(function () {
                $('.moreproducts').slick({
                        slidesToShow: 4,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        slidesToScroll: 1,
                        pauseOnHover: false,
                        responsive: [
                                {
                                        breakpoint: 1000,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                },
                                {
                                        breakpoint: 800,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 2
                                        }
                                },
                                {
                                        breakpoint: 480,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                }
                        ]
                });

        });

</script>


<script src="<?= Yii::app()->baseUrl; ?>/js/jquery.fancybox.pack.js"></script>

<script src="<?= Yii::app()->baseUrl; ?>/js/jquery.elevatezoom.js"></script>

<script>
        $("#laksyah_zoom").elevateZoom({gallery: 'gal1', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: true, responsive: true});

//pass the images to Fancybox
        $("#laksyah_zoom").bind("click", function (e) {
                var ez = $('#laksyah_zoom').data('elevateZoom');
                $.fancybox(ez.getGalleryList());
                return false;
        });


</script>


<script>

        $(".add_to_cart").click(function () {

                var id = $(this).attr('id');
                var canname = $("#cano_name_" + id).val();
                var qty = 1;
                var option_color = 0;
                var option_size = 0;
                var master_option = 0;
                addtocart(canname, qty, option_color = null, option_size = null, master_option = null);
        });
        function addtocart(canname, qty, option_color, option_size, master_option) {

                if (option_color === undefined) {
                        option_color = null;
                }
                if (option_size === undefined) {
                        option_size = null;
                }
                if (master_option === undefined) {
                        master_option = null;
                }
                $.ajax({
                        type: "POST",
                        url: baseurl + 'cart/Buynow',
                        data: {cano_name: canname, qty: qty, option_color: option_color, option_size: option_size, master_option: master_option}
                }).done(function (data) {
                        if (data == 9) {

                                $('.option_errors').html('<p>Invalid Product.Please try again</p>').show();
                        } else {

                                $('.option_errors').html("").hide();
//                                getcartcount();
//                                getcarttotal();
                                $(".cart_box").show();
                                $(".cart_box").html(data);
                                $("html, body").animate({scrollTop: 0}, "slow");
                                setInterval(function () {
                                        $(".cart_box").hide("slow");
                                }, 1000);
                        }
                        hideLoader();
                });
        }
</script>