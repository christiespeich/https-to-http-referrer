<?php
 /*
    Plugin Name: HTTPS to HTTP Referrer
    Plugin URI: http://www.mooberrydreams.com/
    Description: Adds meta referrer to allow referral data to pass from HTTPS to HTTP sites
    Author: Mooberry Dreams
    Version: 1.2
    Author URI: http://www.mooberrydreams.com/
	Text Domain: https-to-http-referrer
	Domain Page: /languages/
	
	Copyright 2017  Mooberry Dreams  

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
    */

 // Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

define('MBDHTTPREF_PLUGIN_DIR', plugin_dir_path( __FILE__ )); 
define('MBDHTTPREF_PLUGIN_VERSION_KEY', 'mbdhttpref_version');
define('MBDHTTPREF_PLUGIN_VERSION', '1.2');

	
	
// Plugin Folder URL
if ( ! defined( 'MBDHTTPREF_PLUGIN_URL' ) ) {
	define( 'MBDHTTPREF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

// Plugin Root File
if ( ! defined( 'MBDHTTPREF_PLUGIN_FILE' ) ) {
	define( 'MBDHTTPREF_PLUGIN_FILE', __FILE__ );
} 



//Use version 2.0 of the update checker.
require_once dirname( __FILE__ ) . '/includes/plugin-update-checker-master/plugin-update-checker.php';
$MyUpdateChecker = new PluginUpdateChecker_2_0 (
	'http://www.mooberrydreams.com/plugins/https-to-http-referrer/updater.json',
	__FILE__,
	'https-to-http-referrer'
);
	

add_action('wp_head', 'mbd_https_add_meta_tags');
function mbd_https_add_meta_tags() {
	global $is_safari, $is_iphone, $is_edge;
	
	if ( $is_safari || $is_iphone || $is_edge ) {
		$content = 'always';
	} else {
		$content = 'origin-when-cross-origin';
	}
	echo '<meta name="referrer" content="' . $content . '" />';
	
 }
