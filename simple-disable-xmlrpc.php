<?php
/*
Plugin Name: Simple Disable XMLRPC
Plugin URI: http://plugins.findingsimple.com
Description: Drop in for disabling the XMLRPC service that is enabled by default in WP 3.5 and above. 
Version: 1.0
Author: Finding Simple
Author URI: http://findingsimple.com
License: GPL2
*/
/*
Copyright 2013  Finding Simple  (email : plugins@findingsimple.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! class_exists( 'Simple_Disable_XMLRPC' ) ) :

/**
 * Plugin Main Class.
 *
 * @package Simple Disable XML RPC
 * @author Jason Conroy <jason@findingsimple.com>
 * @since 1.0
 */
class Simple_Disable_XMLRPC {
	
	/**
	 * Initialise
	 */
	function Simple_Disable_XMLRPC() {
		
		add_action( 'init', array( &$this , 'simple_disable_xmlrpc_filter' ) );

	}

	/**
	 * Apply appropriate hooks and filters to disable XMLRPC
	 */
	function simple_disable_xmlrpc_filter() {
	
		add_filter('xmlrpc_enabled', '__return_false');
		
		/* Remove html head/er  meta tags */
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		
	}		

}

$Simple_Disable_XMLRPC = new Simple_Disable_XMLRPC();

endif;

