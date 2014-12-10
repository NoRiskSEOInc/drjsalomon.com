<!-- **Searchform** -->
<?php $search_text = empty($_GET['s']) ? __("Enter Keyword",'dt_themes') : get_search_query(); ?> 
<form method="get" class="searchform" action="<?php echo home_url();?>">
    <input id="s-keyword" name="s" type="text" 
         	value="<?php echo esc_attr( $search_text ); ?>" class="text_input"
		    onblur="if(this.value==''){this.value='<?php echo $search_text;?>';}"
            onfocus="if(this.value =='<?php echo $search_text;?>') {this.value=''; }" />
	<input type="submit"  value="" style="font-family:FontAwesome" />
</form><!-- **Searchform - End** -->