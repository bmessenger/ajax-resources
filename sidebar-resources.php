<?php
/**
 * Resources Sidebar
 */

if ( ! is_active_sidebar( 'sidebar-resources' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area resources-sidebar">
	<?php dynamic_sidebar( 'sidebar-resources' ); ?>
</aside><!-- #secondary -->
