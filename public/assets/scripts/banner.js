var Banner = {

	init: () => {

		// 		var c = document.getElementById("slider").getContext("2d");
		// 		var img = new Image();
		//
		// 		img.onload = function() {
		// 			c.drawImage(img, 0, 0);
		// 		}

		$('#banner-maker').find('input[type="file"]').on('change', function() {

			var self = $(this).attr('id');

			var file = document.querySelector('#' + self).files;
			var src = window.URL.createObjectURL(file[0]);

			var div = $('<div/>', {
				'class': 'draggable',
			}).draggable({
				'snap': true,
				'stack': '.description',
				'grid': [5, 5],
				'cursor': 'move !important'
			})

			var img = $('<img/>', {
				'src': src,
				// 'class': 'move'
			});

			$('#slider').find('.draggable').remove();
			$('#slider').append($(div).append(img));
			// img.src = src;

		});

		// Escolher modo de exibição do slider
		$('#fullscreen').on('change', function() {

			console.log($(this).prop('checked'), $('img').width())
			if ($(this).prop('checked')) {
				$('#slider').find('img').width('100%');
			} else {
				$('#slider').find('img').width('auto');
			}

		});

		var ctrl = false;
		$(document).on('keydown keyup', function(e) {
			if (e.which === 17 && e.type === 'keydown') ctrl = true;
			if (e.which === 17 && e.type === 'keyup') ctrl = false;

			console.log(ctrl);
		})

		$('#add_texto').on('click', function() {

			$('select[name="font-family"]').attr('disabled', false).formSelect();
			$('select[name="font-size"]').attr('disabled', false).formSelect();

			var div = $('<div/>', {
				'class': 'description',
				'data-placeholder': 'Adicione um texto aqui'
			}).css({
				'position': 'absolute',
				'top': '0',
				'z-index': '1',
				'cursor': 'move',
				'min-width': '100px',
				'min-height': '30px',
				'line-height': '30px',
				'background': '#000'
			});
			var input = $('<input/>', {
				'name': '',
				'type': 'text',
				'disabled': true
			});

			div = $(div).append(input);

			$('#slider').find('.description').removeClass('selected').attr('data-selected', false);

			$('#slider').append(div.text(div.data('placeholder')).addClass('selected').attr('data-selected', true).draggable({
				'snap': false,
				'stack': '.description',
				'grid': [5, 5],
				'cursor': 'move !important'
			}).on('dblclick', function() {

				console.log(input);
				var self = $(this);
				$(this).css({
						'cursor': 'text'
					})
					.addClass('selected')
					.attr('data-selected', true)
					.attr('contenteditable', true)
					.focus();

				$('select[name="font-family"]').attr('disabled', false).formSelect();
				$('select[name="font-size"]').attr('disabled', false).formSelect();

			}).on('click', function() {
				if (!ctrl)
					$('#slider').find('.description').removeClass('selected').attr('data-selected', false);
				$(this).css({
						'cursor': 'default'
					})
					.addClass('selected')
					.attr('data-selected', true);
				$('select[name="font-family"]').attr('disabled', false).formSelect();
				$('select[name="font-size"]').attr('disabled', false).formSelect();
			}).on('blur', function() {
				$('#slider').find('.description').removeClass('selected').attr('data-selected', false);
				$(this).css({
					'cursor': 'move'
				}).attr('contenteditable', false);
				$('select[name="font-family"]').attr('disabled', true).formSelect();
				$('select[name="font-size"]').attr('disabled', true).formSelect();
			}));

		});

		$('select[name="font-family"]').on('change', function() {
			$('[data-selected="true"]').css({
				'font-family': $(this).val()
			});
		});

		$('select[name="font-size"]').on('change', function() {
			$('[data-selected="true"]').css({
				'font-size': $(this).val(),
				'line-height': $(this).val(),
				'height': $(this).val()
			});
		});

		$('input[name="text-color"]').on('change', function() {
			$('.description.selected').css({
				'color': '#' + $(this).val()
			});
		})

		$('input[name="preenchimento"]').on('change', function() {
			console.log($(this).val())
			$('.description.selected').css({
				'background-color': '#' + $(this).val() + ' !important'
			});
		});

		$('input[name="opacity"]').on('change', function() {
			var opacity = $(this).val();
			var color = $('input[name="preenchimento"]').val();
			var rgbaCol = 'rgba(' + parseInt(color.slice(-6, -4), 16) + ',' + parseInt(color.slice(-4, -2), 16) + ',' + parseInt(color.slice(-2), 16) + ',' + opacity + ')';
			$('.description.selected').css('background-color', rgbaCol)
		});

	}

}
