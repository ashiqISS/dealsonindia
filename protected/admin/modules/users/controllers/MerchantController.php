<?php

class MerchantController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

        /**
         * @return array action filters
         */
        public function filters() {
                return array(
                    'accessControl', // perform access control for CRUD operations
                    'postOnly + delete', // we only allow deletion via POST request
                );
        }

        /**
         * Specifies the access control rules.
         * This method is used by the 'accessControl' filter.
         * @return array access control rules
         */
        public function accessRules() {
                return array(
                    array('allow', // allow all users to perform 'index' and 'view' actions
                        'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
                        'users' => array('*'),
                    ),
                    array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions' => array('create', 'update'),
                        'users' => array('@'),
                    ),
                    array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions' => array('admin', 'delete'),
                        'users' => array('admin'),
                    ),
                    array('deny', // deny all users
                        'users' => array('*'),
                    ),
                );
        }

        /**
         * Displays a particular model.
         * @param integer $id the ID of the model to be displayed
         */
        public function actionView($id) {
                $this->render('view', array(
                    'model' => $this->loadModel($id),
                ));
        }

        /**
         * Creates a new model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         */
        public function actionCreate() {
                $model = new Merchant('create');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['Merchant'])) {
                        $logo = CUploadedFile::getInstance($model, 'shop_logo');
                        $banner = CUploadedFile::getInstance($model, 'shop_banner');
                        $model->attributes = $_POST['Merchant'];
                        $model->product_categories = $_POST['Merchant']['product_categories'];
                        $model->merchant_point = $_POST['Merchant']['merchant_point'];
                        $model->merchant_rating = $_POST['Merchant']['merchant_rating'];
                        $model->merchant_badge = $_POST['Merchant']['merchant_badge'];
                        $model->shop_logo = $logo->extensionName;
                        $model->shop_banner = $banner->extensionName;

                        $model->CB = Yii::app()->session['admin']['id'];
                        $model->DOC = date('Y-m-d');

                        if ($model->save()) {
                                if ($logo != "") {
                                        $id = $model->id;
                                        $logo->saveAs(Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/" . $model->id . "." . $logo->extensionName);
//                    $file = Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/" . $model->id . "." . $logo->extensionName;
//                    $path = Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/";
//                    $extension = $logo->extensionName;
//                    $this->Resize($file, 472, 339, $id, $path, $extension);
                                }
                                if ($banner != "") {
                                        $id = $model->id;
                                        $banner->saveAs(Yii::app()->basePath . "/../uploads/users/merchants/shop_banner/" . $model->id . "." . $banner->extensionName);
//                    $file = Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/" . $model->id . "." . $logo->extensionName;
//                    $path = Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/";
//                    $extension = $logo->extensionName;
//                    $this->Resize($file, 472, 339, $id, $path, $extension);
                                }
                                $this->redirect(array('admin', 'id' => $model->id));
                        }
                }

                $this->render('create', array(
                    'model' => $model,
                ));
        }

        /**
         * Updates a particular model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id the ID of the model to be updated
         */
        public function actionUpdate($id) {
                $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                $logo1 = $model->shop_logo;
                $banner1 = $model->shop_banner;
                $doc = $model->DOC;
                if (isset($_POST['Merchant'])) {
                        $logo = CUploadedFile::getInstance($model, 'shop_logo');
                        $banner = CUploadedFile::getInstance($model, 'shop_banner');
                        $model->attributes = $_POST['Merchant'];
                        $model->product_categories = $_POST['Merchant']['product_categories'];
                        $model->shop_logo = $logo->extensionName;
                        $model->shop_banner = $banner->extensionName;
                        $model->merchant_point = $_POST['Merchant']['merchant_point'];
                        $model->merchant_rating = $_POST['Merchant']['merchant_rating'];
                        $model->merchant_badge = $_POST['Merchant']['merchant_badge'];

                        $model->CB = Yii::app()->session['admin']['id'];
                        $model->DOC = $doc;

                        if ($model->save()) {
                                if ($logo != "") {
                                        $id = $model->id;
                                        $logo->saveAs(Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/" . $model->id . "." . $logo->extensionName);
//                    $file = Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/" . $model->id . "." . $logo->extensionName;
//                    $path = Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/";
//                    $extension = $logo->extensionName;
//                    $this->Resize($file, 472, 339, $id, $path, $extension);
                                } else {
                                        $model->shop_logo = $logo1;
                                }
                                if ($banner != "") {
                                        $id = $model->id;
                                        $banner->saveAs(Yii::app()->basePath . "/../uploads/users/merchants/shop_banner/" . $model->id . "." . $banner->extensionName);
//                    $file = Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/" . $model->id . "." . $logo->extensionName;
//                    $path = Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/";
//                    $extension = $logo->extensionName;
//                    $this->Resize($file, 472, 339, $id, $path, $extension);
                                } else {
                                        $model->shop_banner = $banner1;
                                }
                                $this->redirect(array('admin', 'id' => $model->id));
                        }
                }

                $this->render('update', array(
                    'model' => $model,
                ));
        }

        /**
         * Deletes a particular model.
         * If deletion is successful, the browser will be redirected to the 'admin' page.
         * @param integer $id the ID of the model to be deleted
         */
        public function actionDelete($id) {
                $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('Merchant');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new Merchant('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['Merchant']))
                        $model->attributes = $_GET['Merchant'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return Merchant the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = Merchant::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param Merchant $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'merchant-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
