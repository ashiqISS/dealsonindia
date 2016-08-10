<?php
/* @var $this LoginFormController */
/* @var $model LoginForm */
/* @var $form CActiveForm */
?>
<style>
    table
    {
        text-align: left;
    }
    table td
    {
        padding: .5em;
    }
</style>
<center>
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
        <table>
            <tr>
                <td colspan="3">
                    <?php
                    $usertype = array('Buyer' => 'Buyer', 'Merchant' => 'Merchant');
                    echo $form->radioButtonList($model, 'usertype', $usertype, array('separator' => ' ',
                        'labelOptions' => array('style' => 'display:inline'), // add this code
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model, 'email'); ?></td>
                <td> &nbsp;&nbsp;&nbsp;</td>
                <td>
<?php echo $form->textField($model, 'email'); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </td>
            </tr>
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
</center>