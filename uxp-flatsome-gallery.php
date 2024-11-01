<?php

/**
 * @link              https://uxplugin.com/uxp-flatsome-gallery
 * @since             1.0.0
 * @package           FlatsomeGallery
 *
 * @wordpress-plugin
 * Plugin Name:       UXP Flatsome Gallery
 * Plugin URI:        https://wordpress.org/plugins/uxp-flatsome-gallery
 * Description:       Customizable Flatsome Gallery
 * Version:           1.0.1
 * Author:            UXPlugin.com
 * Author URI:        https://nguyenhaloc.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       uxp-fge
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'UXP_FGE_VERSION', '1.0.1' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-uxp-flatsome-gallery.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_uxp_flatsome_gallery() {

    $plugin = new UXP_Flatsome_Gallery();
    $plugin->run();

}
run_uxp_flatsome_gallery();