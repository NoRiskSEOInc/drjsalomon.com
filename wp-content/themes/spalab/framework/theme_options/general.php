<!-- #general -->
<div id="general" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"> 
            <li><a href="#my-general"><?php _e("General",'dt_themes');?></a></li>
            <li><a href="#my-sociable"><?php _e("Sociable",'dt_themes');?></a></li>
            <li><a href="#my-top"><?php _e("Top",'dt_themes');?></a></li>
        </ul>
        
        <!-- #my-general-->
        <div id="my-general" class="tab-content">
        
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                    <!-- Logo -->
                    <div class="box-title"><h3><?php _e('Logo','dt_themes');?></h3></div>
                    <div class="box-content">
                    
                    
                    	<div class="column three-fifth">
                            <div class="bpanel-option-set">
                                <?php $logo = array(
                                        'id'=>		'logo',
                                        'options'=>		array(
                                                            'true'	=> __('Custom Image Logo','dt_themes'),
                                                             ''=> 	__('Display Site Title <small><a href="options-general.php">(click here to edit site title)</a></small>','dt_themes')
                                                            )
                                        );
                                             
                                        $output = "";
                                        $i = 0;
                                        foreach($logo['options'] as $key => $option):
                                            $checked = ( $key ==  dttheme_option('general',$logo['id']) ) ? ' checked="checked"' : '';
                                            $output .= "<label><input type='radio' name='mytheme[general][$logo[id]]' value='{$key}'  $checked />$option</label>";
                                            if($i == 0):
                                                $output .='<div class="clear"></div>';
                                            endif;
                                        $i++;
                                        endforeach;
                                        echo $output;?>
                          </div><!-- .bpanel-option-set end-->
                      
                        </div>
                        
                        <div class="column two-fifth last">
                            <p class="note"><?php _e('You can choose whether you wish to display a custom logo or your site title.','dt_themes');?></p>
                        </div>  
                        
                        <div class="hr"> </div>                        
                        
                        <div class="image-preview-container">
                            <input id="mytheme-logo" name="mytheme[general][logo-url]" type="text" class="uploadfield" readonly="readonly"
                                    value="<?php echo  dttheme_option('general','logo-url');?>" />
                            <input type="button" value="<?php _e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php _e('Remove','dt_themes');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','logo-url'),false,'logo.png');?>
                        </div>
                        
                        <p class="note"> <?php _e('Upload a logo for your theme, or specify the image address of your online logo.','dt_themes');?> </p>
                        
                    </div> <!-- Logo End -->

                    <!-- Favicon -->
                    <div class="box-title">
                        <h3><?php _e('Favicon','dt_themes');?></h3>
                    </div>
                    <div class="box-content">
                    	<h6> <?php _e('Enable Favicon','dt_themes');?> </h6> 
                        
                        <div class="column one-fifth">                        
							<?php $checked = ( "true" ==  dttheme_option('general','enable-favicon') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','enable-favicon') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="enable-favicon" class="checkbox-switch <?php echo $switchclass;?>"></div>
                            <input class="hidden" id="enable-favicon" name="mytheme[general][enable-favicon]" type="checkbox" 
                            value="true" <?php echo $checked;?> />
                        </div>
                        <div class="column four-fifth last">                    
                            <input id="mytheme-favicon" name="mytheme[general][favicon-url]" type="text" class="uploadfield medium" 
                                value="<?php echo  dttheme_option('general','favicon-url');?>" />
                            <input type="button" value="<?php _e('Upload','dt_themes');?>" class="upload_image_button" />
                            <input type="button" value="<?php _e('Remove','dt_themes');?>" class="upload_image_reset" />
                        </div>
                        <p class="note"> <?php _e('Upload a favicon for your theme, or specify the oneline URL for favicon','dt_themes');?>  </p>
                    </div> <!-- Favicon End -->

                    <!-- Others -->
                    <div class="box-title"><h3><?php _e('Others', 'dt_themes');?></h3></div>
                    <div class="box-content">

                      <h6> <?php _e('Enable Sticky Navigation','dt_themes'); ?></h6>
                    
                      <div class="column one-fifth">
                        	<?php $checked = ( "true" ==  dttheme_option('general','enable-sticky-nav') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','enable-sticky-nav') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-enable-sticky-nav" class="checkbox-switch <?php echo $switchclass;?>"></div>
                            <input class="hidden" id="mytheme-enable-sticky-nav" name="mytheme[general][enable-sticky-nav]" type="checkbox" 
                            value="true" <?php echo $checked;?> />
                        </div>
                        
                        <div class="column four-fifth last">
                            <p class="note"><?php _e('YES! to enable sticky navigation.','dt_themes');?> </p>
                        </div>
                        
                        <div class="clear"> </div>
                        <div class="hr"></div>
                    

                      <h6> <?php _e('Globally Disable Comments on Pages','dt_themes');?> </h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','disable-page-comment') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','disable-page-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-page-comment" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input class="hidden" id="mytheme-global-page-comment" name="mytheme[general][disable-page-comment]" type="checkbox" value="true" <?php echo $checked;?> />
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note no-margin"><?php 
							_e('YES! to disable comments on all the pages. This will globally override your "Allow comments" option under your page "Discussion" settings. ','dt_themes');?> </p>
                      </div>
                      <div class="hr"></div>
                      
                      <div class="clear"> </div>

                      <h6> <?php _e('Globally Enable Page Title','dt_themes');?> </h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','disable-page-title') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','disable-page-title') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-page-title" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input class="hidden" id="mytheme-global-page-title" name="mytheme[general][disable-page-title]" type="checkbox" value="true" <?php echo $checked;?> />
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note no-margin"><?php 
							_e('YES! to enable page title on all the pages.','dt_themes');?> </p>
                      </div>
                      <div class="hr"></div>
                      <div class="clear"> </div>

                      <h6><?php _e('Globally Disable Comments on Posts','dt_themes');?></h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','global-post-comment') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','global-post-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-post-comment" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input class="hidden" id="mytheme-global-post-comment" name="mytheme[general][global-post-comment]" type="checkbox" value="true" <?php echo $checked;?> />
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note no-margin"><?php 
							_e('YES! to disable comments on all the posts. This will globally override your "Allow comments" option under your post "Discussion" settings. ','dt_themes');?> </p>
                      </div>
                      <div class="hr"></div>
                      

                      <h6><?php _e('Globally Disable Comments on Portfolios','dt_themes');?></h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','disable-portfolio-comment') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','disable-portfolio-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-portfolio-comment" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input class="hidden" id="mytheme-global-portfolio-comment" name="mytheme[general][disable-portfolio-comment]" type="checkbox" value="true" <?php echo $checked;?> />
                      </div>
                      
                      <div class="column four-fifth last">
                      	<p class="note"><?php _e('Enable/ Disable comments on portfolio pages.','dt_themes');?> </p>
                      </div>
                      <div class="hr"></div>
                      


                      <h6><?php _e('Globally Disable Breadcrumbs','dt_themes');?></h6>
                      <div class="column one-fifth">
                      	<?php $switchclass = ( "on" ==  dttheme_option('general','disable-breadcrumb') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-breadcrumb-disable" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input class="hidden" id="mytheme-global-breadcrumb-disable" name="mytheme[general][disable-breadcrumb]" type="checkbox" 
							<?php checked(dttheme_option('general','disable-breadcrumb'),'on');?>/>                            
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note"><?php _e('show / Hide Breacrumbs globally on sitewide','dt_themes');?> </p>
                      </div>
                      <div class="hr-invisible-small"> </div>
                      
                      <label><?php _e('Breadcrumb Delimiter','dt_themes');?></label>
                      <select id="mytheme-breadcrumb-delimiter" name="mytheme[general][breadcrumb-delimiter]"><?php 
					  	$breadcrumb_icons = array('fa-angle-double-right','fa-sort','fa-ok','fa-angle-right','fa-caret-right','fa-double-angle-right','fa-arrow-right','fa-chevron-right',
							'fa-hand-right','fa-plus','fa-remove');
							foreach($breadcrumb_icons as $breadcrumb_icon):
								$s = selected(dttheme_option('general','breadcrumb-delimiter'),$breadcrumb_icon,false);
								echo "<option $s >$breadcrumb_icon</option>";
							endforeach;?></select>
                      <p class="note"><?php _e('This is the symbol that will appear in between your breadcrumbs','dt_themes');?></p>
                      <div class="hr"></div>
                      
                      <h6><?php _e('Disable browser custom scroll','dt_themes');?></h6>
                      <div class="column one-fifth">
                      	<?php $switchclass = ( "on" ==  dttheme_option('general','disable-custom-scroll') ) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                        <div data-for="mytheme-browesr-scroll-disable" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input class="hidden" id="mytheme-browesr-scroll-disable" name="mytheme[general][disable-custom-scroll]" type="checkbox" 
							<?php checked(dttheme_option('general','disable-custom-scroll'),'on');?>/>
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note"><?php _e('Check if you do not want disable the browser custom scrollbar :)','dt_themes');?> </p>
                      </div>
                      <div class="hr"></div>
                      
                      
                      
                      <h6><?php _e('Disable Style Picker','dt_themes');?></h6>
                      <div class="column one-fifth">
                      	<?php $switchclass = ( "on" ==  dttheme_option('general','disable-picker') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-disable-picker" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input class="hidden" id="mytheme-global-disable-picker" name="mytheme[general][disable-picker]" type="checkbox" <?php checked(dttheme_option('general','disable-picker'),'on');?>/>                      </div>
                      <div class="column four-fifth last">
                      	<p class="note"><?php _e('YES! to hide the front end style picker','dt_themes');?> </p>
                      </div>
                      <div class="hr"></div>
                      
                      
                      
                      
                      <h6><?php _e('Disable import dummy content','dt_themes');?></h6>
                      <div class="column one-fifth">
                      	<?php $switchclass = ( "on" ==  dttheme_option('general','disable-import') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-import-disable" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        	<input class="hidden" id="mytheme-global-import-disable" name="mytheme[general][disable-import]" type="checkbox"  <?php checked(dttheme_option('general','disable-import'),'on');?>/>                      </div>
                            
                      <div class="column four-fifth last">
                      	<p class="note"><?php _e('YES! to hide Import Dummy Data button from the Adminpanel','dt_themes');?> </p>
                      </div>
                      <div class="hr"></div>
                      
                      
                      
                      <h6><?php _e('Google Font Subset','dt_themes');?></h6>
                      <div class="column one-half">
                      	<input id="mytheme-google-font-subset" name="mytheme[general][google-font-subset]" type="text" value="<?php echo dttheme_option('general','google-font-subset');?>"/>
                      </div>
                      
                      <div class="column one-half last">
                      	<p class="note no-margin"><?php _e('Specify which subsets should be downloaded. Multiple subsets should be separated with coma','dt_themes'); ?></p>
                      </div>
                      
                      <div class="clear"> </div>
                      <div class="hr-invisible-small"> </div>
                      <p class="note"><?php _e('Some of the fonts in the Google Font Directory supports multiple scripts (like Latin and Cyrillic for example). In order to specify which subsets should be downloaded the subset parameter should be appended to the URL. For a complete list of available fonts and font subsets please see','dt_themes'); 
							echo " <a href='http://www.google.com/webfonts'>Google Web Fonts</a>";?> </p>
                      <div class="hr"></div>
                      <div class="clear"> </div>
                      
                      
                      
                      <h6><?php _e('Mailchimp API KEY','dt_themes');?></h6>
                      <div class="column one-half">
                      	<input id="mytheme-mailchimp-key" name="mytheme[general][mailchimp-key]" type="text" value="<?php echo dttheme_option('general','mailchimp-key'); ?>" />
                      </div>
                      
                      <div class="column one-half last">
                      	<p class="note no-margin"><?php _e('Paste your mailchimp api key that will be used by the mailchimp widget.','dt_themes'); ?></p>
                      </div>
                      
                        <div class="hr"></div>
                        <div class="clear"> </div>
                        
                        <h6><?php _e('Site Bottom Newsletter','dt_themes');?></h6>
                    	<?php $switchclass = ( "on" ==  dttheme_option('general','show-newsletter') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div class="column one-fifth">                         
                        	<div data-for="mytheme-show-newsletter" class="checkbox-switch <?php echo $switchclass;?>"></div>
						 	<input class="hidden" id="mytheme-show-newsletter" name="mytheme[general][show-newsletter]" type="checkbox" 
							 <?php checked(dttheme_option('general','show-newsletter'),'on');?>/>
						</div>
                        <div class="column four-fifth last">
                        	<p class="note"><?php _e('show / Hide bottom newsletter form globally on sitewide','dt_themes');?> </p>
                        </div>
                        
                        <div class="hr-invisible-small"> </div>
                        
						<label><?php _e('Select List','dt_themes');?></label><?php
							//CALLING LISTS...
							require_once(IAMD_FW."theme_widgets/mailchimp/MCAPI.class.php");
							$mcapi = new MCAPI( dttheme_option('general','mailchimp-key') );
							$lists = $mcapi->lists(); //var_dump($lists); ?>
                        <select id="mytheme-newsletter-listid" name="mytheme[general][newsletter-listid]">
                        <option value=""><?php _e('Select', 'dt_themes'); ?></option>
                        <?php foreach ($lists['data'] as $key => $value):
                              $id = $value['id'];
                              $name = $value['name'];
							 // var_dump($name);
                              $selected = selected(dttheme_option('general','newsletter-listid'),$id,false);
                              echo "<option $selected value='$id'>$name</option>";
                           endforeach;?></select>
						 <p class="note no-margin"> <?php _e('Set mailchimp api key before selecting the list.','dt_themes');?> </p>
                         
                        
                    </div>                                            
                    
            </div><!-- .bpanel-box end-->
        </div><!--#my-general end-->
        
        

        <!-- #my-sociable-->
        <div id="my-sociable" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
            
                <div class="box-title">
                	<h3><?php _e('Sociable','dt_themes');?></h3>
                </div><!-- .box-title -->

                <div class="box-content">
                    <div class="bpanel-option-set">
                         <h6><?php _e('Show Sociable','dt_themes');?></h6>
                         
                         <div class="column one-fifth">
							 <?php $switchclass = ( "on" ==  dttheme_option('general','show-sociables') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                             <div data-for="mytheme-show-sociables" class="checkbox-switch <?php echo $switchclass;?>"></div>
                             <input class="hidden" id="mytheme-show-sociables" name="mytheme[general][show-sociables]" type="checkbox" 
                             <?php checked(dttheme_option('general','show-sociables'),'on');?>/>
                         </div>
                         
                         <input type="button" value="<?php _e('Add New Sociable','dt_themes');?>" class="black mytheme_add_item" />
                         
                         <div class="column four-fifth last">
                             <p class="note"> <?php _e('Manage Social Network icons list to display','dt_themes');?> </p>
                         </div>
                         
                         <div class="hr_invisible"></div>
                    </div>
                    
                    <div class="bpanel-option-set">
                        <ul class="menu-to-edit">
                        <?php $socials = dttheme_option('social');
						      if(is_array($socials)): 
							  	$keys = array_keys($socials);
								$i=0;
						 	  foreach($socials as $s):?>
                              <li id="<?php echo esc_attr( $keys[$i] );?>">
                                <div class="item-bar">
                                    <span class="item-title"><?php $n = $s['icon']; $n = explode('.',$n); $n = ucwords($n[count($n) - 2]); echo $n;?></span>
                                    <span class="item-control"><a class="item-edit"><?php _e('Edit','dt_themes');?></a></span>
                                </div>
                                <div class="item-content" style="display: none;">
                                	<span><label><?php _e('Sociable Icon','dt_themes');?></label>
										<?php echo dttheme_sociables_selection($keys[$i],$s['icon']);?></span>
                                    <span><label><?php _e('Sociable Link','dt_themes');?></label>
                                    	<input type="text" class="social-link" name="mytheme[social][<?php echo $keys[$i];?>][link]" value="<?php echo esc_attr( $s['link'] )?>"/>
                                    </span>
                                    
                                    <div class="remove-cancel-links">
                                        <span class="remove-item"><?php _e('Remove','dt_themes');?></span>
                                        <span class="meta-sep"> | </span>
                                        <span class="cancel-item"><?php _e('Cancel','dt_themes');?></span>
                                    </div>
                                </div>
                              </li>
                        <?php $i++;endforeach; endif;?> 
                        </ul>
                        
                        <ul class="sample-to-edit" style="display:none;">
                        	<!-- Social Item -->
                            <li>
                            	<!-- .item-bar -->
                            	<div class="item-bar">
                                	<span class="item-title"><?php _e('Sociable','dt_themes');?></span>
                                    <span class="item-control"><a class="item-edit"><?php _e('Edit','dt_themes');?></a></span>
                                </div><!-- .item-bar -->
                                <!-- .item-content -->
                                <div class="item-content">                                
                                	<span><label><?php _e('Sociable Icon','dt_themes');?></label><?php echo dttheme_sociables_selection();?></span>
                                    <span><label><?php _e('Sociable Link','dt_themes');?></label><input type="text" class="social-link" /></span>
                                    <div class="remove-cancel-links">
                                        <span class="remove-item"><?php _e('Remove','dt_themes');?></span>
                                        <span class="meta-sep"> | </span>
                                        <span class="cancel-item"><?php _e('Cancel','dt_themes');?></span>
                                    </div>
                                </div><!-- .item-content end -->
                            </li><!-- Social Item End-->
                        </ul>
                        
                    </div>
                </div> <!-- .box-content -->    
                
                
            </div><!-- .bpanel-box end -->
        </div><!--#my-sociable end-->
        
        <!--#my-sociable-->
        <div id="my-top" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
            
                <div class="box-title">
                	<h3><?php _e('Top Section','dt_themes');?></h3>
                </div><!-- .box-title -->

                <div class="box-content">
                	<textarea id="mytheme-bbar-tmsg" name="mytheme[general][top-message]" class="fullwidth-textarea"><?php echo stripslashes(dttheme_option('general','top-message'));?></textarea>
                    <p class="note"><?php _e("You can add your custom buddha bar message.",'dt_themes');?></p>                    
                </div><!-- .box-content-->
            
            </div><!-- .bpanel-box end -->
        </div><!--#my-top end-->

    </div><!-- .bpanel-main-content end-->
</div><!-- #general end-->