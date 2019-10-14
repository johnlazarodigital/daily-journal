<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       johnlazaro.com
 * @since      1.0.0
 *
 * @package    Daily_Journal
 * @subpackage Daily_Journal/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Daily_Journal
 * @subpackage Daily_Journal/public
 * @author     John Lazaro <johnlazarodigital@gmail.com>
 */
class Daily_Journal_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/daily-journal-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/daily-journal-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register plugin shortcodes.
	 *
	 * @since    1.0.0
	 */
	public function register_shortcodes() {

		add_shortcode( 'daily-journal', array( $this, 'shortcode_daily_journal' ) );

	}

	/**
	 * Output shortcode [daily-journal] content.
	 *
	 * @since    1.0.0
	 */
	public function shortcode_daily_journal( $atts ){
		
		ob_start();

		$action = $_GET['action'];

		switch($action) {
			case 'new_post':
				$template_path = 'daily-journal-new-post.php';
				break;

			case 'edit_post':
				$template_path = 'daily-journal-edit-post.php';
				break;
			
			default:
				$template_path = 'daily-journal-posts.php';
				break;
		}

		include plugin_dir_path( __FILE__ ) . 'partials/' . $template_path;
	
		return ob_get_clean();
	
	}

}
