<?php
wp_reset_query();
global $post;

if( is_page() ):
	dttheme_show_sidebar('page',$post->ID);

elseif( is_singular('post') ):
	dttheme_show_sidebar('page',$post->ID);

elseif( is_singular('dt_galleries')):
	dttheme_show_sidebar('dt_galleries',$post->ID);
	
elseif( is_post_type_archive('product') ):
	dttheme_show_sidebar('page',get_option('woocommerce_shop_page_id'));

elseif( is_singular('product') ):

	$disable = dttheme_option('woo',"disable-shop-everywhere-sidebar-in-product-detail");
	if( is_null($disable) )
		if(function_exists('dynamic_sidebar') && dynamic_sidebar('shop-everywhere-sidebar') ): endif;

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('product-detail-sidebar') ): endif;

elseif( is_tax('portfolio_entries') ):	
	$disable = dttheme_option('specialty',"disable-everywhere-sidebar-for-gallery-archives");
	if( is_null($disable) )
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar')) ): endif;

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('custom-post-gallery-archives') ): endif;

elseif( is_author() ):
	$disable = dttheme_option('specialty',"disable-everywhere-sidebar-for-author-archives");
	if( is_null($disable) )
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar')) ): endif;

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('author-archive-sidebar') ): endif;

elseif( is_search() ):
	$disable = dttheme_option('specialty',"disable-everywhere-sidebar-for-search");
	if( is_null($disable) )
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar')) ): endif;

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('search-sidebar') ): endif;

elseif( is_404() ):
	$disable = dttheme_option('specialty',"disable-everywhere-sidebar-for-404");
	if( is_null($disable) )
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar')) ): endif;

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('not-found-404-sidebar') ): endif;

elseif( class_exists('woocommerce') && is_product_category() ):
	$disable = dttheme_option('woo',"disable-shop-everywhere-sidebar-in-product-category-archive");
	if( is_null($disable) )
		if(function_exists('dynamic_sidebar') && dynamic_sidebar('shop-everywhere-sidebar') ): endif;

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('product-category-archive-sidebar') ): endif;

elseif( class_exists('woocommerce') && is_product_tag() ):
	$disable = dttheme_option('woo',"disable-shop-everywhere-sidebar-in-product-tag-archive");
	if( is_null($disable) )
		if(function_exists('dynamic_sidebar') && dynamic_sidebar('shop-everywhere-sidebar') ): endif;

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('product-tag-archive-sidebar') ): endif;
	
elseif( is_tag() ):
	$disable = dttheme_option('specialty',"disable-everywhere-sidebar-for-tag-archives");
	if( is_null($disable) )
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar')) ): endif;

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('post-tags-archive-sidebar') ): endif;

elseif( is_archive() ):
	$disable = dttheme_option('specialty',"disable-everywhere-sidebar-for-category-archives");
	if( is_null($disable) )
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar')) ): endif;

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('post-category-archive-sidebar') ): endif;

else:
	if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar')) ): endif;
endif;?>