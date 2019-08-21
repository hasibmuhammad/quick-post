<?php
/*
Plugin Name: Quick Post
PLugin URI: https://github.com/hasibmuhammad/quick-post
Description: Creates a form to make a immediate post without the wordpress admin panel. Just use this shortcode anywhere<code>[qp_quick_post]</code> and create post!
Version: 1.0
Author: Hasib Muhammad
Author URI: https://github.comm/hasibmuhammad
License: GPLv2 or later
Text Domain: quick-post
Doomain Path: /languages/
 */

function qp_before_content()
{
    ?>
    <div class="admin-quick-add">
    <h3><?php _e("Quick Post", "quick-post")?></h3>
    <input id="title" type="text" name="title" placeholder="Title">
    <textarea id="content" name="content" placeholder="Content"></textarea>
    <button id="quick-add-button"><?php _e("Publish", "quick-post");?></button>
    </div>
    <?php
}
add_shortcode("qp_quick_post", "qp_before_content");

function qp_enqueue_asset()
{
    wp_enqueue_style("mystylesheet", plugin_dir_url(__FILE__) . "/assets/css/mystylesheet.css", null, true, 'all');
    wp_enqueue_script("mainjs", plugin_dir_url(__FILE__) . "/assets/js/main.js", array('jquery'), true, true);

    wp_localize_script("mainjs", "magical", array("nonce" => wp_create_nonce("wp_rest"), "url" => site_url()));
}
add_action("wp_enqueue_scripts", "qp_enqueue_asset");