<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://uxplugin.com/
 * @since      1.0.0
 *
 * @package    FlatsomeGallery
 * @subpackage FlatsomeGallery/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    FlatsomeGallery
 * @subpackage FlatsomeGallery/includes
 * @author     Loc Nguyen <support@uxplugin.com>
 */
class UXP_Flatsome_Gallery_i18n {


    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain() {

        load_plugin_textdomain(
            'uxp-fge',
            false,
            dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
        );

    }

}
