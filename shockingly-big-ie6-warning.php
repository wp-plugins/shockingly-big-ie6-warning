<?php
/*
Plugin Name: Shockingly Big IE6 Warning
Plugin URI: http://wordpress.org/extend/plugins/shockingly-big-ie6-warning/
Description: A shockingly BIG or SMALL warning message about the dangers of using IE6. Go to the <a href="options-general.php?page=shockingly-big-ie6-warning/shockingly-big-ie6-warning.php">plugin page</a> for options.
Author: matias s.
Version: 1.4.4
Author URI: http://www.incerteza.org/blog/
*/

/*
ie6 detection: part of the ie6 detection script was taken
from the http://www.stopie6.org/ detection script.
*/

/*
Copyright 2008  Matias Schertel  (email : matias@incerteza.org)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// Global Variables
$ie6w_dom = "shockingly-big-ie6-warning";
$ie6w_url = get_settings("siteurl");

// Activation hook
register_activation_hook( __FILE__, 'ie6w_activate' );
function ie6w_activate() {
	if (!(get_option("ie6w_setup")=="false")) {
		add_option("ie6w_setup", "false");
		// initialization
		add_option("ie6w_b_ff", "true");
		add_option("ie6w_b_opera", "true");
		add_option("ie6w_b_chrome", "true");
		add_option("ie6w_b_safari", "true");
		add_option("ie6w_b_ie7", "true");
		add_option("ie6w_type", "off");
		add_option("ie6w_jq", "true");
		add_option("ie6w_t1", "WARNING");
		add_option("ie6w_t2", "You are using Internet Explorer version 6.0 or lower. Due to security issues and lack of support for Web Standards it is highly recommended that you upgrade to a modern browser.");
		add_option("ie6w_t3", "After the update you can acess this site normally.");
	}
}

// Deactivation hook
register_deactivation_hook( __FILE__, 'ie6w_deactivate' );
function ie6w_deactivate() {
	delete_option("ie6w_setup");
	delete_option("ie6w_type");
	delete_option("ie6w_jq");
	delete_option("ie6w_t1");
	delete_option("ie6w_t2");
	delete_option("ie6w_t3");
	delete_option("ie6w_b_ff");
	delete_option("ie6w_b_opera");
	delete_option("ie6w_b_chrome");
	delete_option("ie6w_b_safari");
	delete_option("ie6w_b_ie7");
}

// Warning: TOP
function ie6w_top_head() {
	global $ie6w_url;
	if (get_option("ie6w_jq")=="true") { echo "<script type=\"text/javascript\" src=\"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/js/jquery.js\"></script>"; }
	echo "<script type=\"text/javascript\">
			var ie6w_url = \"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/\";
			var ie6w_t1=\"" . get_option("ie6w_t1") . "\";
			var ie6w_t2=\"" . get_option("ie6w_t2") . "\";
			var ie6w_ff=\"" . get_option("ie6w_b_ff") . "\";
			var ie6w_opera=\"" . get_option("ie6w_b_opera") . "\";
			var ie6w_chrome=\"" . get_option("ie6w_b_chrome") . "\";
			var ie6w_safari=\"" . get_option("ie6w_b_safari") . "\";
			var ie6w_ie7=\"" . get_option("ie6w_b_ie7") . "\";
			</script>";
	echo "<script type=\"text/javascript\" src=\"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/js/ie6w.top.js\"></script>";
}

// Warning: CENTER
function ie6w_center_head() {
	global $ie6w_url;
	if (get_option("ie6w_jq")=="true") { echo "<script type=\"text/javascript\" src=\"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/js/jquery.js\"></script>"; }
	echo "<script type=\"text/javascript\">
			var ie6w_url = \"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/\";
			var ie6w_t1=\"" . get_option("ie6w_t1") . "\";
			var ie6w_t2=\"" . get_option("ie6w_t2") . "\";
			var ie6w_t3=\"" . get_option("ie6w_t3") . "\";
			var ie6w_ff=\"" . get_option("ie6w_b_ff") . "\";
			var ie6w_opera=\"" . get_option("ie6w_b_opera") . "\";
			var ie6w_chrome=\"" . get_option("ie6w_b_chrome") . "\";
			var ie6w_safari=\"" . get_option("ie6w_b_safari") . "\";
			var ie6w_ie7=\"" . get_option("ie6w_b_ie7") . "\";
			</script>";
	echo "<script type=\"text/javascript\" src=\"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/js/ie6w.center.js\"></script>";
}

// Warning: TEST
function ie6w_test() {
	global $ie6w_url, $ie6w_dom;
	$ie6w_t4 = __('<a href=\"http://wordpress.org/extend/plugins/shockingly-big-ie6-warning/\" target=\"_blank\">Shockingly Big IE6 Warning</a> (<em>test mode</em>): If the <strong>jQuery</strong> option is activated in the plugin option page, try deactivating it, and if the message persists you dont need to use the provided <strong>jQuery</strong>.',$ie6w_dom);
	if (get_option("ie6w_jq")=="true") { echo "<script type=\"text/javascript\" src=\"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/js/jquery.js\"></script>"; }
	echo "<script type=\"text/javascript\">
			var ie6w_t4=\"" . $ie6w_t4 . "\";
			</script>";
	echo "<script type=\"text/javascript\" src=\"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/js/ie6w.test.js\"></script>";
}

// Warning: CRASH
function ie6w_crash() {
	echo "<style>*{position:relative}</style><table><input></table>
	<STYLE>@;/*";
}

// Head hook
add_action("wp_head", "ie6w_warning");
function ie6w_warning() {
	if (get_option("ie6w_type")=="small") {
		ie6w_top_head();
	} else if (get_option("ie6w_type")=="big") {
		ie6w_center_head();
	} else if (get_option("ie6w_type")=="crash") {
		ie6w_crash();
	} else if (get_option("ie6w_type")=="test") {
		ie6w_test();
	}
}

// Initialization
if ( is_admin() ) { add_action("init", "ie6w_init"); }
function ie6w_init() {
	global $ie6w_dom;
	load_plugin_textdomain($ie6w_dom,"/wp-content/plugins/shockingly-big-ie6-warning/lang/");
}

// Option page
add_filter( 'plugin_action_links', 'ie6w_plugin_actions', 10, 2 );
function ie6w_plugin_actions($links, $file){
	static $this_plugin;
 	if( !$this_plugin ) $this_plugin = plugin_basename(__FILE__);
 	if( $file == $this_plugin ){
		$settings_link = '<a href="options-general.php?page=shockingly-big-ie6-warning/shockingly-big-ie6-warning.php">' . __('Settings') . '</a>';
		//$links = array_merge( array($settings_link), $links); // before other links
		$links[1] = $links[0];
		$links[0] = $settings_link;
	}
	return $links;
}

if ( is_admin() ) { add_action("admin_menu", "ie6w_menu"); }
function ie6w_menu() {
	add_options_page(__("Shockingly Big IE6 Warning Options", $ie6w_dom), __("S. Big IE6 Warning", $ie6w_dom), 8, __FILE__, "ie6w_options");
}

function ie6w_options() {
global $ie6w_dom;
$ie6w_plug_name = "Shockingly Big IE6 Warning";
$ie6w_plug_ver = "1.4.4";
$ie6w_plug_url = "http://wordpress.org/extend/plugins/shockingly-big-ie6-warning/";
	if (isset($_POST['update_options'])) {
		update_option("ie6w_type", $_POST["ie6w_form_type_opt"]);
		update_option("ie6w_jq", $_POST["ie6w_form_jq_opt"]);
		if ($_POST["ie6w_form_t1_opt"] != "") { update_option("ie6w_t1", $_POST["ie6w_form_t1_opt"]); }
		if ($_POST["ie6w_form_t2_opt"] != "") { update_option("ie6w_t2", $_POST["ie6w_form_t2_opt"]); }
		if ($_POST["ie6w_form_t3_opt"] != "") { update_option("ie6w_t3", $_POST["ie6w_form_t3_opt"]); }
		update_option("ie6w_b_ff", $_POST["ie6w_form_ff_opt"]);
		update_option("ie6w_b_opera", $_POST["ie6w_form_opera_opt"]);
		update_option("ie6w_b_chrome", $_POST["ie6w_form_chrome_opt"]);
		update_option("ie6w_b_safari", $_POST["ie6w_form_safari_opt"]);
		update_option("ie6w_b_ie7", $_POST["ie6w_form_ie7_opt"]);
		echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __("Options updated.", $ie6w_dom) . "</strong></p></div>";
    }
	if (isset($_POST['reset_options'])) {
		update_option("ie6w_t1", "WARNING");
		update_option("ie6w_t2", "You are using Internet Explorer version 6.0 or lower. Due to security issues and lack of support for Web Standards it is highly recommended that you upgrade to a modern browser.");
		update_option("ie6w_t3", "After the update you can acess this site normally.");
		echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __("Default text loaded.", $ie6w_dom) . "</strong></p></div>";
    } 
    ?>
	<div class="wrap">
	<h2><?php echo __("Shockingly Big IE6 Warning Options", $ie6w_dom); ?></h2>
	<h2><?php echo __("Settings", $ie6w_dom); ?></h2>
	<form method="post" name="options" target="_self">
    <table cellspacing="0" id="inactive-plugins-table" class="widefat">
      <thead><tr>
        <th width="125"><?php echo __("Setting", $ie6w_dom); ?></th>
        <th>&nbsp;</th>
        <th><?php echo __("Description", $ie6w_dom); ?></th>
      </tr></thead>
      <tr>
        <td width="125"><?php echo __("Warning type", $ie6w_dom); ?></td>
        <td><select name="ie6w_form_type_opt" style="width: 100px">
        		<option value="off"<?php if (get_option("ie6w_type") == "off") echo " selected=\"selected\"";?> /><?php echo __("Off", $ie6w_dom); ?></option>
        		<option value="test"<?php if (get_option("ie6w_type") == "test") echo " selected=\"selected\"";?> /><?php echo __("Test", $ie6w_dom); ?></option>
                <option value="small"<?php if (get_option("ie6w_type") == "small") echo " selected=\"selected\"";?> /><?php echo __("Small", $ie6w_dom); ?></option>
                <option value="big"<?php if (get_option("ie6w_type") == "big") echo " selected=\"selected\"";?> /><?php echo __("Big", $ie6w_dom); ?></option>
                <option value="crash"<?php if (get_option("ie6w_type") == "crash") echo " selected=\"selected\"";?> /><?php echo __("Crash", $ie6w_dom); ?></option></select></td>
        <td><?php echo __("The type of warning that will be showed. <strong>Small</strong>, the discreet top bar. <strong>Big</strong>, the full screen one. <strong>Crash</strong>, the mean option. <strong>Test</strong>, the test mode, where a warning test message will appear in any browser", $ie6w_dom); ?></td>
      </tr>
      <tr>
        <td width="125"><?php echo __("Use provided jQuery", $ie6w_dom); ?></td>
        <td><select name="ie6w_form_jq_opt" style="width: 100px">
                <option value="true"<?php if (get_option("ie6w_jq") == "true") echo " selected=\"selected\"";?> /><?php echo __("Yes", $ie6w_dom); ?></option>
                <option value="false"<?php if (get_option("ie6w_jq") == "false") echo " selected=\"selected\"";?> /><?php echo __("No", $ie6w_dom); ?></option></select></td>
        <td><?php echo __("Many themes (like <a href=\"http://getk2.com/\" target=\"_blank\" rel=\"nofollow\">K2</a> and similar) already come with <a href=\"http://jquery.com/\" target=\"_blank\" rel=\"nofollow\">jQuery</a>, so you dont need to use the jQuery provided with the plugin, but if the warning is not showing select <strong>Yes</strong> and it should show.", $ie6w_dom); ?></td>
      </tr>
      <thead><tr>
        <th>Browsers</th>
        <th>&nbsp;</th>
        <th><?php echo __("Description", $ie6w_dom); ?></th>
      </tr></thead>
      <tr>
        <td>Mozilla Firefox</td>
        <td><select name="ie6w_form_ff_opt" style="width: 100px">
                <option value="true"<?php if (get_option("ie6w_b_ff") == "true") echo " selected=\"selected\"";?> /><?php echo __("Yes", $ie6w_dom); ?></option>
                <option value="false"<?php if (get_option("ie6w_b_ff") == "false") echo " selected=\"selected\"";?> /><?php echo __("No", $ie6w_dom); ?></option></select></td>
        <td><?php echo __("Shows Mozilla Firefox on the browser suggestion.", $ie6w_dom); ?></td>
      </tr>
      <tr>
        <td>Opera</td>
        <td><select name="ie6w_form_opera_opt" style="width: 100px">
                <option value="true"<?php if (get_option("ie6w_b_opera") == "true") echo " selected=\"selected\"";?> /><?php echo __("Yes", $ie6w_dom); ?></option>
                <option value="false"<?php if (get_option("ie6w_b_opera") == "false") echo " selected=\"selected\"";?> /><?php echo __("No", $ie6w_dom); ?></option></select></td>
        <td><?php echo __("Shows Opera on the browser suggestion.", $ie6w_dom); ?></td>
      </tr>
      <tr>
        <td>Google Chrome</td>
        <td><select name="ie6w_form_chrome_opt" style="width: 100px">
                <option value="true"<?php if (get_option("ie6w_b_chrome") == "true") echo " selected=\"selected\"";?> /><?php echo __("Yes", $ie6w_dom); ?></option>
                <option value="false"<?php if (get_option("ie6w_b_chrome") == "false") echo " selected=\"selected\"";?> /><?php echo __("No", $ie6w_dom); ?></option></select></td>
        <td><?php echo __("Shows Google Chorme on the browser suggestion.", $ie6w_dom); ?></td>
      </tr>
      <tr>
        <td>Apple Safari</td>
        <td><select name="ie6w_form_safari_opt" style="width: 100px">
                <option value="true"<?php if (get_option("ie6w_b_safari") == "true") echo " selected=\"selected\"";?> /><?php echo __("Yes", $ie6w_dom); ?></option>
                <option value="false"<?php if (get_option("ie6w_b_safari") == "false") echo " selected=\"selected\"";?> /><?php echo __("No", $ie6w_dom); ?></option></select></td>
        <td><?php echo __("Shows Apple Safari on the browser suggestion.", $ie6w_dom); ?></td>
      </tr>
      <tr>
        <td>Internet Explorer 7</td>
        <td><select name="ie6w_form_ie7_opt" style="width: 100px">
                <option value="true"<?php if (get_option("ie6w_b_ie7") == "true") echo " selected=\"selected\"";?> /><?php echo __("Yes", $ie6w_dom); ?></option>
                <option value="false"<?php if (get_option("ie6w_b_ie7") == "false") echo " selected=\"selected\"";?> /><?php echo __("No", $ie6w_dom); ?></option></select></td>
        <td><?php echo __("Shows Internet Explorer 7 on the browser suggestion.", $ie6w_dom); ?></td>
      </tr>
    </table>
    <h2><?php echo __("Warning", $ie6w_dom); ?></h2>
	<table cellspacing="0" id="inactive-plugins-table" class="widefat">
		<thead><tr>
			<th width="125"><?php echo __("Field", $ie6w_dom); ?></th>
		  <th><?php echo __("Text", $ie6w_dom); ?></th>
		</tr></thead>
		<tr>
			<td width="125"><?php echo __("Title", $ie6w_dom); ?></td>
		  <td><input type="text" name="ie6w_form_t1_opt" style="width:100%;" value="<?php echo get_option("ie6w_t1") ?>"/></td>
		</tr>
		<tr>
			<td width="125"><?php echo __("Text", $ie6w_dom); ?></td>
			<td><textarea name="ie6w_form_t2_opt" rows="5" style="width:100%;"><?php echo get_option("ie6w_t2") ?></textarea></td>
		</tr>
		<tr>
			<td width="125"><?php echo __("Observation", $ie6w_dom); ?></td>
		  <td><input type="text" name="ie6w_form_t3_opt" style="width:100%;" value="<?php echo get_option("ie6w_t3") ?>"/></td>
		</tr>
	</table>
	<p class="submit"><input type="submit" name="update_options" value="<?php echo __("Update", $ie6w_dom); ?>"/> <input type="submit" name="reset_options" value="<?php echo __("Default text", $ie6w_dom); ?>"/></p>
	</form>
	<p><?php echo __("<strong>Note</strong>: i'm still learning PHP & Wordpress coding and im using this plugin to study, so if you have any idea or any kind of suggestion please contact me.", $ie6w_dom); ?></p>
	<p><?php echo __("<a href=\"" . $ie6w_plug_url . "\">" . $ie6w_plug_name . " v" . $ie6w_plug_ver . "</a> by <a href=\"mailto:matias@incerteza.org\">matias s.</a> at <a href=\"http://www.incerteza.org/blog/\" target=\"_blank\" rel=\"nofollow\">incerteza.org</a>",$favi_dom); ?></p>
	</div>
<?php }


?>