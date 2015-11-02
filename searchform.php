<?php
/**
 * Search form template
 *
 * @package themeHandle
 */
?>

<form method="get" class="search-form form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<div class="input-group">
		  <span class="input-group-addon">  
		  	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
			</span>
		  <input type="text" name='s' class="form-control" placeholder="Search" aria-describedby="sizing-addon1">
		</div>
	</div>
	<input type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'themeTextDomain' ); ?>" />
</form>
