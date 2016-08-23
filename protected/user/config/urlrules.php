<?php

return array(
    '' => 'site/index',
    'login' => 'site/login',
    'sign-up' => 'site/register',
    'coupons' => 'products/coupons',
    'daily-deals' => 'products/DailyDeals',
    'flash-deals' => 'products/FlsahDeals',
    'submit-deals' => 'products/SubmitDeal',
    'products' => 'products/Detail',
    'category' => 'products/Category',
    'dailydeals' => 'products/Daily',
    'hotdeals' => 'products/Hot',
//    'ss' => '?name',
    'merchant-registration' => 'registration/merchantDetails/create',
//    'merchant-activation' => 'registration/merchantDetails/UserActivation',
//    'login' => 'site/login',
    'logout' => 'site/logout',
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
);

