<?php

add_action('admin_head', function(){
   ?>
    <style>
        body[class*="taxonomy-user_"] .form-field.term-description-wrap,
        body[class*="taxonomy-user_"] .column-description,
        body[class*="taxonomy-user_"] .column-posts,
        body[class*="taxonomy-user_"] .row-actions .view {
            display: none;
        }
    </style>
    <?php
});