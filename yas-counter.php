<?php 
    /*
    * Plugin Name:       Yas Counter Plugin
    * Plugin URI:        https://github.com/mahedi007/Yas-Counter-Plugin
    * Description:       Enhance your Elementor-powered website with stunning custom counter designs using YAS Counter Design Addon.
    * Version:           1.0.0
    * Requires at least: 5.2
    * Requires PHP:      7.2
    * Author:            Mahedi Hasan
    * Author URI:        https://mahedi.whizbd.com/
    * License:           GPL v2 or later
    * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
    * Text Domain:       yashf-counter-plugin
    */
    if( ! defined ('ABSPATH') ) {
        exit;
    }
    /**
     * Widget loader
     */

     require plugin_dir_path(__FILE__).'widgets-loader.php';