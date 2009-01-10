<?php
/*
Plugin Name: Shockingly Big IE6 Warning
Plugin URI: http://wordpress.org/extend/plugins/shockingly-big-ie6-warning/
Description: A shockingly BIG or SMALL warning message about the dangers of using IE6. Go to the <a href="options-general.php?page=shockingly-big-ie6-warning/shockingly-big-ie6-warning.php">plugin page</a> for options.
Author: matias s.
Version: 0.1
Author URI: http://www.incerteza.org/blog/
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
// VARIAVEIS GLOBAIS
$ie6w_dom = "shockingly-big-ie6-warning";
$ie6w_url = get_settings("siteurl");

// ATIVAÇÃO DO PLUGIN
register_activation_hook( __FILE__, 'ie6w_activate' );
function ie6w_activate() {
	if (!(get_option("ie6w_setup")=="false")) {
		add_option("ie6w_type", "small");
		add_option("ie6w_jq", "true");
		add_option("ie6w_setup", "false");
	}
}

// DESATIVAÇÃO DO PLUGIN
register_deactivation_hook( __FILE__, 'ie6w_deactivate' );
function ie6w_deactivate() {
	delete_option("ie6w_type");
	delete_option("ie6w_jq");
	delete_option("ie6w_setup");
}

// AVISO TOPO
function ie6w_top_head() {
	global $ie6w_dom, $ie6w_url;
	if (get_option("ie6w_jq")=="true") { echo "<script type=\"text/javascript\" src=\"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/js/jquery.js\"></script>"; }
	echo "<script type=\"text/javascript\">
			var ie6w_url = \"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/\";
			var ie6w_t1=\"" . __("WARNING", $ie6w_dom) . "\";
			var ie6w_t2=\"" . __("You are using Internet Explorer version 6.0 or lower, due to security issues and lack of support to Web Standards is highly recomended that you upgrade to a modern browser.", $ie6w_dom) . "\";
			</script>";
	echo "<script type=\"text/javascript\" src=\"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/js/ie6w.top.js\"></script>";
}

// AVISO MEIO
function ie6w_center_head() {
	global $ie6w_dom, $ie6w_url;
	if (get_option("ie6w_jq")=="true") { echo "<script type=\"text/javascript\" src=\"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/js/jquery.js\"></script>"; }
	echo "<script type=\"text/javascript\">
			var ie6w_url = \"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/\";
			var ie6w_t1=\"" . __("WARNING", $ie6w_dom) . "\";
			var ie6w_t2=\"" . __("You are using Internet Explorer version 6.0 or lower, due to security issues and lack of support to Web Standards is highly recomended that you upgrade to a modern browser.", $ie6w_dom) . "\";
			var ie6w_t3=\"" . __("After the update you can acess this site normally.", $ie6w_dom) . "\";
			</script>";
	echo "<script type=\"text/javascript\" src=\"" . $ie6w_url . "/wp-content/plugins/shockingly-big-ie6-warning/js/ie6w.center.js\"></script>";
}

// HEAD HOOK
add_action("wp_head", "ie6w_warning");
function ie6w_warning() {
	if (get_option("ie6w_type")=="small") {
		ie6w_top_head();
	} else if (get_option("ie6w_type")=="big") {
		ie6w_center_head();
	}
}

// INICIALIZACAO
add_action("init", "ie6w_init");
function ie6w_init() {
	global $ie6w_dom;
	load_plugin_textdomain($ie6w_dom,"/wp-content/plugins/shockingly-big-ie6-warning/");
}

// PAGINA/MENU DE OPCAO
add_action("admin_menu", "ie6w_menu");
function ie6w_menu() {
	add_options_page(__("Shockingly Big IE6 Warning Options", $ie6w_dom), __("Shockingly Big IE6 Warning", $ie6w_dom), 8, __FILE__, "ie6w_options");
}

function ie6w_options() {
	global $ie6w_dom;
	if (isset($_POST['update_options'])) {
		$ie6w_type_val = $_POST["ie6w_form_type_opt"];
		$ie6w_jq_val = $_POST["ie6w_form_jq_opt"];
		update_option("ie6w_type", $ie6w_type_val);
		update_option("ie6w_jq", $ie6w_jq_val);
        echo "<div id=\"message\" class=\"updated fade\"><p><strong>" . __("Shockingly Big IE6 Warning options updated.", $ie6w_dom) . "</strong></p></div>";
    } else {
		$ie6w_type_val = get_option("ie6w_type");
		$ie6w_jq_val = get_option("ie6w_jq");
	}
    ?>
	<div class="wrap">
	<h2><?php echo __("Shockingly Big IE6 Warning Options", $ie6w_dom); ?></h2>
	<h3><?php echo __("Settings", $ie6w_dom); ?></h3>
	<form method="post" name="options" target="_self">
	<p><label for="name" style="width: 200px;float: left;text-align: left;margin-left: 10px"><?php echo __("Warning type", $ie6w_dom); ?></label><select name="ie6w_form_type_opt" style="width: 100px"><option value="small"<?php if ($ie6w_type_val == "small") echo " selected=\"selected\"";?> /><?php echo __("Small", $ie6w_dom); ?></option><option value="big"<?php if ($ie6w_type_val == "big") echo " selected=\"selected\"";?> /><?php echo __("Big", $ie6w_dom); ?></option></select></p>
	<p><label for="name"style="width: 200px;float: left;text-align: left;margin-left: 10px"><?php echo __("Use provided jQuery", $ie6w_dom); ?></label><select name="ie6w_form_jq_opt" style="width: 100px"><option value="true"<?php if ($ie6w_jq_val == "true") echo " selected=\"selected\"";?> /><?php echo __("Yes", $ie6w_dom); ?></option><option value="false"<?php if ($ie6w_jq_val == "false") echo " selected=\"selected\"";?> /><?php echo __("No", $ie6w_dom); ?></option></select></p>
	<p class="submit"><input type="submit" name="update_options" value="<?php echo __("Update", $ie6w_dom); ?>"/></p>
	</form>
	<p><?php echo __("<strong>Attention</strong>: many themes (like <a href=\"http://getk2.com/\" target=\"_blank\" rel=\"nofollow\">K2</a> and similar) already come with <a href=\"http://jquery.com/\" target=\"_blank\" rel=\"nofollow\">jQuery</a>, so you dont need to use the jQuery provided with the plugin, but if the warning is not showing select <strong>Yes</strong> and it should show.", $ie6w_dom); ?></p>
	<p><?php echo __("<strong>Note</strong>: i'm still learning php & wordpress coding and im using this plugin to study, so if you have any ideia or any kind of suggestion or critic please contact me.", $ie6w_dom); ?></p>
	<p><?php echo __("by <a href=\"mailto:matias@incerteza.org\">matias s.</a> at <a href=\"http://www.incerteza.org/blog/\" target=\"_blank\" rel=\"nofollow\">incerteza.org</a>", $ie6w_dom); ?></p>
	</div>
<?php } ?>