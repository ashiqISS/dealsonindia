<?php
/* @var $this ProductsController */
/* @var $model Products */
?>

<section class="content-header">
        <h1>
                Products    </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Products</li>
        </ol>
</section>

<!-- Main content -->
<section class="content">
        <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/products/products/create'; ?>" class='btn  btn-laksyah'>Add New Products</a>
        <div class="col-xs-12 form-page" style="margin-top: .5em;">
                <div class="box">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'products-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                // 'id',
                                'category_id',
                                'product_name',
                                'product_code',
                                'product_type',
                                //'brand_id',
                                /*
                                  'merchant',
                                  'merchant_type',
                                  'description',
                                  'main_image',
                                  'gallery_images',
                                  'hover_image',
                                  'canonical_name',
                                  'vendor',
                                  'deal_location',
                                  'meta_title',
                                  'meta_description',
                                  'meta_keywords',
                                  'header_visibility',
                                  'sort_order',
                                  'display_category_name',
                                  'brand',
                                  'size',
                                  'price',
                                  'wholesale_price',
                                  'is_discount_available',
                                  'discount',
                                  'discount_type',
                                  'discount_rate',
                                  'deal_price',
                                  'quantity',
                                  'requires_shipping',
                                  'shipping_rate',
                                  'enquiry_sale',
                                  'new_from',
                                  'new_to',
                                  'sale_from',
                                  'sale_to',
                                  'special_price_from',
                                  'special_price_to',
                                  'tax',
                                  'gift_option',
                                  'stock_availability',
                                  'video_link',
                                  'video',
                                  'weight',
                                  'weight_class',
                                  'status',
                                  'exchange',
                                  'search_tag',
                                  'related_products',
                                  'is_cod_available',
                                  'is_available',
                                  'is_featured',
                                  'is_admin_approved',
                                  'CB',
                                  'UB',
                                  'DOC',
                                  'DOU',
                                 */
                                array(
                                    'header' => '<font color="#61625D">Edit</font>',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{update}',
                                ),
                                array(
                                    'header' => '<font color="#61625D">Delete</font>',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{delete}',
                                ),
                                array(
                                    'header' => '<font color="#61625D">View</font>',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{view}',
                                ),
                            ),
                        ));
                        ?>
                </div>

        </div>


</div>
</section>

