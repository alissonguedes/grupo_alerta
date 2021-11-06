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

@section('title', (isset($row) ? 'Editar' : 'Novo') . ' notícia')

@section('buttons')
    @if (isset($row))
        <button class="btn btn-large excluir waves-effect" value="{{ isset($row) ? $row->id : null }}" data-tooltip="Excluir" data-link="{{ route('admin.noticias.delete') }}" style="border: none">
            <i class="material-icons">delete_forever</i>
        </button>
    @endif
@endsection

{{-- @section('tabs')
    <ul class="tabs">
        <li class="tab"><a href="#informations">Informações</a></li>
        @foreach ($idiomas as $idioma)
            <li class="tab">
                <a href="#{{ limpa_string($idioma->sigla, '') }}">{{ $idioma->descricao }}</a>
            </li>
        @endforeach
    </ul>
@endsection --}}

@section('form')

    <form method="post" action="{{ route('admin.noticias.insert') }}" novalidate enctype="multipart/form-data" autocomplete="off">

        <!-- Informações -->
        <div id="informations">

            <!-- BEGIN título -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="input-field">
                        <label>Título</label>
                        <input type="text" name="titulo" id="title" value="{{ isset($row) && !is_null($row->titulo) ? $row->titulo : null }}" autofocus="autofocus">
                    </div>
                </div>
            </div>
            <!-- END título -->

            <!-- BEGIN subtítulo -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="input-field">
                        <label>Subtítulo da notícia</label>
                        <input type="text" name="subtitulo" id="subtitulo" value="{{ isset($row) ? $row->subtitulo : null }}">
                    </div>
                </div>
            </div>
            <!-- END subtítulo -->

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

            <!-- BEGIN Texto -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="input-field">
                        <textarea name="texto" class="editor full--editor" placeholder="Texto da notícia" style="min-height: 600px !important;"><?= isset($row) && !is_null($row->texto) ? $row->texto : null ?></textarea>
                    </div>
                </div>
            </div>
            <!-- END Texto -->

            <!-- BEGIN imagem de capa -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="file-field input-field">
                        <div class="btn" style="background-image: url({{ isset($row) && isset($row->imagem) ? asset($row->imagem) : null }}); background-size: cover;">
                            <div class="file">
                                @if (!isset($row))
                                    <i class="material-icons">attach_file</i>
                                @endif
                            </div>
                            <input type="file" name="imagem">
                        </div>
                        <div class="file-path-wrapper">
                            <input type="text" class="file-path validate" placeholder="Imagem da capa">
                        </div>
                    </div>
                </div>
            </div>
            <!-- END imagem de capa -->

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
