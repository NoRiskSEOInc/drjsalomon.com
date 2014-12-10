<!-- #appearance -->
<div id="color-options" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
			<?php $sub_menus = array(
						array("title"=>__("Color Options",'dt_themes'), "link" => "#color-options-header" ),
						);
						
				  foreach($sub_menus as $menu): ?>
                  	<li><a href="<?php echo esc_attr( $menu['link'] )?>"><?php echo $menu['title'];?></a></li>
			<?php endforeach?>
        </ul>

               
        <!-- Header Section -->
        <div id="appearance-menu" class="tab-content">
        	<div class="bpanel-box">
            
                <!-- Header Font -->
                <div class="box-title"><h3><?php _e('Change Skin Color','dt_themes');?></h3></div>
                <div class="box-content">
            
                    <div class="bpanel-option-set">
                    	<h6><?php _e('Disable Color options Settings','dt_themes');?></h6>
                        <?php dttheme_switch("",'color-options','disable-color-options-settings');?>
                        <p class="note"> <?php _e('Enable or Disable Color Options section settings.','dt_themes');?>  </p>                        
                    </div>
                    
                    <div class="clear"> </div>
                    <div class="hr"> </div>
                    
             <?php #TopBar Section Starts 
                    	# Top Bar Menu  ?>
                    <strong><h4><?php _e("TOP BAR","dt_themes"); ?></h4></strong>
                    <div class="column one-half">
                    <?php $label = 		__("Top Bar Menu",'dt_themes'); ?>  
                    <h6><?php echo $label;?></h6>	                                           
                    </div>
                    <div class="column one-half last">
                    <?php $name  =		"mytheme[color-options][topbar-left-menu-color]";	
						  $value =  	(dttheme_option('color-options','topbar-left-menu-color')  != NULL) ? dttheme_option('color-options','topbar-left-menu-color') : "#";
                          $tooltip = 	__("Pick a custom color for the Top Bar Menu e.g. #564912",'dt_themes'); ?>
                            <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo $tooltip;?></p>                    
                    </div>
                    
                    
					<?php # Top Bar RIGHT  
							 # Top Bar Ph-No ?>
                     
                    <div class="column one-half">
                    <?php $label = 		__("Top Bar Ph-no",'dt_themes'); ?>  
                    <h6><?php echo $label;?></h6>	                                           
                    </div>
                    <div class="column one-half last">
                    <?php $name  =		"mytheme[color-options][topbar-phno-color]";	
						  $value =  	(dttheme_option('color-options','topbar-phno-color')  != NULL) ? dttheme_option('color-options','topbar-phno-color') : "#";
                          $tooltip = 	__("Pick a custom color for the Top Bar Ph-No e.g. #564912",'dt_themes'); ?>
                            <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo $tooltip;?></p>                    
                    </div>
                    
						<?php # Top Bar E-Mail ?>
                    <div class="column one-half">
                    <?php $label = 		__("Top Bar Email",'dt_themes'); ?>  
                    <h6><?php echo $label;?></h6>	                                           
                    </div>
                    <div class="column one-half last">
                    <?php $name  =		"mytheme[color-options][topbar-email-color]";	
						  $value =  	(dttheme_option('color-options','topbar-email-color')  != NULL) ? dttheme_option('color-options','topbar-email-color') : "#";
                          $tooltip = 	__("Pick a custom color for the Top Bar E-Mail e.g. #564912",'dt_themes'); ?>
                            <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo $tooltip;?></p>                    
                    </div>
                    
                    <?php # Top Bar Hover ?>
                    <div class="column one-half">
                    <?php $label = 		__("Top Bar Hover",'dt_themes'); ?>  
                    <h6><?php echo $label;?></h6>	                                           
                    </div>
                    <div class="column one-half last">
                    <?php $name  =		"mytheme[color-options][topbar-hover-color]";	
						  $value =  	(dttheme_option('color-options','topbar-hover-color')  != NULL) ? dttheme_option('color-options','topbar-hover-color') : "#";
                          $tooltip = 	__("Pick a custom color for the Top Bar Hover Color e.g. #564912",'dt_themes'); ?>
                            <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo $tooltip;?></p>                    
                    </div>
              <?php #TopBar Section ENDS ?>
              <div class="hr"> </div>

                    <?php # Breadcrumb Border Color ?>
                    <strong><h4><?php _e("Breadcrumb Section","dt_themes"); ?></h4></strong>                    
                    <div class="column one-half">
                    <?php $label = 		__("Active Page Breadcrumb Text",'dt_themes'); ?>  
                    <h6><?php echo $label;?></h6>	                                           
                    </div>
                    <div class="column one-half last">
                    <?php $name  =		"mytheme[color-options][breadcrumb-border-color]";	
						  $value =  	(dttheme_option('color-options','breadcrumb-border-color')  != NULL) ? dttheme_option('color-options','breadcrumb-border-color') : "#";
                          $tooltip = 	__("Pick a custom color for the Active Page Breadcrumb Text e.g. #564912",'dt_themes'); ?>
                            <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo $tooltip;?></p>                    
                    </div>

                    <?php # Active page in Breadcrumb Section Color ?>
                    <div class="column one-half">
                    <?php $label = 		__("Active Page Breadcrumb Section",'dt_themes'); ?>  
                    <h6><?php echo $label;?></h6>	                                           
                    </div>
                    <div class="column one-half last">
                    <?php $name  =		"mytheme[color-options][active-pg-bsection-color]";	
						  $value = 		(dttheme_option('color-options','active-pg-bsection-color')  != NULL) ? dttheme_option('color-options','active-pg-bsection-color') : "#";
                          $tooltip = 	__("Pick a custom color for the Active Page in Breadcrumb section color e.g. #564912",'dt_themes'); ?>
                            <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo $tooltip;?></p>                    
                    </div> 
                  
                </div><!-- Header Font End-->
            </div>
        </div><!-- Header Section (#appearance-menu) End-->
    </div><!-- .bpanel-main-content end -->
</div><!-- #appearance  end-->