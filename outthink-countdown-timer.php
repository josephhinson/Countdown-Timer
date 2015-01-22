<?php
/*
Plugin Name: Out:think Countdown Timer
Plugin URI: http://outthinkgroup.com/plugins/countdown-timer
Description: This plugin is a simple implementation of the javascript countdown timer. Implement this by using a shortcode [countdown-timer].
Author: Joseph Hinson
Version: 1.0
Author URI: http://outthinkgroup.com/plugins/countdown-timer
*/

// Defining the constant OT_COUNTDOWN_DIR so I can use it later
define('OT_COUNTDOWN_DIR', plugin_dir_path( __FILE__ ));
define('OT_COUNTDOWN_URL', plugin_dir_url( __FILE__ ));

// include the init file so I can spin up whatever I need.
require_once OT_COUNTDOWN_DIR .'/lib/init.php';