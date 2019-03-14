// Get the modal
var modal = document.getElementById('update');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$(document).ready(function(){
   $('.slider-header').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   autoplay: true,
   dots: false,
   focusOnSelect: true,
   responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        dots: false,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        dots: false,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
 });
});
$(document).ready(function(){
   $('.show-news').slick({
   slidesToShow: 4,
   slidesToScroll: 4,
   autoplay: true,
   dots: false,
   focusOnSelect: true,
   responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        dots: false,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        dots: false,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
 });
});
$(document).ready(function(){
   $('.show-productlienquan').slick({
   slidesToShow: 5,
   slidesToScroll: 4,
   autoplay: true,
   dots: false,
   focusOnSelect: true,
   responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        dots: false,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        dots: false,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
 });
});

$(document).ready(function(){
   $('.show-imgsmall').slick({
   slidesToShow: 3,
   slidesToScroll: 2,
   autoplay: true,
   dots: false,
   focusOnSelect: true,
   responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2,
        infinite: true,
        dots: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        dots: false,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 3,
        dots: false,
        slidesToScroll: 2
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
 });
});

$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 100) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});



$(function(){

    var valueElement = $('#value');
    function incrementValue(e){
        valueElement.text(Math.max(parseInt(valueElement.text()) + e.data.increment, 0));
        return false;
    }

    $('#plus').bind('click', {increment: 1}, incrementValue);

    $('#minus').bind('click', {increment: -1}, incrementValue);

});

var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
     modal.style.display = "none";
  }
}
jQuery(document).ready(function( $ ) {
     $("#menu").mmenu();
});
$(function () {
    $(".div").slice(0, 1).show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".div:hidden").slice(0, 1).slideDown();
        if ($(".div:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        // $('html,body').animate({
        //     scrollTop: $(this).offset().top
        // }, 1500);
    });
});

( function( $ ) {
$( document ).ready(function() {
$('#cssmenu > ul > li > a').click(function() {
  $('#cssmenu li').removeClass('active');
  $(this).closest('li').addClass('active'); 
  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $('#cssmenu ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false; 
  }   
});
});
} )( jQuery );

var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}

// function getVals(){
//   // Get slider values
//   var parent = this.parentNode;
//   var slides = parent.getElementsByTagName("input");
//     var slide1 = parseFloat( slides[0].value );
//     var slide2 = parseFloat( slides[1].value );
//   // Neither slider will clip the other, so make sure we determine which is larger
//   if( slide1 > slide2 ){ var tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
//   var displayElement = parent.getElementsByClassName("rangeValues")[0];
//       displayElement.innerHTML = "$ " + slide1 + "k - $" + slide2 + "k";
// }

// window.onload = function(){
//   // Initialize Sliders
//   var sliderSections = document.getElementsByClassName("range-slider");
//       for( var x = 0; x < sliderSections.length; x++ ){
//         var sliders = sliderSections[x].getElementsByTagName("input");
//         for( var y = 0; y < sliders.length; y++ ){
//           if( sliders[y].type ==="range" ){
//             sliders[y].oninput = getVals;
//             // Manually trigger event first time to display values
//             sliders[y].oninput();
//           }
//         }
//       }
// }


