// JavaScript Document
$(document).ready(function() {
	
	$("#load").hide();
	
	settings = {
          tl: { radius: 20 },
          tr: { radius: 20 },
          bl: { radius: 20 },
          br: { radius: 20 },
          antiAlias: true,
          autoPad: true,
          validTags: ["div", "table", "thead", "tbody", "tr"]
      }

  	$('#contenido').corner(settings);
	$('#contenido_usuarios').corner(settings);
	$('#menu_usuarios').corner(settings);
	$('#pie_pagina_usuarios').corner("top 20");
	$('#pie_pagina').corner("top 20");
});

function recargar(x,y,z)
{
	var pagina=x+".php?"+y;
	//alert(pagina);
	$("#load").show();
	$.post(pagina, function(data){
	$("#"+z).html(data);
	$("#load").hide();
	});		
}