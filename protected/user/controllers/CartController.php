<?php

class CartController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionIndex() {
                $this->render('index');
        }

        public function actionRemovecart() {

        }

        public function actionBuynow() {


                $canonical_name = $_REQUEST['cano_name'];
                $qty = $_REQUEST['qty'];

                $option_size = $_REQUEST['option_size'];
                $option_color = $_REQUEST['option_color'];
                $master_option_id = $_REQUEST['master_option'];
                $id = Products::model()->findByAttributes(array('canonical_name' => $canonical_name))->id;

//                $check_option = MasterOptions::model()->findByAttributes(['product_id' => $id]);
//                if (!empty($check_option)) {
//                        $product_option_id = OptionDetails::model()->findByAttributes(['master_option_id' => $master_option_id, 'size_id' => $option_size, 'color_id' => $option_color, 'product_id' => $id]);
//                        if (!empty($product_option_id)) {
//                                $product_option = $product_option_id->id;
//                        } else {
//                                echo '9';
//                                exit;
//                        }
//                } else {
//                        $product_option = 0;
//                }


                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                        $user_id = Yii::app()->session['user']['id'];
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::app()->session['user']['id']));
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
                        $sessonid = Yii::app()->session['temp_user'];
                }
                if (isset($user_id)) {
                        $condition = "user_id= $user_id";
                } else if (isset($sessonid)) {
                        $condition = "session_id= $sessonid";
                }

//                if ($product_option_id->id != 0) {
//                        $cart = Cart::model()->findByAttributes(array(), array('condition' => ($condition . ' and options =' . $product_option_id->id . ' and product_id=' . $id)));
//                } else {
//                        $cart = Cart::model()->findByAttributes(array(), array('condition' => ($condition . ' and product_id=' . $id)));
//                }
                $cart = Cart::model()->findByAttributes(array(), array('condition' => ($condition . ' and product_id=' . $id)));

                if (!empty($cart)) {
                        $cart->quantity = $cart->quantity + $qty;
                        $cart->save();
                        $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));

                        if (!empty($cart_contents)) {
                                echo ' <div class="drop_cart">';
                                foreach ($cart_contents as $cart_content) {
                                        // $options = OptionDetails::model()->findbypk($cart_content->options);
                                        //   $option_color = OptionCategory::model()->findByPk($options->color_id);
                                        //  $option_size = OptionCategory::model()->findByPk($options->color_id);
                                        $prod_details = Products::model()->findByPk($cart_content->product_id);
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);

                                        $total = $cart_content->quantity * Yii::app()->Discount->DiscountAmount($prod_details);

                                        $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));

                                        $subtotoal = $subtotoal + $total;
                                }
                                $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                echo ' </div>';
                        } else {
                                echo 'Cart box is Empty';
                        }
                } else {

                        $model = new cart;
                        $model->user_id = $user_id;
                        $model->session_id = $sessonid;
                        $model->product_id = $id;
                        $model->quantity = $qty;
//                        $model->options = $product_option;
                        $model->date = date('Y-m-d H:i:s');
                        if ($model->save()) {

                                $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));

                                if (!empty($cart_contents)) {

                                        echo ' <div class="drop_cart">';
                                        foreach ($cart_contents as $cart_content) {
                                                $prod_details = Products::model()->findByPk($cart_content->product_id);

                                                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                                $total = $cart_content->quantity * Yii::app()->Discount->DiscountAmount($prod_details);

                                                $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));

                                                $subtotoal = $subtotoal + $total;
                                        }
                                        var_dump($subtotoal);
                                        exit;
                                        $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                        echo ' </div>';
                                } else {
                                        echo 'Cart box is Empty';
                                }
                        }
                        echo $id;
                        exit;
                }
        }

        public function actionSelectcart() {

                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $user_id = Yii::app()->session['user']['id'];
                        $cart_contents = Cart::model()->findAllByAttributes(array('user_id' => $user_id));
                        if (!empty($cart_contents)) {
                                echo ' <div class="drop_cart">';
                                foreach ($cart_contents as $cart_content) {
                                        $prod_details = Products::model()->findByPk($cart_content->product_id);
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                        $total = $cart_content->quantity * Yii::app()->Discount->DiscountAmount($prod_details);
                                        $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));
                                        $subtotoal = $subtotoal + $total;
                                }
                                $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                echo '</div>';
                        } else {
                                echo 'Cart box is Empty';
                        }
                } else {
                        if (isset(Yii::app()->session['temp_user'])) {

                                $session_id = Yii::app()->session['temp_user'];
                                $cart_contents = Cart::model()->findAllByAttributes(array('session_id' => $session_id));
                                if (!empty($cart_contents)) {
                                        echo ' <div class="drop_cart">';
                                        foreach ($cart_contents as $cart_content) {
                                                $prod_details = Products::model()->findByPk($cart_content->product_id);
                                                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                                $total = $cart_content->quantity * Yii::app()->Discount->DiscountAmount($prod_details);
                                                $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));
                                                $subtotoal = $subtotoal + $total;
                                        }
                                        $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                        echo '</div>';
                                } else {
                                        echo 'Cart box is Empty';
                                }
                        } else {
                                echo 'Cart box is Empty';
                        }
                }
        }

        public function subtotal() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $cart = cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                } else if (isset(Yii::app()->session['temp_user'])) {
                        $cart = cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                }
                foreach ($cart as $car) {
                        $product_value = Products::model()->findByPk($car->product_id)->price;
                        $subtotal = $subtotal + ($car->quantity * $product_value);
                }
                return $subtotal;
        }

        public function granttotal() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $cart = cart::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                } else if (isset(Yii::app()->session['temp_user'])) {
                        $cart = cart::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                }
                foreach ($cart as $car) {
                        $product_value = Products::model()->findByPk($car->product_id)->price;
                        $subtotal = $subtotal + ($car->quantity * $product_value);
                }
                return Yii::app()->Currency->convert($subtotal);
        }

}
