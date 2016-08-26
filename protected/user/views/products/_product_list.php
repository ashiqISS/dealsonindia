<div id="products">
    <div class="rows ">
        <?php
        foreach ($products as $product) {
            ?>
            <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects product">
                <?php
                echo $this->renderPartial('//products/_product_details', array('product' => $product));
                ?>
            </div>

            <!--<div class="visible-sm visible-xs clearfix"></div>-->

            <!--<div class="visible-sm visible-xs clearfix"></div>-->

            <?php
        }
        ?>
    </div>
</div>

