<ul>
        <li><?php echo CHtml::link('My Profile', array('Myaccount/index')); ?></li>
        <li><a href="#">Message </a></li>
        <li><?php echo CHtml::link('Reset Password', array('Myaccount/ResetPassword')); ?></li>
        <li><?php echo CHtml::link('Account settings', array('Myaccount/Settings')); ?></li>
        <li><a href="#">Order History</a></li>
        <li><?php echo CHtml::link('Address Book', array('Myaccount/AddressBook')); ?></li>
        <?php if (Yii::app()->session['user_type_usrid'] != 1) { ?>
                <li><?php echo CHtml::link('Add Products', array('Products/AddProducts')); ?></li>
        <?php } ?>
        <li class="active"><a href="#">Newsletter Subscription</a></li>

        <li><a href="#">Set interest deals/ wish listed deals</a></li>
        <li><a href="#"> Submit a deal/ product </a></li>
        <li><a href="#"> My product</a></li>
        <li><a href="#">My sales Report </a></li>
        <li><a href="#"> Transaction</a></li>
        <li><a href="#"> Payment/Payout</a></li>
        <li><a href="#"> Plan details</a></li>
        <li><a href="#"> Affiliate commission</a></li>
        <li><a href="#"> Reward points</a></li>

        <li><a href="#"> Discount coupon generation</a></li>
        <li><a href="#">Used and refurbished (Return products)</a></li>
        <li><a href="#"> Paid Ad</a></li>
        <li><a href="#"> Bargain zone</a></li>
</ul>