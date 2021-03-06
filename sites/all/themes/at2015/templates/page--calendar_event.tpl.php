<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div id="page">

  <header class="header clearfix" >
      <?php print render($page['header']); ?>
  </header>
  <div id="nav" class="navigation">
      <?php print render($page['navigation']); ?>

  </div>
  <div id="highlighted">
      <?php $block = block_load('views', 'a6a3197875169e84a0517474cfa13f88');     
      print render(_block_get_renderable_array(_block_render_blocks(array($block)))); ?>
  </div>
  
  <div id="main">
<div class="title_bar">
<?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
  </div>    
    <div id="content" class="column" role="main">

     
      <a id="main-content"></a>
      
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div>

    

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_first || $sidebar_second): ?>
      <aside class="sidebars">
        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside>
    <?php endif; ?>

  </div>
<?php print render($page['footer']); ?>



</div>
<?php print render($page['bottom']); ?>
