<?php
/*
Plugin Name: University Management System
Plugin URI: http://journeybyweb.com
Description: this is only for University Management System.
Version: 0.1
Author: Yusuf Abedin
Author URI: http://yusuf.journeybyweb.com/
License: GPLv2 or later
Text Domain: UniversityManagement
Domain Path: /languages
*/

//Constant Define Public Directory URI
define("UMS_ASSETS_DIR", plugin_dir_url(__FILE__) . "assets/");
define("UMS_ASSETS_PUBLIC_DIR", plugin_dir_url(__FILE__) . "assets/public");
define("UMS_ASSETS_ADMIN_DIR", plugin_dir_url(__FILE__) . "assets/admin");
define("DBDEMO_DB_VERSION","1.0");
//Object Oriented Style Class Adds
class UniversityManagement{
    
    private $version; 
    
    //Object Oriented Style Construct
    function __construct() {

        //version
        $this->version = time();

      
        //Plugin Load Text Domain
        add_action("plugin_loaded", array( $this, "UMS_load_textdomain" ));
        //Enqueue CSS and JS File With Plugin Public
        add_action("wp_enqueue_scripts", array($this, "load_front_assets"));
        //Enqueue CSS and JS File With Plugi Admin
         add_action("admin_enqueue_scripts", array($this, "load_admin_assets"));
        //menu hook
        add_action('admin_menu', array($this,'test_plugin_setup_menu'));
        
      //enqueue css file
        // add_action( 'admin_enqueue_scripts', function ( $hook ) {
        //     //toplevel_page er sathe menu slug add korte hobe (like->toplevel_page_dbdemo)
        //     if ( 'toplevel_page_university-management-plugin' == $hook ) {
        //         wp_enqueue_style( 'dbdemo-style', plugin_dir_url(__FILE__) .'assets/admin/css/main.css' );
        //         wp_enqueue_style( 'boostrap', plugin_dir_url(__FILE__) .'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
        //     }  if ( 'toplevel_page_all_student' == $hook ) {
        //         wp_enqueue_style( 'boostrap', plugin_dir_url(__FILE__) .'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
        //     }
        // } );



    }
      


    //Enqueue CSS and JS File With Plugin Admin
    function load_admin_assets() {
           wp_enqueue_style( 'dbdemo-style', plugin_dir_url(__FILE__) .'assets/admin/css/materialize.min.css');
           wp_enqueue_style( 'dbdemo-style', plugin_dir_url(__FILE__) .'assets/admin/css/main.css');
            // wp_enqueue_style( 'bootstrap', plugin_dir_url(__FILE__) .'assets/admin/css/bootstrap.min.css');

    }

    //Enqueue CSS and JS File With Plugin Public
    function load_front_assets() {
        wp_enqueue_style( 'ums-main-css', UMS_ASSETS_PUBLIC_DIR."/css/main.css", null, $this->version );
        wp_enqueue_script( 'metarialjs', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js',null,array('jquery'),true);
    
        wp_enqueue_script( 'ums-main-js', UMS_ASSETS_PUBLIC_DIR."/js/main.js", array("jquery"), $this->version, true );
    } 

    //Plugin Load Text Domain
    function UMS_load_textdomain() {
        load_plugin_textdomain("UniversityManagement", false, dirname(__FILE__)."/languages" );
    }

    //Register Table/insert to table.php
    function dbdemo_init(){
       
            require 'insert/table.php';
            global $wpdb;
            foreach ($sqls as $sql) {
            require_once(ABSPATH."wp-admin/includes/upgrade.php");
            dbDelta($sql);
         }
        
      

    }


// Plugin Menu Add
function test_plugin_setup_menu(){
    add_menu_page( 
        'University Management Page', 
        'University Management', 
        'manage_options', 
        'university-management-plugin',
        'mainmenu',
        'dashicons-welcome-learn-more',30 
    );
    function mainmenu(){
   echo "string";
}

add_submenu_page('university-management-plugin',
    'University Management Page',
    'Add Students',
    'manage_options',
    'add_students',
    'test_init');
    // Plugin Menu Call Back Function
function test_init(){
    require plugin_dir_path(__FILE__).'/add_student.php';
}

add_submenu_page( 'university-management-plugin',
                'University Management Page',
                'All Students',
                'manage_options',
                'all_student',
                'all_student_sub_callback' );

function all_student_sub_callback() {
    // require_once 'all_student.php';
   require_once 'assets/admin/all_student.php';
}
   
}
// add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '' )


 

}
$init = new UniversityManagement();
$init->dbdemo_init();





