// 1.5.6
jQuery(document).ready(function(){
if ((jQuery.browser.msie && jQuery.browser.version<=6) || (ie6w.test == 'true')) {
		jQuery('body').prepend('<div id="ie6w_div"><div id="ie6w_frame"><div id="ie6w_t1">' + ie6w.t1 + '</div><div id="ie6w_t2">' + ie6w.t2 + '</div><div id="ie6w_t3">' + ie6w.t3 + '</div><div id="ie6w_browsers"></div></div></div>');
		jQuery('#ie6w_div').css({
			"position": "fixed",
			"overflow": "hidden",
			"z-index": "1000",
			"left": "0px",
			"top": "0px",
			"height": "100%",
			"width": "1000",
			"background-color": "#000000",
			"font-family": "Verdana, Arial, Helvetica, sans-serif",
			"font-size": "11px",
			"color": "#000000"
		}).width(jQuery(window).width()).height(jQuery(window).height());
		jQuery('#ie6w_div #ie6w_frame').css({
			"position": "absolute",
			"overflow": "hidden",
			"background-color": "#FFFFFF",
			"left": "50%",
			"top": "50%",
			"height": "300px",
			"width": "450px",
			"margin-top": "-150px",
			"margin-left": "-225px"
		}).css({
			"margin-top": "-" + (jQuery('#ie6w_div #ie6w_frame').outerHeight()/2) + "px",
			"margin-left": "-" + (jQuery('#ie6w_div #ie6w_frame').outerWidth()/2) + "px"
		});
		jQuery('#ie6w_div #ie6w_frame #ie6w_t1').css({
			"position": "absolute",
			"left": "15px",
			"top": "6px",
			"font-family": "Impact, Verdana, Arial",
			"font-size": "42px",
			"font-weight": "bold",
			"color": "#990000"
		});
		jQuery('#ie6w_div #ie6w_frame #ie6w_t2').css({
				"position": "absolute",
				"width": "400px",
 				"left": "25px",
				"top": "95px",
				"font-family": "Verdana, Arial, Helvetica, sans-serif",
				"font-size": "16px",
				"color": "#000000",
				"text-align": "justify"
		}).width(jQuery('#ie6w_div #ie6w_frame').width() - 50);
		jQuery('#ie6w_div #ie6w_frame #ie6w_t3').css({
				"position": "absolute",
				"width": "400px",
 				"left": "25px",
				"top": "210px",
				"font-family": "Verdana, Arial, Helvetica, sans-serif",
				"font-size": "12px",
				"font-weight": "bold",
				"color": "#000000",
				"text-align": "justify"
		}).width(jQuery('#ie6w_div #ie6w_frame').width() - 50).css({
				"top": (jQuery('#ie6w_div #ie6w_frame #ie6w_t2').outerHeight() + 95 + 20) + "px"
		});
		var ie6w_b = 0;
		if(ie6w.ie=='true') {
			ie6w_b++;
			jQuery('#ie6w_div #ie6w_frame #ie6w_browsers').prepend('<a href="' + ie6w.ieu + '" target="_blank"><img src="' + ie6w.url + '/img/ie.gif" alt="get IE7!" width="28" height="28" border="0" /></a>');
		}
		if(ie6w.safari=='true') {
			ie6w_b++;
			jQuery('#ie6w_div #ie6w_frame #ie6w_browsers').prepend('<a href="' + ie6w.safariu + '" target="_blank"><img src="' + ie6w.url + '/img/safari.gif" alt="get Safari!" width="28" height="28" border="0" /></a>');
		}
		if(ie6w.chrome=='true') {
			ie6w_b++;
			jQuery('#ie6w_div #ie6w_frame #ie6w_browsers').prepend('<a href="' + ie6w.chromeu + '" target="_blank"><img src="' + ie6w.url + '/img/chrome.gif" alt="get Chrome!" width="28" height="28" border="0" /></a>');
		}
		if(ie6w.opera=='true') {
			ie6w_b++;
			jQuery('#ie6w_div #ie6w_frame #ie6w_browsers').prepend('<a href="' + ie6w.operau + '" target="_blank"><img src="' + ie6w.url + '/img/op.gif" alt="get Opera!" width="28" height="28" border="0" /></a>');
		}
		if(ie6w.firefox=='true') {
			ie6w_b++;
			jQuery('#ie6w_div #ie6w_frame #ie6w_browsers').prepend('<a href="' + ie6w.firefoxu + '" target="_blank"><img src="' + ie6w.url + '/img/ff.gif" alt="get Firefox!" width="28" height="28" border="0" /></a>');
		}
		jQuery('#ie6w_div #ie6w_frame #ie6w_browsers').css({
				"height": "28px",
				"bottom": "7px",
				"right": "7px",
				"position": "absolute",
				"overflow": "hidden",
				"text-align": "right"
		}).width(28 * ie6w_b);
		
		jQuery('#ie6w_div').click(function () {
			jQuery('#ie6w_div').remove();
    	});
		jQuery('#ie6w_div #ie6w_frame').click(function () {
			jQuery('#ie6w_div').remove();
    	});
}
});