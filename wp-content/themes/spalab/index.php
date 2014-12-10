<?php get_header();?>

<?php $pageid = get_option('page_for_posts');
		if($pageid > 0) {
			
			$tpl_default_settings = get_post_meta( $pageid, '_tpl_default_settings', TRUE );
			$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
			$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
		
		} else {
			
			$page_layout 	= dttheme_option('specialty','category-archives-layout');
			$page_layout 	= !empty($page_layout) ? $page_layout : "content-full-width";
		
		}

		$show_sidebar = false;
		$sidebar_class= "";

	#TO SET PAGE LAYOUT
	switch ( $page_layout ) {
		case 'with-left-sidebar':
			$page_class = $page_layout;
			$show_sidebar = true;
			$sidebar_class = "with-sidebar left-sidebar";
		break;
	
		case 'with-right-sidebar':
			$show_sidebar = true;
			$sidebar_class = "with-sidebar right-sidebar";
		break;
	} ?>

    <!-- **Primary Section** -->
    <section id="primary" class="<?php echo esc_attr( $page_layout ); ?>">

		<?php
		if($pageid > 0) {
			
			$post_class = $show_sidebar ? " column dt-sc-one-column with-sidebar" : " column dt-sc-one-column";
			$container_class = "";
			
		} else {
	
			$post_layout = dttheme_option('specialty','category-archives-post-layout'); 
			$post_layout = !empty($post_layout) ? $post_layout : "one-column";
			$post_class = $container_class = "";
	
			switch($post_layout):
				case 'one-column':
					$post_class = " column dt-sc-one-column ";
				break;
				
				case 'one-half-column';
					$post_class = " column dt-sc-one-half";
					$columns = 2;
				break;
			endswitch;
		
		}

		if( have_posts() ):
			$i = 1;
			while( have_posts() ):
				the_post();
				$temp_class = "";
				$columns = "";
				if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
				if($i == $columns) $i = 1; else $i = $i + 1;
				$format = get_post_format(  get_the_id() );?>
				<div class="<?php echo esc_attr( $temp_class ); ?>"><?php  get_template_part( 'framework/loops/content');?></div>
<?php 		endwhile;
		endif; ?>
		
      <!-- **Pagination** -->
      <div class="pagination">
            <div class="prev-post"><?php previous_posts_link('<span class="fa fa-angle-double-left"></span> Prev');?></div>
            <?php echo dttheme_pagination();?>
            <div class="next-post"><?php next_posts_link('Next <span class="fa fa-angle-double-right"></span>');?></div>
      </div><!-- **Pagination - End** -->
    </section><!-- **Primary Section** -->

<?php if($show_sidebar): ?>
          <!-- **Secondary Section ** -->
          <section id="secondary" class="<?php echo esc_attr( $sidebar_class ); ?>">
    		<?php get_sidebar();?>      
          </section><!-- **Secondary Section - End** -->
<?php endif; ?>

<?php get_footer(); ?>