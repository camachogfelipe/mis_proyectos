// JavaScript Document

$(document).ready(function() {
	var v = $(".charlas").validate(
	{
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			titulo: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			},
			texto: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			}
		},
		messages: {
			titulo: {
				required: " <br /><span id='msj_error_texto'>Ingrese su nombre por favor</span>",
				minlength: jQuery.format(" <br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			texto: {
				required: " <br /><span id='msj_error_texto'>Ingrese el motivo por el que nos contacta</span>",
				minlength: jQuery.format(" <br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			}
		},
		submitHandler: function()
		{
			$().ajaxStart(function()
			{
				$('#load').show();
			});
			$('.charlas').submit(function()
			{
				$('#load').show();
				$.ajax(
				{
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data)
					{
						var result = $('#contenido').html(data);
						$('#load').hide();
						$(result).fadeIn('slow');
					}
				})
				return false;
			});
		}
	});
	jQuery(".reset").click(function() {
			v.resetForm();
	});
});