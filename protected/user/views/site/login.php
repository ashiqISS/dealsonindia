

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

                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'users-form',
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>
                                        <?php if (Yii::app()->user->hasFlash('login_error')): ?>
                                                <div class="alert alert-danger login_error">
                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                        <?php echo Yii::app()->user->getFlash('login_error'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <div class="common" id="common_login">
                                                <div class="col-sm-3 col-xs-3 zeros">
                                                        <label for="textinput" class="control-labele">Login Type</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                        <label for="textinput" class="control-labele">:</label>
                                                </div>
                                                <div class="col-sm-8 col-xs-8 zeros login_common">
                                                        <label class="radio-inline sec">
                                                                <input id="user" type="radio" name="user" value="1" required="true">User
                                                        </label>
                                                        <label class="radio-inline sec">
                                                                <input id="merchant" type="radio" name="user" required="true" value="2">Merchant
                                                        </label>
                                                </div>
                                        </div>
                                        <div id="login_div">
                                                <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <?php echo $form->textField($login, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                        <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                                <span class="content-filed content-filed-ruri"><i class="fa pls fa-user"></i>Email</span>
                                                                        </label>
                                                                </span>
                                                                <?php echo $form->error($login, 'email'); ?>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <?php echo $form->passwordField($login, 'password', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                        <label class="label-field label-field-ruri input__label input__label--ruri" for="input-3">
                                                                                <span class="content-filed content-filed-ruri"><i class="fa pls fa-unlock-alt"></i>Password</span>
                                                                        </label>
                                                                </span>
                                                                <?php echo $form->error($login, 'password'); ?>
                                                        </div>



                                                </div>
                                                <button type="submit" name="login_submit" class="ripple btn new-btn btn-default">Log In</button>
                                                <div class="col-md-6 col-sm-6 col-xs-6 padd">
                                                        <?php echo CHtml::link('Forgot Password', array('ForgotPassword/index'), array('class' => 'forgot')); ?>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-6 padd">

                                                        <a class="new" href="#">Register</a>

                                                </div>
                                        </div>

                                        <?php $this->endWidget(); ?>
                                </div>

                        </div>
                </div>
        </div>
</section>




<script>
        $(document).ready(function () {
                $('.teams').slick({
                        slidesToShow: 4,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        slidesToScroll: 1,
                        pauseOnHover: false,
                        responsive: [
                                {
                                        breakpoint: 1000,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                },
                                {
                                        breakpoint: 800,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                },
                                {
                                        breakpoint: 480,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                }
                        ]
                });
        });</script>


<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/jquery.appear.js"></script>
<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/count-to.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/classie.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-1.11.3.min.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/slick.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.3.min.js"></script>
<script>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
</script>

<script>
        $('.timer').countTo();

        $('.counter-item').appear(function () {
                $('.timer').countTo();
        }, {accY: -100});

</script>


<script>
        (function (window, $) {
                $(function () {
                        $('.ripple').on('click', function (event) {

                                var $div = $('<div/>'),
                                        btnOffset = $(this).offset(),
                                        xPos = event.pageX - btnOffset.left,
                                        yPos = event.pageY - btnOffset.top;
                                $div.addClass('ripple-effect');
                                var $ripple = $(".ripple-effect");

                                $ripple.css("height", $(this).height());
                                $ripple.css("width", $(this).height());
                                $div
                                        .css({
                                                top: yPos - ($ripple.height() / 2),
                                                left: xPos - ($ripple.width() / 2),
                                                background: $(this).data("ripple-color")
                                        })
                                        .appendTo($(this));

                                window.setTimeout(function () {
                                        $div.remove();
                                }, 2000);
                        });

                });

        })(window, jQuery);
</script>


<script>
        $(document).ready(function () {
                alert();
        }
</script>
