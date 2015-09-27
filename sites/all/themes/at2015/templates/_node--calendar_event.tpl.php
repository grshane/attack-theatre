<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>

<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php /*if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): */?>

    <div class="event_buttons">
<?php
 dsm($node);
?>


 <?php if (!empty($content['field_showclix_link'])): ?>
      <?php echo '<a href="'.render($content['field_showclix_link']).'&width=600&height=600&iframe=true"><span class="button">Tickets</span></a>';?>
      <?php else: ?>
      <?php echo 'nothing found'; ?>
    <?php endif; ?>

    <?php if (!empty($content['field_press_citations'])): ?>
      <?php echo '<a href="#press">Press</a>';?>
      <?php else: ?>
      <?php echo ''; ?>
    <?php endif; ?>

<?php print render($content['addtoany']); ?>

</div>
  <?php /*endif; */?>

  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    print render($content);
  ?>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</article>
