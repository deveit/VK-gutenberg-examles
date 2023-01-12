<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer" id="footer" >
    <div class="footer-row">
        <?php if($footer_logo = get_field('footer_logo','options')): ?>
            <div class="footer-logo text-center">
                <img class="transform-rotate--0-5 " src="<?php echo $footer_logo['sizes']['max_200'] ?>" alt="">
            </div>
        <?php endif; ?>
        <div class="footer-content">
            <p>&copy; Nugget GmbH</p>
            <?php if (has_nav_menu('footer-menu')) { ?>
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer-menu','depth'=>1));?>
            <?php } ?>
        </div>
    </div>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
