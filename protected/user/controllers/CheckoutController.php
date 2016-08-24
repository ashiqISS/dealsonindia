<?php

class CheckoutController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionCheckOut() {
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $this->redirect(array('Checkout/Register'));
                } else {
                        $checkout_exist = Checkout::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        if (!empty($checkout_exist)) {
                                $checkout_id = $checkout_exist->id;
                        } else {
                                $model = new Checkout;
                                $model->session_id = Yii::app()->session['temp_user'];
                                if ($model->save()) {
                                        $checkout_id = $model->id;
                                }
                        }
                }
                $this->render('checkout', array('checkout_id' => $checkout_id));
        }

        public function actionRegister() {
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $model = new Users;
                        $billing = new UserAddress;
                        $this->render('register', array('model' => $model, 'billing' => $billing));
                } else {
                        $checkout_exist = Checkout::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        if (!empty($checkout_exist)) {
                                $checkout_id = $checkout_exist->id;
                        } else {
                                $model = new Checkout;
                                $model->session_id = Yii::app()->session['temp_user'];
                                if ($model->save()) {
                                        $checkout_id = $model->id;
                                }
                        }
                }
                $this->render('checkout', array('checkout_id' => $checkout_id));
        }

}
