<?php
/**
 * Plugin Name: WordPress 4.5 jQuery Fix
 * Plugin URI: http://projectsupremacy.com
 * Description: This plugin will fix a bug that occurs with the latest WordPress and jQuery.
 * Version: 1.0
 * Author: ProjectSupremacy (admin@projectsupremacy.com)
 * Author URI: http://projectsupremacy.com
 */

// Fix jQuery
if (get_option('jquery_fix_wp45') == false) {
    $broken_jquery = get_home_path() . 'wp-includes/js/jquery/jquery.js';
    $broken_jquery_backup = get_home_path() . 'wp-includes/js/jquery/jquery_backup.js';

    $working_jquery = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js';

    // backup broken jquery
    @file_put_contents($broken_jquery_backup, file_get_contents($broken_jquery));

    // fix jquery
    @file_put_contents($broken_jquery, file_get_contents($working_jquery));

    // all done
    update_option('jquery_fix_wp45', true);
}
