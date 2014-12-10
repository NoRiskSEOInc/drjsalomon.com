    <div id="bbar-wrapper" class="type1">
    	<div id="bbar-body">
        	<div class="container">
            	<div class="column dt-sc-one-half first"><?php
					echo '<p class="bbar-text">'.get_bloginfo ( 'description' ).'</p>';
                    ?></div>
                <div class="column dt-sc-one-half alignright"><?php
					$top_msg = stripslashes(dttheme_option('general','top-message'));
					echo do_shortcode($top_msg);
				?></div>
            </div>
        </div>
        <span class="bbar-divider"></span>
    </div>