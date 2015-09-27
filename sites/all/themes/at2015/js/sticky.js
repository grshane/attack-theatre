$(function () {
    //store the element
    var $top = $('.main__nav');
    var $top2 = $('.navigation');
    var $ctaButton = $('.header');

    //store the initial position of the element
    $(window).scroll(function(){
        if($(document).scrollTop() > 100) {
          // if so, add the fixed class
          $top.addClass('fixed');
          $top.css('display:block');
          $top2.addClass('fixed');
          $top2.css('top: 50px');
          $ctaButton.addClass('fixed');
        } else {
          // otherwise remove it
          $top2.removeClass('fixed');

        }
    });
});