(function($){
	"use strict";
	wp.customize("dt_layout", function( value ){

		if( "boxed" === value.get() ) {
			$("#customize-control-dt_boxed_layout_bg").show();
			$("#customize-control-dt_boxed_layout_bg_color").show();
			$("#customize-control-dt_boxed_layout_bg_opacity").show();

		} else {
			$("#customize-control-dt_boxed_layout_bg").hide();
			$("#customize-control-dt_boxed_layout_bg_color").hide();
			$("#customize-control-dt_boxed_layout_bg_opacity").hide();
		}

		//While changing the layout option bind() method will trigger
		value.bind(function(to){
			if( "boxed" === to ) {
				$("#customize-control-dt_boxed_layout_bg").show();
				$("#customize-control-dt_boxed_layout_bg_color").show();
				$("#customize-control-dt_boxed_layout_bg_opacity").show();

			} else {
				$("#customize-control-dt_boxed_layout_bg").hide();
				$("#customize-control-dt_boxed_layout_bg_color").hide();
				$("#customize-control-dt_boxed_layout_bg_opacity").hide();
			}	
		});
		
	});
}(jQuery));