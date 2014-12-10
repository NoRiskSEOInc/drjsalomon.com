<?php
/* 
	Template Name: Catalog Template
*/
	get_header();

	while(have_posts()): the_post();
		
	  //GETTING META VALUES...
	  $meta_set = get_post_meta($post->ID, '_tpl_default_settings', true);
	  $page_layout = !empty($meta_set['layout']) ? $meta_set['layout'] : 'content-full-width'; ?>
	  
	  <!-- content starts here -->
	  <div class="content">
          <div class="container">
              <section class="<?php echo esc_attr( $page_layout ); ?> menu-items-list" id="primary">
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php          
                      the_content();
                      wp_link_pages(array('before' => '<div class="page-link"><strong>'.__('Pages:', 'dt_themes').'</strong> ', 'after' => '</div>', 'next_or_number' => 'number'));
                      
                      //PERFORMING CATALOG LAYOUT...
                      get_template_part( 'framework/loops/content', 'catalog-post-layout');
                      edit_post_link(__('Edit', 'dt_themes'), '<span class="edit-link">', '</span>' ); ?>
                  </article>
              </section>
              <?php if($page_layout != 'content-full-width' && $page_layout == 'with-left-sidebar'): ?>
                  <section class="left-sidebar" id="secondary"><?php get_sidebar(); ?></section>
              <?php elseif($page_layout != 'content-full-width' && $page_layout == 'with-right-sidebar'): ?>    
                  <section id="secondary"><?php get_sidebar(); ?></section>
              <?php endif;
        endwhile; ?>
          </div>
      </div>
	  <!-- content ends here -->      

<?php get_footer(); ?>