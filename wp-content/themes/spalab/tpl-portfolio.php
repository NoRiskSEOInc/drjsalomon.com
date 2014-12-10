<?php /*Template Name: Portfolio Template*/?>
<?php get_header();?>
<?php $tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
	  $tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
	  
	  $page_layout 		= isset( $tpl_default_settings['layout'] ) ? $tpl_default_settings['layout'] : "content-full-width";
	  $show_sidebar		= false;
	  $sidebar_class	= "";
	  
	  $show_content_in_one_column = false;
	  
	  $post_layout		= isset( $tpl_default_settings['portfolio-post-layout'] ) ? $tpl_default_settings['portfolio-post-layout'] : "one-half-column";
	  $post_per_page 	= $tpl_default_settings['portfolio-post-per-page'];
	  $last 			= NULL;
	  $categories 		= isset($tpl_default_settings['portfolio-categories']) ? array_filter($tpl_default_settings['portfolio-categories']) : "";

	  if(empty($categories)):
		$categories = get_categories('taxonomy=portfolio_entries&hide_empty=1');
	  else:
		$args = array('taxonomy'=>'portfolio_entries','hide_empty'=>1,'include'=>$categories);
		$categories = get_categories($args);			
	  endif;
	  

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
			$post_class = $show_sidebar ? " portfolio dt-sc-one-column with-sidebar " : " portfolio dt-sc-one-column ";
			$show_content_in_one_column = true;
		break;
		
		case 'one-half-column';
			$post_class = $show_sidebar ? " portfolio dt-sc-one-half with-sidebar " : " portfolio dt-sc-one-half ";
			$last = 2;
		break;
		
		case 'one-third-column':
			$post_class = $show_sidebar ? " portfolio dt-sc-one-third with-sidebar " : " portfolio dt-sc-one-third ";
			$last = 3;
		break;

		case 'one-fourth-column':
			$post_class = $show_sidebar ? " portfolio dt-sc-one-fourth with-sidebar " : "portfolio dt-sc-one-fourth";
			$last = 4;
		break;
		
	endswitch;?>
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
        
        
        <!-- ** Portfolio Item Loop Begin ** -->
        <?php if( sizeof($categories) > 1 ) :
				if( array_key_exists("filter",$tpl_default_settings) && (!empty($categories)) ):
					$post_class .= " all-sort ";?>
                	<div class="dt-sc-sorting-container">
                    	<a href="#" class="active-sort" title="" data-filter=".all-sort"><?php _e('All','dt_themes');?></a>
	                    <?php foreach( $categories as $category ): ?>
    	                    <a href='#' data-filter=".<?php echo $category->category_nicename;?>-sort"><?php echo $category->cat_name;?></a>
        	            <?php endforeach; ?>
            	    </div>
		<?php 	endif;
			  endif;?>
              
               <!-- **Portfolio Container** -->
               <div class="dt-sc-portfolio-container gallery"><?php
			   
			   if ( get_query_var('paged') ) {
				   $paged = get_query_var('paged');
			   } elseif ( get_query_var('page') ) { 
			   	   $paged = get_query_var('page');
			   } else { 
			   	   $paged = 1;
			   }
			   
                    $args = array();
                    $categories = array_filter($tpl_default_settings['portfolio-categories']);
                    
                    if(is_array($categories) && !empty($categories)):
                        $terms = $categories;
                        $args = array(	'orderby'	=> 'ID'
                                        ,'order'	=> 'ASC'
                                        ,'paged'	=> $paged
                                        ,'posts_per_page' 	=> $post_per_page
                                        ,'tax_query'		=> array( array( 'taxonomy'=>'portfolio_entries', 'field'=>'id', 'operator'=>'IN', 'terms'=>$terms  ) ) );
                    else:
                        $args = array(	'paged' => $paged ,'posts_per_page' => $post_per_page,'post_type' => 'dt_portfolios');
                    endif;


				  query_posts($args);
					if( have_posts() ):
						while( have_posts() ):
							the_post();
							$the_id = get_the_ID();
							
							$portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
							$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
							
							#Find sort class by using the portfolio_entries
                            $sort = " ";
                            if( array_key_exists("filter",$tpl_default_settings) ):
                                $item_categories = get_the_terms( $the_id, 'portfolio_entries' );
                                if(is_object($item_categories) || is_array($item_categories)):
                                    foreach ($item_categories as $category):
                                        $sort .= $category->slug.'-sort ';
                                    endforeach;
                                endif;
                            endif;?>
                            
                            <!-- Portfolio Item -->
                            <div id="<?php echo "portfolio-{$the_id}";?>" class="<?php echo esc_attr( $post_class.$sort ); ?>">
                            	<div class="portfolio-thumb"><?php
									if( array_key_exists("items_name",$portfolio_item_meta) ):
										$item =  $portfolio_item_meta['items_name'][0];
										$image = $popup = "";	
										if( "video" === $item ):
											$image = "http://placehold.it/1060x713&text=Video%20Portfolio";
											$popup = $portfolio_item_meta['items'][0];
										else:
											$image = $popup = $portfolio_item_meta['items'][0];
										endif;
									else:
										$popup = $image = "http://placehold.it/1060x713&text=Add%20Image%20/%20Video%20%20to%20Portfolio";
									endif;?>
									<img src="<?php echo esc_attr( $image );?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>" alt="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"/>
	
									<div class="image-overlay">
                                        <div class="portfolio-detail"><?php
                                            if(dttheme_is_plugin_active('roses-like-this/likethis.php')): ?>
                                                <div class="views">
                                                    <i class="fa fa-heart-o"> </i><?php printLikes($post->ID); ?> </div><?php
                                            endif;?>
                                            <div class="portfolio-meta-content"><h5><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h5><?php
                                                if( array_key_exists("sub-title",$portfolio_item_meta) ):
                                                    echo "<p>{$portfolio_item_meta['sub-title']}</p>";
                                                endif;?>
                                            </div>
                                        </div>
									</div>
                              	</div>
                                
                            </div><!-- Portfolio Item End--><?php
						endwhile;
					endif;?>
                            
               </div><!-- **Portfolio Section Container End** -->
               
               <div class="clear"></div>
               <div class="hr-invisible-small"> </div> 
               
               <!-- **Pagination** -->
               <div class="pagination">
               	<div class="prev-post"><?php previous_posts_link(__('<span class="fa fa-angle-double-left"></span> Prev','dt_themes'));?></div>
                <?php echo dttheme_pagination();?>
                <div class="next-post"><?php next_posts_link(__('Next <span class="fa fa-angle-double-right"></span>','dt_themes'));?></div>
		      </div><!-- **Pagination - End** -->

        
        <!-- ** Portfolio Item Loop End ** -->
       </section>
<?php if($show_sidebar): ?>
	  <!-- **Secondary Section ** -->
      <section id="secondary" class="<?php echo esc_attr( $sidebar_class ); ?>">
<?php 	get_sidebar();?>      
      </section><!-- **Secondary Section - End** -->
<?php endif; ?>       
    
<?php get_footer();?>