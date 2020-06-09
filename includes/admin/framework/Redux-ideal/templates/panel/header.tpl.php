<?php
    /**
     * The template for the panel header area.
     * Override this template by specifying the path where it is stored (templates_path) in your Redux config.
     *
     * @author      Redux Framework
     * @package     ReduxFramework/Templates
     * @version:    3.5.4.18
     */

    $tip_title = __( 'Developer Mode Enabled', 'ideal' );

    if ( $this->parent->dev_mode_forced ) {
        $is_debug     = false;
        $is_localhost = false;

        $debug_bit = '';
        if ( Redux_Helpers::isWpDebug() ) {
            $is_debug  = true;
            $debug_bit = __( 'WP_DEBUG is enabled', 'ideal' );
        }

        $localhost_bit = '';
        if ( Redux_Helpers::isLocalHost() ) {
            $is_localhost  = true;
            $localhost_bit = __( 'you are working in a localhost environment', 'ideal' );
        }

        $conjunction_bit = '';
        if ( $is_localhost && $is_debug ) {
            $conjunction_bit = ' ' . __( 'and', 'ideal' ) . ' ';
        }

        $tip_msg = __( 'This has been automatically enabled because', 'ideal' ) . ' ' . $debug_bit . $conjunction_bit . $localhost_bit . '.';
    } else {
        $tip_msg = __( 'If you are not a developer, your theme/plugin author shipped with developer mode enabled. Contact them directly to fix it.', 'ideal' );
    }

?>
<div id="redux-header">
    <?php if ( ! empty( $this->parent->args['display_name'] ) ) { ?>
        <div class="display_header">

            <?php if ( isset( $this->parent->args['dev_mode'] ) && $this->parent->args['dev_mode'] ) { ?>
                <div class="redux-dev-mode-notice-container redux-dev-qtip"
                     qtip-title="<?php echo esc_attr( $tip_title ); ?>"
                     qtip-content="<?php echo esc_attr( $tip_msg ); ?>">
                    <span
                        class="redux-dev-mode-notice"><?php _e( 'Developer Mode Enabled', 'ideal' ); ?></span>
                </div>
            <?php } elseif (isset($this->parent->args['forced_dev_mode_off']) && $this->parent->args['forced_dev_mode_off'] == true ) { ?>
                <?php $tip_title    = 'The "forced_dev_mode_off" argument has been set to true.'; ?>
                <?php $tip_msg      = 'Support options are not available while this argument is enabled.  You will also need to switch this argument to false before deploying your project.  If you are a user of this product and you are seeing this message, please contact the author of this theme/plugin.'; ?>
                <div class="redux-dev-mode-notice-container redux-dev-qtip" 
                     qtip-title="<?php echo esc_attr( $tip_title ); ?>"
                     qtip-content="<?php echo esc_attr( $tip_msg ); ?>">
                    <span
                        class="redux-dev-mode-notice" style="background-color: #FF001D;"><?php _e( 'FORCED DEV MODE OFF ENABLED', 'ideal' ); ?></span>
                </div>
            
            <?php } 
            
            /* Ideal theam addition Start */
            ?>
            <img src="<?php echo get_template_directory_uri() . '/includes/admin/assets/img/icon/ideal-white.svg'; ?>" height="20px"  alt="Ideal Wordpress Theme"/>

            <h2><?php echo wp_kses_post( $this->parent->args['display_name'] ); ?></h2>

            <?php if ( ! empty( $this->parent->args['display_version'] ) ) { ?>
                <span><?php echo wp_kses_post( $this->parent->args['display_version'] ); ?></span>
            <?php } ?>

        </div>
        <div class="secondary-header"><h4><?php echo __('Control Panel','ideal'); ?></h4></div> 
    <?php } ?>

    <div class="clear"></div>
</div>
