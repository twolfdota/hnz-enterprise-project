
    const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;
    // Set the date we're counting down to
    var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();
        
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
        
      // Time calculations for days, hours, minutes and seconds
        
      // Output the result in an element with id="demo"
      document.getElementById('days').innerText =  Math.floor(distance / (1000 * 60 * 60 * 24));
      document.getElementById('hours').innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      document.getElementById('minutes').innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      document.getElementById('seconds').innerText = Math.floor((distance % (1000 * 60)) / 1000);
        
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);




$(document).ready(function(){
     $('.slider-nav').slick({
   slidesToShow: 1,
   slidesToScroll: 2,
   autoplay: true,
   dots: false,
   focusOnSelect: true
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

 $(document).ready(function() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
});


 $(document).ready(function() {
    const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;
    // Set the date we're counting down to
    var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();
        
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
        
      // Time calculations for days, hours, minutes and seconds
        
      // Output the result in an element with id="demo"
      document.getElementById('days').innerText =  Math.floor(distance / (1000 * 60 * 60 * 24));
      document.getElementById('hours').innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      document.getElementById('minutes').innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      document.getElementById('seconds').innerText = Math.floor((distance % (1000 * 60)) / 1000);
        
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
});
