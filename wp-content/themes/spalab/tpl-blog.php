<?php /*Template Name: Blog Template*/?>
<?php get_header();?>
<?php $tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
	  $tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
	  
  	$page_layout 	= isset( $tpl_default_settings['layout'] ) ? $tpl_default_settings['layout'] : "content-full-width";
	$show_sidebar 	= false;
	$sidebar_class 	= "";
	
	$post_layout	= isset( $tpl_default_settings['blog-post-layout'] ) ? $tpl_default_settings['blog-post-layout'] : "one-column";
	$post_image 	= "blog-column"; 
	$post_class 	= "";
	$columns		= "";
	
	$categories 	= isset($tpl_default_settings['blog-post-exclude-categories']) ? array_filter($tpl_default_settings['blog-post-exclude-categories']) : NULL;
	$post_per_page 	= isset($tpl_default_settings['blog-post-per-page']) ? $tpl_default_settings['blog-post-per-page'] : -1;;
	$container_class = "";
	
	#TO SET PAGE LAYOUT
	switch($page_layout):
		case 'with-left-sidebar':
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
			$post_image 	= "blog-full-width"; 
		break;
		
		case 'one-half-column';
			$post_class = $show_sidebar ? " column dt-sc-one-half with-sidebar" : " column dt-sc-one-half";
			$columns = 2;
			$container_class = "apply-isotope";
		break;
		
	endswitch;
	
	$hide_date_meta = isset( $tpl_default_settings['disable-date-info'] ) ? " hidden " : "";
	$hide_comment_meta = isset( $tpl_default_settings['disable-comment-info'] ) ? " hidden " : " comments ";
	
	$hide_author_meta = isset( $tpl_default_settings['disable-author-info'] ) ? " hidden " : "";
	$hide_category_meta = isset( $tpl_default_settings['disable-category-info'] ) ? " hidden " : "";
	$hide_tag_meta = isset( $tpl_default_settings['disable-tag-info'] ) ? " hidden " : "tags";
	
	$page_layout = $show_sidebar ?  "with-sidebar ".$page_layout : $page_layout;?>
      
       <!-- **Primary Section** -->
       <section id="primary" class="<?php echo esc_attr( $page_layout ); ?>">
<?php	if( have_posts() ):
			while( have_posts() ):
				the_post(); ?>
                <!-- #post-<?php the_ID(); ?> -->
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_content(); 
					  wp_link_pages( array(	'before' =>	'<div class="page-link">', 'after' => '</div>','link_before' =>	'<span>','link_after' => '</span>',
					  						'next_or_number' =>	'number','pagelink' =>	'%', 'echo' =>1 ) );
					  edit_post_link( __( ' Edit ','dt_themes' ) );?>
				</div><!-- #post-<?php the_ID(); ?> -->
<?php 		endwhile;
		endif;?>
        
        <div class="clear"></div>
<!--- Start loop to show blog posts -->
<?php  if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
	   elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
	   else { $paged = 1; }
		
				if(empty($categories)):
					$args = array('paged'=>$paged,'posts_per_page'=>$post_per_page,'post_type'=> 'post');
				  else:
					$exclude_cats = array_unique($categories);
					$args = array('paged'=>$paged,'posts_per_page'=>$post_per_page,'category__not_in'=>$exclude_cats,'post_type'=>'post');
				   endif;
				   
				   echo "<div class='tpl-blog-holder {$container_class} '>";
				   query_posts($args);
				   if( have_posts() ):
				   		$i = 1;
						while( have_posts() ):
							the_post();
							
							$temp_class = "";
							if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
							if($i == $columns) $i = 1; else $i = $i + 1; ?>
							
                          
                            <div class="<?php echo esc_attr( $temp_class ); ?>">
                            
                                <!-- #post-<?php the_ID()?> starts -->
                                <article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry'); ?>>
                                
                                	<div class="blog-entry-inner">
                                    	<div class="entry-meta">
                                        	<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" class="entry_format"> </a>
                                            
                                            <div class="date <?php echo $hide_date_meta;?> ">
                                            	<p> <?php echo get_the_date('M').' '.get_the_date('d');?> <span> <?php echo get_the_date('Y'); ?> </span> </p>
                                            </div>
                                            
                                            <?php
												comments_popup_link(
													__('<span class="fa fa-comment"> </span> 0','dt_themes'),
													__('<span class="fa fa-comment"> </span> 1','dt_themes'),
													' <span class="fa fa-comment"> </span> % ',$hide_comment_meta ,__('<span class="fa fa-comments-o"> </span>','dt_themes'));?> 
                                        </div><!-- .entry-meta -->
                                        
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
														  foreach ( $post_meta['items_name'] as $items_name ){ 
															echo "<li><img src='{$item}' alt='{$items_name}' /></li>"; }
														}
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
                                            
                                            <?php if( array_key_exists('blog-post-excerpt-length',$tpl_default_settings) ): ?>                                    
                                           				<div class="entry-thumb-desc"><?php echo dttheme_excerpt($tpl_default_settings['blog-post-excerpt-length']);?></div>
                                			<?php endif;?>
                                     
                                        </div><!-- .entry-thumb -->
                                        
                                        <div class="entry-details">
                                        
                                            <?php if(is_sticky()): ?>
                                            <div class="featured-post"> <span class="fa fa-trophy"> </span> <?php _e('Featured','dt_themes');?></div>
                                            <?php endif;?>
                                        
                                        	<div class="entry-title"><h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s'), the_title_attribute( 'echo=0' ) ); ?>">
													<?php the_title(); ?></a></h4></div>
                                                    
                                            <div class="entry-metadata">
                                            	<p class="author <?php echo $hide_author_meta;?>"><span class='fa fa-user'> </span> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" title="<?php _e('View all posts by ', 'dt_themes').get_the_author();?>">
												<?php echo get_the_author();?></a> </p>
                                                <?php the_tags("<p class='{$hide_tag_meta}'><span class='fa fa-tags'> </span> ",', ','</p>');?>
                                                <p class="<?php echo esc_attr( $hide_category_meta); ?> categories"><span class='fa fa-folder-open'> </span><?php the_category(', '); ?></p>
                                            </div><!-- .entry-metadata -->
                                        </div><!-- .entry-details -->
                                        
                                    </div>
                                </article><!-- #post-<?php the_ID()?> Ends -->
                            </div>
<?php					endwhile;
				   endif;?>
<?php            echo "</div>"; ?>
                   
                   
                   <!-- **Pagination** -->
                   <div class="pagination">
						<div class="prev-post"><?php previous_posts_link(__('<span class="fa fa-angle-double-left"></span> Prev','dt_themes')); ?></div>
                        <?php echo dttheme_pagination();?>
                        <div class="next-post"><?php next_posts_link(__('Next <span class="fa fa-angle-double-right"></span>','dt_themes')); ?></div>
                   </div><!-- **Pagination - End** -->
<!--- End of loop to show blog posts -->        
       </section>

<?php if($show_sidebar): ?>
	  <!-- **Secondary Section ** -->
      <section id="secondary" class="<?php echo esc_attr( $sidebar_class ); ?>">
<?php 	get_sidebar();?>      
      </section><!-- **Secondary Section - End** -->
<?php endif; ?>       

<?php get_footer();?>