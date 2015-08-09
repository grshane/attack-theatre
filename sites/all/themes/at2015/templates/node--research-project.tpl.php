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
        <div class="project_info">
        	
      <div class="project-image"><?php echo render($content['field_default_news_image'][0]);?></div>
      <?php echo render($content['field_research_areas'][0]);?>
      <h1><?php print $title; ?></h1>
      <?php if (!empty($content['field_historical_research'])): ?>
      <?php echo '<i span class="fa fa-large fa-star"></i>&nbsp;Historical Research';?>
      <p></p>
      <?php else: ?>
      <?php echo ''; ?>
    <?php endif; ?>

      <div class="pop-stripe"></div>

      <?php echo render($content['body'][0]);?>
      <div class="author">Author(s): 
      	<?php echo render($content['field_faulty_supported']);?>
      	<?php echo render($content['field_additional_researchers']);?></div>
      <div class="project-button"><?php echo render($content['field_button_target'][0]);?></div>

  </div>

</article>