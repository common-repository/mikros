<?php function mikros_options_page() { ?>
    <div>
        <?php screen_icon(); ?>
        <form method="post" action="options.php">
            <?php settings_fields( 'mikros' ); ?>
            <h3><?php _e( 'Mikros-WooCommerce Integration', 'mikros' ); ?></h3>
            <p><?php echo sprintf(
                __( 'Add here the API Key that you find in %s', 'mikros' ),
                '<a href="https://mikros.coupons/profile/api-keys" target="_blank">https://mikros.coupons/profile/api-keys</a></p>'
            ); ?>
            <table>
                <tr valign="top">
                    <th scope="row">
                        <label for="mikros_api_key"><?php _e( 'API Key', 'mikros' ); ?></label>
                    </th>
                    <td>
                        <input type="text" id="mikros_api_key" name="mikros_api_key" value="<?php echo get_option( 'mikros_api_key' ); ?>" />
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php }