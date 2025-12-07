<?php
// search form
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<label class="screen-reader-text" for="search-field"><?php _e('Sök efter:', 'blogez-theme'); ?></label>
	<input type="search" id="search-field" class="search-field" placeholder="<?php esc_attr_e('Sök…', 'blogez-theme'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</form>
