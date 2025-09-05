/*global $, console*/
$(function () {
  "use strict";
  // Loading
  $(window).on('load', function(){
    $('#building').fadeOut(1000);
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
  //Nice Scroll
  $("body").niceScroll({
    cursorwidth: "10",
    cursorcolor: "#0750a1",
    autohidemode: false,
  });
  $(window).on('shown.bs.modal', function() {
      $(".modal-body .tab").niceScroll({
        cursorwidth: "10",
        cursorcolor: "#0750a1",
        autohidemode: false,
      });
  });
  // Change Color of Navbar depends on current page
//   var loc = window.location.href; // returns the full URL
//   if(loc =='https://raqmita.it/crm' || loc =='https://raqmita.it/erp' || loc =='https://raqmita.it/cloud' || loc =='https://raqmita.it/it-infrastructure' || loc =='https://raqmita.it/contact' || loc =='https://raqmita.it/careers') {
//     $('nav .nav-link').addClass('link-white');
//   }
  //Fixed Navbar
  $(window).scroll(function () {
      var nav = $('.navbar');
      var topHeader = $('.top-header');
      if ($(window).scrollTop() >= topHeader.height()) {
          nav.addClass('scrolled');
      } else {
          nav.removeClass('scrolled');
      }

      if($(window).scrollTop() >= $('.js-section').offset().top - 50 && $(window).scrollTop() <= $('.fixed-website-img').offset().top - $(window).height()){
        $('.js-section-container').removeClass('fixed-js-2');
        $('.js-section-container').addClass('fixed-js');

        if($(window).scrollTop() >= $('#owb_slide_cc0_pre').offset().top - 250){
          $('#js-frame').removeClass();
          $('#js-frame').addClass("js-frame-0");
        }
        if($(window).scrollTop() >= $('#owb_slide_cc0').offset().top - 250){
          $('#js-frame').removeClass();
          $('#js-frame').addClass("js-frame-1");
        }
        if($(window).scrollTop() >= $('#owb_slide_cc1').offset().top - 250){
          $('#js-frame').removeClass();
          $('#js-frame').addClass("js-frame-2");
        }
        if($(window).scrollTop() >= $('#owb_slide_cc2').offset().top - 250){
          $('#js-frame').removeClass();
          $('#js-frame').addClass("js-frame-3");
        }
        if($(window).scrollTop() >= $('#owb_slide_cc3').offset().top - 250){
          $('#js-frame').removeClass();
          $('#js-frame').addClass("js-frame-4");
        }
        
      }else if($(window).scrollTop() < $('.js-section').offset().top - 50){
        $('.js-section-container').removeClass('fixed-js');
        $('.js-section-container').removeClass('fixed-js-2');
      }else{
        $('.js-section-container').removeClass('fixed-js');
        $('.js-section-container').addClass('fixed-js-2');
      }
      // if($(window).scrollTop() >= $('.js-section-container').offset().top){
        // console.log("FDD");
        // $('.js-frame').addClass("DDDD");
      // }else{
        // console.log("FFFFF");
      // }
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

  // Scroll To cloud Model Section
  $('.cloud-models-link button').click(function (e) {
    $('html, body').animate({
        scrollTop : $('#' + $(this).data('id')).offset().top
    }, 1000);
  });
  // Scroll To cloud Model Section
  $('.erp-sidebar a').click(function (e) {
    $('html, body').animate({
        scrollTop : $('#' + $(this).data('id')).offset().top
    }, 1000);
  });

  // Scroll To CRM Section
  $('.crm-header p strong').click(function (e) {
    $('html, body').animate({
        scrollTop : $('#' + $(this).data('id')).offset().top - 50
    }, 1000);
  });

  // Website Carousel
  // $(document).on('click', '#bttn3', function(event) { 
  //     $("#btn3").click(); 
  // });
  $('.website-carousel-sec .t-btn > div').on('click', function(event) { 
    // console.log("FF");
    $('#' + $(this).data('id')).click();
});
 
  // Mixitup Plugin
  var mixer = mixitup('.products-boxes,.partner-boxes', {
    selectors: {
        control: '[data-mixitup-control]'
    }
  });

  $('[data-toggle="tooltip"]').tooltip()
});

$('.crm-carousel').owlCarousel({
  rtl:true,
  loop:false,
  margin:10,
  nav:false,
  dot:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:3
      }
  }
});

$('.website-carousel').owlCarousel({
  rtl:true,
  items:1,
  nav: false,
  dots: true,
  dotsData: true,
  autoplay:true,
  autoplayTimeout:2500,
  autoplayHoverPause:true
});
new WOW().init();