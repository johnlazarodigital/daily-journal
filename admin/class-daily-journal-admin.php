<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       johnlazaro.com
 * @since      1.0.0
 *
 * @package    Daily_Journal
 * @subpackage Daily_Journal/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Daily_Journal
 * @subpackage Daily_Journal/admin
 * @author     John Lazaro <johnlazarodigital@gmail.com>
 */
class Daily_Journal_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Daily_Journal_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Daily_Journal_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/daily-journal-admin.css', array(), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Daily_Journal_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Daily_Journal_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/daily-journal-admin.js', array( 'jquery' ), $this->version, false );

    }

    /**
     * Register the journal item post type.
     *
     * @since    1.0.0
     */
    public function daijou_register_post_type() {

        $args = array(
            'public' => true,
            'label'  => __( 'Journal Items', 'daily-journal' ),
        );

        register_post_type( 'journal-items', $args );

    }

    /**
     * Set default value of post title to current unix datetime.
     *
     * @since    1.0.0
     */
    public function daijou_default_title() {
        
        global $post_type;
        
        if( $post_type == 'journal-items' )
            return current_time('timestamp');
        
    }

}
