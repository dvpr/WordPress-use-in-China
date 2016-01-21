<?php
/*
Plugin Name: WordPress use in CHina
Plugin URI: http://dvpr.me/assets/wordpress
Description: WordPress use in CHina
Version: 0.1
Author: AppleStar
Author URI: http://dvpr.me/assets/wordpress
 */

//清理google字体
function applestar_cleangooglefonts_callback($buffer) {
  $pattern = '/<link(.*)fonts.googleapis.com(.*)\/>/i';
  $replacement = '';
  return preg_replace($pattern, $replacement, $buffer);
}
function applestar_cleangooglefonts_buffer_start() {
  ob_start("applestar_cleangooglefonts_callback");
}
function applestar_cleangooglefonts_buffer_end() {
  ob_end_flush();
}
add_action('init', 'applestar_cleangooglefonts_buffer_start');
add_action('shutdown', 'applestar_cleangooglefonts_buffer_end');

//禁用gavatar
update_option('show_avatars', '');