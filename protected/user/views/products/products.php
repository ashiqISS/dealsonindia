<link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/bootstrap-slider.css">
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <img src="<?= Yii::app()->baseUrl ?>/images/c1.jpg">
            </div>
        </div>
    </div>
</section>



<section class="main-products">
    <div class="container">
        <div class="row">

            <?php echo $this->renderPartial('_left_menu',array('price'=>$price,'category'=>$category)); ?>


            <div class="clearfix visible-sm visible-xs"></div>


            <div class="col-md-9 deals-products">
                <div class="col-md-12 related">
                    <h6>
                        <?php
                        if (isset($category)) {
                            echo $category;
                        } else {
                            echo 'All Products';
                        }
                        ?>
                    </h6>
                    <div class="listed">
                        <form class="form-inline" role="form">
                            <label class="sortby">Sort By</label>
                            <div class="form-group">

                                <select class="chris-select animated fadeInUp" name="carlist" form="carform">
                                    <option value="volvo">Default</option>
                                    <option value="saab">Saab</option>
                                    <option value="opel">Opel</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
                if (empty($products)) {
                    echo '<div style="padding:2em;"> No products available </div>';
                } else {
                    echo $this->renderPartial('_product_list', array('products' => $products));
                }
                ?>
                <?php
                $this->widget('application.user.extensions.yiinfinite-scroll.YiinfiniteScroller', array(
                    'contentSelector' => '#products',
                    'itemSelector' => 'div.product',
                    'loadingText' => 'Loading...',
                    'donetext' => '<div class="clearfix"></div><button class="ripple">Loading Complete</button>',
                    'pages' => $pages,
                ));
                ?> 
            </div>

            <div class="clearfix"></div>
            <!--<button type="button" class="btn btn-primary loadmore">Load More</button>-->
        </div>
    </div>


</section>
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

<script src="<?= Yii::app()->baseUrl ?>/js/bootstrap-slider.js"></script>

<script>
    $( document ).ready(function() {
    $( "#asdfff" ).click(function() {
  
});
});
    $("#ex16b").slider({
        min: 1000,
        max: 15000,
        value: [1000, 15000],
        focus: true
    });

</script>



<script>
    $("#ex16bs").slider({
        min: 1000,
        max: 15000,
        value: [1000, 15000],
        focus: true,
         slide: function( event, ui ) {
      alert();
      }
    });
    

</script>
<script>
    $(document).ready(function () {
        var selectIds = $('#k1,#k2,#k3,#k4,#k5');
        $(function ($) {
            selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
                $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
            });
        });
    });
</script>

