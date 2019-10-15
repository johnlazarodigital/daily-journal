<?php

/**
 * Fired during plugin activation
 *
 * @link       johnlazaro.com
 * @since      1.0.0
 *
 * @package    Daily_Journal
 * @subpackage Daily_Journal/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Daily_Journal
 * @subpackage Daily_Journal/includes
 * @author     John Lazaro <johnlazarodigital@gmail.com>
 */
class Daily_Journal_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		self::daijou_setup_db();

	}

	/**
	 * Setup database on plugin activation.
	 *
	 * @since    1.0.0
	 */
	public function daijou_setup_db() {

        global $wpdb;

        $daijou_db_version = '1.0';

        $table_name = $wpdb->prefix . 'daijou_journal_items';
        
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id bigint(9) NOT NULL AUTO_INCREMENT,
            title text NOT NULL,
            content longtext NOT NULL,
            date_posted timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        add_option( 'daijou_db_version', $daijou_db_version );

    }

}
