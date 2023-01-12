</section>
<?php if (is_admin()) { ?>
    <script>
        var $ = jQuery;
        <?php echo file_get_contents($dir . '/scripts.js'); ?>
    </script>
<?php } ?>
