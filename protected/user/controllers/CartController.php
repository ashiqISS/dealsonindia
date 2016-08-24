<?php

class CartController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionIndex() {
                $this->render('index');
        }

        public function actionUpdateCart() {
                $car_quantity = $_POST['car_quantity'];
                $cart_id = $_POST['cart_id'];
                $model = Cart::model()->findByPk($cart_id);
                $model->quantity = $car_quantity;
                if ($model->save()) {
                        $this->redirect(array('cart/MyCart'));
                }
        }

        public function actionUpdateCoupon() {
                $coupon_code = $_POST['coupon_code'];
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                        $user_id = Yii::app()->session['user']['id'];
                        $condition = "user_id = " . $user_id;
                } else {
                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }

                $coupon_validation = Coupons::model()->find(array('condition' => "code = '" . $coupon_code . "'"));
                if (!empty($coupon_validation)) {

                        $is_coupon_exist = CouponHistory::model()->findByAttributes(array('coupon_id' => $coupon_validation->id), array('condition' => $condition));

                        if (empty($is_coupon_exist)) {
                                $new_coupen_value = new CouponHistory;
                                $new_coupen_value->coupon_id = $coupon_validation->id;
                                $new_coupen_value->total_amount = $coupon_validation->discount;
                                $new_coupen_value->status = 1;
                                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                                        $new_coupen_value->user_id = $user_id;
                                } else {
                                        $new_coupen_value->session_id = $user_id;
                                }
                                if ($new_coupen_value->save()) {
                                        Yii::app()->user->setFlash('success', "Successfully Added Your Coupen Code");
                                        $this->redirect(array('cart/MyCart'));
                                }
                        } else {
                                Yii::app()->user->setFlash('error', "The Entered Coupen You Already Used");
                                $this->redirect(array('cart/MyCart'));
                        }
                } else {


                        Yii::app()->user->setFlash('error', "The Entered Coupen Is Invalid");
                        $this->redirect(array('cart/MyCart'));
                }
        }

        public function actionRemovecart() {
                $canonical_name = $_REQUEST['cano_name'];
                $cartid = $_REQUEST['cartid'];
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                        $user_id = Yii::app()->session['user']['id'];
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::app()->session['user']['id']));
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                                Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
                                $sessonid = Yii::app()->session['temp_user'];
                        }
                }
                if (isset($user_id)) {

                        $condition = "user_id = $user_id";
                } else if (isset($sessonid)) {

                        $condition = "session_id = $sessonid";
                }

                $model = Cart::model()->findByPk($cartid);

                if ($model->delete()) {
                        $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));
                        if (!empty($cart_contents)) {
                                $subtotoal = 0;
                                echo '<div class="drop_cart">';
                                foreach ($cart_contents as $cart_content) {
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
                }
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
                        $condition = "user_id = $user_id";
                } else if (isset($sessonid)) {
                        $condition = "session_id = $sessonid";
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
                        date_default_timezone_set('Asia/Kolkata');
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
                                        $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                        echo ' </div>';
                                } else {
                                        echo 'Cart box is Empty';
                                }
                        }
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
                        $cart_items = cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $user_id = Yii::app()->session['user']['id'];
                        $condition = "user_id = " . $user_id;
                } else if (isset(Yii::app()->session['temp_user'])) {
                        $cart_items = cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }
                $coupon = CouponHistory::model()->find(array('condition' => $condition));
                if (!empty($coupon)) {
                        $coupen_details = Coupons::model()->findByPk($coupon->coupon_id);
                        $coupon_amount = Coupons::model()->findByPk($coupon->coupon_id)->discount;
                } else {
                        $coupen_details = NULL;
                        $coupon_amount = 0;
                }


                foreach ($cart_items as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        $price = Yii::app()->Discount->DiscountAmount($product);
                        $subtotal += ($price * $cart_item->quantity);
                }
                return $subtotal + $coupon_amount;
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

        public function actionMycart() {

                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $model1 = new UserDetails();
                        $model = new UserDetails();
//$current_coupon = explodeYii::app()->session['couponid'];
                        $coupen_details = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $user_id = Yii::app()->session['user']['id'];
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::app()->session['user']['id']));
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
//  $coupen_details = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
                        $sessonid = Yii::app()->session['temp_user'];
                }
                /*
                 * Login for checkout
                 */
                if (isset($_REQUEST['UserDetails']['log'])) {

                        $modell = UserDetails::model()->findByAttributes(array('email' => $_REQUEST['UserDetails']['log']['email'], 'password' => $_REQUEST['UserDetails']['log']['password']));

                        if (!empty($modell)) {

                                if ($modell->status == 0) {
                                        Yii::app()->user->setFlash('passworderror1', "Access Denied.Contact Laksyah");
                                } else if ($modell->email_verification == 0) {

                                        Yii::app()->user->setFlash('emailverify', "One Time Password (OTP) has been sent to your email <b>" . $modell->email . "</b>, please enter the same here to access your account.");

                                        Yii::app()->user->setFlash('verify_code', $modell->id);
                                        Yii::app()->session['user_email_verify'] = $modell->id;
                                        $this->VerificationMail($modell);
                                } else if ($modell->email_verification == 1 && $modell->status == 1) {
                                        Yii::app()->user->setFlash('emailverify', null);
                                        Yii::app()->user->setFlash('email_verification1', null);
                                        Yii::app()->session['user'] = $modell;
                                        if (isset(Yii::app()->session['temp_user'])) {
                                                if ($this->Checkoutlogin($modell) == 1) {

                                                        $this->redirect(array('cart/proceed'));
                                                }
                                        }
                                }
                        } else {
                                $model1->addError('confirm', 'invalid username or password');
//                                Yii::app()->user->setFlash('passworderror', "invalid username or password");
                                Yii::app()->user->setFlash('passworderror1', "invalid username or password");
//                                $this->redirect(array('Cart/MyCart'));
                        }
                }


                /*
                 * Refister for checkout
                 */
                if (isset($_POST['UserDetails']['reg'])) {

                        $model = new UserDetails('create');
                        $model->attributes = $_POST['UserDetails']['reg'];
                        $date1 = $_POST['UserDetails']['reg']['dob'];
                        $newDate = date("Y-m-d", strtotime($date1));
                        $model->dob = $newDate;
                        $model->gender = $_POST['UserDetails']['reg']['gender'];
                        $model->phone_no_1 = $_POST['UserDetails']['reg']['phone_no_1'];
                        $model->phone_no_2 = $_POST['UserDetails']['reg']['phone_no_2'];
                        $model->email_verification = 0;
                        if ($model->validate()) {
                                $model->status = 1;
                                $model->CB = 1;
                                $model->UB = 1;
                                $model->DOC = date('Y-m-d');
                                $model->verify_code = rand(1000, 9999);

                                if ($model->password == $model->confirm) {
                                        if ($model->save()) {
                                                if ($model->email_verification == 0) {

                                                        Yii::app()->user->setFlash('emailverify', "One Time Password (OTP) has been sent to your email <b>" . $modell->email . "</b>, please enter the same here to access your account.");

                                                        Yii::app()->user->setFlash('verify_code', $model->id);
                                                        Yii::app()->session['user_email_verify'] = $model->id;
                                                        Yii::app()->session['reg_mail'] = 1;

                                                        $this->VerificationMail($model);
                                                } else if ($model->email_verification == 1 && $model->status == 1) {
                                                        Yii::app()->user->setFlash('emailverify', null);
                                                        Yii::app()->user->setFlash('email_verification1', null);
                                                        Yii::app()->session['user'] = $model;
                                                        if (isset(Yii::app()->session['temp_user'])) {
                                                                if ($this->Checkoutlogin($model) == 1) {

                                                                        $this->redirect(array('cart/proceed'));
                                                                }
                                                        }
                                                }
                                        }
                                }
                        } else {
                                $model->addError(confirm, 'password mismatch');
                                Yii::app()->user->setFlash('passwordmissmatch', "password mismatch");
//                                $this->redirect(array('Cart/MyCart'));
                        }
                }

                /*  otp verification */

                if (isset($_POST['verify_email'])) {

                        $unverified_user = UserDetails::model()->findByPk(Yii::app()->session['user_email_verify']);

                        if ($unverified_user->verify_code == $_POST['verify_code']) {
                                $unverified_user->email_verification = 1;
                                $unverified_user->status = 1;
                                $unverified_user->save(FALSE);
                                if (Yii::app()->session['reg_mail'] == 1) {
                                        $this->RegisterMail($unverified_user);
                                }
                                if ($this->Checkoutlogin($unverified_user) == 1) {
                                        Yii::app()->session['user'] = $unverified_user;
                                        unset(Yii::app()->session['user_email_verify']);
                                        $this->redirect(array('proceed'));
                                }
                        } else {
                                Yii::app()->user->setFlash('email_verification1', "Invalid OTP.Try Again..");
                        }
                }
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $user_details = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $id = $user_details->id;
                        $cart_items = Cart::model()->findAllByAttributes(array('user_id' => $id));
                        $user_id = Yii::app()->session['user']['id'];
                        $condition = "user_id = " . $user_id;
                } else {
                        $temp_id = Yii::app()->session['temp_user'];
                        $cart_items = Cart::model()->findAllByAttributes(array('session_id' => $temp_id));
                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }

                $coupon = CouponHistory::model()->find(array('condition' => $condition));
                if (!empty($coupon)) {
                        $coupen_details = Coupons::model()->findByPk($coupon->coupon_id);
                        $coupon_amount = Coupons::model()->findByPk($coupon->coupon_id)->discount;
                } else {
                        $coupen_details = NULL;
                        $coupon_amount = 0;
                }
                $subtotal = $this->subtotal();

                if (!empty($cart_items)) {
// $this->render('new_buynow');
                        $this->render('buynow', array('carts' => $cart_items, 'regform' => $model, 'loginform' => $model1, 'gift_user' => $gift_user, 'gift_options' => $gift_options, 'coupen_details' => $coupen_details, 'subtotal' => $subtotal, 'coupon_amount' => $coupon_amount));
                } else {
                        $coupon_ids = explode(',', Yii::app()->session['couponid']);
                        foreach ($coupon_ids as $coupon_id) {
// CouponHistory::model()->deleteAllByAttributes(array('coupon_id' => $coupon_id));
                        }
                        unset(Yii::app()->session['couponid']);
                        unset(Yii::app()->session['couponamount']);
                        $this->render('empty_cart', array());
                }
        }

        public function actionProceed() {

                if (Yii::app()->session['user']['id'] != '' && Yii::app()->session['user']['id'] != NULL) {

                        if (Yii::app()->session['orderid'] == '') {



                                $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                if (!empty($cart)) {
                                        $order_id = $this->addOrder($cart);
//                                $select_coupon = Yii::app()->session['coupen_id'];
//                                $this->addcoupens();
                                        Yii::app()->session['orderid'] = $order_id;
                                        $this->orderProducts($order_id, $cart);
                                        $this->updatecoupenhistory($order_id);
                                        $this->redirect(array('CheckOut/CheckOut'));
                                } else {
                                        $this->redirect(array('Cart/Mycart'));
                                }
                        } else {

                                $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));

                                if (!empty($cart)) {

                                        $order_id1 = $this->addOrder1($cart);

//                                $select_coupon = Yii::app()->session['coupen_id'];
//                                $this->addcoupens();
                                        $order_id = Yii::app()->session['orderid'];
                                        $this->updatecoupenhistory($order_id1);
                                        $this->orderProducts($order_id, $cart);
                                        $this->redirect(array('CheckOut/CheckOut'));
                                } else {
                                        $this->redirect(array('Cart/Mycart'));
                                }
                        }
                } else if (Yii::app()->session['temp_user']) {

                        if (Yii::app()->session['orderid'] == '') {



                                $cart = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                                if (!empty($cart)) {
                                        $order_id = $this->addOrder($cart);
//                                $select_coupon = Yii::app()->session['coupen_id'];
//                                $this->addcoupens();
                                        Yii::app()->session['orderid'] = $order_id;
                                        $this->orderProducts($order_id, $cart);
                                        $this->updatecoupenhistory($order_id);
                                        $this->redirect(array('CheckOut/CheckOut'));
                                } else {
                                        $this->redirect(array('Cart/Mycart'));
                                }
                        } else {

                                $cart = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));

                                if (!empty($cart)) {

                                        $order_id1 = $this->addOrder1($cart);

//                                $select_coupon = Yii::app()->session['coupen_id'];
//                                $this->addcoupens();
                                        $order_id = Yii::app()->session['orderid'];
                                        $this->updatecoupenhistory($order_id1);
                                        $this->orderProducts($order_id, $cart);
                                        $this->redirect(array('CheckOut/CheckOut'));
                                } else {
                                        $this->redirect(array('Cart/Mycart'));
                                }
                        }


                        //  $this->redirect(array('site/login'));
                }
        }

        public function actionGetorderproduct() {

                $order_id = $_POST['order_id'];
                $option = $_POST['option'];
                $product_id = $_POST['product_id'];
                echo $product_id;
                $order_product_id = OrderProducts::model()->findByAttributes(array('order_id' => $order_id, 'product_id' => $product_id, 'option_id' => $option));
                echo $order_product_id->id;
        }

        public function addOrder($cart) {
                $model = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['user']['id']));
                $coupen = Coupons::model()->findByPk($model->coupon_id);
                $model1 = new Order;
                if (Yii::app()->session['user']['id'] != '' && Yii::app()->session['user']['id'] != NULL) {
                        $model1->user_id = Yii::app()->session['user']['id'];
                }
                $model1->session_id = Yii::app()->session['temp_user'];
                $total_amt = $this->total($cart);
                $model1->total_amount = $total_amt;
                $model1->status = 0;
                $model1->coupon_id = $model->coupon_id;
                $model1->discount_rate = $model->total_amount;
                date_default_timezone_set('Asia/Kolkata');
                $model1->order_date = date('Y-m-d H:i:s');
                $model1->DOC = date('Y-m-d');

                if ($model1->save()) {
                        return $model1->id;
                }
        }

        public function addOrder1($cart) {

                $model = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                $coupen = Coupons::model()->findByPk($model->coupon_id);

                $model1 = Order::model()->findByPk(Yii::app()->session['orderid']);
                if (!empty($model1)) {
                        $model1->user_id = Yii::app()->session['user']['id'];
                        $total_amt = $this->total($cart);
                        $model1->total_amount = $total_amt;
                        $model1->coupon_id = $model->coupon_id;
                        $model1->discount_rate = $model->total_amount;
                        $model1->status = 0;
                        $model1->coupon_id = $coupen->id;
                        $model1->discount_rate = $coupen->discount;
                        date_default_timezone_set('Asia/Kolkata');
                        $model1->order_date = date('Y-m-d H:i:s');
                        $model1->DOC = date('Y-m-d');

                        if ($model1->save()) {
                                return $model1->id;
                        }
                } else {
                        $this->redirect(array('Cart/Mycart'));
                }
        }

        public function orderProducts($orderid, $carts) {
                foreach ($carts as $cart) {
                        $prod_details = Products::model()->findByPk($cart->product_id);
                        $check = OrderProducts::model()->findAllByAttributes(array('order_id' => $orderid, 'product_id' => $cart->product_id, 'option_id' => $cart->options));

                        if (!empty($check)) {

                        } else {
                                $model_prod = new OrderProducts;
                                $model_prod->order_id = $orderid;
                                $model_prod->product_id = $cart->product_id;
                                $model_prod->option_id = $cart->options;
                                $model_prod->quantity = $cart->quantity;
                                $model_prod->gift_option = $cart->gift_option;
                                $model_prod->rate = $cart->rate;
                                $price = Yii::app()->Discount->DiscountAmount($prod_details) * $cart->quantity;
                                $model_prod->amount = ($cart->quantity) * ($price);
                                if ($model_prod->save()) {

                                }
                        }
                }
        }

        public function actionGetcarttotal() {

                if (isset(Yii::app()->session['user']['id'])) {
                        $cart_items = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        if (!empty($cart_items)) {
                                foreach ($cart_items as $cart_item) {
                                        $product = Products::model()->findByPk($cart_item->product_id);
                                        $ptotal = Yii::app()->Discount->DiscountAmount($product) * $cart_item->quantity;
//$subtotoal = $subtotoal + $total;
                                        $carttotal += $ptotal;
                                }
                                echo Yii::app()->Currency->convert($carttotal);
                        } else {
                                echo Yii::app()->Currency->convert(0);
                        }
                } else {
                        if (isset(Yii::app()->session['temp_user'])) {
                                $cart_items = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));

                                if (!empty($cart_items)) {
                                        foreach ($cart_items as $cart_item) {
                                                $product = Products::model()->findByPk($cart_item->product_id);
                                                $ptotal = Yii::app()->Discount->DiscountAmount($product) * $cart_item->quantity;
                                                $carttotal += $ptotal;
                                        }
                                        echo Yii::app()->Currency->convert($carttotal);
                                } else {
                                        echo Yii::app()->Currency->convert(0);
                                }
                        } else {
                                echo Yii::app()->Currency->convert(0);
                        }
                }
        }

        public function total($cart) {
                foreach ($cart as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        $price = Yii::app()->Discount->DiscountAmount($product);
                        $subtotal += ($price * $cart_item->quantity);
                }
                return $subtotal;
        }

        public function updatecoupenhistory($order_id) {
                $model = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                if (!empty($model)) {
                        $model->order_id = $order_id;
                        $model->save();
                }
        }

        public function actionDelete($id) {
                $model = $this->loadModel($id);
                $model->delete();
                if (!isset($_GET['ajax'])) {
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('Mycart'));
                }
        }

        public function actionRemoveCoupon() {
                if (isset(Yii::app()->session['couponid'])) {
                        if (isset(Yii::app()->session['user']))
                                $data = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user'], 'coupon_id' => Yii::app()->session['couponid']));
                        elseif (isset(Yii::app()->session['temp_user']))
                                $data = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user'], 'coupon_id' => Yii::app()->session['couponid']));
                        if ($data->delete())
                                unset(Yii::app()->session['couponid']);
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName;
        }

}
