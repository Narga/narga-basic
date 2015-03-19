<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the #main and #page div elements.
 * 
 * @package WordPress
 * @subpackage NARGA
 * @since NARGA 1.0
 **/
?>

<!-- End row for main content area -->
<aside class="columns" id="sub-footer">
    <?php dynamic_sidebar("footer-1"); ?>
</aside>
</section>

<!-- Footer area -->
<footer role="contentinfo">
    <div id="colophon" class="row">
        <div id="footer-info" class="left">
        <?php
        if (narga_options('footer_info') != '')
            echo narga_options('footer_info');
        else
            printf( __('<p>Proudly powered by <a href="http://wordpress.org/" title="%1$s" rel="generator">%2$s</a> &middot; <a href="http://www.narga.net/" title="%3$s" rel="designer">%4$s</a>.</p>', 'narga'), esc_attr( 'A Semantic Personal Publishing Platform'), 'WordPress', esc_attr( 'NARGA'), 'NARGA');
        ?>
        </div>
        <div class="right show-for-medium-up">
        <?php narga_footer_navigation(); ?>
        </div>
    </div>

</footer>
<?php wp_footer(); ?>
</body>
</html>

