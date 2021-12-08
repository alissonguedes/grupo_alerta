@extends('admin.layouts.form')

@php
$disabled = null;
$editavel = null;
$input_label_hidden = null;
@endphp

@if (session()->get('userdata')['id_grupo'] > 1)

	{? $disabled = isset($row) && $row->editavel === '0' ? 'disabled="disabled"' : false; ?}

	@if ($disabled)
		{? $input_label_hidden = $row -> label; ?}
		{? $editavel = $row->editavel; ?}
	@else
		{? $editavel = 1; ?}
	@endif

@endif

@section('title', (isset($row) ? 'Editar' : 'Nova') . ' página')

@section('content')

	<form id="paginas" method="post" action="{{ route('admin.paginas.insert') }}" novalidate enctype="multipart/form-data" autocomplete="off">

		<div class="top flex mb-1">

			<div class="actions action-btns flex-row align-itens-center" style="overflow: hidden;">

				<div class="row">

					<div class="col s6">
						{? $disabled = !isset($row) ? 'disabled=disabled' : null; ?}
						<button type="button" class="btn btn-large excluir waves-effect" value="{{ isset($row) ? $row->id : null }}" {{ $disabled }}data-tooltip="Excluir Página" data-link="{{ route('admin.paginas.delete') }}" style="border: none; margin-left: -3px;">
							<i class="material-icons">delete_forever</i>
						</button>
						<ul class="tabs left">
							<li class="tab"><a href="#informations">Página</a></li>
							<li class="tab"><a href="#sections">Seções</a></li>
						</ul>
					</div>

					<div class="col s6">
						<button type="submit" class="btn inverse btn-large black-text right waves-effect" data-tooltip="Salvar" style="width: auto;">
							<i class="material-icons left">save</i> Salvar
						</button>
					</div>

				</div>

			</div>

			<input type="hidden" name="id" value="{{ isset($row) ? $row->id : null }}">
			<input type="hidden" name="_method" value="{{ isset($row) ? 'put' : 'post' }}">

			@if (!isset($row))
				<input type="hidden" name="editavel" value="{{ $editavel }}">
			@endif

			<input type="hidden" name="dicionario" value="{{ isset($row) ? $row->id_dicionario : null }}">
			{{ $input_label_hidden }}

		</div>

		<div class="row">

			<div class="col s12">

				<!-- Informações -->
				<div id="informations">

					<!-- card -->
					<div class="card">

						<!-- card-content -->
						<div class="card-content">

							<!-- BEGIN título -->
							<div class="row">
								<div class="col s12 mb-1">
									<div class="input-field">
										<label>Título da página</label>
										<input type="text" name="titulo" id="title" value="{{ isset($row) ? $row->titulo : null }}" autofocus="autofocus">
									</div>
								</div>
							</div>
							<!-- END título -->

							<!-- BEGIN título -->
							<div class="row">
								<div class="col s12 mb-1">
									<div class="input-field">
										<label>Descrição da página</label>
										<input type="text" name="descricao" id="descricao" value="{{ isset($row) ? $row->descricao : null }}">
									</div>
								</div>
							</div>
							<!-- END título -->

							<!-- BEGIN Menus -->
							<div class="row">
								<div class="col s12 mb-1">
									<div class="input-field">
										<label>Menu da página</label>
										<select name="menu">
											<option value="" disabled="disabled" selected="selected">Selecione o menu da página</option>
											@foreach ($menus as $menu)
												<option value="{{ $menu->id }}" {{ isset($row) && $row->id_menu == $menu->id ? 'selected="selected"' : null }}>{{ $menu->label }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<!-- END Menus -->

							<!-- BEGIN Subpágina -->
							<div class="row">
								<div class="col s12 mb-1">
									<div class="input-field">
										<label>Grupo da página</label>
										<select name="grupo">
											<option value="" disabled="disabled" {{ !isset($row) ? 'selected' : null }}>Selecione o grupo da página</option>
											<option value="0" {{ isset($row) && $row->id_pagina == 0 ? 'selected' : null }}>Nenhum</option>

											@foreach ($paginas as $pag)
												<option value="{{ $pag->id }}" {{ isset($row) && $row->id_pagina == $pag->id ? 'selected="selected"' : null }}>{{ $pag->titulo }}</option>
											@endforeach

										</select>
									</div>
								</div>
							</div>
							<!-- END Subpágina -->

							<!-- BEGIN Status -->
							<div class="row">
								<div class="col s12 mb-3">
									<label for="status">Ativo</label>
									<div class="switch right">
										<label class=" no-margin">
											{? $checked = !isset($row) || (isset($row) && $row->status === '1') ? 'checked="checked"' : null; ?}
											<input type="checkbox" name="status" id="status" value="1" {{ $checked }}>
											<span class="lever no-margin"></span>
										</label>
									</div>
								</div>
							</div>
							<!-- END Status -->

							@if (isset($row) && $row->tipo == 'galeria')

								{? $active = 'display: none !important'; ?}
								{? $inactive = null ?}
								{? $checked = 'checked=checked'; ?}

							@else

								{? $active = null; ?}
								{? $inactive = 'display: none !important;'; ?}
								{? $checked = null; ?}

							@endif

							<!-- BEGIN tipo-pagina -->
							<div class="row">
								<div class="col s12 mb-3">
									<label for="tipo_pagina">Galeria de fotos</label>
									<div class="switch tipo-pagina right">
										<label class=" no-margin">
											<input type="checkbox" name="tipo_pagina" id="tipo_pagina" value="galeria" {{ $checked }}>
											<span class="lever no-margin"></span>
										</label>
									</div>
								</div>
							</div>
							<!-- END tipo-pagina -->

							<!-- BEGIN galeria -->
							<div id="galeria" style="{{ $inactive }}">
								<div class="row">
									<div class="col s12 mb-3">
										<div class="col no-margin no-padding">
											<button type="button" class="btn inverse btn-small waves-effect modal-trigger" data-target="modal-galeria">
												<i class="material-icons left">image</i>
												Vincular Galeria
											</button>
										</div>
									</div>
								</div>
								<div class="modal" id="modal-galeria">
									<div class="modal-content">
										@php
											$fotos = new App\Models\Admin\FotoModel();
										@endphp
										@if (isset($row) && isset($fotos))
											<ul class="collection">
												@foreach ($fotos->getAlbum() as $foto)

													@php
														$issetAlbum = $fotos
														->from('tb_pagina_album')
														->select('id')
														->where('id_album', $foto->id)
														->where('id_pagina', $row->id)
														->get()
														->first();
														$checked = isset($issetAlbum) ? 'checked=checked' : null;
													@endphp

													<li class="collection-item">
														<label>
															<input type="checkbox" name="album[]" id="{{ $foto->id }}" value="{{ $foto->id }}" {{ $checked }}>
															<span>
															</span>
														</label>
													</li>
												@endforeach
											</ul>
										@endif
									</div>
									<div class="modal-footer bordered">
										<button type="button" class="btn btn-small btn-flat right mr-2 modal-close waves-effect">Feito</button>
									</div>
								</div>
							</div>
							<!-- END galeria -->

							<!-- BEGIN files_upload -->
							<div id="files_upload" style="{{ $active }}">
								<!-- BEGIN imagem -->
								<div class="row">
									<div class="col s12 mb-1">
										<div class="file-field input-field">
											<div class="btn">
												<div class="file">
													<i class="material-icons">attach_file</i>
												</div>
											</div>
											<input type="file" name="arquivo[]" multiple="multiple">
											<div class="file-path-wrapper">
												<input type="text" class="file-path validate" placeholder="Selecione um arquivo">
											</div>
										</div>
									</div>
								</div>
								<!-- END imagem -->
								<!-- LISTAGEM DE ARQUIVOS -->

								<div class="row">

									<div class="col s12">

										@if (isset($row))

											@php
												$page = new App\Models\Admin\PaginaModel();
												$arquivos = $page->getAttach($row->id);
											@endphp

											@if (isset($arquivos))
												<div class="input-field media">
													<div>
														<span class="count-files">{{ count($arquivos) }}</span>
														@if (count($arquivos) > 1)
															arquivos cadastrados
														@else
															arquivo cadastrado
														@endif
													</div>
													<br>
													<ul class="collection scroller" style="max-height: 300px;">
														@foreach ($arquivos as $file)
															<li class="collection-item avatar pl-3" id="file_{{ $file->id }}">
																{{-- <img src="{{ asset($file->path) }}" alt=""	class="circle"> --}}
																<p>{{ $file->realname }}</p>
																<span class="title ">{{ asset($file->path) }}</span>
																<button type="button" class="secondary-content btn btn-floating btn-small waves-effect right remover_arquivo" data-url="{{ route('admin.paginas.delete.file', [$row->id, $file->id]) }}" id="{{ $file->id }}" data-tooltip="Excluir">
																	<i class="material-icons">close</i>
																</button>
																<input type="hidden" name="arquivos[]" value="{{ $file->path }}">
															</li>
														@endforeach
													</ul>
												</div>
											@endif
										@endif

									</div>

								</div>

							</div>
							<!-- END files_upload -->

						</div>
						<!-- END card-content -->

					</div>
					<!-- END card -->

				</div>
				<!-- END Informações -->

			</div>

		</div>

		<!-- BEGIN sections -->
		<div id="sections">

			<!-- BEGIN section -->
			<div id="section">

				@foreach ($sections as $index => $section)

					<!-- card -->
					<div id="section_{{ $index }}" class="card">

						<!-- card-content -->
						<div class="card-content">

							<div class="card-title">
								<h4 class="left">
									Seção - <span>{{ isset($row) && $section->titulo ? $section->titulo : 'Sem título' }}</span>
								</h4>

								<a href="#" class="btn btn-floating btn-flat transparent float-right waves-effect waves-light toggle" data-toggle="card-body">
									<i class="material-icons grey-text">keyboard_arrow_up</i>
								</a>

								@if (session()->has('userdata') && session()->get('userdata')['id_grupo'] == 1)
									<a href="#" class="btn btn-floating btn-flat transparent float-right waves-effect waves-light" data-delete="3" data-tooltip="Remover Seção">
										<i class="material-icons red-text">delete</i>
									</a>
								@endif

							</div>

							<!-- BEGIN card-body -->
							<div class="card-body mt-3">

								<!-- section -->
								<section id="">

									<!-- BEGIN título -->
									<div class="row">
										<div class="col s12 mb-1">
											<div class="input-field">
												<label>Título da seção</label>
												<input type="text" name="section[{{ $index }}][title]" class="section_title" value="{{ isset($row) ? $section->titulo : null }}">
											</div>
										</div>
									</div>
									<!-- END título -->

									<!-- BEGIN subtítulo -->
									<div class="row">
										<div class="col s12 mb-1">
											<div class="input-field">
												<label>Subtítulo da seção</label>
												<input type="text" name="section[{{ $index }}][subtitle]" value="{{ isset($row) ? $section->subtitulo : null }}">
											</div>
										</div>
									</div>
									<!-- END subtítulo -->

									<!-- BEGIN link -->
									<div class="row">
										<div class="col s12 mb-1">
											<div class="input-field">
												<label>Link</label>
												<input type="text" name="section[{{ $index }}][link]" value="{{ isset($row) ? $section->link : null }}">
											</div>
										</div>
									</div>
									<!-- END link -->

									<!-- BEGIN imagem de capa -->
									<div class="row">
										<div class="col s12 mb-1">
											<div class="file-field input-field">
												<div class="btn" style="background-image: url({{ isset($row) && isset($section->imagem) ? asset($section->imagem) : null }}); background-size: cover;">
													<div class="file">
														<i class="material-icons">attach_file</i>
													</div>
													<input type="file" name="section[{{ $index }}][imagem]">
													<input type="hidden" name="section[{{ $index }}][imagem]" value="{{ isset($row) && isset($section->imagem) ? $section->imagem : null }}">
												</div>
												<div class="file-path-wrapper">
													<input type="text" class="file-path validate" placeholder="Imagem da caixa">
												</div>
											</div>
										</div>
									</div>
									<!-- END imagem de capa -->

									<!-- BEGIN ícone -->
									<div class="row">
										<div class="col s12 mb-1">
											<div class="file-field input-field">
												<div class="btn" style="background-image: url({{ isset($row) && isset($section->icone) ? asset($section->icone) : null }}); background-size: cover;">
													<div class="file">
														<i class="material-icons">attach_file</i>
													</div>
													<input type="file" name="section[{{ $index }}][icone]">
													<input type="hidden" name="section[{{ $index }}][icone]" value="{{ isset($row) && isset($section->icone) ? $section->icone : null }}">
												</div>
												<div class="file-path-wrapper">
													<input type="text" class="file-path validate" placeholder="Ícone da caixa">
												</div>
											</div>
										</div>
									</div>
									<!-- END ícone -->

									<!-- BEGIN Texto -->
									<div class="row">
										<div class="col s12 mb-1">
											<div class="input-field browser-default">
												<label>Texto da seção</label>
												<input type="text" name="section[{{ $index }}][text]" value="{{ isset($row) ? $section->texto : null }}" class="editor full--editor">
											</div>
										</div>
									</div>
									<!-- END Texto -->

									<!-- BEGIN sub-sections -->
									<div class="sub-sections row">
										<section class="sub-section">
											@php
												$subsections = $page->getSubSections($section->id);
											@endphp
											@foreach ($subsections as $ind => $subsection)
												<div class="col s4">
													<div id="subsection_{{ $ind }}" class="card sub-section">
														<div class="card-content">
															<div class="card-title">
																<h4 class="left">Caixa de apresentação {{ $ind + 1 }}</h4>
																@if (session()->has('userdata') && session()->get('userdata')['id_grupo'] == 1)
																	<a href="#" class="btn btn-floating btn-flat transparent float-right waves-effect waves-light" data-delete="4" data-tooltip="Remover Caixa">
																		<i class="material-icons red-text">delete</i>
																	</a>
																@endif
															</div>
															<div class="card-body">
																<!-- BEGIN título -->
																<div class="row">
																	<div class="col s12 mb-1">
																		<div class="input-field">
																			<label for="section_title">Título da caixa</label>
																			<input type="text" name="section[{{ $index }}][subsection][{{ $ind }}][title]" class="subsection_title" value="{{ isset($row) ? $subsection->titulo : null }}">
																		</div>
																	</div>
																</div>
																<!-- END título -->
																<!-- BEGIN subtítulo -->
																<div class="row">
																	<div class="col s12 mb-1">
																		<div class="input-field">
																			<label>Subtítulo da caixa</label>
																			<input type="text" name="section[{{ $index }}][subsection][{{ $ind }}][subtitle]" value="{{ isset($row) ? $subsection->subtitulo : null }}">
																		</div>
																	</div>
																</div>
																<!-- END subtítulo -->

																<!-- BEGIN link -->
																<div class="row">
																	<div class="col s12 mb-1">
																		<div class="input-field">
																			<label>Link</label>
																			<input type="text" name="section[{{ $index }}][subsection][{{ $ind }}][link]" value="{{ isset($row) ? $subsection->link : null }}">
																		</div>
																	</div>
																</div>
																<!-- END link -->

																<!-- BEGIN imagem de capa -->
																<div class="row">
																	<div class="col s12 mb-1">
																		<div class="file-field input-field">
																			<div class="btn" style="background-image: url({{ isset($row) && isset($subsection->imagem) ? asset($subsection->imagem) : null }}); background-size: cover;">
																				<div class="file">
																					<i class="material-icons">attach_file</i>
																				</div>
																				<input type="file" name="section[{{ $index }}][subsection][{{ $ind }}][imagem]">
																				<input type="hidden" name="section[{{ $index }}][subsection][{{ $ind }}][imagem]" value="{{ isset($row) && isset($subsection->imagem) ? $subsection->imagem : null }}">
																			</div>
																			<div class="file-path-wrapper">
																				<input type="text" class="file-path validate" placeholder="Imagem da caixa">
																			</div>
																		</div>
																	</div>
																</div>
																<!-- END imagem de capa -->

																<!-- BEGIN ícone -->
																<div class="row">
																	<div class="col s12 mb-1">
																		<div class="file-field input-field">
																			<div class="btn" style="background-image: url({{ isset($row) && isset($subsection->icone) ? asset($subsection->icone) : null }}); background-size: cover;">
																				<div class="file">
																					<i class="material-icons">attach_file</i>
																				</div>
																				<input type="file" name="section[{{ $index }}][subsection][{{ $ind }}][icone]">
																				<input type="hidden" name="section[{{ $index }}][subsection][{{ $ind }}][icone]" value="{{ isset($row) && isset($subsection->icone) ? $subsection->icone : null }}">
																			</div>
																			<div class="file-path-wrapper">
																				<input type="text" class="file-path validate" placeholder="Ícone da caixa">
																			</div>
																		</div>
																	</div>
																</div>
																<!-- END ícone -->

																<!-- BEGIN Texto -->
																<div class="row">
																	<div class="col s12 mb-1">
																		<div class="input-field browser-default">
																			<label>Texto da caixa</label>
																			<textarea name="section[{{ $index }}][subsection][{{ $ind }}][text]" class="editor full--editor" data-height="300">{{ isset($row) ? $subsection->texto : null }}</textarea>
																		</div>
																	</div>
																</div>
																<!-- END Texto -->

															</div>
														</div>
													</div>
												</div>
											@endforeach
										</section>
										@if (session()->has('userdata') && session()->get('userdata')['id_grupo'] == 1)
											<div class="col s4">
												<div class="card card-add">
													<div class="card-content no-padding">
														<div class="card-title"></div>
														<div class="card-body">
															<button type="button" class="add-card waves-effect" value="{{ isset($row) ? $row->id : null }}">
																<i class="material-icons">add</i>
															</button>
														</div>
													</div>
												</div>
											</div>
										@endif
									</div>
									<!-- END sub-sections -->

								</section>
								<!-- END section -->

							</div>
							<!-- END card-body -->

						</div>
						<!-- END card-content -->

					</div>
					<!-- END card -->

				@endforeach

			</div>
			<!-- END section -->

			<div class="row">
				<div class="col s12 mt-3 mb-3">
					<button type="button" class="btn btn-small add-section waves-effect" value="{{ isset($row) ? $row->id : null }}">
						<i class="material-icons left">add</i> Adicionar seção
					</button>
				</div>
			</div>

		</div>
		<!-- END sections -->

	</form>


	<style>
		.ui-draggable-dragging {
			transform: rotate(1.5deg);
			box-shadow: 2px 3px 5px #ffc8021a;
			cursor: move;
		}

		.sub-sections {
			height: auto;
			position: relative;
			overflow: hidden;
		}

		.sub-sections .col {
			overflow: hidden;
			position: relative;
		}

		.card.card-add {
			width: 100%;
			height: 467px;
		}

		.card.card-add button[type="button"] {
			border: none;
			position: absolute;
			top: 0;
			bottom: 0;
			overflow: hidden;
			background: rgba(0, 0, 0, 0);
			width: 100%;
			height: inherit;
		}

		.card.card-add button[type="button"] .material-icons {
			font-size: 160px;
			color: rgba(255, 255, 255, 0.2);
			font-weight: bold;
		}

	</style>
@endsection
