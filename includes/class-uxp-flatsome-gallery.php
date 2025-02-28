<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://uxplugin.com/
 * @since      1.0.0
 *
 * @package    FlatsomeGallery
 * @subpackage FlatsomeGallery/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    FlatsomeGallery
 * @subpackage FlatsomeGallery/public
 * @author     Loc Nguyen <support@uxplugin.com>
 */

class UXP_Flatsome_Gallery
{
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      UXP_Flatsome_Gallery_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct()
    {
        if ( defined( 'UXP_FGE_VERSION' ) ) {
            $this->version = UXP_FGE_VERSION;
        } else {
            $this->version = '1.0.1';
        }
        $this->plugin_name = 'uxp-flatsome-gallery';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_public_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - UXP_Flatsome_Gallery_Loader. Orchestrates the hooks of the plugin.
     * - UXP_Flatsome_Gallery_i18n. Defines internationalization functionality.
     * - UXP_Flatsome_Gallery_Admin. Defines all hooks for the admin area.
     * - UXP_Flatsome_Gallery_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies() {
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-uxp-flatsome-gallery-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-uxp-flatsome-gallery-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-uxp-flatsome-gallery-public.php';

        $this->loader = new UXP_Flatsome_Gallery_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the RUX_Flatsome_Banner_GridX_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale() {

        $plugin_i18n = new UXP_Flatsome_Gallery_i18n();

        $this->get_loader()->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks() {
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks() {
        $plugin_public = new UXP_Flatsome_Gallery_Public();
        $this->get_loader()->add_action( 'wp_enqueue_scripts', $plugin_public, 'uxp_enqueue_scripts', 99);
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    UXP_Flatsome_Gallery_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run() {
        $this->loader->run();
    }
}