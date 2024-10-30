<?php

function mikros_after_setup_theme() {
    load_theme_textdomain( 'mikros', __DIR__ . '/languages' );
}
add_action( 'after_setup_theme', 'mikros_after_setup_theme' );

// indicates we are running the admin
if ( is_admin() ) {
    function mikros_admin_menu() {
        require_once __DIR__ . '/views/mikros_options_page.php';

        add_options_page('Mikros', 'Mikros', 'manage_options', 'mikros', 'mikros_options_page');
    }
    add_action( 'admin_menu', 'mikros_admin_menu' );

    function mikros_register_settings() {
        register_setting( 'mikros', 'mikros_api_key' );
    }
    add_action( 'admin_init', 'mikros_register_settings' );
}

function mikros_woocommerce_coupon_data_tabs( $tabs ) {
    $tabs['mikros'] = array(
        'label'  => __( 'Mikros Integration', 'mikros' ),
        'target' => 'mikros_coupon_data',
        'class'  => '',
    );

    return $tabs;
}
add_action( 'woocommerce_coupon_data_tabs', 'mikros_woocommerce_coupon_data_tabs' );

function mikros_woocommerce_coupon_options_save( $post_id ) {
    $ad_id = ! empty( $_POST['mikros_ad_id'] ) ? sanitize_text_field( $_POST['mikros_ad_id'] ) : null;

    $meta_value = sanitize_meta( 'mikros_ad_id', $ad_id, 'shop_coupon' );

    update_post_meta( $post_id, 'mikros_ad_id', $meta_value );
}
add_action( 'woocommerce_coupon_options_save', 'mikros_woocommerce_coupon_options_save', 10, 1 );

function mikros_woocommerce_order_status_completed( $order_id ) {
    $used_coupons = wc_get_order( $order_id )->get_used_coupons();

    // step 4: check again all the coupons to send usage confirmation
    foreach ( $used_coupons as $coupon_code ) {
        $ad = mikros_get_ad_from_coupon_code( $coupon_code );

        if ( ! empty( $ad ) ) {
            mikros_confirm_coupon($ad, $coupon_code);
        }
    }
}
add_action( 'woocommerce_order_status_completed', 'mikros_woocommerce_order_status_completed', 10, 1 );
