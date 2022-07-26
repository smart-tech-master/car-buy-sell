<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package patricia-lite
 */
?>

<div class="col-md-3 col-sm-3 sidebar">
	<aside id="sidebar">
		<?php if ( is_active_sidebar('sidebar-1') ) { dynamic_sidebar('sidebar-1'); } ?>
	</aside>
</div>
	