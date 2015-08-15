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
<div id="highlighted" class="highlighted">
        <?php print render($page['highlighted']); ?>
</div>
  <div id="main">
    <div id="content-container">
    <div id="content" class="column" role="main">
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div>
    <div class="callout">
    <?php print render($page['callout1']); ?>
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
  </div>

  <?php print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); ?>
