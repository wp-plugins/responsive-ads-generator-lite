<?php
/*
Plugin Name: Responsive Ads Generator Lite
Plugin URI: http://cbfreeman.com/downloads/responsive-ads-generator/
Description: Responsive ads generator for WordPress
Version: 1.0
Author: cbfreeman
Author URI: http://cbfreeman.com
License: GPLv2
 */

/*
  Copyright (c) 2015 Craig Freeman (email :worldsbestdeveloper@cbfreeman.com)

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */



  //Add Shortcode
function rag_shortcode( $atts, $content = null ) {
	return '<ul>' . do_shortcode($content) . '</ul>';
}
add_shortcode( 'rag', 'rag_shortcode' );


// Add IMG Shortcode
function rag_img_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'width' => '125',
			'height' => '125',
		), $atts )
	);
// Code
return '<li><img src="' . $content . '" width="' . $width . '" height="' . $height . '"></li>';

}
add_shortcode( 'rag_img', 'rag_img_shortcode' );
    
    
    
    // Add Javascript Shortcode
function rag_js_shortcode( $atts , $content = null ) {
	// Code
return '<li>' . $content . '</li>';

}
add_shortcode( 'rag_js', 'rag_js_shortcode' );


// Add Header Shortcode
function rag_head_shortcode( $atts , $content = null ) {
	// Code
return '<h2>' . $content . '</h2>';

}
add_shortcode( 'rag_head', 'rag_head_shortcode' );


// Add HREF Shortcode
function rag_a_shortcode( $atts , $content = null ) {
	// Code
return '<li>' . $content;

}
add_shortcode( 'rag_a', 'rag_a_shortcode' );


// Add IMG HREF Shortcode
function rag_href_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'width' => '125',
			'height' => '125',
		), $atts )
	);
// Code
return '<img src="' . $content . '" width="' . $width . '" height="' . $height . '"></a></li>';

}
add_shortcode( 'rag_href', 'rag_href_shortcode' );
    

  /**
  * Add New Tables to WP DB
  *
  * create tables
  * update db
  */

 function rag_install()
{
  
    global $wpdb, $wp_version;
    
define("RAG_HEADERS_TABLE", $wpdb->prefix . "rag_headers");
define("RAG_SETTINGS_TABLE", $wpdb->prefix . "rag_settings");
define("RAG_RECORDS_TABLE", $wpdb->prefix . "rag_records");
      
      
       if(strtoupper($wpdb->get_var("show tables like '". RAG_SETTINGS_TABLE . "'")) != strtoupper(RAG_SETTINGS_TABLE))
    {
        $wpdb->query("
            CREATE TABLE IF NOT EXISTS `". RAG_SETTINGS_TABLE . "` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`rows` VARCHAR(25) NOT NULL,
			`spacing` VARCHAR(500) NOT NULL,
           `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (`id`) )
            
            ");   

    $tbl = $wpdb->prefix . "rag_settings";
   $wpdb->insert( $tbl, array( 'id' => '1', 'rows' => '5' , 'spacing' => '' ) );


         if(strtoupper($wpdb->get_var("show tables like '". RAG_HEADERS_TABLE . "'")) != strtoupper(RAG_HEADERS_TABLE))
    {
        $wpdb->query("
            CREATE TABLE IF NOT EXISTS `". RAG_HEADERS_TABLE . "` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`title` VARCHAR(500) NOT NULL,
            `selected` VARCHAR(10) NOT NULL,
           `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (`id`) )
            
            ");
             
             $tb = $wpdb->prefix . "rag_headers";
  $wpdb->insert( $tb, array( 'id' => '1', 'title' => 'Heading 1' , 'selected' => 'N' ) );
  

if(strtoupper($wpdb->get_var("show tables like '". RAG_RECORDS_TABLE . "'")) != strtoupper(RAG_RECORDS_TABLE))
    {
        $wpdb->query("
            CREATE TABLE IF NOT EXISTS `". RAG_RECORDS_TABLE . "` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
                        `title` VARCHAR(500) NOT NULL,
			`link_source` VARCHAR(500) NOT NULL,
			`type_code` VARCHAR(55) NOT NULL,
            `ahref` VARCHAR(500) NOT NULL,
           `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (`id`) )
            
            ");
    
     $ta = $wpdb->prefix . "rag_records";
  $wpdb->insert( $ta, array( 'id' => '1', 'title' => 'YOUR AD HERE' , 'link_source' => '' , 'type_code' => '' ) );
  $wpdb->insert( $ta, array( 'id' => '2', 'title' => 'YOUR AD HERE' ,'link_source' => '' , 'type_code' => '' ) );
   $wpdb->insert( $ta, array( 'id' => '3', 'title' => 'YOUR AD HERE' , 'link_source' => '' , 'type_code' => '' ) ); 
    $wpdb->insert( $ta, array( 'id' => '4', 'title' => 'YOUR AD HERE' , 'link_source' => '' , 'type_code' => '' ) );
   
             }
         }
             
       }
         
}


           

  // Store Post Data
  global $wpdb;

  if(isset($_POST['rag-submit'])) {
      
   $selected_radio = $_POST['heading'];

if ($selected_radio =='1') {
  $field1 = '1';
}
      
 $chose = implode(", ", $_POST['aff']);


  if(isset($_POST['rag-rows']))
  $rows = ($_POST['rag-rows']);
      
  $wpdb->query("UPDATE {$wpdb->prefix}rag_settings SET rows ='$rows', spacing = '$chose' WHERE id ='1'");

  if(isset($_POST['header1']))
  $header1 = ($_POST['header1']);

  $wpdb->query("UPDATE {$wpdb->prefix}rag_headers SET title ='$header1', selected = '$field1' WHERE id ='1'");

 
      
  if(isset($_POST['rag_aff1']))
  $aff1 = ($_POST['rag_aff1']);
  if(isset($_POST['type_code1']))
  $code1 = ($_POST['type_code1']);
if(isset($_POST['rag_aff2']))
  $aff2 = ($_POST['rag_aff2']);
  if(isset($_POST['type_code2']))
  $code2 = ($_POST['type_code2']);
      if(isset($_POST['rag_aff3']))
  $aff3 = ($_POST['rag_aff3']);
  if(isset($_POST['type_code3']))
  $code3 = ($_POST['type_code3']);
      if(isset($_POST['rag_aff4']))
  $aff4 = ($_POST['rag_aff4']);
  if(isset($_POST['type_code4']))
  $code4 = ($_POST['type_code4']);
     
  if(isset($_POST['atitle1']))
  $atitle1 = ($_POST['atitle1']);
  if(isset($_POST['link1']))
  $link1 = ($_POST['link1']);
      if(isset($_POST['atitle2']))
  $atitle2 = ($_POST['atitle2']);
  if(isset($_POST['link2']))
  $link2 = ($_POST['link2']);
      if(isset($_POST['atitle3']))
  $atitle3 = ($_POST['atitle3']);
  if(isset($_POST['link3']))
  $link3 = ($_POST['link3']);
      if(isset($_POST['atitle4']))
  $atitle4 = ($_POST['atitle4']);
  if(isset($_POST['link4']))
  $link4 = ($_POST['link4']);
     
      
   
  $wpdb->query("UPDATE {$wpdb->prefix}rag_records SET title ='$atitle1', link_source ='$aff1', type_code ='$code1', ahref ='$link1' WHERE id ='1'");
       $wpdb->query("UPDATE {$wpdb->prefix}rag_records SET title ='$atitle2', link_source ='$aff2', type_code ='$code2', ahref ='$link2' WHERE id ='2'");
   $wpdb->query("UPDATE {$wpdb->prefix}rag_records SET title ='$atitle3', link_source ='$aff3', type_code ='$code3', ahref ='$link3' WHERE id ='3'");
       $wpdb->query("UPDATE {$wpdb->prefix}rag_records SET title ='$atitle4', link_source ='$aff4', type_code ='$code4', ahref ='$link4' WHERE id ='4'");
     
      
}



  //Start
  if ( ! class_exists( 'RAG_Services' ) ) {

	if ( ! defined( 'RAG_JS_URL' ) )
		define( 'RAG_JS_URL', plugin_dir_url( __FILE__ ) . 'js' );

	if ( ! defined( 'RAG_CSS_URL' ) )
		define( 'RAG_CSS_URL', plugin_dir_url( __FILE__ ) . 'css' );		


       class RAG_Services {

    /* Saved options */
    public $options;

static function init() {
  
  // Load translations
   load_plugin_textdomain( 'rag-service', null, basename( dirname( __FILE__ ) ) . '/langs/' );
 
   //Actions
   add_action('admin_menu', array(__CLASS__, 'menu_page') );
   add_action('admin_enqueue_scripts', array(__CLASS__, 'rag_enqueue_admin') );
   add_action('wp_enqueue_scripts', array(__CLASS__, 'rag_front_enqueue_admin') );
    register_activation_hook(__FILE__, 'rag_install');
}


 	/**
		 * Record plugin activation
		 *
		 * @since 0.1
		 * @global $wp_version
		 */
		static function install() {
			global $wp_version;
			// Prevent activation if requirements are not met
			// WP 3.0 required
			if ( version_compare( $wp_version, '3.0', '<=' ) ) {
				deactivate_plugins( __FILE__ );

				wp_die( __( 'Responsive Ads Generator Lite requires WordPress 3.0 or newer.', 'rag_services' ), __( 'Upgrade your Wordpress installation.', 'rag_services' ) );
			}

			
		}
	
  //Register admin styles and scripts
 static function rag_enqueue_admin() {
  wp_enqueue_style('rag-admin-style', RAG_CSS_URL . '/rag-admin-style.css');
    }
	
	//Register front-end styles and scripts
 static function rag_front_enqueue_admin() {
  wp_enqueue_script( 'rag-random', RAG_JS_URL . '/rag-random.js', array( 'jquery'), '', true );
  wp_enqueue_style('jquery');
  wp_enqueue_script('jquery-ui-core');
  wp_enqueue_style('rag', RAG_CSS_URL . '/rag.css');
    }
    
    
//Add dasboard menu
static function menu_page() {
			add_menu_page( __( 'Responsive Ads Generator Lite', 'rag_services' ), __( 'Responsive Ads Generator Lite', 'rag_services' ), 'administrator', 'rag_options',       array( __CLASS__, 'rag_page' ), '', plugins_url( 'images/icon.png' ),5);
    	
    	// Add a submenu to the Support Dock menu:
    add_submenu_page('rag_options', __( 'Instructions', 'rag_services' ), __( 'Instructions', 'rag_services' ), 'administrator', 'rag_instruct', array(__CLASS__, 'instruct_page'));
    
   
		}



		/**
		 * Include ad generator page
		 *
		 * @since 0.1
		 * @global $wp_version
		 */
		static function rag_page() {
			global $wp_version;

			require 'rag-options.php';
		}
		

                 /**
		 * Include instructions page
		 *
		 * @since 0.1
		 * @global $wp_version
		 */
		static function instruct_page() {
			global $wp_version;

			require 'rag-instruct.php';
		}

}

  }


RAG_Services::init();