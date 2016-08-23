<script src="<?= Yii::app()->baseUrl ?>/js/jquery.min.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/jquery.infinitescroll.min.js"></script>
<?php $jquery = Yii::app()->request->baseUrl . '/js/jquery-1.11.3.min.js'; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<script> //            this script is for solving error : "Cannot read property 'msie' of undefined"
        jQuery.browser = {};
        (function () {
                jQuery.browser.msie = false;
                jQuery.browser.version = 0;
                if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                        jQuery.browser.msie = true;
                        jQuery.browser.version = RegExp.$1;
                }
        })();
</script>
<style>
        .product {
                border-bottom: 1px solid #ccc;
                float: left;
                padding-bottom: 40px;
                padding-top: 40px;
        }
</style>
<div id="products">
        <div class="rows1 ">
                <?php
                $i = 1;
                foreach ($products as $product) {
                        ?>
                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects product">
                                <div class="deals-effect">
                                        <?php if ($product->main_image != "") { ?>
                                                <img class="zoom"  src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                                                echo Yii::app()->Upload->folderName(0, 1000, $product->id)
                                                ?>/<?php echo $product->id; ?>/main.<?php echo $product->main_image; ?>" alt=""/>
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
                                                <h3><?php echo Yii::app()->Discount->Discount($product); ?></h3>
                                        </div>
                                </div>
                        </div>

                        <!--<div class="visible-sm visible-xs clearfix"></div>-->

                        <!--<div class="visible-sm visible-xs clearfix"></div>-->
                        <?php if (($i % 4) == 0) { ?>
                        </div>
                        <div class="rows1">
                        <?php } ?>
                        <?php
                        $i++;
                }
                ?>
        </div>
</div>