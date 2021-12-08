var checkLogs;

window.onload = () => {

	window.addEventListener("popstate", function() {
		var href = this.location.href;
		if (Request.isLink(href)) {
			Http.get(href);
		}
	}, true);

	core();

	setTimeout(function() {
		$("#carregando").remove();
	}, 550);

	// checkLogs = setInterval(checkLog, 200);

};

function core() {

	$("select").formSelect();

	Request.menu();
	Request.addEvent();
	Form.init();

	resizeble();
	DataTable();
	buttonActions();
	Materializecss();
	editor();
	App.aplicarMascaras();
	preview_map();

	$('.dd').nestable({
		maxDepth: Infinity
	});

	$('h4.title').each(function() {
		var w = $(this).text().length;

		$('h4.title::after').css({
			'padding-left': 'calc(100% - ' + w + 'px)',
			'background': 'pink !important'
		});

	})

	var id_item = null;
	$('.dd').each(function() {
		var self = $(this);

		self.on('change', function() {
			Http.post('paginas/menus', {
				'data': {
					'menus': self.nestable('serialize'),
					'idMenu': self.find('.dd-list').data('menu')
				}
			}, function(response) {
				console.log('Response: ', response);
			})
		});
	})

	setTimeout(function() {
		Storage.checkSession();
	}, 200);

	$("[data-tooltip]").tooltip();

	$(".materialboxed").each(function() {
		var materialbox = $(this);
		materialbox.materialbox({
			// 'onOpenStart': function() {
			//     materialbox.removeClass('circle');
			// },
			onCloseEnd: function() {
				materialbox.parents(".collection").css("overflow-y", "inherit");
			},
		});
	});

	$(window).on("resize", function() {
		resizeble();
	});

	if ($(".sidebar").length > 0) new PerfectScrollbar(".sidebar");

	// Isotope
	// init Isotope
	var $grid = $("#produtos").isotope({
		itemSelector: ".produtos",
		layoutMode: "fitRows",
	});

	// bind filter button click
	$("#filters").on("click", "[data-filter]", function() {
		var filterValue = $(this).attr("data-filter");
		// use filterFn if matches value
		$grid.isotope({
			filter: filterValue,
		});
	});

	// botão para exibir o forumlário da página de e-mail
	// $('[data-trigger-on]').each(function() {
	//     $(this).bind('click', function() {
	//         var trigger = $(this).data('trigger-on');
	//         animate($(trigger).show(), 'slideInRight faster', function(e) {
	//             e.removeClass('animated slideInLeft faster')
	//         });
	//         animate('.dataTables_wrapper', 'slideOutLeft faster', function(e) {
	//             e.hide().removeClass('animated slideInLeft faster');
	//         });
	//         $(this).parents('.panel').find('#form_mail_actions').css('display', 'flex')
	//             .find('button').attr('disabled', false)
	//         $(this).parents('.panel').find('.show-buttons, .panel-header .input-field').hide();
	//     });
	// });
	// botão voltar para esconder o formulário da página de e-mail
	$('.modal').modal();

	$(".btn-back").each(function() {
		$(this).bind("click", function() {
			var trigger = $(this).data("trigger-off");
			var modal = $(".modal");
			$(".modal").modal({
				dismissible: false,
				inDuration: 150,
				outDuration: 200,
				outDuration: 200,
				startingTop: "33%",
				endingTop: "33%",
				onOpenEnd: function(el) {
					modal.find("button").bind("click", function() {
						var confirm = $(this).data("confirm");
						if (confirm) {
							$(this).parents(".panel").find("#form_mail_actions").css("display", "none").find("button").attr("disabled", true);
							animate($(".dataTables_wrapper").show(), "slideInLeft faster", function(e) {
								e.removeClass("animated slideInLeft faster");
							});
							animate($(trigger), "slideOutRight faster", function(e) {
								e.hide().removeClass("animated slideOutRight faster");
							});
							Form.reset();
							$(this).parents(".panel").find(".show-buttons, .panel-header .input-field").show();
							modal.modal("close");
						}
					});
				},
				onCloseStart: function(el) {},
			});
			modal.modal("open");
		});
	});

	if (0 < $("#sidebar-list").length) new PerfectScrollbar("#sidebar-list", {
		theme: "dark",
	});

	if (0 < $(".scroller").length) new PerfectScrollbar(".scroller", {
		theme: "dark",
	});

	$("#contact-sidenav").sidenav({
		edge: "left",
		onOpenStart: function() {
			$("#sidebar-list").addClass("sidebar-show");
		},
		onCloseEnd: function() {
			$("#sidebar-list").removeClass("sidebar-show");
		},
	});

	// $(".sidenav-trigger").on("click",function(){$(window).width()<960&&($(".sidenav").sidenav("close"),$(".app-sidebar").sidenav("close"))}),$(window).on("resize",function(){resizetable(),899<$(window).width()&&$("#contact-sidenav").removeClass("sidenav"),$(window).width()<900&&$("#contact-sidenav").addClass("sidenav")}),resizetable(),$(window).width()<900&&($(".sidebar-left.sidebar-fixed").removeClass("animate fadeUp animation-fast"),$(".sidebar-left.sidebar-fixed .sidebar").removeClass("animate fadeUp"));

	$(function() {
		$("#bt_menu, #bt_interesse, #bt_x").click(function(e) {
			el = $(this).data("element");
			$(el).toggle();
		});
	});

	var c = $(".carousel").carousel({
		noWrap: true,
		numVisible: 10,
	});

	setInterval(function() {
		$(".carousel").carousel("next");
	}, 3000);

	if ($('input[name="url"]#url').length) {
		var URL = window.location.href;
		if (URL.split("/").pop() !== "login") document.getElementById("url").value = URL;
	}

	/**
	 * Ação para remoção de lista de arquivos em uma página
	 */
	$(".remover_arquivo").on("click", function(e) {
		e.preventDefault();
		var self = $(this);
		Http.delete($(this).data("url"), function(response) {

			console.log(response);
			var len = self.parents("ul").find("li").length;
			self.parents("#file_" + self.attr("id")).remove();
			$(".count-files").html(len - 1);
			if ($('body').find('#album').length) {
				$('#album').masonry({
					'itemSelector': '.col'
				});
			}

		});
	});

	/**
	 * Ação para verificação do Log de importação na página [/imports]
	 */
	$("form#import-files").on("submit", function() {
		var self = $(this);
		if (self.is(":valid")) {
			setTimeout(function() {
				self.find("*").attr("disabled", true);
			}, 200);
			Http.post(BASE_URL + "api/log", {
				data: {
					arquivo: $('select[name="arquivo"]').val(),
				},
			}, (response) => {
				// console.log(response);
			});
			checkLogs = setInterval(checkLog, 200);
		}
	});

	// clearInterval(checkLogs);
	// checkLogs = setInterval(checkLog, 200);

	$("#log").find("button#log-rotate").on("click", function() {
		if ($(this).hasClass("play")) {
			checkLogs = setInterval(checkLog, 200);
			$(this).removeClass("play").addClass("pause").find("i").html("pause");
		} else if ($(this).hasClass("pause")) {
			clearInterval(checkLogs);
			$(this).removeClass("pause").addClass("play").find("i").html("play_arrow");
		}
	});

	requirejs([BASE_URL + "/../../assets/tacticweb/scripts/core.js"], () => {
		init();
	});

	requirejs([BASE_URL + "/../../assets/scripts/banner.js"], () => {
		Banner.init();
	});

	/**
	 * Manipulação de seções na página do admin "Páginas > Seções"
	 */
	toggle();

	$('#paginas').find('#sections').find('#section > .card').each(function(index) {

		$(this).find('input[name="section[' + index + '][title]"]').on('keyup', function() {
			$(this).parents('.card-content').find('.card-title').find('span').text(
				$(this).val() != '' ? $(this).val() : 'Sem título'
			);
		});

	});

	$('#paginas').find('.add-section').on('click', function(e) {

		e.preventDefault();

		var id = $(this).parents('#paginas').find('#sections').find('#section > .card').length;
		var id_section = 'section_' + id;

		var section = ' \
		<!--card --> \
		<div id="' + id_section + '" class="card"> \
			<!-- card-content --> \
			<div class="card-content"> \
				<div class="card-title"> \
						<h4 class="left">Seção - <span>Sem título</span> </h4> \
					<a href="#" class="btn btn-floating btn-flat transparent float-right waves-effect waves-light toggle" data-toggle="card-body"> \
						<i class="material-icons grey-text">keyboard_arrow_up</i> \
					</a> \
					<a href="#" class="btn btn-floating btn-flat transparent float-right waves-effect waves-light" data-delete="3" data-tooltip="Remover Seção"> \
						<i class="material-icons red-text">delete</i> \
					</a> \
				</div> \
				<!-- BEGIN card-body --> \
				<div class="card-body mt-3"> \
					<!-- section --> \
					<section id=""> \
						<!-- BEGIN título --> \
						<div class="row"> \
							<div class="col s12 mb-1"> \
								<div class="input-field"> \
									<label>Título da seção</label> \
									<input type="text" name="section[' + id + '][title]" class="section_title"> \
								</div> \
							</div> \
						</div> \
						<!-- END título --> \
						<!-- BEGIN subtítulo --> \
						<div class="row"> \
							<div class="col s12 mb-1"> \
								<div class="input-field"> \
									<label>Subtítulo da seção</label> \
									<input type="text" name="section[' + id + '][subtitle]"> \
								</div> \
							</div> \
						</div> \
						<!-- END subtítulo --> \
						<!-- BEGIN link --> \
						<div class="row"> \
							<div class="col s12 mb-1"> \
								<div class="input-field"> \
									<label>Link</label> \
									<input type="text" name="section[' + id + '][link]"> \
								</div> \
							</div> \
						</div> \
						<!-- END link --> \
						<!-- BEGIN imagem de capa --> \
						<div class="row"> \
							<div class="col s12 mb-1"> \
								<div class="file-field input-field"> \
									<div class="btn"> \
										<div class="file"> \
											<i class="material-icons">attach_file</i> \
										</div> \
										<input type="file" name="section[' + id + '][imagem]"> \
										<input type="hidden" name="section[' + id + '][imagem]"> \
									</div> \
									<div class="file-path-wrapper"> \
										<input type="text" class="file-path validate" placeholder="Imagem da caixa"> \
									</div> \
								</div> \
							</div> \
						</div> \
						<!-- END imagem de capa --> \
						<!-- BEGIN ícone --> \
						<div class="row"> \
							<div class="col s12 mb-1"> \
								<div class="file-field input-field"> \
									<div class="btn"> \
										<div class="file"> \
											<i class="material-icons">attach_file</i> \
										</div> \
										<input type="file" name="section[' + id + '][icone]"> \
										<input type="hidden" name="section[' + id + '][icone]"> \
									</div> \
									<div class="file-path-wrapper"> \
										<input type="text" class="file-path validate" placeholder="Ícone da caixa"> \
									</div> \
								</div> \
							</div> \
						</div> \
						<!-- END ícone --> \
						<!-- BEGIN Texto --> \
						<div class="row"> \
							<div class="col s12 mb-1"> \
								<div class="input-field"> \
									<label>Texto da seção</label> \
									<textarea type="text" name="section[' + id + '][text]" class="editor full--editor"></textarea> \
								</div> \
							</div> \
						</div> \
						<!-- END Texto --> \
						<!-- BEGIN sub-sections --> \
						<div class="sub-sections row"> \
							<section class="sub-section"> \
							</section> \
							<div class="col s4"> \
								<div class="card card-add"> \
									<div class="card-content no-padding"> \
										<div class="card-title"></div> \
										<div class="card-body"> \
											<button type="button" class="add-card waves-effect"> \
												<i class="material-icons">add</i> \
											</button> \
										</div> \
									</div> \
								</div> \
							</div> \
						</div> \
						<!-- END sub-sections --> \
					</section> \
					<!-- END section --> \
				</div> \
				<!-- END card-body --> \
			</div> \
			<!-- END card-content --> \
		</div> \
		<!-- END card -->';

		$(this).parents('#sections').find('#section').append(section).find('input[name="section[' + id + '][title]"]').on('keyup', function() {
			$(this).parents('.card-content').find('.card-title').find('span').text(
				$(this).val() != '' ? $(this).val() : 'Sem título'
			);
		})

		toggle('#' + id_section);

	});

	// 	/**
	// 	 * check system updates
	// 	 */
	// 	$.ajax({
	// 		'url': 'api/updates',
	// 		'success': (response) => {
	// 			if (response.updates) Form.showMessage('Existem atualizações pendentes');
	// 		}
	// 	});

}
