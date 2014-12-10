    <div id="bbar-wrapper" class="type2">
    	<div id="bbar-body">
        	<div class="container">
            	<div class="column dt-sc-one-half first"><?php
					echo do_shortcode('[social/]'); ?></div>
                <div class="column dt-sc-one-half alignright"><?php
					$top_msg = stripslashes(dttheme_option('general','top-message'));
					echo do_shortcode($top_msg);					
				?></div>
            </div>
        </div>
        <span class="bbar-divider"></span>
    </div>