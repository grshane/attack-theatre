$(function () {
    //store the element
    var $top = $('.header');

    //store the initial position of the element
    $(window).scroll(function(){
        if($(document).scrollTop() > 100) {
          // if so, add the fixed class
          $top.addClass('fixed');
        } else {
          // otherwise remove it
          $top.removeClass('fixed');
        }
    });
});