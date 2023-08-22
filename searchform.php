
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<div class="d-flex search-form-wrap-sn align-items-center">
		<div class="sf-input-sn">
			<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Szukane słowo...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		</div>
		<div class="sf-submit-sn">
			<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
		</div>
	</div>		
	
</form>
