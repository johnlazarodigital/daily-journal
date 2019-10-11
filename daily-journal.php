<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              johnlazaro.com
 * @since             1.0.0
 * @package           Daily_Journal
 *
 * @wordpress-plugin
 * Plugin Name:       Daily Journal
 * Plugin URI:        johnlazaro.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            John Lazaro
 * Author URI:        johnlazaro.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       daily-journal
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DAILY_JOURNAL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-daily-journal-activator.php
 */
function activate_daily_journal() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-daily-journal-activator.php';
	Daily_Journal_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-daily-journal-deactivator.php
 */
function deactivate_daily_journal() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-daily-journal-deactivator.php';
	Daily_Journal_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_daily_journal' );
register_deactivation_hook( __FILE__, 'deactivate_daily_journal' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-daily-journal.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_daily_journal() {

	$plugin = new Daily_Journal();
	$plugin->run();

}
run_daily_journal();
