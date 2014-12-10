<?php get_header();?>
<?php $page_layout 	= dttheme_option('specialty','search-layout');
  	  $page_layout 	= !empty($page_layout) ? $page_layout : "content-full-width";
	  
	  $post_layout 	= dttheme_option('specialty','search-post-layout'); 
	  $post_layout 	= !empty($post_layout) ? $post_layout : "one-column";
	 
	  $show_sidebar = false;
	  $sidebar_class = "";
	  $post_class = "";
	  $columns = NULL;
	  
	#TO SET PAGE LAYOUT
	switch($page_layout):
		case 'with-left-sidebar':
			$page_class = $page_layout;
			$show_sidebar = true;
			$sidebar_class = "left-sidebar";
		break;

		case 'with-right-sidebar':
			$show_sidebar = true;
		break;
	endswitch;
	
	#TO SET POST LAYOUT
	switch($post_layout):
		case 'one-column':
			$post_class = $show_sidebar ? " column dt-sc-one-column with-sidebar blog-fullwidth" : " column dt-sc-one-column blog-fullwidth";
			
		break;
		
		case 'one-half-column';
			$post_class = $show_sidebar ? " column dt-sc-one-half with-sidebar" : " column dt-sc-one-half";
			$columns = 2;
		break;
		
	endswitch;?>
      <!-- **Primary Section** -->
      <section id="primary" class="<?php echo esc_attr( $page_layout ); ?>">
<?php	if( have_posts() ):
			$i = 1;
			while( have_posts() ):
				the_post();
				
				$temp_class = "";
				if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
				if($i == $columns) $i = 1; else $i = $i + 1;?>
                
                <div class="<?php echo esc_attr( $temp_class ); ?>">
                	<!-- #post-<?php the_ID()?> starts -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry'); ?>>
                    	<!-- .blog-entry-inner -->
                        <div class="blog-entry-inner">
                        
                        	<!-- .entry-meta -->
                            <div class="entry-meta">
                            	<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" class="entry_format"> </a>
                                
                                <div class="date">
                                	<p> <?php echo get_the_date('M').' '.get_the_date('d');?> <span> <?php echo get_the_date('Y'); ?> </span> </p>
                                </div>
                                
                                <?php comments_popup_link(
										__('<span class="fa fa-comments"> </span> 0','dt_themes'),
										__('<span class="fa fa-comments"> </span> 1','dt_themes'),
										' <span class="fa fa-comments"> </span> % ',"comments" ,__('<span class="fa fa-comments-o"> </span>','dt_themes'));?>
                            </div><!-- .entry-meta -->

                            <!-- .entry-thumb -->
                            <div class="entry-thumb">
								<?php $format = get_post_format(  get_the_id() );
                                      $post_meta = get_post_meta(get_the_id() ,'_dt_post_settings',TRUE);
                                      $post_meta = is_array($post_meta) ? $post_meta  : array();?>
                                      
                                    <?php if( $format === "image" || empty($format) ): ?>
                                        <a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>">
                                        <?php if( has_post_thumbnail() ):
                                                the_post_thumbnail("full");
                                              else:?>
                                                <img src="http://placehold.it/1060x636&text=Image" alt="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" />
                                        <?php endif;?>
                                        </a>
                                <?php elseif( $format === "gallery" ):
                                        if( array_key_exists("items", $post_meta) ):
                                            echo "<ul class='entry-gallery-post-slider'>";
                                            foreach ( $post_meta['items'] as $item ) { 
											 foreach ( $post_meta['items_name'] as $items_name ) {
												 echo "<li><img src='{$item}' alt='{$items_name}' /></li>";	} }
                                            echo "</ul>";
                                        endif;
                    
                                      elseif( $format === "video" ):
                                         if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ):
                                            if( array_key_exists('oembed-url', $post_meta) ):
                                                 echo "<div class='dt-video-wrap'>".wp_oembed_get($post_meta['oembed-url']).'</div>';
                                             elseif( array_key_exists('self-hosted-url', $post_meta) ):
                                                  echo "<div class='dt-video-wrap'>".apply_filters( 'the_content', $post_meta['self-hosted-url'] ).'</div>';
                                             endif;
                                          endif;
                                          
                                      elseif( $format === "audio" ):
                                          if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ):
                                              if( array_key_exists('oembed-url', $post_meta) ):
                                                  echo wp_oembed_get($post_meta['oembed-url']);
                                              elseif( array_key_exists('self-hosted-url', $post_meta) ):
                                                  echo apply_filters( 'the_content', $post_meta['self-hosted-url'] );
                                              endif;
                                          endif;
                                      else: ?>
                                        <a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php
                                            if( has_post_thumbnail() ):
                                                the_post_thumbnail("full");
                                            else:?>
                                                <img src="http://placehold.it/1060x636&text=Image" alt="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" />
                                        <?php endif;?></a>
                                <?php endif; ?>
                            </div><!-- .entry-thumb -->
                            
                            <!-- .entry-details -->
                            <div class="entry-details">
                            	<?php if(is_sticky()): ?>
                                		<div class="featured-post"> <span class="fa fa-trophy"> </span> <?php _e('Featured','dt_themes');?></div>
                                <?php endif;?>
                                
                                <!-- .entry-title -->
                                <div class="entry-title">
                                	<h4><a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php the_title();?></a></h4>
                                </div><!-- .entry-title -->
                                
                                <div class="entry-metadata">
                                	<p class="author">
                                    	<span class='fa fa-user'> </span>
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" title="<?php _e('View all posts by ','dt_themes').get_the_author();?>">
										<?php echo get_the_author();?></a>
                                        <?php the_tags("<p class='tags'><span class='fa fa-tags'> </span> ",', ','</p>');?>
                                        <p class="categories"><span class='fa fa-folder-open'> </span><?php the_category(', '); ?></p>
                                    </p>
                                </div><!-- .entry-metadata -->
                                
                                <div class="entry-body"><?php echo dttheme_excerpt(15);?></div>
                                
                                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>" class="dt-sc-button small read-more">
	                                             	<?php _e('Read More','dt_themes');?> </a>
                                
                            
                            </div><!-- .entry-details -->                        
                        </div><!-- .blog-entry-inner -->
                    </article><!-- #post-<?php the_ID()?> Ends -->
                </div>
                
<?php			endwhile;
			else: ?>
            	<div class="dt-sc-hr-invisible"> </div>
                	<h1><?php _e( 'Nothing Found','dt_themes'); ?></h1>
                    <h3><?php _e( 'Apologies, but no results were found for the requested archive.', 'dt_themes'); ?></h3>
					<?php get_search_form();
			endif;?>
            
           <!-- **Pagination** -->
           <div class="pagination">
                <div class="prev-post"><?php previous_posts_link(__('<span class="fa fa-angle-double-left"></span> Prev','dt_themes'));?></div>
                <?php echo dttheme_pagination();?>
                <div class="next-post"><?php next_posts_link(__('Next <span class="fa fa-angle-double-right"></span>','dt_themes'));?></div>
           </div><!-- **Pagination - End** -->

      </section><!-- **Primary Section** -->
        
<?php if($show_sidebar): ?>
	  <!-- **Secondary Section ** -->
      <section id="secondary" class="<?php echo esc_attr( $sidebar_class ); ?>">
<?php 	get_sidebar();?>      
      </section><!-- **Secondary Section - End** -->
<?php endif; ?>
          
<?php get_footer();?>