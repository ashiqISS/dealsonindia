<?php
/* @var $this MastersBrandController */
/* @var $model MastersBrand */
?>

<section class="content-header">
        <h1>
                MastersBrand    </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/admin.php/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">MastersBrand</li>
        </ol>
</section>

<!-- Main content -->
<section class="content">
        <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/mastersBrand/create'; ?>" class='btn  btn-laksyah'>Add New MastersBrand</a>
        <div class="col-xs-12 form-page" style="margin-top: .5em;">
                <div class="box">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'masters-brand-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'id',
                                'brand_name',
                                'cb',
                                'doc',
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

