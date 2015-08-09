<?php

/**
 * @file node-nodeblock-default.tpl.php
 *
 * Theme implementation to display a nodeblock enabled block. This template is
 * provided as a default implementation that will be called if no other node
 * template is provided. Any node-[type] templates defined by the theme will
 * take priority over this template. Also, a theme can override this template
 * file to provide its own default nodeblock theme.
 *
 * Additional variables:
 * - $nodeblock: Flag for the nodeblock context.
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?> style="background-image: url('<?php print render (file_create_url($node->field_preview_image['und'][0]['uri']));  ?>');">

  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && !$nodeblock): ?>
    <h2<?php print $title_attributes; ?>></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php
        print t('Submitted by !username on !datetime',
          array('!username' => $name, '!datetime' => $date));
      ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>  >
      <?php print render($content['field_subtitle']); ?>
      <h2><?php print render($content['body']); ?></h2>
      <span class="nolink"><?php print render($content['field_button_target']); ?></span>
    </span>

    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
     
    ?>

  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
