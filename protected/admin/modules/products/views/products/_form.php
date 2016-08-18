<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'products-form',
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>
        <br/>
        <!--<div class="form-inline">-->
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'category_id'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        if (!$model->isNewRecord) {
                                if (!empty($model->category_id)) {
                                        $ids = explode(',', $model->category_id);
                                        $selected = array();
                                        foreach ($ids as $id) {
                                                $selected[$id] = array('selected' => true);
                                        }
                                }
                        }
                        ?>
                        <?php echo $form->hiddenField($model, 'category_id'); ?>

                        <?php
                        $this->widget('application.admin.components.CatSelect', array(
                            'type' => 'category',
                            'field_val' => $model->category_id,
                            'category_tag_id' => 'Products_category_id', /* id of hidden field */
                            'form_id' => 'products-form',
                        ));
                        ?>

                        <?php echo $form->error($model, 'category_id'); ?>

                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'product_name'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'product_name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'product_name'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'product_code'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'product_code', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'product_code'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'product_type'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'product_type', array('' => "---Select Type---", '1' => "Deal Product", '0' => "Normal Product"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'product_type'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'merchant'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'merchant', CHtml::listData(Merchant::model()->findAll(), 'id', 'fullname'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'merchant'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'merchant_type'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'merchant_type', array('1' => "Wholesale", '0' => "Retail", '2' => "Default"), array('empty' => 'Select', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'merchant_type'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'description'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'description'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'main_image'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->fileField($model, 'main_image', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'main_image'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'gallery_images'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->fileField($model, 'gallery_images', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'gallery_images'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'hover_image'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->fileField($model, 'hover_image', array('size' => 60, 'maxlength' => 150, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'hover_image'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'canonical_name'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'canonical_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'canonical_name'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'vendor'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'vendor', CHtml::listData(BuyerDetails::model()->findAll(), 'id', 'first_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'vendor'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'deal_location'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'deal_location', array('size' => 60, 'maxlength' => 150, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'deal_location'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'meta_title'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'meta_title', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'meta_title'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'meta_description'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textArea($model, 'meta_description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'meta_description'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'meta_keywords'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'meta_keywords', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'meta_keywords'); ?>
                </div>
        </div>





        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'brand'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'brand', CHtml::listData(MastersBrand::model()->findAll(), 'id', 'brand'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'brand'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'size'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'size', CHtml::listData(MastersSize::model()->findAll(), 'id', 'size'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'size'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'price'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'price', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'price'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'wholesale_price'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'wholesale_price', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'wholesale_price'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'is_discount_available'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'is_discount_available', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'is_discount_available'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'discount'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'discount', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'discount'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'discount_type'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'discount_type', array('1' => "Fixed", '0' => "Classic"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'discount_type'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'discount_rate'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'discount_rate', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'discount_rate'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'deal_price'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'deal_price', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'deal_price'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'quantity'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'quantity', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'quantity'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'requires_shipping'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'requires_shipping', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'requires_shipping'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'shipping_rate'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'shipping_rate', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'shipping_rate'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'enquiry_sale'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'enquiry_sale', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'enquiry_sale'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'new_from'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'new_from',
                            'value' => 'new_from',
                            'options' => array(
                                'dateFormat' => 'dd-mm-yy',
                                'changeYear' => true, // can change year
                                'changeMonth' => true, // can change month
                                'yearRange' => $from . ':' . $to, // range of year
                                'showButtonPanel' => true, // show button panel
                            ),
                            'htmlOptions' => array(
                                'size' => '10', // textField size
                                'maxlength' => '10', // textField maxlength
                                'class' => 'form-control',
                                'placeholder' => 'new_from',
                            ),
                        ));
                        ?><?php echo $form->error($model, 'new_from'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'new_to'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'new_to',
                            'value' => 'new_to',
                            'options' => array(
                                'dateFormat' => 'dd-mm-yy',
                                'changeYear' => true, // can change year
                                'changeMonth' => true, // can change month
                                'yearRange' => $from . ':' . $to, // range of year
                                'showButtonPanel' => true, // show button panel
                            ),
                            'htmlOptions' => array(
                                'size' => '10', // textField size
                                'maxlength' => '10', // textField maxlength
                                'class' => 'form-control',
                                'placeholder' => 'new_to',
                            ),
                        ));
                        ?>
                        <?php echo $form->error($model, 'new_to'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'sale_from'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'sale_from',
                            'value' => 'sale_from',
                            'options' => array(
                                'dateFormat' => 'dd-mm-yy',
                                'changeYear' => true, // can change year
                                'changeMonth' => true, // can change month
                                'yearRange' => $from . ':' . $to, // range of year
                                'showButtonPanel' => true, // show button panel
                            ),
                            'htmlOptions' => array(
                                'size' => '10', // textField size
                                'maxlength' => '10', // textField maxlength
                                'class' => 'form-control',
                                'placeholder' => 'sale_from',
                            ),
                        ));
                        ?><?php echo $form->error($model, 'sale_from'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'sale_to'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'sale_to',
                            'value' => 'sale_to',
                            'options' => array(
                                'dateFormat' => 'dd-mm-yy',
                                'changeYear' => true, // can change year
                                'changeMonth' => true, // can change month
                                'yearRange' => $from . ':' . $to, // range of year
                                'showButtonPanel' => true, // show button panel
                            ),
                            'htmlOptions' => array(
                                'size' => '10', // textField size
                                'maxlength' => '10', // textField maxlength
                                'class' => 'form-control',
                                'placeholder' => 'sale_to',
                            ),
                        ));
                        ?><?php echo $form->error($model, 'sale_to'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'special_price_from'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'special_price_from',
                            'value' => 'special_price_from',
                            'options' => array(
                                'dateFormat' => 'dd-mm-yy',
                                'changeYear' => true, // can change year
                                'changeMonth' => true, // can change month
                                'yearRange' => $from . ':' . $to, // range of year
                                'showButtonPanel' => true, // show button panel
                            ),
                            'htmlOptions' => array(
                                'size' => '10', // textField size
                                'maxlength' => '10', // textField maxlength
                                'class' => 'form-control',
                                'placeholder' => 'special_price_from',
                            ),
                        ));
                        ?><?php echo $form->error($model, 'special_price_from'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'special_price_to'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'special_price_to',
                            'value' => 'special_price_to',
                            'options' => array(
                                'dateFormat' => 'dd-mm-yy',
                                'changeYear' => true, // can change year
                                'changeMonth' => true, // can change month
                                'yearRange' => $from . ':' . $to, // range of year
                                'showButtonPanel' => true, // show button panel
                            ),
                            'htmlOptions' => array(
                                'size' => '10', // textField size
                                'maxlength' => '10', // textField maxlength
                                'class' => 'form-control',
                                'placeholder' => 'special_price_to',
                            ),
                        ));
                        ?><?php echo $form->error($model, 'special_price_to'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'tax'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'tax', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'tax'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'gift_option'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'gift_option', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'gift_option'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'stock_availability'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'stock_availability', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'stock_availability'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'video_link'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'video_link', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'video_link'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'video'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'video', array('size' => 60, 'maxlength' => 150, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'video'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'weight'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'weight', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'weight'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'weight_class'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'weight_class', CHtml::listData(WeightClass::model()->findAll(), 'id', 'title'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'weight_class'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'status'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'status'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'exchange'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'exchange', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'exchange'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'search_tag'); ?>
                </div>
                <?php echo $form->hiddenField($model, 'search_tag'); ?>
                <div class="col-sm-10">
                        <?php
                        $this->widget('application.admin.components.TagSelect', array(
                            'type' => 'product',
                            'field_val' => $model->search_tag,
                            'category_tag_id' => 'Products_search_tag', /* id of hidden field */
                            'form_id' => 'products-form',
                        ));
                        ?>
                        <?php echo $form->error($model, 'search_tag'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'related_products'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        if (!is_array($model->related_products)) {
                                $myArray = explode(',', $model->related_products);
                        } else {
                                $myArray = $model->related_products;
                        }


                        $related_products = array();

                        foreach ($myArray as $value) {
                                $related_products[$value] = array('selected' => 'selected');
                        }
                        ?>

                        <?php echo CHtml::activeDropDownList($model, 'related_products', CHtml::listData(Products::model()->findAll(), 'id', 'product_name'), array('empty' => '-Select-', 'class' => 'form-control', 'multiple' => true, 'options' => $related_products));
                        ?>
                        <?php echo $form->error($model, 'related_products'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'is_cod_available'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'is_cod_available', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'is_cod_available'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'is_available'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'is_available', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'is_available'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'is_featured'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'is_featured', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'is_featured'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'is_admin_approved'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'is_admin_approved', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'is_admin_approved'); ?>
                </div>
        </div>



        <!--</div>-->
        <div class="box-footer">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->