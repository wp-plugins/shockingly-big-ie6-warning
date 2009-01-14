/* 1.3.5 */
var Client = {
	Engine: {'name': 'unknown', 'version': ''},	
	Features: {}
};
Client.Features.xhr = !!(window.XMLHttpRequest);
Client.Features.xpath = !!(document.evaluate);
if (window.opera) Client.Engine.name = 'opera';
else if (window.ActiveXObject) Client.Engine = {'name': 'ie', 'version': (Client.Features.xhr) ? 7 : 6};
else if (!navigator.taintEnabled) Client.Engine = {'name': 'webkit', 'version': (Client.Features.xpath) ? 420 : 419};
else if (document.getBoxObjectFor != null) Client.Engine.name = 'gecko';
Client.Engine[Client.Engine.name] = Client.Engine[Client.Engine.name + Client.Engine.version] = true;
// taken from http://www.stopie6.org/ ie6 detection script

jQuery(document).ready(function(){
	if (jQuery.browser.msie && jQuery.browser.version<="6.0") {
	if (Client.Engine.ie && !Client.Engine.ie7) {
		jQuery("body").prepend('<div id="ie6w_div"><div id="ie6w_icon"><img src="' + ie6w_url + '/img/alert.gif" width="30" height="28"/></div><div id="ie6w_text"><div><strong><font color=RED>' + ie6w_t1 + '</font></strong>: ' + ie6w_t2 + '</div></div><div id="ie6w_browsers"></div></div>');
		jQuery("#ie6w_div").css({
			"position": "relative",
			"height": "34px",
			"width": "100%",
			"top": "0px",
			"left": "0px",
			"background-color": "#FFFF00",
			"border": "1px solid #000000",
			"border-top-style": "none",
			"border-right-style": "none",
			"border-left-style": "none"
		}).width(jQuery(window).width());
		jQuery("#ie6w_div #ie6w_icon").css({
			"height": "28px",
			"width": "30px",
			"top": "3px",
			"left": "10px",
			"position": "absolute"
		});
		jQuery("#ie6w_div #ie6w_browsers").css({
			"height": "28px",
			"top": "3px",
			"right": "10px",
			"text-align": "right",
			"overflow": "hidden",
			"position": "absolute"
		});
		var ie6w_b = 0;
		if(ie6w_ie7=="true") {
			ie6w_b++;
			jQuery("#ie6w_div #ie6w_browsers").prepend('<a href="http://www.microsoft.com/windows/ie/" target="_blank"><img src="' + ie6w_url + '/img/ie.gif" alt="get IE7!" width="28" height="28" border="0" /></a>');
		}
		if(ie6w_safari=="true") {
			ie6w_b++;
			jQuery("#ie6w_div #ie6w_browsers").prepend('<a href="http://www.apple.com/safari" target="_blank"><img src="' + ie6w_url + '/img/safari.gif" alt="get Safari!" width="28" height="28" border="0" /></a>');
		}
		if(ie6w_chrome=="true") {
			ie6w_b++;
			jQuery("#ie6w_div #ie6w_browsers").prepend('<a href="http://www.google.com/chrome/" target="_blank"><img src="' + ie6w_url + '/img/chrome.gif" alt="get Chrome!" width="28" height="28" border="0" /></a>');
		}
		if(ie6w_opera=="true") {
			ie6w_b++;
			jQuery("#ie6w_div #ie6w_browsers").prepend('<a href="http://www.opera.com/" target="_blank"><img src="' + ie6w_url + '/img/op.gif" alt="get Opera!" width="28" height="28" border="0" /></a>');
		}
		if(ie6w_ff=="true") {
			ie6w_b++;
			jQuery("#ie6w_div #ie6w_browsers").prepend('<a href="http://www.getfirefox.net/" target="_blank"><img src="' + ie6w_url + '/img/ff.gif" alt="get Firefox!" width="28" height="28" border="0" /></a>');
		}
		jQuery("#ie6w_div #ie6w_text").css({
			"top": "50%",
			"left": "50px",
			"position": "absolute"
		});
		jQuery("#ie6w_div #ie6w_text div").css({
			"font-family": "Verdana, Arial, Helvetica, sans-serif",
			"font-size": "1em",
			"text-align": "left",
			"top": "-50%",
			"overflow": "hidden",
			"position": "relative"
		});
		jQuery("#ie6w_div #ie6w_text").width(jQuery(window).width()-(50+10+(28*ie6w_b)+10));
		jQuery("#ie6w_div #ie6w_text div").width(jQuery(window).width()-(50+10+(28*ie6w_b)+10));
		jQuery("#ie6w_div #ie6w_browsers").width(28*ie6w_b);
	}
	}
});