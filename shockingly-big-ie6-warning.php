<?php
/*
Plugin Name: Shockingly Big IE6 Warning
Plugin URI: http://www.incerteza.org/blog/projetos/shockingly-big-ie6-warning/
Description: A shockingly BIG or SMALL warning message about the dangers of using IE6.
Author: matias s.
Version: 1.4.8
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
// Global Variables
$ie6w_dom = "shockingly-big-ie6-warning";
$ie6w_plug = get_settings("siteurl") . "/wp-content/plugins/shockingly-big-ie6-warning/";

// ACTIVATION
register_activation_hook( __FILE__, 'ie6w_activate' );
function ie6w_activate() {
	if (!(get_option('ie6w_setup')=='false')) {
		delete_option('ie6w_setup');
		delete_option('ie6w_type');
		delete_option('ie6w_jq');
		delete_option('ie6w_t1');
		delete_option('ie6w_t2');
		delete_option('ie6w_t3');
		delete_option('ie6w_b_ff');
		delete_option('ie6w_b_opera');
		delete_option('ie6w_b_chrome');
		delete_option('ie6w_b_safari');
		delete_option('ie6w_b_ie7');
		add_option('ie6w_setup', 'false');
		$options = array(
			'type' => 'top',
			'test' => 'false',
			'texts' => array(
				't1' => 'WARNING',
				't2' => 'You are using Internet Explorer version 6.0 or lower. Due to security issues and lack of support for Web Standards it is highly recommended that you upgrade to a modern browser.',
				't3' => 'After the update you can acess this site normally.'
			),
			'browsers' => array(
				'firefox' => 'true',
				'opera' => 'true',
				'chrome' => 'true',
				'safari' => 'true',
				'ie' => 'true',
			),
			'browsersu' => array(
				'firefox' => 'http://www.getfirefox.net/',
				'opera' => 'http://www.opera.com/',
				'chrome' => 'http://www.google.com/chrome/',
				'safari' => 'http://www.apple.com/safari/',
				'ie' => 'http://www.microsoft.com/windows/ie/',
			)
		);
		add_option('ie6w_options', $options);
	}
}

// DEACTIVATION
register_deactivation_hook( __FILE__, 'ie6w_deactivate' );
function ie6w_deactivate() {
	delete_option('ie6w_setup');
	delete_option('ie6w_options');
}

// HEADERS
add_action('template_redirect', ie6w_jquery);
add_action('wp_head', ie6w_head);

function ie6w_jquery() {
	$opt = get_option('ie6w_options');
	if (!($opt['type'] == 'off' || $opt['type'] == 'crash')) {
		wp_enqueue_script('jquery');
	}
}

function ie6w_head() {
	$opt = get_option('ie6w_options');
	if ($opt['type'] == 'top') {
		ie6w_head_top();
	} else if ($opt['type'] == 'center') {
		ie6w_head_center();
	} else if ($opt['type'] == 'crash') {
		ie6w_head_crash();
	}
}

// TOP HEADER
function ie6w_head_top() {
	global $ie6w_plug;
	$opt = get_option('ie6w_options');
	//echo '<!--[if lte IE 6]>';
	echo '<script type="text/javascript">
		var ie6w_url = "' . $ie6w_plug . '";
		var ie6w_t1 = "' . $opt['texts']['t1'] . '";
		var ie6w_t2 = "' . $opt['texts']['t2'] . '";
		var ie6w_test = "' . $opt['test'] . '";
		var ie6w_firefox = "' . $opt['browsers']['firefox'] . '";
		var ie6w_opera = "' . $opt['browsers']['opera'] . '";
		var ie6w_chrome = "' . $opt['browsers']['chrome'] . '";
		var ie6w_safari = "' . $opt['browsers']['safari'] . '";
		var ie6w_ie = "' . $opt['browsers']['ie'] . '";
		var ie6w_firefoxu = "' . $opt['browsersu']['firefox'] . '";
		var ie6w_operau = "' . $opt['browsersu']['opera'] . '";
		var ie6w_chromeu = "' . $opt['browsersu']['chrome'] . '";
		var ie6w_safariu = "' . $opt['browsersu']['safari'] . '";
		var ie6w_ieu = "' . $opt['browsersu']['ie'] . '";
		</script>
		<script type="text/javascript" src="' . $ie6w_plug . 'js/ie6w_top.js"></script>';
	//echo '<![endif]-->';
}
// CENTER HEADER
function ie6w_head_center() {
	global $ie6w_plug;
	$opt = get_option('ie6w_options');
	//echo '<!--[if lte IE 6]>';
	echo '<script type="text/javascript">
		var ie6w_url = "' . $ie6w_plug . '";
		var ie6w_t1 = "' . $opt['texts']['t1'] . '";
		var ie6w_t2 = "' . $opt['texts']['t2'] . '";
		var ie6w_t3 = "' . $opt['texts']['t3'] . '";
		var ie6w_test = "' . $opt['test'] . '";
		var ie6w_firefox = "' . $opt['browsers']['firefox'] . '";
		var ie6w_opera = "' . $opt['browsers']['opera'] . '";
		var ie6w_chrome = "' . $opt['browsers']['chrome'] . '";
		var ie6w_safari = "' . $opt['browsers']['safari'] . '";
		var ie6w_ie = "' . $opt['browsers']['ie'] . '";
		var ie6w_firefoxu = "' . $opt['browsersu']['firefox'] . '";
		var ie6w_operau = "' . $opt['browsersu']['opera'] . '";
		var ie6w_chromeu = "' . $opt['browsersu']['chrome'] . '";
		var ie6w_safariu = "' . $opt['browsersu']['safari'] . '";
		var ie6w_ieu = "' . $opt['browsersu']['ie'] . '";
		</script>
		<script type="text/javascript" src="' . $ie6w_plug . 'js/ie6w_center.js"></script>';
	//echo '<![endif]-->';
}

// CRASH HEADER
function ie6w_head_crash() {
	echo '<!--[if IE]><style>*{position:relative}</style><table><input></table>
	<STYLE>@;/*<![endif]-->';
}

// INITIALIZATION
if ( is_admin() ) { add_action('init', 'ie6w_init'); }
function ie6w_init() {
	global $ie6w_dom;
	load_plugin_textdomain($ie6w_dom,'/wp-content/plugins/shockingly-big-ie6-warning/lang/');
}

// OPTION PAGE
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

if ( is_admin() ) { add_action('admin_menu', 'ie6w_menu'); }
function ie6w_menu() {
	add_options_page(__('Shockingly Big IE6 Warning Options', $ie6w_dom), __('S. Big IE6 Warning', $ie6w_dom), 8, __FILE__, 'ie6w_options');
}

function ie6w_options() {
global $ie6w_dom;
$plug_name = 'Shockingly Big IE6 Warning';
$plug_ver = '1.4.8';
$plug_site = 'http://www.incerteza.org/blog/projetos/shockingly-big-ie6-warning/';
$opt = get_option('ie6w_options');
	if (isset($_POST['update_options'])) {
		$opt['type'] = $_POST['ie6w_form_type'];
		$opt['test'] = $_POST['ie6w_form_test'];
		if ($_POST['ie6w_form_t1'] != "") { $opt['texts']['t1'] = $_POST['ie6w_form_t1']; }
		if ($_POST['ie6w_form_t2'] != "") { $opt['texts']['t2'] = $_POST['ie6w_form_t2']; }
		if ($_POST['ie6w_form_t3'] != "") { $opt['texts']['t3'] = $_POST['ie6w_form_t3']; }
		$opt['browsers']['firefox'] = $_POST['ie6w_form_firefox'];
		$opt['browsers']['opera'] = $_POST['ie6w_form_opera'];
		$opt['browsers']['chrome'] = $_POST['ie6w_form_chrome'];
		$opt['browsers']['safari'] = $_POST['ie6w_form_safari'];
		$opt['browsers']['ie'] = $_POST['ie6w_form_ie'];
		if ($_POST['ie6w_form_firefoxu'] != "") { $opt['browsersu']['firefox'] = $_POST['ie6w_form_firefoxu']; }
		if ($_POST['ie6w_form_operau'] != "") { $opt['browsersu']['opera'] = $_POST['ie6w_form_operau']; }
		if ($_POST['ie6w_form_chromeu'] != "") { $opt['browsersu']['chrome'] = $_POST['ie6w_form_chromeu']; }
		if ($_POST['ie6w_form_safariu'] != "") { $opt['browsersu']['safari'] = $_POST['ie6w_form_safariu']; }
		if ($_POST['ie6w_form_ieu'] != "") { $opt['browsersu']['ie'] = $_POST['ie6w_form_ieu']; }
		update_option("ie6w_options", $opt);
		echo '<div id="message" class="updated fade"><p><strong>' . __('Options updated.', $ie6w_dom) . '</strong></p></div>';
    }
	if (isset($_POST['reset_options'])) {
		$opt['type'] = 'top';
		$opt['test'] = 'false';
		$opt['browsers']['firefox'] = 'true';
		$opt['browsers']['opera'] = 'true';
		$opt['browsers']['chrome'] = 'true';
		$opt['browsers']['safari'] = 'true';
		$opt['browsers']['ie'] = 'true';
		$opt['browsersu']['firefox'] = 'http://www.getfirefox.net/';
		$opt['browsersu']['opera'] = 'http://www.opera.com/';
		$opt['browsersu']['chrome'] = 'http://www.google.com/chrome/';
		$opt['browsersu']['safari'] = 'http://www.apple.com/safari/';
		$opt['browsersu']['ie'] = 'http://www.microsoft.com/windows/ie/';
		$opt['texts']['t1'] = 'WARNING';
		$opt['texts']['t2'] = 'You are using Internet Explorer version 6.0 or lower. Due to security issues and lack of support for Web Standards it is highly recommended that you upgrade to a modern browser.';
		$opt['texts']['t3'] = 'After the update you can acess this site normally.';
		update_option("ie6w_options", $opt);
	}
    ?>
	<div class="wrap">
	<h2><?php echo __("Shockingly Big IE6 Warning Options", $ie6w_dom); ?></h2>
	<h2><?php echo __("Settings", $ie6w_dom); ?></h2>
	<form method="post" name="options" target="_self">
    <table width="100%" cellspacing="0" id="inactive-plugins-table" class="widefat">
      <thead><tr>
        <th width="125"><?php echo __('Setting', $ie6w_dom); ?></th>
        <th width="125">&nbsp;</th>
        <th><?php echo __('Description', $ie6w_dom); ?></th>
      </tr></thead>
      <tr>
        <td width="125"><?php echo __('Warning type', $ie6w_dom); ?></td>
        <td width="125"><select name="ie6w_form_type" style="width: 100px">
                    <option value="off" <?php if ($opt['type'] == 'off') echo 'selected="selected"'; ?> /><?php echo __('Off', $ie6w_dom); ?></option>
                    <option value="top" <?php if ($opt['type'] == 'top') echo 'selected="selected"'; ?> /><?php echo __('Top', $ie6w_dom); ?></option>
                    <option value="center" <?php if ($opt['type'] == 'center') echo 'selected="selected"'; ?> /><?php echo __('Center', $ie6w_dom); ?></option>
                    <option value="crash" <?php if ($opt['type'] == 'crash') echo 'selected="selected"'; ?> /><?php echo __('Crash', $ie6w_dom); ?></option>
                    </select></td>
        <td><?php echo __('The type of warning that will be showed. <strong>Top</strong>, the discreet top bar. <strong>Center</strong>, the full screen one. <strong>Crash</strong>, the mean option.', $ie6w_dom); ?></td>
      </tr>
      <tr>
        <td width="125"><?php echo __('Test mode', $ie6w_dom); ?></td>
        <td width="125"><select name="ie6w_form_test" style="width: 100px">
                    <option value="false" <?php if ($opt['test'] == 'false') echo 'selected="selected"'; ?> /><?php echo __('Off', $ie6w_dom); ?></option>
                    <option value="true" <?php if ($opt['test'] == 'true') echo 'selected="selected"'; ?> /><?php echo __('On', $ie6w_dom); ?></option>
                    </select></td>
        <td><?php echo __('Turn this <strong>On</strong> if you want to test the Warnings in any browser.', $ie6w_dom); ?></td>
      </tr>
      
      <thead><tr>
        <th width="125"><?php echo __('Browsers', $ie6w_dom); ?></th>
        <th width="125">&nbsp;</th>
        <th><?php echo __('URL', $ie6w_dom); ?></th>
      </tr></thead>
      <tr>
        <td width="125">Mozilla Firefox</td>
        <td width="125"><select name="ie6w_form_firefox" style="width: 100px">
                    <option value="true" <?php if ($opt['browsers']['firefox'] == 'true') echo 'selected="selected"'; ?> /><?php echo __('Show', $ie6w_dom); ?></option>
                    <option value="false" <?php if ($opt['browsers']['firefox'] == 'false') echo 'selected="selected"'; ?> /><?php echo __('Hide', $ie6w_dom); ?></option></select></td>
        <td><input type="text" name="ie6w_form_firefoxu" style="width:100%;" value="<?php echo $opt['browsersu']['firefox']; ?>"/></td>
      </tr>
      <tr>
        <td width="125">Opera</td>
        <td width="125"><select name="ie6w_form_opera" style="width: 100px">
                    <option value="true" <?php if ($opt['browsers']['opera'] == 'true') echo 'selected="selected"'; ?> /><?php echo __('Show', $ie6w_dom); ?></option>
                    <option value="false" <?php if ($opt['browsers']['opera'] == 'false') echo 'selected="selected"'; ?> /><?php echo __('Hide', $ie6w_dom); ?></option></select></td>
        <td><input type="text" name="ie6w_form_operau" style="width:100%;" value="<?php echo $opt['browsersu']['opera']; ?>"/></td>
      </tr>
      <tr>
        <td width="125">Google Chrome</td>
        <td width="125"><select name="ie6w_form_chrome" style="width: 100px">
                    <option value="true" <?php if ($opt['browsers']['chrome'] == 'true') echo 'selected="selected"'; ?> /><?php echo __('Show', $ie6w_dom); ?></option>
                    <option value="false" <?php if ($opt['browsers']['chrome'] == 'false') echo 'selected="selected"'; ?> /><?php echo __('Hide', $ie6w_dom); ?></option></select></td>
        <td><input type="text" name="ie6w_form_chromeu" style="width:100%;" value="<?php echo $opt['browsersu']['chrome']; ?>"/></td>
      </tr>
      <tr>
        <td>Apple Safari</td>
        <td><select name="ie6w_form_safari" style="width: 100px">
                    <option value="true" <?php if ($opt['browsers']['safari'] == 'true') echo 'selected="selected"'; ?> /><?php echo __('Show', $ie6w_dom); ?></option>
                    <option value="false" <?php if ($opt['browsers']['safari'] == 'false') echo 'selected="selected"'; ?> /><?php echo __('Hide', $ie6w_dom); ?></option></select></td>
        <td><input type="text" name="ie6w_form_safariu" style="width:100%;" value="<?php echo $opt['browsersu']['safari']; ?>"/></td>
      </tr>
      <tr>
        <td width="125">Internet Explorer</td>
        <td width="125"><select name="ie6w_form_ie" style="width: 100px">
                    <option value="true" <?php if ($opt['browsers']['ie'] == 'true') echo 'selected="selected"'; ?> /><?php echo __('Show', $ie6w_dom); ?></option>
                    <option value="false" <?php if ($opt['browsers']['ie'] == 'false') echo 'selected="selected"'; ?> /><?php echo __('Hide', $ie6w_dom); ?></option></select></td>
        <td><input type="text" name="ie6w_form_ieu" style="width:100%;" value="<?php echo $opt['browsersu']['ie']; ?>"/></td>
      </tr>
    </table>
	<h2><?php echo __('Warning', $ie6w_dom); ?></h2>
	<table width="100%" cellspacing="0" id="inactive-plugins-table" class="widefat">
      <thead><tr>
        <th width="125"><?php echo __('Field', $ie6w_dom); ?></th>
        <th><?php echo __('Text', $ie6w_dom); ?></th>
      </tr></thead>
      <tr>
        <td width="125"><?php echo __('Title', $ie6w_dom); ?></td>
        <td><input type="text" name="ie6w_form_t1" style="width:100%;" value="<?php echo $opt['texts']['t1']; ?>"/></td>
      </tr>
      <tr>
        <td width="125"><?php echo __('Text', $ie6w_dom); ?></td>
        <td><textarea name="ie6w_form_t2" rows="5" style="width:100%;"><?php echo $opt['texts']['t2']; ?></textarea></td>
      </tr>
      <tr>
        <td width="125"><?php echo __('Observation', $ie6w_dom); ?></td>
        <td><input type="text" name="ie6w_form_t3" style="width:100%;" value="<?php echo $opt['texts']['t3']; ?>"/></td>
      </tr>
    </table>
	<p class="submit"><input type="submit" name="update_options" value="<?php echo __('Update', $ie6w_dom); ?>"/> <input type="submit" name="reset_options" value="<?php echo __('Default options', $ie6w_dom); ?>"/></p>
	</form>
	<p><?php echo __('<strong>Note</strong>: im still learning PHP & Wordpress coding and im using this plugin to study, so if you have any idea or any kind of suggestion please contact me.', $ie6w_dom); ?></p>
	<p><?php echo __('<a href="' . $plug_site . '">' . $plug_name . ' v' . $plug_ver . '</a> by <a href="mailto:matias@incerteza.org">matias s.</a> at <a href="http://www.incerteza.org/blog/" target="_blank" rel="nofollow">incerteza.org</a>',$favi_dom); ?></p>
	</div>
<?php }
?>