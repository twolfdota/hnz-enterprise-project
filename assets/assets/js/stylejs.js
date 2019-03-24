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