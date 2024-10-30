<?php
/*
Plugin Name: Mikros
Plugin URI: https://mikros.coupons/
Description: WooCommerce-Mikros Integration
Author: Mikros
Author URI: https://mikros.coupons
Version: 1.0.0

    License: GNU General Public License v3.0
    License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/**
 * Check if WooCommerce is active
 */
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    return;
}

/**
 * Localisation
 */
load_plugin_textdomain( 'wc_mikros', false, dirname( plugin_basename( __FILE__ ) ) . '/' );

require_once __DIR__.'/utils.php';
require_once __DIR__.'/actions.php';
require_once __DIR__.'/filters.php';
