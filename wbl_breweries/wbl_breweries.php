<?php
/**
* Plugin Name: WayBeyondLabs Breweries
* Description: Plugin to create custom post type for breweries and wp-cli commands to import breweries from the Open Brewery API
* Author: Andrei de Oliveira Mosman
* Author URI: [https://waybeyondlabs.com]
* Version: 1.0
* Text Domain: wbl-breweries
**/

define( 'WBL_BREWERIES_VERSION', '1.0.0' );
define( 'WBL_BREWERIES_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WBL_BREWERIES_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WBL_BREWERIES_PLUGIN_FILE',  __FILE__  );

require_once("autoload.php");

use WayBeyondLabs\Breweries\Plugin;

Plugin::setup();

