<section class="banner">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <img src="<?= Yii::app()->baseUrl ?>/images/c1.jpg">
                        </div>
                </div>
        </div>
</section>
<section class="contact-form-wrp">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Login</h1>
                                <div class="contact-form contact-forms">
                                        <div class="form">

                                                <?php
                                                $form = $this->beginWidget('CActiveForm', array(
                                                    'id' => 'login-form',
                                                    // Please note: When you enable ajax validation, make sure the corresponding
                                                    // controller action is handling ajax validation correctly.
                                                    // See class documentation of CActiveForm for details on this,
                                                    // you need to use the performAjaxValidation()-method described there.
                                                    'enableAjaxValidation' => false,
                                                ));
                                                ?>

                                                <p class="note">Fields with <span class="required">*</span> are required.</p>

                                                <?php echo $form->errorSummary($model); ?>
                                                <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <?php
                                                                        $usertype = array('Buyer' => 'Buyer', 'Merchant' => 'Merchant');
                                                                        echo $form->radioButtonList($model, 'usertype', $usertype, array('separator' => ' ',
                                                                            'labelOptions' => array('style' => 'display:inline'), // add this code
                                                                        ));
                                                                        ?>
                                                                </span>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <?php echo $form->labelEx($model, 'email', array('class' => 'label-field label-field-ruri input__label input__label--ruri')); ?>
                                                                        &nbsp;&nbsp;&nbsp;
                                                                        <?php echo $form->textField($model, 'email'); ?>
                                                                        <?php echo $form->error($model, 'email'); ?>
                                                                </span>
                                                        </div>
                                                </div>
                                                <tr>
                                                        <td><?php echo $form->labelEx($model, 'password'); ?></td>
                                                        <td> &nbsp;&nbsp;&nbsp;</td>
                                                        <td>
                                                                <?php echo $form->textField($model, 'password'); ?>
                                                                <?php echo $form->error($model, 'password'); ?>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td><?php echo $form->labelEx($model, 'rememberMe'); ?></td>
                                                        <td> &nbsp;&nbsp;&nbsp;</td>
                                                        <td>
                                                                <?php echo $form->checkBox($model, 'rememberMe'); ?>
                                                                <?php echo $form->error($model, 'rememberMe'); ?>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td colspan="3">
                                                                <div class="row buttons">
                                                                        <?php echo CHtml::submitButton('Submit'); ?>
                                                                </div>

                                                        </td>
                                                </tr>
                                                </table>



                                                <?php $this->endWidget(); ?>

                                        </div><!-- form -->
                                </div>
                        </div>
                </div>
        </div>
</section>