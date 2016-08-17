<?php

class SiteController extends Controller {

        /**
         * Declares class-based actions.
         */
        public function actions() {
                return array(
                    // captcha action renders the CAPTCHA image displayed on the contact page
                    'captcha' => array(
                        'class' => 'CCaptchaAction',
                        'backColor' => 0xFFFFFF,
                    ),
                    // page action renders "static" pages stored under 'protected/views/site/pages'
                    // They can be accessed via: index.php?r=site/page&view=FileName
                    'page' => array(
                        'class' => 'CViewAction',
                    ),
                );
        }

        /**
         * This is the default 'index' action that is invoked
         * when an action is not explicitly requested by users.
         */
        public function actionIndex() {
//                $this->layout = 'test';
//        $this->render('index');
                $this->layout = '//layouts/main';
                $this->render('index');
        }

        public function actionHome() {
//                $this->layout = 'main';
//                $this->render('home');
        }

        public function actionLogin() {
                $model = new LoginForm;

//                // uncomment the following code to enable ajax-based validation
//
//                if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
//                        echo CActiveForm::validate($model);
//                        Yii::app()->end();
//                }
//
//                if (isset($_POST['LoginForm'])) {
//                        $model->attributes = $_POST['LoginForm'];
//                        if ($model->validate()) {
//                                // form inputs are valid, do something here
//                                $this->redirect(array('index'));
//                        }
//                }
                $this->render('login', array('model' => $model));
        }

        public function actionLogout() {
                Yii::app()->user->logout();
                $this->redirect(Yii::app()->homeUrl);
        }

        public function actionRegister() {
                $model = new Users;
//                $model = new BuyerDetails('create');
//                if (isset($_POST['BuyerDetails'])) {
//                        $model->attributes = $_POST['BuyerDetails'];
//                        $date1 = $_POST['BuyerDetails']['dob'];
//                        $newDate = date("Y-m-d", strtotime($date1));
//                        $model->dob = $newDate;
//                        $model->gender = $_POST['BuyerDetails']['gender'];
//                        $model->phone_no_1 = $_POST['BuyerDetails']['phone_no_1'];
//                        $model->phone_no_2 = $_POST['BuyerDetails']['phone_no_2'];
//                        if ($model->validate()) {
//                                $model->status = 1;
//                                $model->CB = 1;
//                                $model->UB = 1;
//                                $model->DOC = date('Y-m-d');
//                        }
//                        if ($model->password == $model->confirm) {
//                                if ($model->save()) {
////Yii::app()->user->setFlash('success', "Dear, $model->first_name, your message has been sent successfully");
//                                        Yii::app()->session['user'] = $model;
//                                        $this->redirect('index');
//                                } else {
//// Yii::app()->user->setFlash('error', "Sorry! Message seniding Failed..");
//                                }
//                        } else {
//                                $model->addError(confirm, 'password mismatch');
//                        }
//                }
                $this->render('register', array('model' => $model));
        }

        public function actionCategoryCat() {

                if (Yii::app()->request->isAjaxRequest) {

                        $criteria = new CDbCriteria();
                        $criteria->addSearchCondition('category_name', $_REQUEST['tag'], 'AND');

                        //$criteria->compare('category_id',$_REQUEST['category'],true,'AND');
                        if ($_REQUEST['taged'] != '') {

                                $arrs = explode(',', $_REQUEST['taged']);
                                $criteria->addNotInCondition('category_name', $arrs, 'AND');
                        }
                        $tags = ProductCategory::model()->findAll($criteria);
                        $options = array();
                        $_SESSION['category'][0] = '';
                        foreach ($tags as $tag) {
                                unset($_SESSION['category']);
                                $cat_parent = $this->findParent(ProductCategory::model()->findByPk($tag->id));
                                //echo $cat_parent;

                                if ($_REQUEST['type'] == 'category') {

                                }
                                echo '<div class="' . $_REQUEST['type'] . '_tag-sub" id="' . $tag->id . '">' . $cat_parent . '</div>';
                        }
                }
        }

        public function findParent($data) {

                $index = count($_SESSION['category']);
                if ($data->id == $data->parent) {
                        $_SESSION['category'][$index + 1] = $data->category_name;
                } else {
                        $results = ProductCategory::model()->findByPk($data->parent);
                        $_SESSION['category'][$index + 1] = $data->category_name;
                        return $this->findParent($results);
                }
                $return = '';
                $category_arr = array_reverse($_SESSION['category']);
                foreach ($category_arr as $cat) {
                        $return .=$cat . '>';
                }
                return rtrim($return, '>');
        }

        public function actionCategoryTagAdd() {

                if (Yii::app()->request->isAjaxRequest) {

                        if (isset($_REQUEST['tag'])) {
                                $model = new MasterCategoryTags;
                                $model->category_tag = $_REQUEST['tag'];
                                $model->CB = Yii::app()->session['admin']['id'];
                                $model->UB = Yii::app()->session['admin']['id'];
                                $model->DOC = date('Y-m-d');
                                $model->save(false);
                        }
                }
        }

        public function actionCategoryTag() {

                if (Yii::app()->request->isAjaxRequest) {

                        $criteria = new CDbCriteria();
                        $criteria->addSearchCondition('category_tag', $_REQUEST['tag'], 'AND');
                        //$criteria->compare('category_id',$_REQUEST['category'],true,'AND');
                        if ($_REQUEST['taged'] != '') {

                                $arrs = explode(',', $_REQUEST['taged']);
                                $criteria->addNotInCondition('category_tag', $arrs, 'AND');
                        }
                        $tags = MasterCategoryTags::model()->findAll($criteria);
                        foreach ($tags as $tag) {
                                if ($_REQUEST['type'] == 'category') {

                                }
                                echo '<div class="' . $_REQUEST['type'] . '_tag-sub">' . $tag->category_tag . '</div>';
                        }
                }
        }

        public function actionProduct($id) {
                $products = ProductCategory::model()->findByPk($id);
                $this->render('products', array('products' => $products));
        }

        /**
         * This is the action to handle external exceptions.
         */
        public function actionError() {
                if ($error = Yii::app()->errorHandler->error) {
                        if (Yii::app()->request->isAjaxRequest)
                                echo $error['message'];
                        else
                                $this->render('error', $error);
                }
        }

}
