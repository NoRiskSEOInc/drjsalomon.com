jQuery(document).ready(function($){

  "use strict";
  var $picker_container = jQuery("div.delicate-style-picker-wrapper"),
      $theme_url = mytheme_urls.theme_base_url,
      $fw_url = mytheme_urls.framework_base_url,
      $patterns_url = $fw_url+"theme_options/images/patterns/";
  
  //Applying Cookies
  //if($.cookie("spalab_skin")!== null ){
  if(  $.cookie("spalab_skin")!== undefined && $.cookie("spalab_skin")!= null ) {

    if( mytheme_urls.is_admin === '1' ) {
      $.cookie("spalab_skin",mytheme_urls.skin, { path: '/' });
    }

    var $href = $("link[id='skin-css']").attr("href");
    $href = $href.substr(0,$href.lastIndexOf("/"));
    $href = $href.substr(0,$href.lastIndexOf("/"))+"/"+$.cookie("spalab_skin")+"/style.css";
    
    $("link[id='skin-css']").attr("href",$href);
    $("ul.color-picker a[id='"+$.cookie("spalab_skin")+"']").addClass("selected");
  }else{
	$("ul.color-picker a:first").addClass("selected");
  }
  
  if ( $.cookie('spalab-control-open') === '1' ) {
	  $picker_container.animate({left: 0});
	  $('a.style-picker-ico').removeClass('control-open');
  } else {
    $picker_container.animate( { left: -230 } );
    $('a.style-picker-ico').addClass('control-open');
  }
  
  //1. Applying Layout & patterns
  if($.cookie("spalab_layout") === "boxed"){
	  
    $("ul.layout-picker li a").removeAttr("class");
    $("ul.layout-picker li a[id='"+$.cookie("spalab_layout")+"']").addClass("selected");

	  $("div#pattern-holder").removeAttr("style");
    $('body').addClass('boxed');
	
    if($.cookie("spalab_pattern")) {
	    var $i = $.cookie("spalab_pattern");
    	var $img = $patterns_url+$i;
        $('body').css('background-image', 'url('+$img+')');
    	$("ul.pattern-picker a[data-image="+$.cookie("spalab_pattern")+"]").addClass('selected');
	}
	
    
  }//Applying Cookies End
  
  //Picker On/Off
  $("a.style-picker-ico").click(function(e){
    var $this = $(this);	
    
    if($this.hasClass('control-open')){
      $picker_container.animate({left: 0},function(){$this.removeClass('control-open');});
      $.cookie('spalab-control-open', 1, { path: '/' });	
    }else{
      $picker_container.animate({left: -230},function(){$this.addClass('control-open');});
      $.cookie('spalab-control-open', 0, { path: '/' });
	}
	e.preventDefault();
   });//Picker On/Off end

  //Layout Picker
  $("ul.layout-picker a").click(function(e){
    var $this = $(this);
    $("ul.layout-picker a").removeAttr("class");
    $this.addClass("selected");
    $.cookie("spalab_layout", $this.attr("id"), { path: '/' });

    if( $.cookie("spalab_layout") === "boxed") {
      $("body").addClass("boxed");
      $("div#pattern-holder").slideDown();
			
      if( $.cookie("spalab_pattern") ){
        $("ul.pattern-picker a[data-image="+$.cookie("spalab_pattern")+"]").addClass('selected');
	    $img = $patterns_url+$.cookie("spalab_pattern");
    	$('body').css('background-image', 'url('+$img+')');
      }
    } else {
      $("body").removeAttr("style").removeClass("boxed");
      $("div#pattern-holder").slideUp();
      $("ul.pattern-picker a").removeAttr("class");
    }
    window.location.href = location.href;
    e.preventDefault();
  });//Layout Picker End

  //Pattern Picker
  $("ul.pattern-picker a").click(function(e){
    
    if($.cookie("spalab_layout") === "boxed"){
      var $this = $(this);
      $("ul.pattern-picker a").removeAttr("class");
      $this.addClass("selected");
      $.cookie("spalab_pattern", $this.attr("data-image"), { path: '/' });
      var $img = $patterns_url+$.cookie("spalab_pattern");
      $('body').css('background-image', 'url('+$img+')');
    }
    e.preventDefault();
  });//Pattern Picker End

  //Color Picker
  $("ul.color-picker a").click(function(e){
    var $this = $(this);
    $("ul.color-picker a").removeAttr("class");
    $this.addClass("selected");
    $.cookie("spalab_skin", $this.attr("id"), { path: '/' });
    $href = $("link[id='skin-css']").attr("href");
    $href = $href.substr(0,$href.lastIndexOf("/"));
    $href = $href.substr(0,$href.lastIndexOf("/"))+"/"+$this.attr("id")+"/style.css";
    $("link[id='skin-css']").attr("href",$href);
	
	switch( $this.attr("id") ){
		
		case 'blue':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/redmond/jquery-ui.min.css");
		break;
		
		case 'chocolate':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/swanky-purse/jquery-ui.css");
		break;
		
		case 'coral':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/dark-hive/jquery-ui.css");
		break;
		
		case 'cyan':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/cupertino/jquery-ui.css");
		break;
		
		case 'eggplant':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/eggplant/jquery-ui.css");
		break;
				
		
		
		case 'electricblue':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/eggplant/jquery-ui.css");
		break;
		
		case 'ferngreen':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/south-street/jquery-ui.min.css");
		break;
		
		case 'gold':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/sunny/jquery-ui.css");
		break;
		
		case 'green':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/le-frog/jquery-ui.css");
		break;
		
		case 'grey':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/vader/jquery-ui.css");
		break;
		
		
		
		case 'khaki':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/dark-hive/jquery-ui.css");
		break;
		
		case 'ocean':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/dark-hive/jquery-ui.css");
		break;
		
		case 'orange':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css");
		break;
		
		case 'palebrown':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/pepper-grinder/jquery-ui.css");
		break;
		
		case 'pink':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/dark-hive/jquery-ui.css");
		break;
		
		
		
		case 'purple':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/dark-hive/jquery-ui.css");
		break;
		
		case 'raspberry':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/dark-hive/jquery-ui.css");
		break;
		
		case 'red':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/blitzer/jquery-ui.css");
		break;
		
		case 'skyblue':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/start/jquery-ui.css");
		break;
		
		case 'slateblue':
			$("link[id='jquery-ui-datepicker-css']").attr("href","http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/cupertino/jquery-ui.css");
		break;
		
	}
	
    e.preventDefault();
  });//Color Picker End
});