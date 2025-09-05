/*global $, console*/
$(function () {
  "use strict";
  // Loading
  $(window).on('load', function(){
    $('#building').fadeOut(1000);
  });
  //Nice Scroll
  $("body").niceScroll({
    cursorwidth: "10",
    cursorcolor: "#0750a1",
    autohidemode: false,
  });
  $(window).on('shown.bs.modal', function() {
      $(".modal-content").niceScroll({
        cursorwidth: "10",
        cursorcolor: "#0750a1",
        autohidemode: false,
      });
  });
  //Fixed Navbar
  $(window).scroll(function () {
      var nav = $('.navbar');
      if ($(window).scrollTop() >= nav.height()) {
          nav.addClass('scrolled');
      } else {
          nav.removeClass('scrolled');
      }
  });
  // Menu
  $('.nav-item.dropdown').hover(function(){
    $(this).children('.dropdown-toggle').addClass('show');
    $(this).children('.dropdown-menu').addClass('show');
  }, function () {
    $(this).children('.dropdown-toggle').removeClass('show');
    $(this).children('.dropdown-menu').removeClass('show');
  });
  //Side Bar For Small Screens
  $('.mobile-menu-toggler').click(function () {
      $(".mobile-menu-overlay").css({"opacity": "1", "visibility": "visible"});
      $('.mobile-menu-container').addClass('sidebar-show');
      $('.mobile-menu-container').removeClass('sidebar-transform');
  })
  
  $('.mobile-menu-close').click(function () {
      $(".mobile-menu-overlay").css({"opacity": "0", "visibility": "hidden"});
      $('.mobile-menu-container').addClass('sidebar-transform');
      $('.mobile-menu-container').removeClass('sidebar-show');
  })
  
  $('.mobile-menu i').click(function () {
      if ($(this).parent('li').hasClass('menu-opend')) {
          $(this).parent('li').removeClass('menu-opend');
          $(this).siblings('ul').slideUp();
      } else {
          $(this).parent('li').addClass('menu-opend');
          $(this).siblings('ul').slideDown();
      }   
  });

  //Scroll Top Button
  $(window).scroll(function(){
    if($(window).scrollTop() >= 750){
        $('.scroll-top').fadeIn(300);
    }else{
        $('.scroll-top').fadeOut(300);
    }
  })
  $('.scroll-top').click(function(){
      $('html, body').animate({
          scrollTop: 0
      },1000);
  });

  // Show & Hidden Career Details
  $('.show-career-details').click(function(){
    $(this).hide();
    $(this).next('.hidden-career-info').show(200);
    $(this).next('.hidden-career-info').children('.hide-career-details').show(200);
  });
  $('.hide-career-details').click(function(){
    $(this).hide();
    $(this).parent('.hidden-career-info').hide(200);
    $(this).parent('.hidden-career-info').siblings('.show-career-details').show(200);
  });
  // Silde Down & Up Career Filter
  $('.filter-group-head').click(function(){
    if($(this).siblings('.show-hidden-filtering').is(':visible')){
        $(this).find('span i').animate({
            transform: "rotate("+ 270 + "deg)"
          }, 5000);
        $(this).siblings('.show-hidden-filtering').slideUp();
        $(this).find('span i').addClass('filterClosed');
    }else{
        $(this).siblings('.show-hidden-filtering').slideDown();
        $(this).find('span i').removeClass('filterClosed');
    }
  });

  // Mixitup Plugin
  var mixer = mixitup('.partner-boxes', {
    selectors: {
        control: '[data-mixitup-control]'
    }
  });
});

new WOW().init();