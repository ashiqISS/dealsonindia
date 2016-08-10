<?php

class ProductsController extends Controller {

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

        public function actionDetail($name) {
                $prduct = Products::model()->findByAttributes(array('canonical_name' => $name, 'status' => 1));
                $related_products = explode(",", $prduct->related_products);
                if (!empty($prduct)) {
                        $this->render('detailed', array('product' => $prduct));
                } else {
                        $this->redirect(array('Site/Error'));
                }
        }

}
