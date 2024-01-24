<?php
/**
 * Plugin Name: SBLY - Review Shortcode
 * Plugin URI: https://sbly.com
 * Description: SBLY is a leading content platform that provides captivating and viral video content that's perfect for enhancing your website's user experience. With our SBLY Shortcode Plugin, you can easily embed SBLY videos, articles, and other media on your WordPress site with just a few simple shortcodes.
 * Version: 1.4.5
 * Author: SBLY
 * Author URI: https://codemeplz.com/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: sbly-review-shortcode
 * Domain Path: /languages
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
define( 'SBLY_REVIEW_SHORTCODE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sbly-review-shortcode-activator.php
 */
function activate_sbly_review_shortcode() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sbly-review-shortcode-activator.php';
	Sbly_Review_Shortcode_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sbly-review-shortcode-deactivator.php
 */
function deactivate_sbly_review_shortcode() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sbly-review-shortcode-deactivator.php';
	Sbly_Review_Shortcode_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sbly_review_shortcode' );
register_deactivation_hook( __FILE__, 'deactivate_sbly_review_shortcode' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sbly-review-shortcode.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sbly_review_shortcode() {

	$plugin = new Sbly_Review_Shortcode();
	$plugin->run();

}
run_sbly_review_shortcode();
