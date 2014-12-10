<?php
add_shortcode('map_wrapper','map_wrapper');
function map_wrapper( $attrs = null, $content = null,$shortcodename ="" ){
	return "<div class='map-wrapper'></div>";
}

/** fblike
  * Objective:
  *		1.Facebook Widget.
**/
add_shortcode('fblike','fblike');
function fblike( $attrs = null, $content = null,$shortcodename ="" ){
	extract(shortcode_atts(array('layout'=>'box_count','width'=>'','height'=>'','send'=>false,'show_faces'=>false,'action'=>'like','font'=> 'lucida+grande'
				,'colorscheme'=>'light'), $attrs));

	if ($layout == 'standard') { $width = '450'; $height = '35';  if ($show_faces == 'true') { $height = '80'; } }
	if ($layout == 'box_count') { $width = '55'; $height = '65'; }
	if ($layout == 'button_count') { $width = '90'; $height = '20'; }
	$layout = 'data-layout = "'.$layout.'" ';
	$width = 'data-width = "'.$width.'" ';
	$font = 'data-font = "'.str_replace("+", " ", $font).'" ';
	$colorscheme = 'data-colorscheme = "'.$colorscheme.'" ';
	$action = 'data-action = "'.$action.'" ';
	if ( $show_faces ) { $show_faces = 'data-show-faces = "true" '; } else { $show_faces = ''; }
	if ( $send ) { $send = 'data-send = "true" '; } else { $send = ''; }
	
    $out = '<div id="fb-root"></div><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));</script>';
	$out .= '<div class = "fb-like" data-href = "'.get_permalink().'" '.$layout.$width.$font.$colorscheme.$action.$show_faces.$send.'></div>';
return $out;
}


/** googleplusone
  * Objective:
  *		1.googleplusone Widget.
**/
add_shortcode('googleplusone','googleplusone');	
function googleplusone( $attrs = null, $content = null,$shortcodename ="" ){
	extract(shortcode_atts(array('size'=> '','lang'=> ''), $attrs));
	$size = empty($size) ? "size='small'" : "size='{$size}'";
	$lang = empty($lang) ? "{lang:en_GB}" : "{lang:'{$lang}'}";
	
	$out = '<script type="text/javascript" src="https://apis.google.com/js/plusone.js">'.$lang.'</script>';
	$out .= '<g:plusone '.$size.'></g:plusone>';
	return $out;
}

/** twitter
  * Objective:
  *		1.twitter Widget.
**/
add_shortcode('twitter','twitter');
function twitter( $attrs = null, $content = null,$shortcodename ="" ){
	extract(shortcode_atts(array('layout'=>'vertical','username'=>'','text'=>'','url'=>'','related'=> '','lang'=> ''), $attrs));
	
	$p_url= get_permalink();
	$p_title = get_the_title();
	
	$text = !empty($text) ? "data-text='{$text}'" :"data-text='{$p_title}'";
	$url = !empty($url) ? "data-url='{$url}'" :"data-url='{$p_url}'";
	$related = !empty($related) ? "data-related='{$related}'" :'';
	$lang = !empty($lang) ? "data-lang='{$lang}'" :'';
	$twitter_url = "http://twitter.com/share";
		$out = '<a href="{$twitter_url}" class="twitter-share-button" '.$url.' '.$lang.' '.$text.' '.$related.' data-count="'.$layout.'" data-via="'.$username.'">'.
	__('Tweet','dt_themes').'</a>';
		$out .= '<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
	return $out;	
}

/** stumbleupon
  * Objective:
  *		1.Stumbleupon Widget.
**/
add_shortcode('stumbleupon','stumbleupon');
function stumbleupon( $attrs = null, $content = null,$shortcodename ="" ){
	extract(shortcode_atts(array('layout'=>'5','url'=>get_permalink()),$attrs));
	$url = "&r='{$url}'";
	$out = '<script src="http://www.stumbleupon.com/hostedbadge.php?s='.$layout.$url.'"></script>';
return $out;	
}

/** linkedin
  * Objective:
  *		1.linkedin Widget.
**/
add_shortcode('linkedin','linkedin');
function linkedin( $attrs = null, $content = null,$shortcodename ="" ){
	extract(shortcode_atts(array('layout'=>'2','url'=>get_permalink()),$attrs));
	
    	if ($url != '') { $url = "data-url='".$url."'"; }
	    if ($layout == '2') { $layout = 'right'; }
		if ($layout == '3') { $layout = 'top'; }
		$out = '<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-counter = "'.$layout.'" '.$url.'></script>';
return $out;	
}

/** delicious
  * Objective:
  *		1.Delicious Widget.
**/
add_shortcode('delicious','delicious');
function delicious( $attrs = null, $content = null,$shortcodename ="" ){
	extract(shortcode_atts(array('text'=>__("Delicious",'dt_themes')),$attrs));
	
	$delicious_url = "http://www.delicious.com/save";
	
	$out = '<img src="http://www.delicious.com/static/img/delicious.small.gif" height="10" width="10" alt="Delicious" />&nbsp;<a href="{$delicious_url}" onclick="window.open(&#39;http://www.delicious.com/save?v=5&noui&jump=close&url=&#39;+encodeURIComponent(location.href)+&#39;&title=&#39;+encodeURIComponent(document.title), &#39;delicious&#39;,&#39;toolbar=no,width=550,height=550&#39;); return false;">'.$text.'</a>';
return $out;	
}

/** pintrest
  * Objective:
  *		1.Pintrest Widget.
**/
add_shortcode('pintrest','pintrest');
function pintrest( $attrs = null, $content = null,$shortcodename ="" ){
	extract(shortcode_atts(array('text'=>get_the_excerpt(),'layout'=>'horizontal','image'=>'','url'=>get_permalink(),'prompt'=>false),$attrs));
	$out = '<div class = "mysite_sociable"><a href="http://pinterest.com/pin/create/button/?url='.$url.'&media='.$image.'&description='.$text.'" class="pin-it-button" count-layout="'.$layout.'">'.__("Pin It",'dt_themes').'</a>';
	$out .= '<script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script>';
	
	if($prompt):
		$out = '<a title="'.__('Pin It on Pinterest','dt_themes').'" class="pin-it-button" href="javascript:void(0)">'.__("Pin It",'dt_themes').'</a>';
		$out .= '<script type = "text/javascript">';
		$out .= 'jQuery(document).ready(function(){';
			$out .= 'jQuery(".pin-it-button").click(function(event) {';
			$out .= 'event.preventDefault();';
			$out .= 'jQuery.getScript("http://assets.pinterest.com/js/pinmarklet.js?r=" + Math.random()*99999999);';
			$out .= '});';
		$out .= '});';
		$out .= '</script>';
		$out .= '<style type = "text/css">a.pin-it-button {position: absolute;background: url(http://assets.pinterest.com/images/pinit6.png);font: 11px Arial, sans-serif;text-indent: -9999em;font-size: .01em;color: #CD1F1F;height: 20px;width: 43px;background-position: 0 -7px;}a.pin-it-button:hover {background-position: 0 -28px;}a.pin-it-button:active {background-position: 0 -49px;}</style>';
	
	endif;
	return $out;
}

/** digg
  * Objective:
  *		1.Digg Widget.
**/
add_shortcode('digg','digg');
function digg( $attrs = null, $content = null,$shortcodename ="" ){
	extract(shortcode_atts(array('layout'=>'DiggMedium','url'=>get_permalink(),'title'=>get_the_title(),'type'=>'','description'=>get_the_content(),'related'=>''),$attrs));
	
	if ($title != '') { $title = "&title='".$title."'"; }
	if ($type != '') { $type = "rev='".$type."'"; }
	if ($description != '') { $description = "<span style = 'display: none;'>".$description."</span>"; }
	if ($related != '') { $related = "&related=no"; }

	$out = '<a class="DiggThisButton '.$layout.'" href="http://digg.com/submit?url='.$url.$title.$related.'"'.$type.'>'.$description.'</a>';
	$out .= '<script type = "text/javascript" src = "http://widgets.digg.com/buttons.js"></script>';
	return $out;
}

add_shortcode('social','my_social'); 
function my_social($attrs, $content=null,$shortcodename="") {
	$dttheme_options = get_option(IAMD_THEME_SETTINGS);

	if( isset($dttheme_options['general']['show-sociables']) && isset($dttheme_options['social']) ):
		$out = "<ul class='dt-sc-social-icons'>";
			foreach($dttheme_options['social'] as $social):
				$link = $social['link'];
				$custom_image = isset($social['custom-image']) && !empty($social['custom-image']) ? "<img src='{$custom_image}' />": '';
				$icon = $social['icon'];
				$class = explode(".",$icon);
				$class = $class[0];
				$out .= "<li class='{$class}'><a href='{$link}' target='_blank'>";
				if(!empty($custom_image)):
					$out .=	$custom_image;
				else:
					$out .= "<img src='".IAMD_BASE_URL."images/sociable/hover/{$icon}' alt='{$icon}' />";
				endif;
				
				$out .= "<img src='".IAMD_BASE_URL."images/sociable/{$icon}' alt='{$icon}' />";
				$out .="	</a>";
				$out .= "</li>"; 
			endforeach;
		$out .= "</ul>";
	return $out;	
	endif;	
}


add_shortcode('dt_sc_post','dt_sc_post');
function dt_sc_post( $attrs, $content=null, $shortcodename ="" ){
	extract(shortcode_atts(array( 'id'=>'1', 'read_more_text'=>__('Read More','dt_themes'),'excerpt_length'=>10), $attrs));
	
	$p = get_post($id,'ARRAY_A');
 if( !is_null($p) && 'post' == $p['post_type']) {
	$link = get_permalink($id);
	$title = $p['post_title'];
	$author_id = $p['post_author'];
	$class = get_post_class("blog-entry",$id);
	$class = implode(" ",$class);
	$post_format = get_post_format($id);
	$post_meta = get_post_meta($id ,'_dt_post_settings',TRUE);
	$post_meta = is_array($post_meta) ? $post_meta  : array();
	
	$tags = "";
	$terms = wp_get_post_tags($id);
	if( !empty($terms) ){
		$tags .= '<p class="tags"><span class="fa fa-tags"> </span>';
		foreach( $terms as $term ){
			$tags .= '<a href="'.get_term_link($term->slug, 'post_tag').'"> '.$term->name.'</a>,';
		}
		$tags = substr($tags,0,-1);
		$tags .= '</p>';
	}
	
	$out =  "<article class='{$class}'>";
	$out .= '	<div class="blog-entry-inner">';
	
	$out .= '		<div class="entry-meta">';
	$out .= "			<a href='{$link}' class='entry_format'></a>";
	$out .= '			<div class="date"><p>'. get_the_date('M',$id).' '.get_the_date('d',$id).' <span> '.get_the_date('Y',$id).'</span></p></div>';
	
	$commtext = "";
	if((wp_count_comments($id)->approved) == 0)	$commtext = '0';
	else $commtext = wp_count_comments($id)->approved;
	$out .= "			<a href='{$link}/#respond' class='comments'><span class='fa fa-comments'> </span> ".$commtext."</a>";
	$out .= '		</div>';
	
	$out .= '		<div class="entry-thumb">';
					
					if( $post_format === "image" || empty($post_format) ):
						$out .= "<a href='{$link}'>";
							if( has_post_thumbnail( $id )) {
								$out .= get_the_post_thumbnail($id,"full");	
							}else{
								$out .= '<img src="http://placehold.it/1060x636&text=Image"/>';
							}
						$out .= "</a>";
					elseif( $post_format === "gallery" ):
						if( array_key_exists("items", $post_meta) ):
							$out .= "<ul class='entry-gallery-post-slider'>";
							foreach ( $post_meta['items'] as $item ) {  foreach ( $post_meta['items_name'] as $item_name ) {
								$out .= "<li><img src='{$item}' alt='{$item_name}' /></li>"; }
							}
							$out .= "</ul>";
						endif;
					elseif( $post_format === "video" ):
			  			if( array_key_exists('oembed-url', $post_meta) ):
			  				$out .= "<div class='dt-video-wrap'>".wp_oembed_get($post_meta['oembed-url']).'</div>';
			  			elseif( array_key_exists('self-hosted-url', $post_meta) ):
			  				$out .= "<div class='dt-video-wrap'>".apply_filters( 'the_content', $post_meta['self-hosted-url'] ).'</div>';
			  			endif;

					elseif( $post_format === "audio" ):
						if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ):
							if( array_key_exists('oembed-url', $post_meta) ):
								$out .= wp_oembed_get($post_meta['oembed-url']);
							elseif( array_key_exists('self-hosted-url', $post_meta) ):
								$out .= apply_filters( 'the_content', $post_meta['self-hosted-url'] );
							endif;
						endif;
					else:
						$out .= "<a href='{$link}'>";
							if( has_post_thumbnail( $id )) {
								$out .= get_the_post_thumbnail($id,"full");	
							}else{
								$out .= '<img src="http://placehold.it/1060x636&text=Image"/>';
							}
						$out .= "</a>";
					endif;
	$out .= '		</div>';
	
	$out .= '		<div class="entry-details">';
	$out .= "			<div class='entry-title'><h4><a href='{$link}'>{$title}</a></h4></div>";
	
	$out .= '			<div class="entry-metadata">';
	$out .= "				<p class='author'><span class='fa fa-user'> </span><a href='".get_author_posts_url($author_id)."'>".get_the_author_meta('display_name',$author_id)."</a></p>";
	$out .=  				$tags;
	$out .= '			</div><!-- .entry-metadata -->';
	
	$out .= '			<div class="entry-body">';
						$excerpt = explode(' ', $p['post_content'], $excerpt_length);
						$excerpt = array_filter($excerpt);
						
						if (!empty($excerpt)) {
							if (count($excerpt) >= $excerpt_length) {
								array_pop($excerpt);
								$excerpt = implode(" ", $excerpt).'...';
							} else {
								$excerpt = implode(" ", $excerpt);
							}
						$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
						$excerpt = strip_tags($excerpt,'');
						}
	$out .= '<p>'. $excerpt.'</p>';

	$out .= '			</div>';

	$out .= "	 		<a href='{$link}' class='dt-sc-button small read-more'> {$read_more_text} </a>";	
	
	$out .= '		</div>';
	
	$out .= '	</div>';
	$out .= '</article>';
	return $out;
 }
}

#Recent Posts
add_shortcode('dt_sc_recent_post','dt_sc_recent_post');
function dt_sc_recent_post( $attrs, $content=null, $shortcodename ="" ){
	extract(shortcode_atts(array( 'count' => '2', 'column' => '2', 'read_more_text_show'=>"false",'read_more_text'=>__('Read More','dt_themes'),'excerpt_length'=>10, 'excerpt'=>"false"), $attrs));
	
	$out = "";
	$column = $column;
	
    $rposts = new WP_Query( array( 'posts_per_page' => $count, 'orderby' => 'date' ) );
    if ( $rposts->have_posts() ) {
        while( $rposts->have_posts() ) {
            $rposts->the_post();
			
			$id=get_the_id();
			$author=get_the_author();
			$post_format = get_post_format();
			$link = get_permalink($id);
			$post_meta = get_post_meta($id ,'_dt_post_settings',TRUE);
			$post_meta = is_array($post_meta) ? $post_meta  : array();
			
			if($column == 1) {
				$class = '<div class="column dt-sc-one-column blog-fullwidth first">';
			}else {
				if(($rposts->current_post % 2) == 0) {
					$class = "<div class='column dt-sc-one-half first'>";
				}else {
					$class = "<div class='column dt-sc-one-half'>";
				}
			}
				
			$out .= $class;
			$out .=  "<article class='postid- {$id} author- {$author} format-{$post_format} blog-entry'>";
			$out .= '	<div class="blog-entry-inner">';
			
			$out .= '		<div class="entry-meta">';
			$out .= "			<a href='".get_permalink()."' class='entry_format'></a>";
			$out .= '			<div class="date"><p>'. get_the_date('M').' '.get_the_date('d').' <span> '.get_the_date('Y').'</span></p></div>';

			$out .= "			<a href='".get_comments_link()."' class='comments'><span class='fa fa-comment'> </span> ".get_comments_number( 'no responses', '1', '%' )."</a>";
			$out .= '		</div>';
			
			$out .= '		<div class="entry-thumb">';
					
					if( $post_format === "image" || empty($post_format) ):
						$out .= "<a href='{$link}'>";
							if( has_post_thumbnail( $id )) {
								$out .= get_the_post_thumbnail($id,"full");	
							}else{
								$out .= '<img src="http://placehold.it/1060x636&text=Image"/>';
							}
						$out .= "</a>";
					elseif( $post_format === "gallery" ):
						if( array_key_exists("items", $post_meta) ):
							$out .= "<ul class='entry-gallery-post-slider'>";
							foreach ( $post_meta['items'] as $item ) { 
								$out .= "<li><img src='{$item}' /></li>";	
							}
							$out .= "</ul>";
						endif;
					elseif( $post_format === "video" ):
			  			if( array_key_exists('oembed-url', $post_meta) ):
			  				$out .= "<div class='dt-video-wrap'>".wp_oembed_get($post_meta['oembed-url']).'</div>';
			  			elseif( array_key_exists('self-hosted-url', $post_meta) ):
			  				$out .= "<div class='dt-video-wrap'>".apply_filters( 'the_content', $post_meta['self-hosted-url'] ).'</div>';
			  			endif;

					elseif( $post_format === "audio" ):
						if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ):
							if( array_key_exists('oembed-url', $post_meta) ):
								$out .= wp_oembed_get($post_meta['oembed-url']);
							elseif( array_key_exists('self-hosted-url', $post_meta) ):
								$out .= apply_filters( 'the_content', $post_meta['self-hosted-url'] );
							endif;
						endif;
					else:
						$out .= "<a href='{$link}'>";
							if( has_post_thumbnail( $id )) {
								$out .= get_the_post_thumbnail($id,"full");	
							}else{
								$out .= '<img src="http://placehold.it/1060x636&text=Image"/>';
							}
						$out .= "</a>";
					endif;
			#post description
			if($excerpt == "true" ):
				$out .= '			<div class="entry-thumb-desc">';								
				$out .= '<p>'.				wp_trim_words(get_the_content(),$excerpt_length).'</p>';					
				$out .= '			</div>';
			endif;
					
			$out .= '		</div>'; 
			
			$out .= '		<div class="entry-details">';
			$out .= '			<div class="entry-title"><h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4></div>';
			
			$out .= '			<div class="entry-metadata">';
			$out .= "				<p class='author'><span class='fa fa-user'> </span><a href='".get_author_posts_url(get_the_author_meta('ID'))."'>".get_the_author()."</a></p>";
		 
		 			if(has_tag()) :  
			$out .=   '<p class="tags"><span class="fa fa-tags"> </span>';
			$out .=   get_the_tag_list('',' , ','');
			$out .= '</p>'; 
			         endif;
					 
					 $category = get_the_category(); 
			$out .= '<p class="categories"><span class="fa fa-folder-open"> </span><a href="'.get_permalink().'">'.$category[0]->cat_name.'</a></p>';

			$out .= '			</div><!-- .entry-metadata -->';
			
		if($read_more_text_show == "true"):
			$out .= "	 		<a href='".get_permalink()."' class='dt-sc-button small read-more'> {$read_more_text} </a>";	
		endif;
			
			$out .= '		</div>';
			
			$out .= '	</div>';
			$out .= '</article>';
			$out .= '</div>';
			 
        }
    }
	
	return $out;
	wp_reset_query();
    
} 
?>