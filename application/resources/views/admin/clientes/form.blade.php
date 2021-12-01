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

@section('title', (isset($row) ? 'Editar' : 'Novo') . ' cliente')

@section('buttons')
	@if (isset($row))
		<button class="btn btn-large excluir waves-effect" value="{{ isset($row) ? $row->id : null }}" data-tooltip="Excluir" data-link="{{ route('admin.clientes.delete') }}" style="border: none">
			<i class="material-icons">delete_forever</i>
		</button>
	@endif
@endsection

@section('form')

	<form method="post" action="{{ route('admin.clientes.insert') }}" novalidate enctype="multipart/form-data" autocomplete="off">

		<!-- Informações -->
		<div id="informations">

			<!-- BEGIN Nome do cliente -->
			<div class="row">
				<div class="col s12 mb-1">
					<div class="input-field">
						<label>Nome do cliente</label>
						<input type="text" name="nome" id="nome" value="{{ isset($row) ? $row->nome : null }}" autofocus="autofocus">
					</div>
				</div>
			</div>
			<!-- END Nome do cliente -->

			<!-- BEGIN imagem -->
			<div class="row">
				<div class="col s12 mb-1">
					<div class="file-field input-field">
						<div class="btn">
							<div class="file">
								<i class="material-icons">attach_file</i>
							</div>
							<input type="file" name="imagem" multiple="multiple">
						</div>
						<div class="file-path-wrapper">
							<input type="text" class="file-path validate" placeholder="Selecione um arquivo">
						</div>
					</div>
				</div>
			</div>
			<!-- END imagem -->

			<!-- BEGIN site -->
			<div class="row">
				<div class="col s12 mb-1">
					<div class="input-field">
						<label>Site</label>
						<input type="url" name="site" id="site" value="{{ isset($row) ? $row->site : null }}">
					</div>
				</div>
			</div>
			<!-- END site -->

			<!-- BEGIN Descricao -->
			<div class="row">
				<div class="col s12 mb-1">
					<div class="input-field">
						<textarea name="descricao" class="editor full--editor" placeholder="Descrição" style="min-height: 600px !important;"><?= isset($row) && !is_null($row->descricao) ? $row->descricao : null ?></textarea>
					</div>
				</div>
			</div>
			<!-- END Descricao -->

			<!-- BEGIN Status -->
			<div class="row mb-3">

				<div class="col s12">
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

		</div>
		<!-- END Informações -->

		<div class="row">

			<div class="col s12 mt-3">

				<button type="submit" class="btn inverse btn-small right waves-effect">
					<i class="material-icons left">save</i> Salvar
				</button>
				<button type="reset" data-action="back" class="btn btn-small right mr-2 waves-effect">
					<i class="material-icons left">arrow_back</i> Cancelar
				</button>

				<input type="hidden" name="id" value="{{ isset($row) ? $row->id : null }}">
				<input type="hidden" name="_method" value="{{ isset($row) ? 'put' : 'post' }}">

				@if (!isset($row))
					<input type="hidden" name="editavel" value="{{ $editavel }}">
				@endif

				<input type="hidden" name="dicionario" value="{{ isset($row) ? $row->id_dicionario : null }}">
				{{ $input_label_hidden }}

			</div>

		</div>

	</form>

@endsection
