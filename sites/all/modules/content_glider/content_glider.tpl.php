<?php
if ($glider_id=="content_glider_1") {
$template ='<div id="p-select" class="glidecontenttoggler">' . "\n";
$template .='<div id="controls">';
$template .='<i class="fa fa-volume-off fa-2x unmute" style="margin-left: .125em; margin-right: .125em;" class="unmute"></i>';
$template .='<i class="fa fa-pause fa-2x pause" alt="" style="margin-left: 2px; margin-right: 2px;" class="pause"></i>';
$template .='<i class="fa fa-repeat fa-2x" alt="" title="" style="margin-left: .125em;" id="replay"></i>';
$template .='<i class="fa fa-caret-down fa-2x" alt="" style="margin-left: .125em; margin-right: .125em;" id="hider"></i>';
$template .='<i class="fa fa-caret-up fa-2x" alt="" style="margin-left: .125em; margin-right: .125em;" id="showmax"></i>'; 
$template .= '<a href="#next" class="next" id="next"><i class="fa fa-chevron-circle-left fa-2x"></i></a>' . "\n";
$template .= '<a href="#prev" class="prev" id="prev"><i class="fa fa-chevron-circle-right fa-2x"></i></a>' . "\n";
$template .= '</div>';
$template .= '</div>';


		    } 

elseif ($glider_id=="content_glider_0") {
$template = '<div id="p-select" class="glidecontenttoggler">' . "\n";
$template .= '<a href="#" class="toc" id="0pg">.</a>' . "\n";
$template .= '<a href="#" class="toc" id="1pg">.</a>' . "\n";
$template .= '<a href="#" class="toc" id="2pg">.</a>' . "\n";
$template .= '</div>'; }

$template .= '<div id="Glider' . $glider_id . '"' . ' class="glidecontentwrapper" style="height:' . $height . $height_unit . ';">' . "\n";
$template .= "$glider_items";
$template .= '</div>' . "\n";
print "$template";
?>

<script>
(function ($) {
$(document).ready(function() {

<?php if ($glider_id=="content_glider_1") {
print "$('h2').find('a').contents().unwrap();";
} ?>
items = [];
items2 = [];
items3 = [];
items4 = [];
counter = 0;

    $(".page-undergrads div.field.field-name-field-mp4-video.field-type-file.field-label-hidden div.field-items div.field-item.even").each(function(n){
      items[n] = $(this).text();
    });

    $(".page-undergrads div.field.field-name-field-webm-video.field-type-file.field-label-hidden div.field-items div.field-item.even").each(function(n){
       items2[n] = $(this).text();
    });

    $(".page-undergrads div.field.field-name-field-preview-image.field-type-image.field-label-hidden div.field-items div.field-item.even img").each(function(n){
       items3[n] = this.src;
    });

    $(".page-undergrads div.field.field-name-field-youtube-video-url.field-type-link-field.field-label-hidden div.field-items div.field-item.even").each(function(n){
       items4[n] = $(this).text();
    });

$("#block-block-2 a").removeAttr("href");
$("#block-block-2 a").attr("href",items4[0]);


$( "a#next.next" ).click(function() {
$("div.videoBG video").removeAttr("src");
$("div.videoBG video").removeAttr("poster");
$("#block-block-2 a").removeAttr("href");
counter++;
if (counter > (items.length - 1)) { counter = 0; };

if (counter > 0) {
$( ".next" ).show()
};

$("div.videoBG video").attr("src",items[counter]);

$("div.videoBG video").attr("src",items2[counter]);

$("div.videoBG video").attr("poster",items3[counter]);

$("#block-block-2 a").attr("href",items4[counter]);

});

$( "a#prev.prev" ).click(function() {
$("div.videoBG video").removeAttr("src");
$("div.videoBG video").removeAttr("poster");
$("#block-block-2 a").removeAttr("href");

counter--;
if (counter < 0) { counter = (items.length - 1); };
$("div.videoBG video").attr("src",items[counter]);

$("div.videoBG video").attr("src",items2[counter]);

$("div.videoBG video").attr("poster",items3[counter]);

$("#block-block-2 a").attr("href",items4[counter]);

});
});
})(jQuery);
</script>

