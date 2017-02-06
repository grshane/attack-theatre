<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 */
?><!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->

<head>
  <?php print $head; ?>

  <title><?php print $head_title; ?></title>

  <?php if ($default_mobile_metatags): ?>
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width">
  <?php endif; ?>
  <link rel="apple-touch-icon" sizes="57x57" href="/sites/all/themes/at2015/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/sites/all/themes/at2015/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/sites/all/themes/at2015/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/sites/all/themes/at2015/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/sites/all/themes/at2015/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/sites/all/themes/at2015/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/sites/all/themes/at2015/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/sites/all/themes/at2015/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/sites/all/themes/at2015/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="/sites/all/themes/at2015/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="/sites/all/themes/at2015/favicon-194x194.png" sizes="194x194">
  <link rel="icon" type="image/png" href="/sites/all/themes/at2015/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="/sites/all/themes/at2015/android-chrome-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="/sites/all/themes/at2015/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="/sites/all/themes/at2015/manifest.json">
  <link rel="shortcut icon" href="/sites/all/themes/at2015/favicon.ico">
  <meta name="msapplication-TileColor" content="#dc6328">
  <meta name="msapplication-TileImage" content="/sites/all/themes/at2015/mstile-144x144.png">
  <meta name="msapplication-config" content="/sites/all/themes/at2015/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  <!--[if IEMobile]><meta http-equiv="cleartype" content="on"><![endif]-->

  <?php print $styles; ?>
  <?php print $scripts; ?>
  <?php if ($add_html5_shim and !$add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5.js"></script>
    <![endif]-->
  <?php elseif ($add_html5_shim and $add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5-respond.js"></script>
    <![endif]-->
  <?php elseif ($add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/respond.js"></script>
    <![endif]-->
  <?php endif; ?>

  <script type="text/javascript">
(function ($) {
   $(document).ready(function(){
    $.adaptiveBackground.run({
    });
  });
})(jQuery);
  </script>


</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php if ($skip_link_text && $skip_link_anchor): ?>
    <p id="skip-link">
      <a href="#<?php print $skip_link_anchor; ?>" class="element-invisible element-focusable"><?php print $skip_link_text; ?></a>
    </p>
  <?php endif; ?>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>


 <script type="text/javascript">
      $(function() {
        $('.featured--block').matchHeight();

      });



      $('body').flowtype({
      minimum   : 500,
      maximum   : 1200,
      minFont   : 14,
      maxFont : 20,
      fontRatio : 75
      });
    </script>
    <script type="text/javascript">
      if( !$.trim( $('#highlighted').html() ).length ) {
          $("#highlighted").addClass("empty");
        }

    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $.adaptiveBackground.run();
      });

    </script>
    <script type='text/javascript'>
			$(document).bind('cbox_open', function () {
				$('html').css({ overflow: 'hidden' });
			}).bind('cbox_closed', function () {
				$('html').css({ overflow: 'auto' });
			});
    </script>
</body>
</html>
