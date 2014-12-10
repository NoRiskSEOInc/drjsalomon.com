(function($){
	"use strict";
	
	var $fw_url = mytheme_urls.framework_base_url,
		$patterns_url = $fw_url+"theme_options/images/patterns/",
		$bg_color = "",
		$bg_opacity = "";

	wp.customize("dt_skin",function( value ){
		value.bind(function(to){
			var $href = $("link[id='skin-css']").attr("href");
			    $href = $href.substr(0,$href.lastIndexOf("/"));
			    $href = $href.substr(0,$href.lastIndexOf("/"))+"/"+to+"/style.css";
			    $("link[id='skin-css']").attr("href",$href);
		});
	});

	wp.customize("dt_layout", function( value ){
		value.bind(function(to){
			if( "boxed" === to ) {
				$("body").addClass("boxed");
				$('body').css('background-image', 'url('+$patterns_url+mytheme_urls.layout_pattern+')');
			} else {
				 $("body").removeAttr("style").removeClass("boxed").css({'background-image':'none','background-color':'#F3F3F3'});
			}
		});
	});

	wp.customize("dt_boxed_layout_bg",function( value ){
		value.bind(function(to){
			var	$image = $patterns_url+to;
			$('body').css('background-image', 'url('+$image+')');
		});
	});

	wp.customize("dt_boxed_layout_bg_color", function( value ){
		$bg_color = value.get();
		value.bind(function(to){
			$bg_color = to;
			$('body').css('background-color',hex2rgb( $bg_color, $bg_opacity));
		});
	});

	wp.customize("dt_boxed_layout_bg_opacity", function( value ){

		$bg_opacity = value.get();

		value.bind(function(to){
			$bg_opacity = to;
			$('body').css('background-color',hex2rgb( $bg_color, $bg_opacity));
		});
	});

	function hex2rgb(hex, opacity) {
		var h=hex.replace('#', '');
        h =  h.match(new RegExp('(.{'+h.length/3+'})', 'g'));

        for(var i=0; i<h.length; i++)
            h[i] = parseInt(h[i].length==1? h[i]+h[i]:h[i], 16);

        if (typeof opacity != 'undefined')  h.push(opacity);

        return 'rgba('+h.join(',')+')';
	}


}(jQuery));