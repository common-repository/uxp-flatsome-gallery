<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://uxplugin.com/
 * @since      1.0.0
 *
 * @package    FlatsomeGallery
 * @subpackage FlatsomeGallery/public
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    FlatsomeGallery
 * @subpackage FlatsomeGallery/public
 * @author     Loc Nguyen <support@uxplugin.com>
 */
class UXP_Flatsome_Gallery_Public
{
    public function uxp_enqueue_scripts() {
        wp_enqueue_script('nhl mfp', plugin_dir_url( __DIR__ ) . 'public/js/nhlmfp.custom.min.js' , array('jquery'),  '', true);
    }
}