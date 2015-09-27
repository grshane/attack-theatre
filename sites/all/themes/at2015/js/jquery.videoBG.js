/**
 * @preserve Copyright 2011 Syd Lawrence ( www.sydlawrence.com ).
 * Version: 0.2
 *
 * Licensed under MIT and GPLv2.
 *
 * Usage: $('body').videoBG(vidopts);
 *
 */
var $jvids = jQuery.noConflict();
$jvids(document).ready(function() {
  $jvids.fn.videoBG = function( selector, vidopts ) {
    if (vidopts === undefined) {
      vidopts = {};
    }
    if (typeof selector === "object") {
      vidopts = $jvids.extend({}, $jvids.fn.videoBG.defaults, selector);
    }
    else if (!selector) {
      vidopts = $jvids.fn.videoBG.defaults;
    }
    else {
      return $jvids(selector).videoBG(vidopts);
    }

    var vidcontainer = $jvids(this);

    // check if elements available otherwise it will cause issues
    if (!vidcontainer.length) {
      return;
    }

    // container to be at least relative
    if (vidcontainer.css('position') == 'static' || !vidcontainer.css('position')) {
      vidcontainer.css('position','relative');
    }

    // we need a width
    if (vidopts.width === 0) {
      vidopts.width = vidcontainer.width();
    }

    // we need a height
    if (vidopts.height === 0) {
      vidopts.height = vidcontainer.height();
    }

    // get the wrapper
    var wrapme = $jvids.fn.videoBG.wrapper();
    wrapme.height(vidopts.height)
      .width(vidopts.width);

    // if is a text replacement
    if (vidopts.textReplacement) {

      // force sizes
      vidopts.scale = true;

      // set sizes and forcing text out
      vidcontainer.width(vidopts.width)
        .height(vidopts.height)
        .css('text-indent','-9999px');
    }
    else {

      // set the wrapper above the video
      wrapme.css('z-index',vidopts.zIndex+5000);
    }

    // move the contents into the wrapper
//    wrapme.html(vidcontainer.clone(true));

    // get the video
    var video = $jvids.fn.videoBG.video(vidopts);

    // if we are forcing width / height
    if (vidopts.scale) {

      // overlay wrapper
      wrapme.height(vidopts.height)
        .width(vidopts.width);

      // video
      video.height(vidopts.height)
        .width(vidopts.width);
    }

    // add it all to the container
//    vidcontainer.html(wrapme);
    vidcontainer.append(video);

    return video.find("video")[0];
  };

  // set to fullscreen
  $jvids.fn.videoBG.setFullscreen = function($el) {
    var windowWidth = $jvids(window).width(),
    windowHeight = $jvids(window).height();

    $el.css('min-height',0).css('min-width',0);
    $el.parent().width(windowWidth).height(windowHeight);
    // if by width
    var jumpv = 0;
    if (windowWidth / windowHeight > $el.aspectRatio) {
      $el.width(windowWidth).height('auto');
      // jumpv the element up
      var height = $el.height();
      jumpv = (height - windowHeight) / 2;
      if (jumpv < 0) {
        jumpv = 0;
      }
      $el.css("top",-jumpv);
    } else {
      $el.width('auto').height(windowHeight);
      // jumpv the element left
      var width = $el.width();
      jumpv = (width - windowWidth) / 2;
      if (jumpv < 0) {
        jumpv = 0;
      }
      $el.css("left",-jumpv);

      // this is a hack mainly due to the iphone
      if (jumpv === 0) {
        var timer = setTimeout(function() {
          $jvids.fn.videoBG.setFullscreen($el);
        },500);
      }
    }

    $jvids('body > .videoBG_wrapper').width(windowWidth).height(windowHeight);

  };

  // get the formatted video element
  $jvids.fn.videoBG.video = function(vidopts) {

    $jvids('html, body').scrollTop(-1);

    // video container
    var $div = $jvids('<div/>');
    $div.addClass('videoBG')
      .css('position',vidopts.position)
      .css('z-index',vidopts.zIndex)
      .css('top',0)
      .css('left',0)
      .css('height',vidopts.height)
      .css('width',vidopts.width)
      .css('opacity',vidopts.opacity)
      .css('overflow','hidden');

    // video element
    var $video = $jvids('<video/>');
    $video.css('position','absolute')
      .css('z-index',vidopts.zIndex)
      .attr('poster',vidopts.poster)
      .css('top',0)
      .css('left',0)
      .css('min-width','100%')
      .css('min-height','100%');

    if (vidopts.autoplay) {
      $video.attr('autoplay',vidopts.autoplay);
    $jvids(function(){
          $jvids('video,audio').each(function(){this.muted=true})
    })
    }

    // if fullscreen
    if (vidopts.fullscreen) {
      $video.bind('canplay',function() {
        // set the aspect ratio
        $video.aspectRatio = $video.width() / $video.height();
        $jvids.fn.videoBG.setFullscreen($video);
      });

      // listen out for screenresize
      var resizeTimeout;
      $jvids(window).resize(function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
          $jvids.fn.videoBG.setFullscreen($video);
        },100);
      });
      $jvids.fn.videoBG.setFullscreen($video);
    }


    // video standard element
    var vid = $video[0];

    // if meant to loop
    if (vidopts.loop) {
      loops_left = vidopts.loop;

      // cant use the loop attribute as firefox doesnt support it
      $video.bind('ended', function(){

        // if we have some loops to throw
        if (loops_left) {
          // replay that bad boy
          vid.play();
        }

        // if not forever
        if (loops_left !== true) {
          // one less loop
          loops_left--;
        }
      });
    }

    // when can play, play
    $video.bind('canplay', function(){

      if (vidopts.autoplay) {
        // replay that bad boy
        vid.play();
      }

    });


    // if supports video
    if ($jvids.fn.videoBG.supportsVideo()) {

      // supports webm
      if ($jvids.fn.videoBG.supportType('webm')){

        // play webm
        $video.attr('src',vidopts.webm);
      }
      // supports mp4
      else if ($jvids.fn.videoBG.supportType('mp4')) {

        // play mp4
        $video.attr('src',vidopts.mp4);
      }
      // throw ogv at it then
      else {

        // play ogv
        $video.attr('src',vidopts.ogv);
      }

    }

    // image for those that dont support the video
    var $img = $jvids('<img/>');
    $img.attr('src',vidopts.poster)
      .css('position','absolute')
      .css('z-index',vidopts.zIndex)
      .css('top',0)
      .css('left',0)
      .css('min-width','100%')
      .css('min-height','100%');

    // add the image to the video
    // if suuports video
    if ($jvids.fn.videoBG.supportsVideo()) {
      // add the video to the wrapper
      $div.html($video);
    }

    // nope - whoa old skool
    else {

      // add the image instead
      $div.html($img);
    }

    // if text replacement
    if (vidopts.textReplacement) {

      // force the heights and widths
      $div.css('min-height',1).css('min-width',1);
      $video.css('min-height',1).css('min-width',1);
      $img.css('min-height',1).css('min-width',1);

      $div.height(vidopts.height).width(vidopts.width);
      $video.height(vidopts.height).width(vidopts.width);
      $img.height(vidopts.height).width(vidopts.width);
    }

    if ($jvids.fn.videoBG.supportsVideo()) {
      vid.play();
    }
    return $div;
  };

  // check if suuports video
  $jvids.fn.videoBG.supportsVideo = function() {
    return (document.createElement('video').canPlayType);
  };

  // check which type is supported
  $jvids.fn.videoBG.supportType = function(str) {

    // if not at all supported
    if (!$jvids.fn.videoBG.supportsVideo()) {
      return false;
    }

    // create video
    var vid = document.createElement('video');

    // check which?
    switch (str) {
      case 'webm' :
        return (vid.canPlayType('video/webm; codecs="vp8, vorbis"'));
      case 'mp4' :
        return (vid.canPlayType('video/mp4; codecs="avc1.42E01E, mp4a.40.2"'));
      case 'ogv' :
        return (vid.canPlayType('video/ogg; codecs="theora, vorbis"'));
    }
    // nope
    return false;
  };

  // get the overlay wrapper
  $jvids.fn.videoBG.wrapper = function() {
    var $wrap = $jvids('<div/>');
    $wrap.addClass('videoBG_wrapper')
      .css('position','absolute')
      .css('top',0)
      .css('left',0);
    return $wrap;
  };

  // these are the defaults
  $jvids.fn.videoBG.defaults = {
    mp4:'',
    ogv:'',
    webm:'',
    poster:'',
    autoplay:true,
    loop:true,
    scale:false,
    position:"absolute",
    opacity:1,
    textReplacement:false,
    zIndex:-100,
    width:0,
    height:0,
    fullscreen:false,
    imgFallback:true,
  };

$jvids(".unmute").click( function (){
$jvids("video").prop('muted', !$jvids("video").prop('muted'));
});

$jvids(".unmute").live('click', function() {
$jvids(this).toggleClass( 'fa-volume-off fa-volume-up' );
});

$jvids(".pause").live('click', function() {
$jvids(this).toggleClass('fa-pause fa-play-circle');
if ($jvids('video').get(0).paused == false) {
$jvids('video').get(0).pause(); } else $jvids('video').get(0).play();
});

$jvids('#showmax').hide();

$jvids( '#hider' ).click(function() {
$jvids( "h3" ).slideToggle( "slow", function() {});
$jvids( "div#Glidercontent_glider_1" ).slideToggle(1000,"swing");
});

var slide = false;
$jvids('#hider').on('click', function(){
slide = !slide;
$jvids(this).next('.content').slideToggle(); 
if (slide) {
$jvids('#hider').rotate({
angle: 0, animateTo:180
});
} else {
$jvids('#hider').rotate({
angle: 360, animateTo:0
});
}
});

$jvids("#replay").rotate({bind:{
      click: function(){
          $jvids(this).rotate({
            angle: 0, 
            animateTo:360
          })
      }
  }
});

$jvids( "#showmax" ).click(function() {
$jvids( ".view-content" ).show('slide',{direction:'down'},500);
$jvids('#hider').show();
});


$jvids("#replay").click( function (){
video = $jvids('video')[0];
video.pause();
video.currentTime = 0;
video.load();
});
});
