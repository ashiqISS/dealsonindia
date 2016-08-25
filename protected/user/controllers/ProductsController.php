<?php

class ProductsController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionDaily() {
                $criteria = new CDbCriteria;
                $total = Products::model()->count();

                $pages = new CPagination($total);
                $pages->pageSize = 8;
                $pages->applyLimit($criteria);
                $date = date('Y-m-d');
                $criteria->addCondition("status = 1 AND is_admin_approved = 1 AND '" . $date . "' >= special_price_from AND  '" . $date . "' <= special_price_to ");
                $products = Products::model()->findAll($criteria);

                $this->render('deals', array(
                    'products' => $products,
                    'pages' => $pages,
                    'total' => $total,
                ));
        }

        public function actionHot() {
                $criteria = new CDbCriteria;
                $total = Products::model()->count();

                $pages = new CPagination($total);
                $pages->pageSize = 8;
                $pages->applyLimit($criteria);
                $date = date('Y-m-d');
                $criteria->addCondition("status = 1 AND is_admin_approved = 1 AND is_featured = 1 AND '" . $date . "' >= special_price_from AND  '" . $date . "' <= special_price_to ");
                $products = Products::model()->findAll($criteria);

                $this->render('hot', array(
                    'products' => $products,
                    'pages' => $pages,
                    'total' => $total,
                ));
        }

        public function actionCategory($name) {
                $parent = ProductCategory::model()->findByAttributes(array('canonical_name' => $name));
                if (empty($parent)) {
                        $this->render('ProductNotfound');
                        return FALSE;
                }
                $category = ProductCategory::model()->findAllByAttributes(array('parent' => $parent->parent));
                $cats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id), array('condition' => "id != $parent->id"));
                $dataProvider = Yii::app()->Menu->MenuCategories($cats, $parent);
                $this->render('index', array('dataProvider' => $dataProvider, 'parent' => $parent, 'category' => $category, 'name' => $name));
                exit;
        }

        public function actionWishlist($id) {
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $value = UserWishlist::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'prod_id' => $id));
                        if ($value != "") {
                                Yii::app()->user->setFlash('error', "This product is already added to your wishlist.... ");
                                $this->redirect(Yii::app()->request->urlReferrer);
                        } else {

                                $model = new UserWishlist;
                                $model->user_id = Yii::app()->session['user']['id'];
                                $model->session_id = NULL;
                                $model->prod_id = $id;
                                $model->date = date('Y-m-d');
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('success', "Dear, item is added to your wishlist");
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                }
                        }
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
                        $value = UserWishlist::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user'], 'prod_id' => $id));
                        if ($value != "") {
                                Yii::app()->user->setFlash('error', "This product is already added to your wishlist.... ");
                                $this->redirect(Yii::app()->request->urlReferrer);
                        } else {
                                $model = new UserWishlist;
                                $model->session_id = Yii::app()->session['temp_user'];
                                $model->prod_id = $id;
                                $model->date = date('Y-m-d');
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('success', "Dear, item is added to your wishlist");
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                }
                        }
                }
        }

        public function actionDetail($name) {

                $prduct = Products::model()->findByAttributes(array('canonical_name' => $name, 'status' => 1, 'is_admin_approved' => 1));
                $value = trim($prduct->category_id, ",");
                $category = explode(",", $value);
                foreach ($category as $cats) {
                        $condition .= 'category_id like "%' . $cats . '%" OR ';
                }
                $condition = trim($condition, " OR ");
                $time = $this->time_elapsed_string($prduct->DOC, false);
                $you_may_also_like = Products::model()->findAll(array('condition' => 'status = 1 AND is_admin_approved = 1 AND (' . $condition . ')'));
                $product_features = ProductFeatures::model()->findAllByAttributes(array('product_id' => $prduct->id));
                if (!empty($prduct)) {
                        $this->render('detailed', array('time' => $time, 'products' => $prduct, 'you_may_also_like' => $you_may_also_like, 'product_features' => $product_features));
                } else {
                        $this->redirect(array('Site/Error'));
                }
        }

        public function time_elapsed_string($datetime, $full = false) {
                date_default_timezone_set('Asia/Kolkata');
                $now = new DateTime;
                $ago = new DateTime($datetime);
                $diff = $now->diff($ago);


                $diff->w = floor($diff->d / 7);
                $diff->d -= $diff->w * 7;

                $string = array(
                    'y' => 'year',
                    'm' => 'month',
                    'w' => 'week',
                    'd' => 'day',
                    'h' => 'hour',
                    'i' => 'minute',
                    's' => 'second',
                );
                foreach ($string as $k => &$v) {
                        if ($diff->$k) {
                                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                        } else {
                                unset($string[$k]);
                        }
                }

                if (!$full)
                        $string = array_slice($string, 0, 1);
                return $string ? implode(', ', $string) . ' ago' : 'just now';
        }

        public function actionCoupons() {
                $this->render('coupons');
        }

        public function actionDailyDeals() {
                $this->render('dailydeals');
        }

        public function actionFlsahDeals() {
                $this->render('flashdeals');
        }

        public function actionSubmitDeal() {
                $this->render('submitdeal');
        }

        public function actionHotDeal() {
                $this->render('hotdeal');
        }

        public function actionSalesReport() {
                $this->render('salesreport');
        }

        public function actionAddProducts() {
                $model = new Products('vendor_create');
                if (isset($_POST['Products'])) {
                        $model->attributes = $_POST['Products'];
                        $model->description = $_POST['Products']['description'];
                        $model->meta_description = $_POST['Products']['meta_description'];
                        $model->new_from = $_POST['Products']['new_from'];
                        $model->new_to = $_POST['Products']['new_to'];
                        $model->sale_from = $_POST['Products']['sale_from'];
                        $model->sale_to = $_POST['Products']['sale_to'];
                        $model->special_price_from = $_POST['Products']['special_price_from'];
                        $model->special_price_to = $_POST['Products']['special_price_to'];
                        $model->DOC = date('Y-m-d');
                        $model->is_admin_approved = $_POST['Products']['DOU'];

                        $image = CUploadedFile::getInstance($model, 'main_image');
                        $images = CUploadedFile::getInstancesByName('gallery_images');
                        $model->main_image = $image->extensionName;

                        $model->merchant_id = Yii::app()->session['user']['id'];
                        $model->merchant_type = Yii::app()->session['user_type_usrid'];

                        if ($model->related_products != "") {
                                $model->related_products = implode(",", $model->related_products);
                        } else {
                                $model->related_products = "";
                        }

                        if ($_POST['Products']['new_from'] != "")
                                $model->new_from = date("Y-m-d", strtotime($_POST['Products']['new_from']));
                        else
                                $model->new_from = '';

                        if ($_POST['Products']['new_to'] != "")
                                $model->new_to = date("Y-m-d", strtotime($_POST['Products']['new_to']));
                        else
                                $model->new_to = '';

                        if ($_POST['Products']['sale_from'] != "")
                                $model->sale_from = date("Y-m-d", strtotime($_POST['Products']['sale_from']));
                        else
                                $model->sale_from = '';

                        if ($_POST['Products']['sale_to'] != "")
                                $model->sale_to = date("Y-m-d", strtotime($_POST['Products']['sale_to']));
                        else
                                $model->sale_to = '';

                        if ($_POST['Products']['special_price_from'] != "")
                                $model->special_price_from = date("Y-m-d", strtotime($_POST['Products']['special_price_from']));
                        else
                                $model->special_price_from = '';

                        if ($_POST['Products']['special_price_to'] != "")
                                $model->special_price_to = date("Y-m-d", strtotime($_POST['Products']['special_price_to']));
                        else
                                $model->special_price_to = '';


                        if ($model->canonical_name == '') {
                                $model->canonical_name = preg_replace('#[ -]+#', '-', $model->product_name);
                                $model->canonical_name = $model->canonical_name . '_' . $model->id;
                        }

                        $model->CB = Yii::app()->session['user']['id'];
                        $model->UB = 0;
                        $model->DOC = date('Y-m-d H:i:s');
//
//                        var_dump($model);
//                        exit;
//                        if ($model->validate()) {


                        if ($model->save(false)) {
                                if ($image != "") {
                                        $id = $model->id;
                                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                                        $dimension[1] = array('width' => '322', 'height' => '500', 'name' => 'medium');
                                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
                                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                                        Yii::app()->Upload->uploadImage($image, $id, true, $dimension);
                                }

                                if ($images != "") {
                                        $id = $model->id;
                                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                                        $dimension[1] = array('width' => '580', 'height' => '775', 'name' => 'big');
                                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                                        Yii::app()->Upload->uploadMultipleImage($images, $id, true, $dimension);
                                }

                                $this->redirect(array('MyProducts'));
                        }
//                        }
                }

                $this->render('add_products', array(
                    'model' => $model,
                ));
        }

        public function actionMyProducts() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (Yii::app()->session['user_type_usrid'] != 1) {
                                $model = Products::model()->findAllByAttributes(array('merchant_id' => Yii::app()->session['user']['id'], 'merchant_type' => Yii::app()->session['user_type_usrid']), array('order' => 'DOC DESC'));
                                $this->render('my_products', array('model' => $model));
                        }
                }
        }

}
