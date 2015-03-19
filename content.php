<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 * 
 * @package WordPress
 * @subpackage NARGA
 * @since NARGA 1.2
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
    <header>
        <?php if ( is_single() ) : ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php else : ?>
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'View %s', 'narga' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php endif; // is_single() ?>
        <?php if (narga_options('post_meta')!= '0' ) { narga_entry_meta(); } ?>
    </header>
    <section class="entry-content<?php if ( has_post_format( 'video' )) {echo ' flex-video';}?>">
        <?php the_content(); ?>
    </section>
    <footer>
<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'narga'), 'after' => '</p></nav>' )); ?>
<?php
if (is_singular()) {
    if (narga_options('display_tags') == '1') {
        echo '<p class="tags">';
        the_tags('<span class="radius label">','</span> <span class="radius label">','</span>');
        echo '</p>';
    }
    if (narga_options('posts_navigation') == '1') { ?>
        <nav class="nav-single">
            <h3 class="assistive-text"><?php _e( 'Post navigation', 'narga' ); ?></h3>
            <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'narga' ) . '</span> %title' ); ?></span>
            <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'narga' ) . '</span>' ); ?></span>
        </nav>      
        <?php 
    }
}?>
    </footer>
</article>
