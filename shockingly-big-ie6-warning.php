<?php
/*
Plugin Name: Shockingly Big IE6 Warning
Plugin URI: http://www.incerteza.org/blog/projetos/shockingly-big-ie6-warning/
Description: A warning message about the dangers of using <a href="http://en.wikipedia.org/wiki/Internet_explorer_6" target="_blank">Internet Explorer 6</a>.
Author: matias s
Version: 1.5.6
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

// DEFAULT OPTIONS
function ie6w_default_opt() {
	$setup = array(
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
	return $setup;
}

// ACTIVATION
register_activation_hook(__FILE__, 'ie6w_activate');
function ie6w_activate() {
	$opt = get_option('ie6w_options');
	if (!is_array($opt)) {
		delete_option('ie6w_setup');	// OLD NORMAL OPTIONS
		delete_option('ie6w_type');		// OLD NORMAL OPTIONS
		delete_option('ie6w_jq');		// OLD NORMAL OPTIONS
		delete_option('ie6w_t1');		// OLD NORMAL OPTIONS
		delete_option('ie6w_t2');		// OLD NORMAL OPTIONS
		delete_option('ie6w_t3');		// OLD NORMAL OPTIONS
		delete_option('ie6w_b_ff');		// OLD NORMAL OPTIONS
		delete_option('ie6w_b_opera');	// OLD NORMAL OPTIONS
		delete_option('ie6w_b_chrome');	// OLD NORMAL OPTIONS
		delete_option('ie6w_b_safari');	// OLD NORMAL OPTIONS
		delete_option('ie6w_b_ie7');	// OLD NORMAL OPTIONS
		$options = ie6w_default_opt();
		add_option('ie6w_options', $options);
	} else {
		//update_option("ie6w_options", $options);
	}
}

// DEACTIVATION
register_deactivation_hook(__FILE__, 'ie6w_deactivate');
function ie6w_deactivate() {
	//delete_option('ie6w_options');
}

// HEADERS
add_action('template_redirect', ie6w_head);
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

// HEADER: TOP
function ie6w_head_top() {
	global $ie6w_plug;
	$opt = get_option('ie6w_options');
	echo '<!-- ie6w TOP ' . $opt['type'] . ' ' . $opt['test'] . ' -->';
	wp_enqueue_script('jquery');
	wp_enqueue_script('ie6w_head_top', $ie6w_plug . 'js/ie6w_top.js', array('jquery'));
	wp_localize_script('ie6w_head_top', 'ie6w', array(
		'url' => $ie6w_plug,
		'test' => $opt['test'],
		't1' => $opt['texts']['t1'],
		't2' => $opt['texts']['t2'],
		'firefox' => $opt['browsers']['firefox'],
		'opera' => $opt['browsers']['opera'],
		'chrome' => $opt['browsers']['chrome'],
		'safari' => $opt['browsers']['safari'],
		'ie' => $opt['browsers']['ie'],
		'firefoxu' => $opt['browsersu']['firefox'],
		'operau' => $opt['browsersu']['opera'],
		'chromeu' => $opt['browsersu']['chrome'],
		'safariu' => $opt['browsersu']['safari'],
		'ieu' => $opt['browsersu']['ie']
	));
}

// HEADER: CENTER
function ie6w_head_center() {
	global $ie6w_plug;
	$opt = get_option('ie6w_options');
	echo '<!-- ie6w CENTER ' . $opt['type'] . ' ' . $opt['test'] . ' -->';
	wp_enqueue_script('jquery');
	wp_enqueue_script('ie6w_head_center', $ie6w_plug . 'js/ie6w_center.js', array('jquery'));
	wp_localize_script('ie6w_head_center', 'ie6w', array(
		'url' => $ie6w_plug,
		'test' => $opt['test'],
		't1' => $opt['texts']['t1'],
		't2' => $opt['texts']['t2'],
		't3' => $opt['texts']['t3'],
		'firefox' => $opt['browsers']['firefox'],
		'opera' => $opt['browsers']['opera'],
		'chrome' => $opt['browsers']['chrome'],
		'safari' => $opt['browsers']['safari'],
		'ie' => $opt['browsers']['ie'],
		'firefoxu' => $opt['browsersu']['firefox'],
		'operau' => $opt['browsersu']['opera'],
		'chromeu' => $opt['browsersu']['chrome'],
		'safariu' => $opt['browsersu']['safari'],
		'ieu' => $opt['browsersu']['ie']
	));
}

// HEADER: CRASH
function ie6w_head_crash() {
	$opt = get_option('ie6w_options');
	echo '<!-- ie6w CRASH ' . $opt['type'] . ' ' . $opt['test'] . ' -->';
	echo '<!--[if lte IE 6]><style>*{position:relative}</style><table><input></table>
	<STYLE>@;/*<![endif]-->';
}

// INITIALIZATION - locales @ /lang/
if ( is_admin() ) { add_action('init', 'ie6w_init'); }
function ie6w_init() {
	global $ie6w_dom;
	load_plugin_textdomain($ie6w_dom, '/wp-content/plugins/shockingly-big-ie6-warning/lang/');
}

// SETTINGS link @ Plugin list page
if ( is_admin() ) { add_filter('plugin_action_links', 'ie6w_plugin_actions', 10, 2); }
function ie6w_plugin_actions($links, $file){
global $ie6w_dom;
	static $this_plugin;
 	if( !$this_plugin ) $this_plugin = plugin_basename(__FILE__);
 	if( $file == $this_plugin ){
		$settings_link = '<a href="options-general.php?page=shockingly-big-ie6-warning/shockingly-big-ie6-warning.php">' . __('Settings', $ie6w_dom) . '</a>';
		$links[1] = $links[0];
		$links[0] = $settings_link;
	}
	return $links;
}

// OPTIONS PAGE
if ( is_admin() ) { add_action('admin_menu', 'ie6w_menu'); }
function ie6w_menu() {
	add_options_page(__('Shockingly Big IE6 Warning Options', $ie6w_dom), __('S. Big IE6 Warning', $ie6w_dom), 8, __FILE__, 'ie6w_options');
}
function ie6w_options() {
global $ie6w_dom;
$opt = get_option('ie6w_options');
$plug_name = 'Shockingly Big IE6 Warning';
$plug_ver = '1.5.5';
$plug_site = 'http://www.incerteza.org/blog/projetos/shockingly-big-ie6-warning/';
	if ( isset($_POST['update_options']) ) {
		$opt['type'] = $_POST['ie6w_form_type'];
		$opt['test'] = $_POST['ie6w_form_test'];
		if ( $_POST['ie6w_form_t1'] != "" ) { $opt['texts']['t1'] = $_POST['ie6w_form_t1']; }
		if ( $_POST['ie6w_form_t2'] != "" ) { $opt['texts']['t2'] = $_POST['ie6w_form_t2']; }
		if ( $_POST['ie6w_form_t3'] != "" ) { $opt['texts']['t3'] = $_POST['ie6w_form_t3']; }
		$opt['browsers']['firefox'] = $_POST['ie6w_form_firefox'];
		$opt['browsers']['opera'] = $_POST['ie6w_form_opera'];
		$opt['browsers']['chrome'] = $_POST['ie6w_form_chrome'];
		$opt['browsers']['safari'] = $_POST['ie6w_form_safari'];
		$opt['browsers']['ie'] = $_POST['ie6w_form_ie'];
		if ( $_POST['ie6w_form_firefoxu'] != "" ) { $opt['browsersu']['firefox'] = $_POST['ie6w_form_firefoxu']; }
		if ( $_POST['ie6w_form_operau'] != "" ) { $opt['browsersu']['opera'] = $_POST['ie6w_form_operau']; }
		if ( $_POST['ie6w_form_chromeu'] != "" ) { $opt['browsersu']['chrome'] = $_POST['ie6w_form_chromeu']; }
		if ( $_POST['ie6w_form_safariu'] != "" ) { $opt['browsersu']['safari'] = $_POST['ie6w_form_safariu']; }
		if ( $_POST['ie6w_form_ieu'] != "" ) { $opt['browsersu']['ie'] = $_POST['ie6w_form_ieu']; }
		update_option("ie6w_options", $opt);
		echo '<div id="message" class="updated fade"><p><strong>' . __('Settings saved.', $ie6w_dom) . '</strong></p></div>';
    }
	if ( isset($_POST['reset_options']) ) {
		$opt = ie6w_default_opt();
		update_option("ie6w_options", $opt);
		echo '<div id="message" class="updated fade"><p><strong>' . __('Default options loaded.', $ie6w_dom) . '</strong></p></div>';
	}
    ?>
	<div class="wrap">
	<h2><?php echo __("Shockingly Big IE6 Warning Options", $ie6w_dom); ?></h2>
	<h2><?php echo __("Settings", $ie6w_dom); ?></h2>
	<form method="post" name="options" target="_self">
    <table width="100%" cellspacing="0" class="widefat">
      <thead><tr>
        <th width="125"><?php echo __('Settings', $ie6w_dom); ?></th>
        <th width="125">&nbsp;</th>
        <th><?php echo __('Description', $ie6w_dom); ?></th>
      </tr></thead>
      <tr>
        <td width="125"><?php echo __('Warning type', $ie6w_dom); ?></td>
        <td width="125"><select name="ie6w_form_type" style="width: 100px">
                    <option value="off" <?php if ( $opt['type'] == 'off' ) echo 'selected="selected"'; ?> /><?php echo __('Off', $ie6w_dom); ?></option>
                    <option value="top" <?php if ( $opt['type'] == 'top' ) echo 'selected="selected"'; ?> /><?php echo __('Top', $ie6w_dom); ?></option>
                    <option value="center" <?php if ( $opt['type'] == 'center' ) echo 'selected="selected"'; ?> /><?php echo __('Center', $ie6w_dom); ?></option>
                    <option value="crash" <?php if ( $opt['type'] == 'crash' ) echo 'selected="selected"'; ?> /><?php echo __('Crash', $ie6w_dom); ?></option>
                    </select></td>
        <td><?php echo __('The type of warning that will be showed. <strong>Top</strong>, the discreet top bar. <strong>Center</strong>, the full screen one. <strong>Crash</strong>, the mean option.', $ie6w_dom); ?></td>
      </tr>
      <tr>
        <td width="125"><?php echo __('Test mode', $ie6w_dom); ?></td>
        <td width="125"><select name="ie6w_form_test" style="width: 100px">
                    <option value="false" <?php if ( $opt['test'] == 'false' ) echo 'selected="selected"'; ?> /><?php echo __('Off', $ie6w_dom); ?></option>
                    <option value="true" <?php if ( $opt['test'] == 'true' ) echo 'selected="selected"'; ?> /><?php echo __('On', $ie6w_dom); ?></option>
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
                    <option value="true" <?php if ( $opt['browsers']['firefox'] == 'true' ) echo 'selected="selected"'; ?> /><?php echo __('Show', $ie6w_dom); ?></option>
                    <option value="false" <?php if ( $opt['browsers']['firefox'] == 'false' ) echo 'selected="selected"'; ?> /><?php echo __('Hide', $ie6w_dom); ?></option></select></td>
        <td><input type="text" name="ie6w_form_firefoxu" style="width:100%;" class="widefat" value="<?php echo $opt['browsersu']['firefox']; ?>" /></td>
      </tr>
      <tr>
        <td width="125">Opera</td>
        <td width="125"><select name="ie6w_form_opera" style="width: 100px">
                    <option value="true" <?php if ( $opt['browsers']['opera'] == 'true' ) echo 'selected="selected"'; ?> /><?php echo __('Show', $ie6w_dom); ?></option>
                    <option value="false" <?php if ( $opt['browsers']['opera'] == 'false' ) echo 'selected="selected"'; ?> /><?php echo __('Hide', $ie6w_dom); ?></option></select></td>
        <td><input type="text" name="ie6w_form_operau" style="width:100%;" class="widefat" value="<?php echo $opt['browsersu']['opera']; ?>" /></td>
      </tr>
      <tr>
        <td width="125">Google Chrome</td>
        <td width="125"><select name="ie6w_form_chrome" style="width: 100px">
                    <option value="true" <?php if ( $opt['browsers']['chrome'] == 'true' ) echo 'selected="selected"'; ?> /><?php echo __('Show', $ie6w_dom); ?></option>
                    <option value="false" <?php if ( $opt['browsers']['chrome'] == 'false' ) echo 'selected="selected"'; ?> /><?php echo __('Hide', $ie6w_dom); ?></option></select></td>
        <td><input type="text" name="ie6w_form_chromeu" style="width:100%;" class="widefat" value="<?php echo $opt['browsersu']['chrome']; ?>" /></td>
      </tr>
      <tr>
        <td>Apple Safari</td>
        <td><select name="ie6w_form_safari" style="width: 100px">
                    <option value="true" <?php if ( $opt['browsers']['safari'] == 'true' ) echo 'selected="selected"'; ?> /><?php echo __('Show', $ie6w_dom); ?></option>
                    <option value="false" <?php if ( $opt['browsers']['safari'] == 'false' ) echo 'selected="selected"'; ?> /><?php echo __('Hide', $ie6w_dom); ?></option></select></td>
        <td><input type="text" name="ie6w_form_safariu" style="width:100%;" class="widefat" value="<?php echo $opt['browsersu']['safari']; ?>" /></td>
      </tr>
      <tr>
        <td width="125">Internet Explorer</td>
        <td width="125"><select name="ie6w_form_ie" style="width: 100px">
                    <option value="true" <?php if ( $opt['browsers']['ie'] == 'true' ) echo 'selected="selected"'; ?> /><?php echo __('Show', $ie6w_dom); ?></option>
                    <option value="false" <?php if ( $opt['browsers']['ie'] == 'false' ) echo 'selected="selected"'; ?> /><?php echo __('Hide', $ie6w_dom); ?></option></select></td>
        <td><input type="text" name="ie6w_form_ieu" style="width:100%;" class="widefat" value="<?php echo $opt['browsersu']['ie']; ?>" /></td>
      </tr>
    </table>
	<h2><?php echo __('Warning Message', $ie6w_dom); ?></h2>
	<table width="100%" cellspacing="0" class="widefat">
      <thead><tr>
        <th width="125"><?php echo __('Field', $ie6w_dom); ?></th>
        <th><?php echo __('Text', $ie6w_dom); ?></th>
      </tr></thead>
      <tr>
        <td width="125"><?php echo __('Title', $ie6w_dom); ?></td>
        <td><input type="text" name="ie6w_form_t1" style="width:100%;" class="widefat" value="<?php echo stripslashes(htmlspecialchars($opt['texts']['t1'])); ?>" /></td>
      </tr>
      <tr>
        <td width="125"><?php echo __('Text', $ie6w_dom); ?></td>
        <td><textarea name="ie6w_form_t2" rows="5" style="width:100%;" class="widefat"><?php echo stripslashes(htmlspecialchars($opt['texts']['t2'])); ?></textarea></td>
      </tr>
      <tr>
        <td width="125"><?php echo __('Observation', $ie6w_dom); ?></td>
        <td><input type="text" name="ie6w_form_t3" style="width:100%;" class="widefat" value="<?php echo stripslashes(htmlspecialchars($opt['texts']['t3'])); ?>" /></td>
      </tr>
    </table>
	<p class="submit"><input type="submit" name="update_options" class="button-primary" value="<?php echo __('Save Changes', $ie6w_dom); ?>"/> <input type="submit" name="reset_options" value="<?php echo __('Reset Options', $ie6w_dom); ?>"/></p>
	</form>
	<hr />
	<p><?php echo __('<strong>Note</strong>: i\'m learning PHP & Wordpress coding and using this plugin to study, so if you have any idea or any kind of suggestion please contact me.', $ie6w_dom); ?></p>
    <p><?php echo '<a href="' . $plug_site . '">' . $plug_name . ' v' . $plug_ver . '</a> ' . __('by', $ie6w_dom) . ' <a href="mailto:matias@incerteza.org">matias s.</a> ' . __('at', $ie6w_dom) . ' <a href="http://www.incerteza.org/blog/" target="_blank" rel="nofollow">incerteza.org</a>'; ?></p>
	</div>
<?php }
?>