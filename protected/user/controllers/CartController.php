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

}
