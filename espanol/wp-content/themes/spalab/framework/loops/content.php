<!-- #post-<?php the_ID()?> starts -->
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry'); ?>>
	<div class="blog-entry-inner">
    
        <div class="entry-meta">
            <a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" class="entry_format"> </a>
            <div class="date">
                <p> <?php echo get_the_date('M').' '.get_the_date('d');?> <span> <?php echo get_the_date('Y'); ?> </span> </p>
            </div>
            <?php comments_popup_link( __('<span class="fa fa-comments"> </span> 0','dt_themes'), __('<span class="fa fa-comments"> </span> 1','dt_themes'),
                  '<span class="fa fa-comments"> </span> % ','comments' ,__('<span class="fa fa-comments-o"> </span>','dt_themes'));?> 
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
                        foreach ( $post_meta['items'] as $item ) { echo "<li><img src='{$item}' /></li>";	}
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
        
        <div class="entry-details">
        	<?php if(is_sticky()): ?>
            		<div class="featured-post"> <span class="fa fa-trophy"> </span> <?php _e('Featured','dt_themes');?> </div>
            <?php endif;?>
            
            <div class="entry-title">
            	<h4><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h4>
            </div>
            
            <div class="entry-metadata">
            	<p class="author">
                	<span class='fa fa-user'> </span>
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" title="<?php _e('View all posts by ', 'dt_themes').get_the_author();?>"><?php echo get_the_author();?></a></p>
                    
                    <p class="categories"><span class='fa fa-folder-open'> </span><?php the_category(', '); ?></p>
            </div><!-- .entry-metadata-->
            
            <div class="entry-body">
            	<?php echo dttheme_excerpt(50);?>
                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>" class="dt-sc-button small read-more">
	                                             	<?php _e('Read More','dt_themes');?> </a>
            </div>

        </div><!-- .entry-details -->
      
    </div><!-- .blog-entry-inner-->
</article><!-- #post-<?php the_ID()?> Ends -->