// Nombre del proyecto: Copa América Chile 2015
// Nombre del archivo: actions.js
// Descripción: Funciones globales
// Fecha de creación: Junio de 2015
// Autor: Felipe Camacho
$(function() {
	$("#menu").sticky({topSpacing:0, bottomSpacing: 50});
	var $header = $('section');
	$(window).scroll(function () {
		if(scrollY <= 0) {
			$header.animate({
				opacity: 0
			}, 300);
		}
		if(scrollY > 0 && $header.is(':not(:animated)')){
			$header.animate({
				opacity: 0.9999
			}, 300);
		}
	});
	
	$('#menu a').bind('click', function(event) {
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top - 100
		}, 1500, 'easeOutExpo');
		event.preventDefault();
	});
	
	setTimeout(function(){
		$('body').addClass('loaded');
	}, 3000);
});

var sections = $('section')
  , nav = $('nav')
  , nav_height = nav.outerHeight();

$(window).on('scroll', function () {
  var cur_pos = $(this).scrollTop();
 
  sections.each(function() {
    var top = $(this).offset().top - nav_height,
        bottom = top + $(this).outerHeight();
 
    if (cur_pos >= top && cur_pos <= bottom) {
      nav.find('a').removeClass('active');
      sections.removeClass('active');
 
      $(this).addClass('active');
      nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
    }
  });
});