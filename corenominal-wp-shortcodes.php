<?php
/**
 * Plugin Name: corenominal's Custom Shortcodes
 * Description: This plugin provides custom shortcodes for my site.
 * Plugin URI: https://github.com/corenominal/corenominal-wp-shortcodes
 * Author: Philip Newborough
 * Author URI: http://corenominal.org
 * Version: 0.0.1
 * License: GPLv2
 */

/**
 * Include the shortcodes
 */
require_once( plugin_dir_path( __FILE__ ) . 'shortcodes/gist.php' );
require_once( plugin_dir_path( __FILE__ ) . 'shortcodes/loop-tag.php' );
