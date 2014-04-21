<?php
/**
 * The sidebar containing the main widget area.
 * If no active widgets in sidebar, let's hide it completely.
 * 
 * @package WordPress
 * @subpackage NARGA
 * @since NARGA 1.0
 **/
?>
<!-- sidebar -->
<div class="large-4 medium-4 small-12 columns">
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <aside class="sidebar" role="complementary">
    <?php dynamic_sidebar("sidebar-1"); ?>
    </aside>
	<?php endif; ?>
</div>
<!-- /sidebar -->
