// Get the modal
var modal = document.getElementById('update');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

$(document).ready(function () {
  if ($("#deadline").length) {
    const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;
    // Set the date we're counting down to
    var countDownDate = new Date($("#deadline").val()).getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;
      if (distance < 0) {
        document.getElementById('days').innerText = "00";
        document.getElementById('hours').innerText = "00";
        document.getElementById('minutes').innerText = "00";
        document.getElementById('seconds').innerText = "00";
        document.getElementById("demo").innerHTML = "Sorry, it's expired";
      }
      // Time calculations for days, hours, minutes and seconds
      else {
        // Output the result in an element with id="demo"
        document.getElementById('days').innerText = Math.floor(distance / (1000 * 60 * 60 * 24));
        document.getElementById('hours').innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        document.getElementById('minutes').innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        document.getElementById('seconds').innerText = Math.floor((distance % (1000 * 60)) / 1000);

        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("demo").innerHTML = "Sorry, it's expired";
        }
      }
    }, 1000);
  }
});

$(document).ready(function () {
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


$(document).ready(function () {
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

$(window).scroll(function () {
  var height = $(window).scrollTop();
  if (height > 100) {
    $('#back2Top').fadeIn();
  } else {
    $('#back2Top').fadeOut();
  }
});
$(document).ready(function () {
  $("#back2Top").click(function (event) {
    event.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
  });

});



$(function () {

  var valueElement = $('#value');
  function incrementValue(e) {
    valueElement.text(Math.max(parseInt(valueElement.text()) + e.data.increment, 0));
    return false;
  }

  $('#plus').bind('click', { increment: 1 }, incrementValue);

  $('#minus').bind('click', { increment: -1 }, incrementValue);

});

var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

jQuery(document).ready(function ($) {
  $("#menu").mmenu({
    "extensions": [
      "fx-menu-zoom",
      "fx-panels-zoom",
      "pagedim-black",
      "position-left",
      "theme-dark"
    ],
    "counters": true,
    "iconbar": {
      "add": true,
      "top": [
        "<a href='/hnz-enterprise-project/'><i class='fa fa-home'></i></a>",
        "<a href='#/'><i class='fa fa-user'></i></a>"
      ],
      "bottom": [
        "<a href='#/'><i class='fa fa-twitter'></i></a>",
        "<a href='#/'><i class='fa fa-facebook'></i></a>",
        "<a href='#/'><i class='fa fa-linkedin'></i></a>"
      ]
    },
    "iconPanels": true,
    "navbars": [
      {
        "position": "top"
      }
    ]
  });
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

(function ($) {
  $(document).ready(function () {
    $('#cssmenu > ul > li > a').click(function () {
      $('#cssmenu li').removeClass('active');
      $(this).closest('li').addClass('active');
      var checkElement = $(this).next();
      if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
        $(this).closest('li').removeClass('active');
        checkElement.slideUp('normal');
      }
      if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
        $('#cssmenu ul ul:visible').slideUp('normal');
        checkElement.slideDown('normal');
      }
      if ($(this).closest('li').find('ul').children().length == 0) {
        return true;
      } else {
        return false;
      }
    });
  });
})(jQuery);

var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function () {
  output.innerHTML = this.value;
}




