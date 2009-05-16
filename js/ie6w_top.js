// 1.5.1
jQuery(document).ready(function(){
if ((jQuery.browser.msie && jQuery.browser.version<='6.0') || (ie6w_test == 'true')) {
		jQuery('body').prepend('<div id="ie6w_div"><div id="ie6w_icon"><img src="' + ie6w_url + 'img/alert.gif" width="30" height="28" /></div><div id="ie6w_text"><strong><font color=RED>' + ie6w_t1 + '</font></strong>: ' + ie6w_t2 + '</div><div id="ie6w_browsers"></div></div>');
		jQuery('#ie6w_div').css({
			"overflow": "hidden",
			"z-index": "1000",
			"left": "0px",
			"top": "0px",
			"height": "34px",
			"width": "100%",
			"background-color": "#FFFF00",
			"font-family": "Verdana, Arial, Helvetica, sans-serif",
			"font-size": "11px",
			"color": "#000000",
			"clear": "both",
			"border-bottom-width": "1px",
			"border-bottom-style": "solid",
			"border-bottom-color": "#000000"
		}).width(jQuery(window).width());
		jQuery('#ie6w_div #ie6w_icon').css({
			"overflow": "hidden",
			"position": "absolute",
			"left": "0px",
			"top": "0px",
			"height": "28px",
			"width": "30px",
			//"background-color": "#000000",
			"padding": "3px"
		});
		var ie6w_b = 0;
		if(ie6w_ie=='true') {
			ie6w_b++;
			jQuery('#ie6w_div #ie6w_browsers').prepend('<a href="' + ie6w_ieu + '" target="_blank"><img src="' + ie6w_url + '/img/ie.gif" alt="get IE7!" width="28" height="28" border="0" /></a>');
		}
		if(ie6w_safari=='true') {
			ie6w_b++;
			jQuery('#ie6w_div #ie6w_browsers').prepend('<a href="' + ie6w_safariu + '" target="_blank"><img src="' + ie6w_url + '/img/safari.gif" alt="get Safari!" width="28" height="28" border="0" /></a>');
		}
		if(ie6w_chrome=='true') {
			ie6w_b++;
			jQuery('#ie6w_div #ie6w_browsers').prepend('<a href="' + ie6w_chromeu + '" target="_blank"><img src="' + ie6w_url + '/img/chrome.gif" alt="get Chrome!" width="28" height="28" border="0" /></a>');
		}
		if(ie6w_opera=='true') {
			ie6w_b++;
			jQuery('#ie6w_div #ie6w_browsers').prepend('<a href="' + ie6w_operau + '" target="_blank"><img src="' + ie6w_url + '/img/op.gif" alt="get Opera!" width="28" height="28" border="0" /></a>');
		}
		if(ie6w_firefox=='true') {
			ie6w_b++;
			jQuery('#ie6w_div #ie6w_browsers').prepend('<a href="' + ie6w_firefoxu + '" target="_blank"><img src="' + ie6w_url + '/img/ff.gif" alt="get Firefox!" width="28" height="28" border="0" /></a>');
		}
		jQuery('#ie6w_div #ie6w_browsers').css({
			"overflow": "hidden",
			"position": "absolute",
			"right": "0px",
			"top": "0px",
			"height": "28px",
			"width": "146px",
			//"background-color": "#999999",
			"padding": "3px"
		}).width((ie6w_b *28)+12);
		jQuery('#ie6w_div #ie6w_text').css({
			"overflow": "hidden",
			"position": "absolute",
			"left": "36px",
			"top": "0px",
			"height": "28px",
			"width": "650px",
			//"background-color": "#333333",
			"padding": "3px",
			"text-align": "left"
		}).width(jQuery(window).width() - jQuery('#ie6w_div #ie6w_icon').outerWidth() - jQuery('#ie6w_div #ie6w_browsers').outerWidth() - 6);
}
});