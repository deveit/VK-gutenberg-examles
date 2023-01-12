<?php

$attributes = isset($block) ? get_fields() : $args;

/**
 * Variables available:
 * @var $is_active - required;
 * @var $block_title - required;
 * @var $post_list - required;
 */

extract($attributes);

$id = $block['id'] ?? $args['id'];
$align = $block['align'] ? ' align'.$block['align'] : ' align'.$args['align'];


if (isset($block['data']['preview_image_help'])) :
	echo '<img src="'.$block['data']['preview_image_help'].'" style="width:100%; height:auto;">';
elseif ($is_active) : ?>
	<section class="section post-list <?php echo $align; ?>" id="<?php echo $id; ?>">
    <div class="post-list__bg">
      <div class="post-list__bg--center"></div>
    </div>
    <div class="container">
      <?php if ($block_title): ?>
        <div class="post-list__title">
          <?php echo $block_title ?>
        </div>
      <?php endif ?>

      <?php if( $post_list ): ?>
        <div class="post-list__row">
          <?php foreach( $post_list as $post ):
            $permalink = get_permalink( $post->ID );
            $title = get_the_title( $post->ID );
            $custom_field = get_field( 'field_name', $post->ID );
            $image = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'medium-large' );
            ?>
            <div class="post-list__item">
              <a class="post-list__item-content" href="<?php echo esc_url( $permalink ); ?>">
                <div class="post-list__image-container">
                  <?php if ($image): ?>
                    <img class="post-list__item-image"
                         src="<?php echo $image ?>" alt="<?php echo esc_html( $title ); ?>"
                         width="360"
                         height="225">
                  <?php endif ?>
                </div>
                <h4 class="h4_style" ><?php echo esc_html( $title ); ?></h4>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
	</section>
<?php endif;
