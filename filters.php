<?php

require_once __DIR__ . '/views/mikros_woocommerce_coupon_data_panels.php';

add_filter( 'woocommerce_coupon_data_panels', 'mikros_woocommerce_coupon_data_panels', 10, 2 );

if (!$GLOBALS['WC_Mikros']) {
    require_once __DIR__ . '/WC_Mikros.php';

    $GLOBALS['WC_Mikros'] = new WC_Mikros();
}
