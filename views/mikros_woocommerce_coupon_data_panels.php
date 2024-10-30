<?php function mikros_woocommerce_coupon_data_panels( $coupon_get_id ) { ?>
    <div id="mikros_coupon_data" class="woocommerce_options_panel panel">
        <div class="options_group">
            <?php
                woocommerce_wp_text_input( array(
                    'id' => 'mikros_ad_id',
                    'label' => __( 'Ad Identifier', 'mikros' ),
                    'placeholder' => _x('00000000-0000-0000-0000-000000000000', 'placeholder', 'woocommerce'),
                    'type' => 'text',
                    'desc_tip' => false,
                ) );
            ?>
        </div>
    </div>
<?php }