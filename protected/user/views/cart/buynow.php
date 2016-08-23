<style>
        span.colors1 {
                color: #996600;
                font-size: 15px;
                /* font-weight: bold; */
        }
</style>
<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Shopping Cart</h1>

                        </div>
                </div>
        </div>
</section>

<section class="shoppingcart">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-9">

                                <?php foreach ($carts as $cart) { ?>
                                        <?php $product = Products::model()->findByPk($cart->product_id); ?>
                                        <div class="purchase">
                                                <div class="pur-1">
                                                        <?php if ($product->main_image != "") { ?>
                                                                <img  style="width: 100px; height: 100px;" class="cartss img-responsive"  src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                                                                echo Yii::app()->Upload->folderName(0, 1000, $product->id)
                                                                ?>/<?php echo $product->id; ?>/small.<?php echo $product->main_image; ?>" alt=""/>
                                                              <?php } ?>

                                                </div>
                                                <div class="pur-2">
                                                        <h3><?php echo $product->product_name; ?> </h3>

                                                        <div class="part1">
                                                                <h2>Product Code   :  <?php echo $product->product_code; ?></h2>
                                                        </div>
                                                        <div class="part2">
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>
                                                        </div>

                                                        <div class="clearfix"></div>
                                                        <div class="part1">
                                                                <ul>
                                                                        <li>Quantity</li>
                                                                        <li>
                                                                                <div class="form-group">
                                                                                        <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/updatecart" method="post" id="qty_<?php echo $cart->id; ?>">
                                                                                                <input type="hidden" value="<?php echo $cart->id; ?>" name="cart_id" />
                                                                                                <select class="form-cart " id="<?php echo $cart->id; ?>" name="car_quantity" >
                                                                                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                                                                                                <option <?php
                                                                                                                if ($i == $cart->quantity) {
                                                                                                                        echo 'selected';
                                                                                                                }
                                                                                                                ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                                                                <?php }
                                                                                                                ?>

                                                                                                </select>
                                                                                        </form>

                                                                                </div>
                                                                        </li>
                                                                </ul>
                                                        </div>
                                                        <div class="part3">
                                                                <ul>
                                                                        <li>Unit Price</li>
                                                                        <li><?php echo Yii::app()->Discount->Discount($product); ?></li>
                                                                </ul>
                                                        </div>
                                                </div>
                                                <div class="pur-3">
                                                        <h4><?php echo Yii::app()->Discount->DiscountCart($product, $cart->quantity); ?></h4>
                                                </div>


                                        </div>


                                        <div class="clearfix"></div>
                                <?php } ?>

                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-3">
                                <table id="t03">
                                        <tbody>
                                                <tr>
                                                        <td>Total ( 5items )<span class="subs">Sub-Total</span></td>
                                                        <td><span class="colors1"><?php echo Yii::app()->Currency->convert($subtotal); ?></span></td>
                                                </tr>
                                                <tr>
                                                        <td>Shipping Charge</td>
                                                        <td><span class="colors1"><i class="fa rupee fa-rupee"></i>1,125. 00</span></td>
                                                </tr>
                                                <?php if ($coupon_amount > 0) { ?>
                                                        <tr>
                                                                <td>Coupon Code (<span style="font-size: 9px;"><?php echo $coupen_details->code; ?></span>)</td>$coupon
                                                                <td><span class="colors1"><?php echo Yii::app()->Currency->convert($coupon_amount); ?></span></td>
                                                        </tr>
                                                <?php } ?>
                                                <tr>
                                                        <td>Total</td>
                                                        <td><span class="colors"><?php echo Yii::app()->Currency->convert($subtotal); ?></span></td>
                                                </tr>
                                        </tbody>
                                </table>
                                <div class="clearfix"></div>

                                <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#p1">
                                                        <div class="panel-heading headz">

                                                                <span class="panel-title">
                                                                        <i class="glyphicon gly glyphicon-minus"></i>  Coupon Code
                                                                </span>


                                                        </div>
                                                </a>
                                                <div id="p1" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                                <form class="form-inline" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/updatecoupon" method="post" >
                                                                        <div class="form-group">

                                                                                <input type="test" class="form-control" name="coupon_code"  placeholder="Enter your coupon here">
                                                                        </div>

                                                                        <button type="submit" class="btn btn-default go">Go</button>
                                                                </form>
                                                        </div>
                                                </div>
                                        </div>


                                        <div class="panel panel-default">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#p2"> <div class="panel-heading headz">

                                                                <span class="panel-title">
                                                                        <i class="glyphicon gly glyphicon-plus"></i>  Estimate Shipping & Taxes
                                                                </span>


                                                        </div>
                                                </a>
                                                <div id="p2" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                                <form role="form">
                                                                        <div class="form-group">

                                                                                <input type="email" class="form-control" id="email" placeholder="Country">
                                                                        </div>
                                                                        <div class="form-group">

                                                                                <input type="password" class="form-control" id="pwd" placeholder="region/space">
                                                                        </div>
                                                                        <div class="form-group">

                                                                                <input type="password" class="form-control" id="pwd" placeholder="post code">
                                                                        </div>
                                                                </form>
                                                                <input type="submit" value="Get Quotes">
                                                        </div>
                                                </div>


                                        </div>



                                </div>
                                <div class="clearfix"></div>
                                <button type="submit" class="btn new-btn1 btn-default"> Proceed to Checkout</button>
                                <button type="submit" class="btn new-btn2 btn-default"> Continue Shopping</button>
                        </div>



                </div>
        </div>
</section>
<?php if (Yii::app()->user->hasFlash('success')): ?>
        <script>
                $(document).ready(function () {
                        $('#modal_success').modal('show');
                });
        </script>
        <div class="modal fade" id="modal_success" role="dialog" style="display:none">
                <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><img class="tick" src="<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">Success</h4>
                                </div>
                                <div class="modal-body">
                                        <p><?php echo Yii::app()->user->getFlash('success'); ?></p>
                                </div>

                        </div>

                </div>
        </div>

<?php endif; ?>
<?php if (Yii::app()->user->hasFlash('error')): ?>
        <script>
                $(document).ready(function () {
                        $('#modal_error').modal('show');
                });</script>
        <div class="modal fade" id="modal_error" role="dialog" style="display:none">
                <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><img class="tick" src="<?php echo Yii::app()->request->baseUrl; ?>/images/wrong.png">Bad Luck</h4>
                                </div>
                                <div class="modal-body">
                                        <p><?php echo Yii::app()->user->getFlash('error'); ?></p>
                                </div>

                        </div>

                </div>
        </div>
        <div class="info">

        </div>
<?php endif; ?>
<script>
        $(document).ready(function () {

                $(".form-cart").change(function () {

                        var id = $(this).attr("id");
                        $("#qty_" + id).submit();
                });
        });
        $(document).ready(function () {
                var selectIds = $('#p1,#p2,#p3,#p4,#p5');
                $(function ($) {
                        selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
                                $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                        });
                });
        });
</script>