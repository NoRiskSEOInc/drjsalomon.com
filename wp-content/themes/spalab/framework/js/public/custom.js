jQuery(document).ready(function($){
	
	var isMobile = (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/Blackberry/i)) || (navigator.userAgent.match(/Windows Phone/i)) ? true : false;
	
	/* Select Dropdown arrow fix */
	$("select").each(function(){
		$(this).wrap( '<span class="selection-box"></span>' );
	});
	
	/*Menu */
	megaMenu();
	function megaMenu() {
		var screenWidth = $(document).width(),
		containerWidth = $("#header .container").width(),
		containerMinuScreen = (screenWidth - containerWidth)/2;
		if( containerWidth == screenWidth ){

			$px = mytheme_urls.scroll == "disable" ? 45 : 25;
			
			$("li.menu-item-megamenu-parent .megamenu-child-container").each(function(){

				var ParentLeftPosition = $(this).parent("li.menu-item-megamenu-parent").offset().left,
				MegaMenuChildContainerWidth = $(this).width();

				if( (ParentLeftPosition + MegaMenuChildContainerWidth) > screenWidth ){
					var SwMinuOffset = screenWidth - ParentLeftPosition;
					var marginFromLeft = MegaMenuChildContainerWidth - SwMinuOffset;
					var marginFromLeftActual = (marginFromLeft) + $px;
					var marginLeftFromScreen = "-"+marginFromLeftActual+"px";
					$(this).css('left',marginLeftFromScreen);
				}

			});
		} else {

			$px = mytheme_urls.scroll == "disable" ? 40 : 20;

			$("li.menu-item-megamenu-parent .megamenu-child-container").each(function(){
				var ParentLeftPosition = $(this).parent("li.menu-item-megamenu-parent").offset().left,
				MegaMenuChildContainerWidth = $(this).width();

				if( (ParentLeftPosition + MegaMenuChildContainerWidth) > containerWidth ){
					var marginFromLeft = ( ParentLeftPosition + MegaMenuChildContainerWidth ) - screenWidth;
					var marginLeftFromContainer = containerMinuScreen + marginFromLeft + $px;

					if( MegaMenuChildContainerWidth > containerWidth ){
						var MegaMinuContainer	= ( (MegaMenuChildContainerWidth - containerWidth)/2 ) + 10;
						var marginLeftFromContainerVal = marginLeftFromContainer - MegaMinuContainer;
						marginLeftFromContainerVal = "-"+marginLeftFromContainerVal+"px";
						$(this).css('left',marginLeftFromContainerVal);
					} else {
						marginLeftFromContainer = "-"+marginLeftFromContainer+"px";
						$(this).css('left',marginLeftFromContainer);
					}
				}

			});
		}
	}
	
	//Menu Hover Animation...
	function menuHover() {
		$("li.menu-item-depth-0,li.menu-item-simple-parent ul li" ).hover(function(){
			//mouseover 
			if( $(this).find(".megamenu-child-container").length  ){
				$(this).find(".megamenu-child-container").stop().fadeIn('fast');
			} else {
				$(this).find("> ul.sub-menu").stop().fadeIn('fast');
			}
			
		},function(){
			//mouseout
			if( $(this).find(".megamenu-child-container").length ){
				$(this).find(".megamenu-child-container").stop(true, true).hide();
			} else {
				$(this).find('> ul.sub-menu').stop(true, true).hide(); 
			}
		});
	}
	
	//sticky menu
	if(! ($('body').hasClass('page-template-tpl-catalog-php')) ) {	
		if( mytheme_urls.stickynav === "enable") {
			$("#header-wrapper").sticky({ topSpacing: 0 });
		}
	}
	
	//Mobile Menu
	$("#dt-menu-toggle").click(function( event ){
		event.preventDefault();
		$menu = $("nav#main-menu").find("ul.menu:first");
		$menu.slideToggle(function(){
			$menu.css('overflow' , 'visible');
			$menu.toggleClass('menu-toggle-open');
		});
	});

	$(".dt-menu-expand").click(function(){
		if( $(this).hasClass("dt-mean-clicked") ){
			$(this).text("+");
			if( $(this).prev('ul').length ) {
				$(this).prev('ul').slideUp(300);
			} else {
				$(this).prev('.megamenu-child-container').find('ul:first').slideUp(300);
			}
		} else {
			$(this).text("-");
			if( $(this).prev('ul').length ) {
				$(this).prev('ul').slideDown(300);
			} else{
				$(this).prev('.megamenu-child-container').find('ul:first').slideDown(300);
			}
		}
		
		$(this).toggleClass("dt-mean-clicked");
		return false;
	});
	
	if( !isMobile ){
		currentWidth = window.innerWidth || document.documentElement.clientWidth;
		if( currentWidth > 767 ){
			menuHover();
		}
	}
	//Mobile Menu End
//Menu End
	
	/* To Top */
	$().UItoTop({ easingType: 'easeOutQuart' });

	/* Nice Scroll */
	var isMacLike = navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i)?true:false;
	if( mytheme_urls.scroll === "enable" && !isMacLike ) {
		jQuery("html").niceScroll({zindex:99999,cursorborder:"1px solid #424242"});
	}

	//Portfolio isotope
	$(window).load(function(){
		var $container = $('.dt-sc-portfolio-container');
		if( $container.length) {
	 
			$(window).smartresize(function(){
				$container.css({overflow:'hidden'}).isotope({itemSelector : '.isotope-item',masonry: { gutterWidth: 15} });
			});
			
			$container.isotope({
			  filter: '*',
			  masonry: { gutterWidth: 15},
			  animationOptions: { duration: 750, easing: 'linear', queue: false  }
			});		
		}
		
		if($("div.dt-sc-sorting-container").length){
			$("div.dt-sc-sorting-container a").click(function(){
				$("div.dt-sc-sorting-container a").removeClass("active-sort");
				var selector = $(this).attr('data-filter');
				$(this).addClass("active-sort");
				$container.isotope({
					filter: selector,
					masonry: { gutterWidth: 20 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});
			return false;	
			});
		}
	});
	//Portfolio isotope End
	
	//Portfolio Single page Slider
	if( ($(".portfolio-slider").length) && ($(".portfolio-slider li").length > 1) ) {
		$('.portfolio-slider').bxSlider({ auto:false, video:true, useCSS:false, pager:'', autoHover:true, adaptiveHeight:true });
	}//Portfolio Single page Slider
	
	if( ($("ul.entry-gallery-post-slider").length) && ( $("ul.entry-gallery-post-slider li").length > 1 ) ){
	  	$("ul.entry-gallery-post-slider").bxSlider({auto:false, video:true, useCSS:false, pager:'', autoHover:true, adaptiveHeight:true});
    }
	
	/* Placeholder Script */
  if(!Modernizr.input.placeholder){
    $('[placeholder]').focus(function() {
      
      var input = $(this);
      if( input.val() == input.attr('placeholder') ) {
        input.val('');
        input.removeClass('placeholder');
      }
      }).blur(function() {
      
      var input = $(this);
      if (input.val() === '' || input.val() === input.attr('placeholder')) {
        input.addClass('placeholder');
        input.val(input.attr('placeholder'));
      }
      }).blur();
    
    $('[placeholder]').parents('form').submit(function() {
      $(this).find('[placeholder]').each(function() {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
          input.val('');
        }
       });
     });
  }
  
  //Fitvids...
	$("div.dt-video-wrap").fitVids();
	$('.wp-video').css('width', '100%');
 
  
  /* GIFT */
 	$("#gift-frm").hide();
      
	  $(".gift").click(function() { 
		  	$(".gift").text("Select");
		  	$(".dt-sc-gift").removeClass('selected');
		  var giftbtn = $(this).attr("id");
		  	$("#gift-id").val(giftbtn);
		  	$('#gift-frm').show();
		  	$('#' +giftbtn).text("Selected");
		  	$("."+giftbtn).addClass('selected');
	  });
   
  
//SIDEBAR MENU ITEM...
	  if($('ul.j-load-all').length){
		  $('ul.j-load-all li:first').addClass('current_page_item');
		  
		  $('ul.j-load-all li a').click(function(){
			  $('ul.j-load-all').find('li').removeClass('current_page_item');
			  $(this).parent('li').addClass("current_page_item");
			  
			  var x = $(this).attr('href');
			  $(".menu-list").removeClass('current_catalog_item');
			  $(".column ").children('h2').removeClass('current_catalog_item');
			  $(x).addClass('current_catalog_item');
		  });
	  }

	
		  /*Sending Mail*/
  if( jQuery(".gift-form").length ) {
    jQuery(".gift-form").each(function(){
      jQuery(this).submit(function(e){
        var $form = jQuery(this),
            $msg = jQuery(this).prev('div.message'),
            $action = $form.attr('action');
        
        jQuery.post($action,$form.serialize(),function(data){
          $form.fadeOut("fast", function(){$msg.hide().html(data).show('fast');});
        });
        e.preventDefault();
      });
    });
  }
  
//Smart Resize Start
	$(window).smartresize(function(){
		megaMenu();
		//Mobile Menu
		currentWidth = window.innerWidth || document.documentElement.clientWidth;
		if( !isMobile && (currentWidth > 767)  ){
			menuHover();
		}
		
		//Blog Template
		if( $(".apply-isotope").length ) {
			$(".apply-isotope").isotope({itemSelector : '.column',transformsEnabled:false,masonry: { gutterWidth: 20} });
		}
	});
//Smart Resize End	
});