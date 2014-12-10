            <?php if( !is_page_template( 'tpl-fullwidth.php' ) ): ?>
            		</div><!-- **Container - End** -->
    		<?php endif;?>
         </div><!-- **Main - End** -->
    
    
    
    		<?php if(dttheme_option('general', 'show-newsletter') and dttheme_option('general', 'newsletter-listid') != ""): ?>        
            <!-- **Newsletter**  -->
            <div id="newsletter" class="newsletter-form">
              <div class="container">
                <h2><?php _e('Subscribe to Newsletter','dt_themes');?></h2>
                <form method="post" name="frmsubnewsletter">
                    <input name="btm_mc_emailid" type="email" placeholder="<?php _e('Enter Your Mail id','dt_themes');?>" required="" />
                    <input type="hidden" name="btm_mc_listid" value="<?php echo dttheme_option("general", "newsletter-listid"); ?>" />                       
                    <button name="submit" class="dt-sc-button large" ><?php _e('Subscribe','dt_themes');?></button>
                </form>	<?php 
                
                #AFTER SUBMITTING FORM...
                if( isset($_REQUEST['btm_mc_emailid']) ):
                
                    require_once(IAMD_FW."theme_widgets/mailchimp/MCAPI.class.php");
                    $mcapi = new MCAPI( dttheme_option('general','mailchimp-key') );
                    
                    $merge_vars = Array( 'FNAME' =>$_REQUEST['btm_mc_name'], 'EMAIL' => $_REQUEST['btm_mc_emailid'] );
                    $list_id = $_REQUEST['btm_mc_listid'];
        
                    if($mcapi->listSubscribe($list_id, $_REQUEST['btm_mc_emailid'], $merge_vars ) ):
                        // It worked!   
                      $msg = '<span style="color:green;">'.__('Success!&nbsp; Check your inbox or spam folder for a message containing a confirmation link.', 'dt_themes').'</span>';
                    else:
                        // An error ocurred, return error message   
                        $msg = '<span style="color:red;"><b>'.__('Error:', 'dt_themes').'</b>&nbsp; ' . $mcapi->errorMessage.'</span>';
                    endif;
                    
                    #PRINTING RESULT...
                    if ( isset($msg) ) echo '<span class="zn_mailchimp_result">'.$msg.'</span>';				
                endif; ?>
              </div>
            </div><!-- **Newsletter - End** -->
		<?php endif; ?>            
 
     
<?php $dttheme_options = get_option(IAMD_THEME_SETTINGS);
$dttheme_general = $dttheme_options['general'];?>
<!-- **Footer** -->
<footer id="footer">
<?php
if( !empty( $dttheme_general['show-footer-logo']) ):
						$url = isset( $dttheme_general['footer-logo-url'] ) ?  $dttheme_general['footer-logo-url'] : "";
						$footer_logo_class = "custom-logo"; 
						$footer_logo_class = !empty( $url ) ? $footer_logo_class : ""; ?>
						<div class="footer-logo <?php echo $footer_logo_class; ?>">
                          <?php if( !empty( $url ) ) : ?>
							<a href="<?php echo home_url();?>" title="<?php echo dttheme_blog_title();?>">
								<img src="<?php echo $url;?>" alt="<?php echo dttheme_blog_title(); ?>" title="<?php echo dttheme_blog_title(); ?>" />
							</a>  <?php endif; ?>   
						</div><?php
					  endif;?>
                      
<?php if(!empty($dttheme_general['show-footer'])): ?>
		<div class="container"><?php
        	echo do_shortcode('[dt_sc_hr_invisible]');
			echo do_shortcode('[dt_sc_clear]');
            echo '<div class="ico-border"> <i class="ico-bg flower"></i> </div>';
			echo do_shortcode('[dt_sc_hr_invisible]');
			echo do_shortcode('[dt_sc_clear]'); ?>
		<?php dttheme_show_footer_widgetarea($dttheme_general['footer-columns']);?></div>
<?php endif; ?>

       <div class="copyright gradient-bg"> 
        <div class="container">
            
				<?php if( !empty($dttheme_general['show-copyrighttext']) ): 
							echo "<div class='copyright-content'>".stripslashes($dttheme_general['copyright-text'])."</div>";
					  endif;
					  
					  if( !empty( $dttheme_general['show-footer-logo']) ):
						$url = isset( $dttheme_general['footer-logo-url'] ) ?  $dttheme_general['footer-logo-url'] : "";
						$url = !empty( $url ) ? $url : IAMD_BASE_URL."images/footer-logo.png";?>
						<div class="footer-menu">
					<?php  if (function_exists('wp_nav_menu')) :
								$footerMenu = wp_nav_menu(array('theme_location'=>'footer_menu','menu_id'=>'','menu_class'=>'footer-menu','echo'=>false,'container'=>false,'depth' => 1, 'fallback_cb'=>'dttheme_default_navigation'));
                    		endif;
                    		if(!empty($footerMenu))	echo $footerMenu;  ?>
                               
						</div><?php
					  endif;?>
			
		</div>
       </div>
</footer><!-- **Footer - End** -->
	</div><!-- **Inner Wrapper - End** -->
    
    
</div><!-- **Wrapper - End** -->

<?php	if (is_singular() AND comments_open())
			wp_enqueue_script( 'comment-reply');

		if(dttheme_option('integration', 'enable-body-code') != '') 
			echo stripslashes(dttheme_option('integration', 'body-code'));
		wp_footer(); ?>
</body>
</html>