<?php

function mikros_confirm_coupon( $ad_id, $coupon_code ) {
    if ( empty( get_option( 'mikros_api_key' ) ) ) {
        return null;
    }

    if ( ! preg_match( '/^[a-z0-9]+$/i', $coupon_code ) ) {
        return null;
    }

    $response = wp_remote_get( sprintf(
        'https://mikros.coupons/api/v0/confirm-code/%s/%s?token=%s',
        $ad_id,
        $coupon_code,
        get_option('mikros_api_key')
    ) );
}

function mikros_get_ad_from_coupon_code( $coupon_code ) {
    if ( empty( get_option( 'mikros_api_key' ) ) ) {
        return null;
    }

    if ( ! preg_match( '/^[a-z0-9]+$/i', $coupon_code ) ) {
        return null;
    }

    $response = wp_remote_get( sprintf(
        'https://mikros.coupons/api/v0/get-code/%s?token=%s',
        $coupon_code,
        get_option( 'mikros_api_key' )
    ) );

    if ( is_wp_error( $response ) || 200 != wp_remote_retrieve_response_code( $response ) ) {
        return null;
    }

    $result = json_decode( wp_remote_retrieve_body( $response ), true );

    if ( isset( $result['success'] ) && $result['can_be_confirmed'] ) {
        return $result['ad'];
    }

    return null;
}

function mikros_get_coupon_by_ad_id( $ad_id ) {
    if ( empty( get_option( 'mikros_api_key' ) ) ) {
        return null;
    }

    $args = array(
        'posts_per_page' => 1,
        'post_type' => 'shop_coupon',
        'meta_query' => array(
            array(
                'key' => 'mikros_ad_id',
                'value' => $ad_id,
            )
        )
    );

    $coupons = get_posts( $args );

    if ( empty( $coupons ) ) {
        return null;
    }

    return $coupons[0];
}