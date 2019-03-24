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

// Get the button, and when the user clicks on it, execute myFunction
document.getElementById("btnBell").onclick = function() {myFunction()};

/* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
function () {
  document.getElementById("myDropdown").classList.toggle("show");
}


