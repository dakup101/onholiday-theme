<?php
add_action("after_switch_theme", "ido_setup_db_table");

function ido_setup_db_table()
{
  global $wpdb;

  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE `{$wpdb->base_prefix}ido_booking` (
    systemLogin varchar(255) NOT NULL,
    systemPwd varchar(255) NOT NULL,
    systemClient varchar(255) NOT NULL,
    PRIMARY KEY  (systemLogin)
    ) $charset_collate;";

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

  dbDelta($sql);
}
