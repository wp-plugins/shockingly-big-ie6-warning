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

jQuery(document).ready(function(){
	if (jQuery.browser.msie && jQuery.browser.version<="6.0") {
	if (Client.Engine.ie && !Client.Engine.ie7) {
		jQuery("body").prepend('<div id="ie6w_bg"><div id="ie6w_frame"><div id="ie6w_center"><div id="ie6w_t1">' + ie6w_t1 + '</div><div id="ie6w_t2">' + ie6w_t2 + '</div><div id="ie6w_t3">' + ie6w_t3 + '</div><div id="ie6w_browser"><a href="http://www.getfirefox.net/" target="_blank"><img src="' + ie6w_url + '/img/ff.gif" alt="get Firefox!" width="28" height="28" border="0" /></a><a href="http://www.opera.com/" target="_blank"><img src="' + ie6w_url + '/img/op.gif" alt="get Opera!" width="28" height="28" border="0" /></a><a href="http://www.microsoft.com/windows/ie/" target="_blank"><img src="' + ie6w_url + '/img/ie.gif" alt="get IE7!" width="28" height="28" border="0" /></a></div></div></div></div>');
		jQuery("#ie6w_bg").css({
                "position": "absolute",
                "zIndex": "8",
                "width": "100%",
                "height": "100%",
                "top":  "0px",
                "left": "0px",
                "background": "#111111"
		}).width(jQuery(window).width()).height(jQuery(document).height());
		jQuery("#ie6w_bg #ie6w_frame").css({
                "position": "relative",
                "width": "100%",
                "height": "100%",
                "top":  "0px",
                "left": "0px",
                "background": "#000000"
		}).width(jQuery(window).width()).height(jQuery(window).height());
		jQuery("#ie6w_bg #ie6w_frame #ie6w_center").css({
                "position": "absolute",
                "width": "450px",
                "height": "300px",
                "top":  "50%",
                "left": "50%",
                "background": "#666666"
		}).css({
				"margin-left": "-" + (jQuery("#ie6w_bg #ie6w_frame #ie6w_center").width() / 2) + "px",
				"margin-top": "-" + (jQuery("#ie6w_bg #ie6w_frame #ie6w_center").height() / 2) + "px"
		});
		jQuery("#ie6w_bg #ie6w_frame #ie6w_center #ie6w_t1").css({
				"font-family": "Impact, Verdana, Arial",
				"font-size": "42px",
				"font-weight": "bold",
				"color": "#FF0000",
				"position": "absolute",
				"left": "15px",
				"top": "10px"
		});
		jQuery("#ie6w_bg #ie6w_frame #ie6w_center #ie6w_t2").css({
				"font-family": "Verdana, Arial, Helvetica, sans-serif",
				"font-size": "16px",
				"color": "#000000",
				"position": "absolute",
				"width": "400px",
 				"left": "25px",
				"top": "95px",
				"text-align": "justify"
		});
		jQuery("#ie6w_bg #ie6w_frame #ie6w_center #ie6w_t3").css({
				"font-family": "Verdana, Arial, Helvetica, sans-serif",
				"font-size": "12px",
				"font-weight": "bold",
				"color": "#000000",
				"position": "absolute",
				"width": "400px",
 				"left": "25px",
				"top": (jQuery("#ie6w_bg #ie6w_frame #ie6w_center #ie6w_t2").height() + 95 + 20) + "px",
				"text-align": "justify"
		});
		jQuery("#ie6w_bg #ie6w_frame #ie6w_center #ie6w_browser").css({
				"height": "28px",
				"width": "84px",
				"bottom": "10px",
				"right": "15px",
				"position": "absolute"
		});
		jQuery("#ie6w_bg").click(function () {
			jQuery("#ie6w_bg").css({"display": "none"});
    	});
		jQuery("#ie6w_bg #ie6w_frame").click(function () {
			jQuery("#ie6w_bg").css({"display": "none"});
    	});
		jQuery("#ie6w_bg #ie6w_frame #ie6w_center").click(function () {
			jQuery("#ie6w_bg").css({"display": "none"});
    	});
	}
	}
});