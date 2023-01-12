<div class="buttonComponent <?php echo $args['centered_buttons'] ? 'center' : '' ?>">
  <?php foreach ($args['buttons'] as $button) : ?>
    <div class="buttonComponent__single">
      <a href="<?php echo $button['button_link']['url'] ?>"
         class="btn btn__<?php echo $button['button_color_style'] ?>"
         target="<?php echo $button['button_link']['target'] ?? "_self" ?>"
         title="<?php echo $button['button_link']['title'] ?>">
        <?php echo $button['button_link']['title'] ?>
      </a>
    </div>

  <?php endforeach; ?>
</div>
