=== Mikros ===
Contributors: Mikros
Tags: woocommerce, coupons, ecommerce
Stable tag: 1.0.0
License: GNUGPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Mikros Integration for WooCommerce lets you share your promotions through your WooCommerce coupons.

== Description ==

Mikros Integration is a plugin for WordPress that allows the integration between WooCommerce coupons
and Mikros coupons.

Using the plugin you'll have the possibility to manage coupons details using WooCommerce and sharing
them with Mikros generation system.

== Installation ==

1. Make sure you have to WooCommerce plugin installed and configured
2. Upload the entire 'mikros-integration' folder to the '/wp-content/plugins/' directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Go to https://mikros.coupons/profile/api-keys, create an API Key and copy it into Settings > Mikros > API Key

== Usage ==

The integration between these two worlds is easy and can be done in 5 steps:

1. Create or edit a coupon on your WooCommerce website
2. Create the same promotion on https://mikros.coupons/
3. Once created go to the Data tab of your promotion and copy the Ad Identifier in the bottom
4. Go back to the coupon settings on WooCommerce and click on the Mikros Integration tab (below Usage Limits)
5. Paste the Ad Identifier and save


Once saved, coupons generated on https://mikros.coupons/ can be used on your ecommerce too and will be confirmed
once the order is complete (payment included).

== Changelog ==

= 1.0.0 =
* Initial Release