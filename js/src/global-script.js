/*
    Use the command "npm install" in the theme directory to install these packages

    In codekit make sure the settings are like this

    For Javacript Options
      Transpile With: Babel
      ES6 Bundle Format: IIFE

*/

import $ from 'jquery';

import 'slick-carousel/slick/slick';

window.$ = $;
window.jQuery = $;

/* eslint-disable */

$(document).ready(function() {

  $('.treatements-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    infinite:true,
    dots: true,
    // appendDots:".sculpdots",
    nextArrow: '<span class="arrow next"><svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"><path id="Subtraction_1" data-name="Subtraction 1" d="M-2969-1506a19.874,19.874,0,0,1-7.785-1.572,19.938,19.938,0,0,1-6.357-4.286,19.938,19.938,0,0,1-4.286-6.358A19.88,19.88,0,0,1-2989-1526a19.877,19.877,0,0,1,1.572-7.784,19.935,19.935,0,0,1,4.286-6.357,19.938,19.938,0,0,1,6.357-4.286A19.874,19.874,0,0,1-2969-1546a19.874,19.874,0,0,1,7.785,1.572,19.938,19.938,0,0,1,6.357,4.286,19.935,19.935,0,0,1,4.286,6.357A19.877,19.877,0,0,1-2949-1526a19.88,19.88,0,0,1-1.572,7.785,19.938,19.938,0,0,1-4.286,6.358,19.938,19.938,0,0,1-6.357,4.286A19.874,19.874,0,0,1-2969-1506Zm-1.819-24.175a.631.631,0,0,0-.631.63v7.74a.631.631,0,0,0,.63.63.627.627,0,0,0,.348-.107l5.8-3.87a.628.628,0,0,0,.281-.523.628.628,0,0,0-.281-.523l-5.8-3.87A.625.625,0,0,0-2970.819-1530.175Z" transform="translate(2989.5 1546.5)" fill="#fff" stroke="rgba(0,0,0,0)" stroke-miterlimit="10" stroke-width="1"/></svg></span>',
    prevArrow: '<span class="arrow prev"><svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"><path id="Subtraction_1" data-name="Subtraction 1" d="M20,40A20.006,20.006,0,0,1,12.215,1.572a20.005,20.005,0,0,1,15.57,36.857A19.873,19.873,0,0,1,20,40ZM18.18,15.176a.631.631,0,0,0-.63.63v7.74a.631.631,0,0,0,.631.63.621.621,0,0,0,.347-.107l5.8-3.87a.627.627,0,0,0,0-1.046l-5.8-3.87A.624.624,0,0,0,18.18,15.176Z" transform="translate(40.5 40.5) rotate(180)" fill="#fff" stroke="rgba(0,0,0,0)" stroke-miterlimit="10" stroke-width="1"/></svg></span>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  $(".b-a-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    infinite:true,
    dots: false,
    // appendDots:".sculpdots",
    nextArrow:
      '<span class="arrow next"><svg style="max-width:40px;max-height:40px;" xmlns="http://www.w3.org/2000/svg" width="65.101" height="46.39" viewBox="0 0 65.101 46.39"><g id="Group_152" data-name="Group 152" transform="translate(1344.794 8804.39) rotate(180)"><g id="Path_65" data-name="Path 65" transform="translate(1298.404 8781.195) rotate(-45)" fill="none"><path d="M0,0H32.8V32.8H0Z" stroke="none"/><path d="M 0.9999980926513672 0.9999980926513672 L 0.9999980926513672 31.80273628234863 L 31.80273628234863 31.80273628234863 L 31.80273628234863 0.9999980926513672 L 23.18942642211914 0.9999980926513672 L 0.9999980926513672 0.9999980926513672 M -3.814697265625e-06 -3.814697265625e-06 L 23.18942642211914 -3.814697265625e-06 L 32.80273818969727 -3.814697265625e-06 L 32.80273818969727 32.80273818969727 L -3.814697265625e-06 32.80273818969727 L -3.814697265625e-06 -3.814697265625e-06 Z" stroke="none" fill="#fff"/></g><g id="Group_117" data-name="Group 117" transform="translate(688.062 9463.508) rotate(-90)"><g id="Group_8" data-name="Group 8" transform="translate(-37 108)"><path id="Path_42" data-name="Path 42" d="M353.354,454.825l-6.114-6.764v13.508Z" transform="translate(1174.568 178.523) rotate(90)" fill="#fff" stroke="#fff" stroke-width="1"/><path id="Path_43" data-name="Path 43" d="M722.728,508.246H686.639" transform="translate(1227.746 -203.008) rotate(90)" fill="none" stroke="#fff" stroke-width="1"/></g></g></g></svg></span>',
    prevArrow:
    '<span class="arrow prev"><svg style="max-width:40px;max-height:40px;" xmlns="http://www.w3.org/2000/svg" width="65.101" height="46.39" viewBox="0 0 65.101 46.39"><g id="Group_152" data-name="Group 152" transform="translate(1344.794 8804.39) rotate(180)"><g id="Path_65" data-name="Path 65" transform="translate(1298.404 8781.195) rotate(-45)" fill="none"><path d="M0,0H32.8V32.8H0Z" stroke="none"/><path d="M 0.9999980926513672 0.9999980926513672 L 0.9999980926513672 31.80273628234863 L 31.80273628234863 31.80273628234863 L 31.80273628234863 0.9999980926513672 L 23.18942642211914 0.9999980926513672 L 0.9999980926513672 0.9999980926513672 M -3.814697265625e-06 -3.814697265625e-06 L 23.18942642211914 -3.814697265625e-06 L 32.80273818969727 -3.814697265625e-06 L 32.80273818969727 32.80273818969727 L -3.814697265625e-06 32.80273818969727 L -3.814697265625e-06 -3.814697265625e-06 Z" stroke="none" fill="#fff"/></g><g id="Group_117" data-name="Group 117" transform="translate(688.062 9463.508) rotate(-90)"><g id="Group_8" data-name="Group 8" transform="translate(-37 108)"><path id="Path_42" data-name="Path 42" d="M353.354,454.825l-6.114-6.764v13.508Z" transform="translate(1174.568 178.523) rotate(90)" fill="#fff" stroke="#fff" stroke-width="1"/><path id="Path_43" data-name="Path 43" d="M722.728,508.246H686.639" transform="translate(1227.746 -203.008) rotate(90)" fill="none" stroke="#fff" stroke-width="1"/></g></g></g></svg></span>',
  });

});

function aniMate(n) {
  var t = document.querySelectorAll(n);

  window.addEventListener("DOMContentLoaded", function() {
    t.forEach(function(n) {
      n.getBoundingClientRect().top < window.innerHeight / 1.3 &&
        n.classList.add("animate");
    });
  }),
    window.addEventListener("scroll", function() {
      t.forEach(function(n) {
        n.getBoundingClientRect().top < window.innerHeight / 1.3 &&
          n.classList.add("animate");
      });
    });
}

aniMate(
  ".rotateright , .rotateleft ,.fade-nun , .fade-up-stop , .fade-right-stop,.fade-left-stop"
),
aniMate(".fade-in"),
aniMate(".fade-in-left"),
aniMate(".fade-in-right"),
aniMate(".scale-down");

// Scroll to top
$(document).ready(function() {
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $("#scroll").fadeIn();
    } else {
      $("#scroll").fadeOut();
    }
  });
  $("#scroll").click(function() {
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });
});

$(document).ready(function () {
  // Open
  $(".ui-ra").click(function(e){
    e.preventDefault();

    $('.ui-ra').removeClass("active");
    $(this).addClass("active");
    // console.log();
    $(".treatmentscats").hide(0);
    $(".formhover").slideDown();

    let typeSwitch = $(this).data('formtype');
    switch(typeSwitch){
      case 'primary-care':
        $(".treatmentscats[data-catstype='"+typeSwitch+"'").show();
        break;
      case 'weight-loss':
        $(".treatmentscats[data-catstype='"+typeSwitch+"'").show();
        break;
      case 'body-sculpting':
        $(".treatmentscats[data-catstype='"+typeSwitch+"'").show();
        break;
      default:
        $(".treatmentscats[data-catstype='"+typeSwitch+"'").show();

    }

    // $('.hasdropdown').removeClass('activeitem');

    // $(this).addClass('activeitem');
    // $("nav.navdiv").addClass('activemenu');
  });

  // Close
  // $("span.closebutton").click(function(e){
  //   $("nav.navdiv").removeClass('activemenu');
  //   $('.hasdropdown').removeClass('activeitem');
  // });

});

$(document).ready(function () {
  let menuopen = false;
  $(".bars").click(function(e){
    if(menuopen == false){
      $('.hasdropdown').removeClass('activeitem');

      $(this).addClass('activeitem');
      $(".navbaritems").addClass('activemenu');
      menuopen = true;
    } else {
      $('.hasdropdown').addClass('activeitem');

      $(this).removeClass('activeitem');
      $(".navbaritems").removeClass('activemenu');
      menuopen = false;
    }
  });

  if ($(window).width() < 992) {
    $("li.menu-item.hasdropdown > a").click(function(e){
      e.preventDefault();
    });
 }

// SPlit BLOCKS
let sideopen = false;
$("button.splitlink").click(function(e){
  if(sideopen == false){

    $(this).addClass('activeitem');
    $("span.la").addClass('hideitem');
    sideopen = true;
  } else {

    $(this).removeClass('activeitem');
    $("span.la").removeClass('hideitem');
    sideopen = false;
  }
});

});





// Form
jQuery(document).ready(function ($) {

  var formType;



  $('#schedule').submit(function (e) {
    e.preventDefault();

    var form = $(this);
    var form_results = $('#form-results');

    form_results.html(' ');
    form_results.removeClass('alert');
    form_results.removeClass('alert-error');
    form_results.removeClass('alert-success');

    form.find('.btn').prop('disabled', true);

    var errors = [];

    if (form.find('input[name=firstname]').val() == "") { errors.push('The first name field is required'); }
    if (form.find('input[name=email]').val() == "") { errors.push('The email field is required'); }

    if (errors.length > 0) {

      var error_html = '<ul>';
      form_results.addClass('alert');
      form_results.addClass('alert-info');

      $.each(errors, function (index, value) {
        error_html += '<li>' + value + '</li>';
      });
      error_html += '</ul>';

      form_results.html(error_html);
      form.find('.btn').prop('disabled', false);
      return false;
    }

    var data = {
      action: 'do_ajax',
      fn: 'schedule',
      siteurl: the_theme.url,
      security: the_theme.ajax_nonce,
      data: form.serializeArray()
    };

    jQuery.post(the_theme.url + '/wp-admin/admin-ajax.php', data, function (response) {


      form.find('.btn').prop('disabled', false);

      $('#form-results').html(response);
      // Use window.location to move user to thank you page, page template
        window.location = the_theme.url+"/thank-you/";
    }, 'json');
  });

});		



function ReLoadImages(){
  $('img[data-lazysrc]').each( function(){
      $( this ).attr( 'src', $( this ).attr( 'data-lazysrc' ) );
  }
);
}

document.addEventListener('readystatechange', event => {
  if (event.target.readyState === "interactive") {  //or at "complete" if you want it to execute in the most last state of window.
      ReLoadImages();
  }
});


 