<?php
/*
@package Woolston Web Design Developer Plugin
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

function op_plugin_activate() {
  
    if ( !is_admin() ) {
        return;
    }

    $default_options = array(
        'stop' => false,
        'pop_interval_minutes' => 1,
        'sale_message' => 'Buy now and get a great deal too.',
        'excluded_categories' => Array()
    );
    
    // $op_options = get_option('op_plugin');
    // $new_options = $default_options + (is_array($op_options) ? $op_options : array());
    update_option('op-plugin', $default_options);
    flush_rewrite_rules();
    
    // if (!get_option('op-plugin')) {
    //     update_option('op-plugin', $defaultOptions);
    // }
}

function op_plugin_deactivate() {
  
    if ( !is_admin() || !get_option( 'op-plugin' ) ) {
        return;
    }

    delete_option('op-plugin');
    flush_rewrite_rules();

}
