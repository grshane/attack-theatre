<?php 
$content  = "<div class='glidecontent'>" . "\n";
$content .= drupal_render($node, 'content_glider');
$content .= "</div>" . "\n";
print $content;
?>
