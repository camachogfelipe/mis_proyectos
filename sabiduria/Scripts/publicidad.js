// JavaScript Document
function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
	jQuery('#mycarousel').jcarousel({
        auto: 3,
        wrap: 'circular',
		animation: 'slow',
        initCallback: mycarousel_initCallback
    });
	//redondear();
});

function redondear()
{
	jQuery.each('#texto_publicidad', function() {
      $('#texto_publicidad').corner();
    });
}

(function($) {
	$(function() { //on DOM ready
		$("#scroller").simplyScroll({
			className: 'vert',
			horizontal: false,
			frameRate: 10,
			autoMode: 'loop'
		});
	});
})(jQuery);