<?php

class WC_Mikros
{
    /**
     * @var bool
     */
    private $invoked = false;

    /**
     * @var null|string
     */
    private $ad;

    /**
     * @var null|string
     */
    private $code;

    /**
     * @var null|string
     */
    private $title;

    public function __construct()
    {
        if ( empty( get_option('mikros_api_key') ) ) {
            return;
        }

        add_filter( 'woocommerce_get_coupon_id_from_code', array( &$this, 'get_coupon_id_from_code' ), 10, 2 );
        add_filter( 'woocommerce_coupon_code', array( &$this, 'coupon_code' ), 10, 1 );
    }

    public function get_coupon_id_from_code( $false, $coupon_code ) {
        if ( ( ! $this->invoked ) || empty( $this->ad ) || ( $this->code !== $coupon_code ) ) {
            return $false;
        }

        // 2nd step: extract post template
        $coupon = mikros_get_coupon_by_ad_id( $this->ad );

        if ( empty( $coupon ) ) {
            return $false;
        }

        $this->title = $coupon->post_title;

        return $coupon->ID;
    }

    public function coupon_code( $post_title ) {
        // 1st step: plugin not enabled yet, coupon code must be checked
        if ( ! $this->invoked ) {
            $this->invoked = true;
            $this->code = $post_title;
            $this->ad = mikros_get_ad_from_coupon_code( $post_title );

            return $post_title;
        }

        // 3rd step: plugin enabled and template found, return template id
        if ( $this->invoked && ( ! empty( $this->code ) ) && ( $post_title === $this->title ) ) {
            return $this->code;
        }

        return $post_title;
    }
}