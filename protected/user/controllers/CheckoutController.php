<?php

class CheckoutController extends Controller {

        public function init() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

}
