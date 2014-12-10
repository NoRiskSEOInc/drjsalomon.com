<!-- #company -->
<div id="company" class="bpanel-content">
	<!-- .bpanel-main-content -->
	<div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-company"><?php _e("Company",'dt_themes');?></a></li>
            <li><a href="#my-payment"><?php _e("Payment",'dt_themes');?></a></li>
            <li><a href="#my-notifications"><?php _e("Notifications",'dt_themes');?></a></li>            
        </ul>
        
        <!-- #my-company start -->
        <div id="my-company" class="tab-content">
        	<div class="bpanel-box"><?php
            if( dttheme_is_plugin_active('designthemes-core-features/designthemes-core-features.php') ) : ?>
            	<div class="box-title"><h3><?php _e('Settings','dt_themes');?></h3></div>
                <div class="box-content">
                    <h6><?php _e('Business Hours','dt_themes');?></h6><?php
						echo '<table>'; 
						foreach ( array( 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday' ) as $day ):
							echo '<tr>';
							echo '<td>'.ucfirst( $day ).'</td>';
							echo '<td>';
							echo dt_company_timer( "mytheme[company][dt_company_{$day}_start]",dttheme_option('company', "dt_company_{$day}_start"));
							echo '<span> - '.__( 'To', 'dt_themes' ).' - </span>';
							echo dt_company_timer( "mytheme[company][dt_company_{$day}_end]", dttheme_option('company', "dt_company_{$day}_end") ,false);
							echo '</td>';
							echo '</tr>';
						endforeach;
						echo '</table>';?>
                </div><?php
            else:?>
                <div class="box-title"><h3><?php _e('Warning','dt_themes');?></h3></div>
                <div class="box-content">
                    <p class="note"><?php _e("You have to install and activate the Design Themes Core plugin to use this module ..",'dt_themes');?></p>
                </div><?php
            endif;?>    
            </div>
        </div><!-- #my-company end -->
        
                <!-- #my-payment start -->
        <div id="my-payment">
            <div class="bpanel-box"><?php
                if( dttheme_is_plugin_active('designthemes-core-features/designthemes-core-features.php') ) : ?>
                    <div class="box-title"><h3><?php _e('Payments','dt_themes');?></h3></div>
                    <div class="box-content">

                        <h6><?php _e('Currency','dt_themes');?></h6>
                        <select name="mytheme[company][currency]"><?php
                            $selected = dttheme_option('company', 'currency');
                            $currency_code_options = dt_currencies();
                            foreach ( $currency_code_options as $code => $name ) {
                                $symbol = dt_currency_symbol( $code );
                                $s = ( $code === $selected ) ? ' selected="selected" ' : "";
                                echo "<option value='{$code}' {$s}>{$name}( {$symbol} )</option>";
                            }?>
                        </select>
                        <div class="hr"></div>

                        <h6><?php _e('Enable Pay At Arrival','dt_themes');?></h6>
                        <div class="column one-fifth">
                            <?php dttheme_switch("",'company','enable-pay-at-arrival');?>
                        </div>
                        <div class="column four-fifth last">
                            <p class="note no-margin"><?php _e('You can enable pay at arrival option to pay locally','dt_themes');?></p>
                        </div>
                        <div class="hr"></div>

                        <h6><?php _e('Enable Paypal','dt_themes');?></h6>
                        <div class="column one-fifth">
                            <?php dttheme_switch("",'company','enable-paypal');?>
                        </div>
                        <div class="column four-fifth last">
                            <p class="note no-margin"><?php _e('You can enable express checkout paypal ','dt_themes');?></p>
                        </div>

                        <div class="clear"> </div>
                        <div class="hr-invisible-small"> </div>
                        <h6><?php _e('API Username','dt_themes');?></h6>
                        <input name="mytheme[company][api-username]" type="text" class="large" value="<?php echo dttheme_option('company','api-username');?>"/>

                        <div class="hr-invisible-small"> </div>
                        <h6><?php _e('API Password','dt_themes');?></h6>
                        <input name="mytheme[company][api-password]" type="text" class="large" value="<?php echo dttheme_option('company','api-password');?>"/>

                        <div class="hr-invisible-small"> </div>
                        <h6><?php _e('API Signature','dt_themes');?></h6>
                        <input name="mytheme[company][api-signature]" type="text" class="full-width" value="<?php echo dttheme_option('company','api-signature');?>"/>

                        <div class="hr-invisible-small"> </div>
                        <h6><?php _e('Enable Live','dt_themes');?></h6>
                        <div class="column one-fifth">
                            <?php dttheme_switch("",'company','enable-live');?>
                        </div>
                        <div class="column four-fifth last">
                            <p class="note no-margin"><?php _e('You can enable live express checkout paypal ','dt_themes');?></p>
                        </div>
                        <div class="hr"></div>
                    </div>                
                <?php
                else:?>
                    <div class="box-title"><h3><?php _e('Warning','dt_themes');?></h3></div>
                    <div class="box-content">
                        <p class="note"><?php _e("You have to install and activate the Design Themes Core plugin to use this module ..",'dt_themes');?></p>
                    </div><?php
                endif;?>
            </div>
        </div><!-- #my-payment end -->

        <!-- #my-notifications start -->
        <div id="my-notifications" class="tab-content">
        	<div class="bpanel-box"><?php
            if( dttheme_is_plugin_active('designthemes-core-features/designthemes-core-features.php') ) :

                $sender_name = dttheme_option('company', 'notification_sender_name'); 
                $sender_name = !empty($sender_name) ? $sender_name : get_option( 'blogname' );

                $sender_email = dttheme_option('company', 'notification_sender_email'); 
                $sender_email = !empty( $sender_email ) ? $sender_email : get_option( 'admin_email' );?>
                <div class="box-title"><h3><?php _e('Settings','dt_themes');?></h3></div>
                <div class="box-content">
                    <h6><?php _e('Sender Name','dt_themes');?></h6>
                    <input type="text" name="mytheme[company][notification_sender_name]" value="<?php echo esc_attr( $sender_name );?>"/>
                    <h6><?php _e('Sender Emailid','dt_themes');?></h6>
                    <input type="text" name="mytheme[company][notification_sender_email]" value="<?php echo esc_attr( $sender_email );?>"/>
                    <div class="hr"></div>

                    <h6><?php _e('To send scheduled agenda please execute following script with your cron','dt_themes');?></h6>
                    <h5><?php echo WP_PLUGIN_DIR.'/designthemes-core-features/reservation/cron/send_agenda_cron.sh';?></h5>
                </div>
            
            	<div class="box-title"><h3><?php _e('To Staff','dt_themes');?></h3></div>
                <div class="box-content">
                
                	<h6><b><?php _e('New Appoinment Notification','dt_themes');?></b></h6>
                    <h5><?php _e('Subject','dt_themes');?></h5>
                    <input type="text" name="mytheme[company][appointment_notification_to_staff_subject]" class="full-width" 
                    	value="<?php echo dttheme_option('company', 'appointment_notification_to_staff_subject'); ?>"/>
                    <h5><?php _e('Mesage','dt_themes');?></h5><?php
						$value = dttheme_option('company', 'appointment_notification_to_staff_message');
						$args = array('quicktags' => true,'media_buttons' => false,'teeny' => true,'textarea_rows' => 12,
								'textarea_name' => 'mytheme[company][appointment_notification_to_staff_message]');
						echo wp_editor( $value, 'appointment_notification_to_staff_message', $args ); ?>
                        
                    <div class="hr"></div>
                    
                    
                    <h6><b><?php _e('Notification to the staff regarding modified Appointment', 'dt_themes');?></b></h6>
                    <h5><?php _e('Subject','dt_themes');?></h5>
                    <input type="text" name="mytheme[company][modified_appointment_notification_to_staff_subject]" class="full-width" 
                    	value="<?php echo dttheme_option('company', 'modified_appointment_notification_to_staff_subject'); ?>"/>
                    <h5><?php _e('Mesage','dt_themes');?></h5><?php
						$value = dttheme_option('company', 'modified_appointment_notification_to_staff_message');
						$args = array('quicktags' => true,'media_buttons' => false,'teeny' => true,'textarea_rows' => 12,
								'textarea_name' => 'mytheme[company][modified_appointment_notification_to_staff_message]');
						echo wp_editor( $value, 'modified_appointment_notification_to_staff_message', $args ); ?>
                        
                    <div class="hr"></div>

                    <h6><b><?php _e('Notification to the staff regarding Deleted / Declined Appointment', 'dt_themes');?></b></h6>
                    <h5><?php _e('Subject','dt_themes');?></h5>
                    <input type="text" name="mytheme[company][deleted_appointment_notification_to_staff_subject]" class="full-width" 
                    	value="<?php echo dttheme_option('company', 'deleted_appointment_notification_to_staff_subject'); ?>"/>
                    <h5><?php _e('Mesage','dt_themes');?></h5><?php
						$value = dttheme_option('company', 'deleted_appointment_notification_to_staff_message');
						$args = array('quicktags' => true,'media_buttons' => false,'teeny' => true,'textarea_rows' => 12,
								'textarea_name' => 'mytheme[company][deleted_appointment_notification_to_staff_message]');
						echo wp_editor( $value, 'deleted_appointment_notification_to_staff_message', $args ); ?>
                        
                    <div class="hr"></div>

                    <h6><b><?php _e('Evening notification with the next day agenda to Staff Member', 'dt_themes');?></b></h6>
                    <h5><?php _e('Subject','dt_themes');?></h5>
                    <input type="text" name="mytheme[company][agenda_to_staff_subject]" class="full-width" 
                    	value="<?php echo dttheme_option('company', 'agenda_to_staff_subject'); ?>"/>
                    <h5><?php _e('Mesage','dt_themes');?></h5><?php
						$value = dttheme_option('company', 'agenda_to_staff_message');
						$args = array('quicktags' => true,'media_buttons' => false,'teeny' => true,'textarea_rows' => 12,
								'textarea_name' => 'mytheme[company][agenda_to_staff_message]');
						echo wp_editor( $value, 'agenda_to_staff_message', $args ); ?>
                        
                    <div class="hr"></div>
                </div>

            	<div class="box-title"><h3><?php _e('To Customer','dt_themes');?></h3></div>
                <div class="box-content">
                
                	 <h6><b><?php _e('Notification to the client about new Appointment', 'dt_themes');?></b></h6>
                     <h5><?php _e('Subject','dt_themes');?></h5>
                     <input type="text" name="mytheme[company][appointment_notification_to_client_subject]" class="full-width" 
                    	value="<?php echo dttheme_option('company', 'appointment_notification_to_client_subject'); ?>"/>
                     <h5><?php _e('Mesage','dt_themes');?></h5><?php
						$value = dttheme_option('company', 'appointment_notification_to_client_message');
						$args = array('quicktags' => true,'media_buttons' => false,'teeny' => true,'textarea_rows' => 12,
								'textarea_name' => 'mytheme[company][appointment_notification_to_client_message]');
						echo wp_editor( $value, 'appointment_notification_to_client_message', $args ); ?>
                     <div class="hr"></div>

                	 <h6><b><?php _e('Notification to the client regarding modified Appointment', 'dt_themes');?></b></h6>
                     <h5><?php _e('Subject','dt_themes');?></h5>
                     <input type="text" name="mytheme[company][modified_appointment_notification_to_client_subject]" class="full-width" 
                    	value="<?php echo dttheme_option('company', 'modified_appointment_notification_to_client_subject'); ?>"/>
                     <h5><?php _e('Mesage','dt_themes');?></h5><?php
						$value = dttheme_option('company', 'modified_appointment_notification_to_client_message');
						$args = array('quicktags' => true,'media_buttons' => false,'teeny' => true,'textarea_rows' => 12,
								'textarea_name' => 'mytheme[company][modified_appointment_notification_to_client_message]');
						echo wp_editor( $value, 'modified_appointment_notification_to_client_message', $args ); ?>
                     <div class="hr"></div>

                	 <h6><b><?php _e('Notification to the client regarding Deleted / Declined Appointment', 'dt_themes');?></b></h6>
                     <h5><?php _e('Subject','dt_themes');?></h5>
                     <input type="text" name="mytheme[company][deleted_appointment_notification_to_client_subject]" class="full-width" 
                    	value="<?php echo dttheme_option('company', 'deleted_appointment_notification_to_client_subject'); ?>"/>
                     <h5><?php _e('Mesage','dt_themes');?></h5><?php
						$value = dttheme_option('company', 'deleted_appointment_notification_to_client_message');
						$args = array('quicktags' => true,'media_buttons' => false,'teeny' => true,'textarea_rows' => 12,
								'textarea_name' => 'mytheme[company][deleted_appointment_notification_to_client_message]');
						echo wp_editor( $value, 'deleted_appointment_notification_to_client_message', $args ); ?>
                     <div class="hr"></div>
                     
                     <h6><b><?php _e('Notification to the Success Message', 'dt_themes');?></b></h6>
                     <h5><?php _e('Message','dt_themes');?></h5><?php
						$value = dttheme_option('company', 'success_message');
						$args = array('quicktags' => true,'media_buttons' => false,'teeny' => true,'textarea_rows' => 12,
								'textarea_name' => 'mytheme[company][success_message]');
						echo wp_editor( $value, 'success_message', $args ); ?>
                     <div class="hr"></div>
                     
                     <h6><b><?php _e('Notification to the Failure Message', 'dt_themes');?></b></h6>
                     <h5><?php _e('Message','dt_themes');?></h5><?php
						$value = dttheme_option('company', 'error_message');
						$args = array('quicktags' => true,'media_buttons' => false,'teeny' => true,'textarea_rows' => 12,
								'textarea_name' => 'mytheme[company][error_message]');
						echo wp_editor( $value, 'error_message', $args ); ?>
                     <div class="hr"></div>
                </div><?php
            else:?>
                <div class="box-title"><h3><?php _e('Warning','dt_themes');?></h3></div>
                <div class="box-content">
                    <p class="note"><?php _e("You have to install and activate the Design Themes Core plugin to use this module ..",'dt_themes');?></p>
                </div><?php    
            endif;?>
            </div>
        </div><!-- #my-notifications end -->
        
    </div><!-- .bpanel-main-content -->
</div><!-- #company end -->
