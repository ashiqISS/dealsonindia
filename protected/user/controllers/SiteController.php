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
        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionIndex() {
                // $model = Products::model()->findAll();

                $criteria = new CDbCriteria;
                $total = Products::model()->count();

                $pages = new CPagination($total);
                $pages->pageSize = 8;
                $pages->applyLimit($criteria);
                $date = date('Y-m-d');
                $criteria->addCondition("status = 1 AND is_admin_approved = 1 AND '" . $date . "' >= new_from AND  '" . $date . "' <= new_to ");
                $products = Products::model()->findAll($criteria);

                $this->render('index', array(
                    'products' => $products,
                    'pages' => $pages,
                    'total' => $total,
                ));
        }

        public function actionHome() {
//                $this->layout = 'main';
//                $this->render('home');
        }

        public function actionLogin() {
                Yii::app()->session['user_type_usrid'] = $_POST['user'];
                if (isset(Yii::app()->session['user'])) {
                        $this->redirect($this->createUrl('index'));
                } else {
                        if ($_POST['user'] == 1) {
                                $login = new BuyerDetails();
                        } else {
                                $login = new Merchant();
                        }
                        if (isset($_POST['login_submit'])) {
                                if ($_POST['user'] == 1) {
                                        $login = new BuyerDetails();
                                        $user = BuyerDetails::model()->findByAttributes(array('email' => $_POST['BuyerDetails']['email'], 'password' => $_POST['BuyerDetails']['password']));
                                        if ($user != '' && $user !== NULL) {
                                                Yii::app()->session['user'] = $user;
                                                $this->redirect(array('Myaccount/index'));
                                        } else {
                                                $login->addError('email', '');
                                                $login->addError('password', '');
                                                Yii::app()->user->setFlash('login_error', "dealsonindia email or password invalid.Try again");
                                        }
                                } else {
                                        $login = new Merchant();
                                        $user = Merchant::model()->findByAttributes(array('email' => $_REQUEST['Merchant']['email'], 'password' => $_REQUEST['Merchant']['password']));
                                        if ($user != '' && $user !== NULL) {
                                                Yii::app()->session['user'] = $user;
                                                $this->redirect(array('Myaccount/index'));
                                        } else {
                                                $login->addError('email', '');
                                                $login->addError('password', '');
                                                Yii::app()->user->setFlash('login_error', "dealsonindia email or password invalid.Try again");
                                        }
                                }
                        }
                }
                $this->render('login', array('login' => $login));
        }

        public function actionLogout() {
                Yii::app()->user->logout();
                unset(Yii::app()->session['user']);
                unset($_SESSION);
                $this->redirect(Yii::app()->homeUrl);
        }

        public function actionUserRegister() {
                if (isset(Yii::app()->session['user'])) {
                        $this->redirect($this->createUrl('index'));
                } else {
                        $model = new BuyerDetails('create');
                        $user = new Users;
                        if (isset($_POST['BuyerDetails'])) {
                                $user->attributes = $_POST['BuyerDetails'];
                                $user->user_type = 1;
                                $user->email = $_POST['BuyerDetails']['email'];
                                $user->phone_number = $_POST['BuyerDetails']['phone_no_2'];
                                $user->user_status = 1;
                                $user->last_login = date('Y-m-d H:i:s');
                                $user->DOC = date('Y-m-d');
                                $user->verification_code = rand(1000, 9999);
                                if ($user->save(FALSE)) {
                                        $model->attributes = $_POST['BuyerDetails'];
                                        $model->user_id = $user->id;
                                        $date1 = $_POST['BuyerDetails']['dob'];
                                        $newDate = date("Y-m-d", strtotime($date1));
                                        $model->dob = $newDate;
                                        $model->address = $_POST['BuyerDetails']['address'];
                                        $model->DOC = date('Y-m-d');
                                        $model->CB = $user->id;
                                        $model->status = 1;
                                        if ($model->save(FALSE)) {
                                                Yii::app()->user->setFlash('success', " You are registered successfully");
                                                $this->redirect(array('Myaccount/index'));
                                        } else {
                                                Yii::app()->user->setFlash('error', "Error Occured");
                                                $this->redirect('UserRegister');
                                        }
                                }
                        }
                }
                $this->render('user_register', array('model' => $model));
        }

        public function actionVendorRegister() {
                if (isset(Yii::app()->session['user'])) {
                        $this->redirect($this->createUrl('index'));
                } else {
                        $model = new Merchant('create');
                        $user = new Users;
                        if (isset($_POST['Merchant'])) {
                                $user->attributes = $_POST['Merchant'];
                                $user->user_type = 2;
                                $user->email = $_POST['Merchant']['email'];
                                $user->phone_number = $_POST['Merchant']['phone_number'];
                                $user->password = $_POST['Merchant']['password'];
                                $user->user_status = 1;
                                $user->last_login = date('Y-m-d H:i:s');
                                $user->DOC = date('Y-m-d');
                                $user->verification_code = rand(1000, 9999);
                                if ($user->save()) {
                                        $model->attributes = $_POST['Merchant'];
                                        $model->password = $_POST['Merchant']['password'];
                                        $model->confirm = $_POST['Merchant']['confirm'];
                                        if ($model->password == $model->confirm) {
                                                if ($model->save()) {
                                                        if ($model->email_verification == 0) {
                                                                Yii::app()->user->setFlash('emailverify', "One Time Password (OTP) has been sent to your email <b>" . $model->email . "</b>, please enter the same here to access your account.");
                                                                Yii::app()->user->setFlash('verification_code', $model->id);
                                                                Yii::app()->session['email_verification'] = $model->id;
                                                                $this->VerificationMail($model);
                                                        }

                                                        $this->siteNavigator($model);
                                                }
                                        } else {
                                                $model->addError('confirm', 'password mismatch');
                                        }

                                        $user->status = 3;
                                        $user->last_login = date('Y-m-d H:i:s');
                                }
                        }
                }
                $this->render('vendor_register', array('model' => $model));
        }

        public function VerificationMail($user) {
                $message = new YiiMailMessage;
                $message->view = "_verify_user_mail";  // view file name
                $params = array('user' => $user); // parameters
                $message->subject = 'Deals on india - ' . $user->verify_code . ' is your verification code for secure access!';
                $message->setBody($params, 'text/html');
                $message->addTo($user->email);
                $message->from = 'dealsonindia@intersmart.in';
                if (Yii::app()->mail->send($message)) {

                } else {
                        echo 'message not send';
                        exit;
                }
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
