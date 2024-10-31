<?php

/**
 * @package RONIN47
 * @version 2.4
 * @wordpress-plugin
 *
 * Plugin Name: RONIN47
 * Plugin URI: https://xogum.email/wordpress-security-plugins
 * Description: WordPress Security compatible with Google AMP Technology.
 * Version: 2.4
 * VerPrev: 2.3
 * Author: XOGUM.eMAIL
 * Author URI: https://xogum.email
 * License: GPLv3
 * License URI: https://opensource.org/licenses/GPL-3.0
 * Contributors: @xogumemail
**/


// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}


/**
 * RONIN47 started with version 2.0 and will follow SemVer guidelines at https://semver.org to perform the updates as we release new versions of this plugin.
 */
define( 'RONIN47_VERSION', '2.4' );


/**
 * Checks if you are not in the admin area and whether someone is trying to access the author name via the “?author” parameter. If so, it will redirect to another webpage.
 */
function ronin47_redirect_homepage_if_author_parameter() {

	$is_author_set = get_query_var( 'author', '' );
	if ( $is_author_set !== '' && !is_admin()) {
		wp_redirect( home_url(), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'ronin47_redirect_homepage_if_author_parameter' );


/**
 * Block WordPress JSON REST Endpoints
 */
function ronin47_block_json_rest_endpoints ( $endpoints ) {
	if ( isset( $endpoints['/wp/v2/users'] ) ) {
		unset( $endpoints['/wp/v2/users'] );
	}
	if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
		unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
	}
	return $endpoints;
}
add_filter( 'rest_endpoints', 'ronin47_block_json_rest_endpoints');


/**
 * Function No wrong username & No wrong password messages.
 */
function ronin47__hide_login_error_messages() {

	return 'Something is wrong! Are you a legit user?';
}
add_filter( 'login_errors', 'ronin47_hide_login_error_messages' );


/**
 * Hide WordPress Core Update Notices from all users except Admin
 */
function ronin47_hide_wpcore_update_notices()
{
	if (!current_user_can('update_core')) {
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}
add_action( 'admin_head', 'ronin47_hide_wpcore_update_notices', 1 );


/**
 * Remove useless WordPress.org logo in the top left corner of Admin Dashboard.
 */
function ronin47_remove_wplogo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'ronin47_remove_wplogo', 0 );


/**
 * Add Users ID column to Admin users.php
 */
add_action( 'plugins_loaded', 'ronin47_userid' );

function ronin47_userid()
    {
    add_filter('manage_users_columns', 'ronin47_add_column');
    
    function ronin47_add_column($columns)
    {
        $columns['user_id'] = '<strong>ID</strong>';
        return $columns;
    }

    add_action('manage_users_custom_column',  'ronin47_show_userid', 10, 3);
    
    function ronin47_show_userid($value, $column_name, $user_id) 
    {

        get_userdata( $user_id );
        if ( $column_name === 'user_id') {
            return $user_id;
        }
        return $value;
    }
}


/**
 * Disable FLoC, Federated Learning of Cohorts by Google Chrome
 */
add_filter( 'wp_headers',function( $headers )
    {
    if( !$headers || !is_array( $headers ) ) $headers = array();
    if( empty( $headers ) || !isset( $headers['Permissions-Policy'] ) || empty( $headers['Permissions-Policy'] ) )
        {
        $headers['Permissions-Policy'] = 'interest-cohort=()';
        return $headers;
        }
    $policies = explode( ',',$headers['Permissions-Policy'] );
    // Checks the existence of FLoC directive.
    foreach( $policies as $n => $policy )
        {
        $policies[$n] = $policy = trim( $policy );
        if( false !== stripos( '_'.$policy,'interest-cohort' ) )
            {
            // If the FLoC directive is present, then we do not do anything...
            return $headers;
            }
        }
    // Adds a policy to disable FLoC
    $policies[] = 'interest-cohort=()';
    $headers['Permissions-Policy'] = implode( ', ',$policies );
    return $headers;
    } );


/**
 * Prevents XSS attacks by sanitising inputs coming from the URL
 */
function ronin47_xss_init()
  {
  if( isset( $_SERVER["PHP_SELF"] ) )
    {
    $_SERVER["PHP_SELF"] = htmlspecialchars( $_SERVER["PHP_SELF"] );
    }
  if( !defined( 'DOING_AJAX' ) && !empty( $_GET ) )
    {
    $remove = array( '(','.js' );
    foreach( $_GET as $k => $v )
      {
      if( is_string( $v ) ){
        $_GET[$k] = str_replace( $remove,'',htmlspecialchars( $v ) );
      }
    }
  }
}

ronin47_xss_init();


/**
 * Greatly reduces comments' spam by Blocking No-Referrer Requests, without the need to change .htaccess file
 */
function ronin47_check_referrer() {
	if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == '') {
		wp_die(__('You DO NOT have access to this file!'));
	}
}
add_action('check_comment_flood', 'ronin47_check_referrer');


/**
 * Add external link in Admin Toolbar for marketing purposes.
 */
add_action( 'admin_bar_menu', 'ronin47_marketing_link',999 );

/**
 * Marketing Link 
 */
function ronin47_marketing_link($admin_bar) {
	// add a parent item
	$argues = [
		'id'    => 'ronin47',
		'title' => 'RONIN47',
		'href'   => 'https://xogum.email/wordpress-security-plugins', // Showing how to add an external link
		'meta' => [
			'target' => '_blank',
			'class' => 'ronin47-link',
			'title' => 'RONIN47'
		]
	];
	$admin_bar->add_node( $argues );

}


/**
 * Change WordPress basic RONIN47 links display on plugins' admin page.
 */
function ronin47_plugins_admin_links($links, $file) {

	if ($file === plugin_basename(__FILE__)) {

		$rate_href  = 'https://wordpress.org/support/plugin/ronin47/reviews/?rate=5#new-post';
		$rate_title = esc_attr__('THANK YOU for your support!', 'ronin47');
		$rate_text  = esc_html__('Reviews', 'ronin47') .'&nbsp;&#9733;&#9733;&#9733;&#9733;&#9733;';

		$links[] = '<a target="_blank" rel="noopener noreferrer" href="'. $rate_href .'" title="'. $rate_title .'">'. $rate_text .'</a>';

	}

	return $links;

}
add_filter('plugin_row_meta', 'ronin47_plugins_admin_links', 10, 2);

