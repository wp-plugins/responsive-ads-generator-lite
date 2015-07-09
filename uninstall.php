<?php
if ( !defined('WP_UNINSTALL_PLUGIN') ) {
    exit();
}
delete_option('rag_options');
global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}rag_headers");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}rag_records");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}rag_settings");
?>
