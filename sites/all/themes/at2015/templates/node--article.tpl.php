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

    <header>
      <h1>
      <?php if (!empty($content['field_title_override'])): ?>
      <?php echo render($content['field_title_override'][0]);?>
      <?php else: ?>
      <?php echo render($content['title'][0]);?>
      <?php endif; ?>
      </h1>
</header>
<article>
      <?php echo '<h2>'.render($content['field_subheading'][0]).'</h2>';?>

      <?php print '<span class="caption">'.$date; ?><?php echo ' - by '.render($content['field_author'][0]).'</span>';?>

      <?php if (!empty($content['field_default_news_image'])): ?>
      <?php echo '<div class="news-image">'.render($content['field_default_news_image'][0]).'<br /><span class="caption">'.render($content['field_default_news_image_caption'][0]).'</span></div>';?>
      <?php else: ?>
      <?php echo '';?>
      <?php endif; ?>

      <?php if (!empty($content['field_second_news_image'])): ?>
      <?php echo '<div class="news-image">'.render($content['field_second_news_image'][0]).'<br /><span class="caption">'.render($content['field_second_news_image_caption'][0]).'</span></div>';?>
      <?php else: ?>
      <?php echo '';?>
      <?php endif; ?>

      <?php if (!empty($content['field_third_news_image'])): ?>
      <?php echo '<div class="news-image">'.render($content['field_third_news_image'][0]).'<br /><span class="caption">'.render($content['field_third_news_image_caption'][0]).'</span></div>';?>
      <?php else: ?>
      <?php echo '';?>
      <?php endif; ?>

      <?php if (!empty($content['field_fourth_news_image'])): ?>
      <?php echo '<div class="news-image">'.render($content['field_fourth_news_image'][0]).'<br /><span class="caption">'.render($content['field_fourth_news_image_caption'][0]).'</span></div>';?>
      <?php else: ?>
      <?php echo '';?>
      <?php endif; ?>

      <?php if (!empty($content['field_body_override'])): ?>
      <?php echo render($content['field_body_override'][0]);?>
      <?php else: ?>
      <?php echo render($content['body'][0]);?>
      <?php endif; ?>

      <?php echo '<h3>For More Information, Contact:</h3> '.render($content['field_for_more_information'][0]);?>

      <?php if (!empty($content['field_event_type'])): ?>
      <?php echo '<h3>Keywords:</h3> '.render($content['field_event_type'][0]);?>
      <?php else: ?>
      <?php echo ''; ?>
      <?php endif; ?>

</article>

