/* 1.4.4 */
jQuery(document).ready(function(){
		jQuery("body").prepend('<div id="ie6w_div">' +  ie6w_t4 + '</div>');
		jQuery("#ie6w_div").css({
			"position": "relative",
			"width": "100%",
			"top": "0px",
			"left": "0px",
			"background-color": "#6699CC",
			"border": "1px solid #000000",
			"border-top-style": "none",
			"border-right-style": "none",
			"border-left-style": "none",
			"padding": "3px",
			"font-family": "Verdana, Arial, Helvetica, sans-serif",
			"font-size": "12px",
			"line-height": "1.3em",
			"color": "#000000",
			"text-align": "left"
		}).width(jQuery(window).width());
		
		jQuery("#ie6w_div a").css({
			"color": "#FFFFFF",
			"font-weight": "bold",
			"text-decoration": "none"
		});
});