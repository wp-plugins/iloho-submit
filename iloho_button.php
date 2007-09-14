<?php
/*
Plugin Name: iloho submit
Plugin URI: http://www.iloho.com
Description: Add a button to your blog to submit your article directly to iloho.com for posting. iloho.com is the first and most established travel focused bookmarking site on the web, this plugin is a must for any recreational blogger.
Author: http://www.iloho.com
Version: 0.1
Author URI: http://www.iloho.com/
*/

# initialize button type
$iloho_icon = get_option('iloho_button_type');
if(!$iloho_icon){$iloho_icon = 'big';}

# add option menu
function iloho_button_admin()
{
    if (function_exists('add_options_page'))
	{
		add_options_page('iloho', 'iloho', 'manage_options', 'iloho_button/iloho_button_options.php');
    }
}

# post page button
function iloho_button_display($content='')
{
	global $iloho_icon;
	return $content.'<p><script type="text/javascript">iloho_url="'.get_permalink().'";iloho_title="'.get_the_title().'";iloho_icon="'.$iloho_icon.'";</script><script src="http://www.iloho.com/tools/iloho_it.js" type="text/javascript"></script></p>';
}

# add mudules
add_action('admin_menu', 'iloho_button_admin');
add_filter('the_content', 'iloho_button_display');
?>