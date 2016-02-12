// Nombre del proyecto: Futbolista Colombiano
// Nombre del archivo: actions.js
// Descripción: Funciones globales
// Fecha de creación: Octubre del 2013
// Autor: Stive Zambrano

$(document).ready(function(){
  $(window).bind("load", function(){$("#preload").fadeOut("slow");});
	
	$('.ancla').click(function(){
			var link = $(this);
			var anchor  = link.attr('href');
			$('html, body').stop().animate({
					scrollTop: jQuery(anchor).offset().top - 84
			}, 2000);
			$("header nav ul li a").removeClass("active");
			$(this).addClass("active");
			return false;
	});
		
	$(".barra").mCustomScrollbar({
    horizontalScroll:false
	});
});