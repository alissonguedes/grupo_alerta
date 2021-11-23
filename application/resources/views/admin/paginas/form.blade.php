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

                <style>
                    .ui-draggable-dragging {
                        transform: rotate(1.5deg);
                        box-shadow: 2px 3px 5px #ffc8021a;
                        cursor: move;
                    }

                </style>

                <!-- BEGIN sections -->
                <div id="sections">

                    <div id="section">

                        @foreach ($sections as $section)

                            <!-- card -->
                            <div class="card">

                                <!-- card-content -->
                                <div class="card-content">

                                    <div class="row">
                                        <div class="col s12">
                                            <h4 class="card-title">Seção - <span>{{ isset($row) && $section->titulo ? $section->titulo : 'Sem título' }}</span>

                                                <a href="#" class="btn btn-floating btn-flat transparent float-right waves-effect waves-light toggle" data-toggle="card-body">
                                                    <i class="material-icons grey-text">keyboard_arrow_up</i>
                                                </a>

                                                <a href="#" class="btn btn-floating btn-flat transparent float-right waves-effect waves-light dropdown-trigger" data-target="page-actions">
                                                    <i class="material-icons grey-text">more_vert</i>
                                                </a>

                                            </h4>
                                        </div>
                                    </div>

                                    <div class="card-body mt-3">

                                        <!-- BEGIN button -->
                                        <div class="row">
                                            <div class="col s3">
                                                {{-- <ul id="page-actions" class="dropdown-content"> --}}
                                                {{-- <li class="">
                                                    <button type="button" class="add-section" value="{{ isset($row) ? $row->id : null }}">
                                                        <i class="material-icons left">add</i> Adicionar seção
                                                    </button>
                                                </li> --}}
                                                {{-- <li class=""> --}}
                                                <button type="button" class="del-section" value="{{ isset($row) ? $row->id : null }}">
                                                    <i class="material-icons left">add</i> Remover seção
                                                </button>
                                                {{-- </li> --}}
                                                {{-- </ul> --}}
                                            </div>
                                        </div>
                                        <!-- END button -->

                                        <!-- section -->
                                        <section id="">

                                            <input type="hidden" name="section[]" value="{{ isset($row) ? $section->id : null }}">

                                            <!-- BEGIN título -->
                                            <div class="row">
                                                <div class="col s12 mb-1">
                                                    <div class="input-field">
                                                        <label for="section_title">Título da seção</label>
                                                        <input type="text" name="section_title[]" class="section_title" id="section_title" value="{{ isset($row) ? $section->titulo : null }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END título -->

                                            <!-- BEGIN subtítulo -->
                                            <div class="row">
                                                <div class="col s12 mb-1">
                                                    <div class="input-field">
                                                        <label>Subtítulo da seção</label>
                                                        <input type="text" name="section_subtitle[]" id="section_subtitle" value="{{ isset($row) ? $section->subtitulo : null }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END subtítulo -->

                                            <!-- BEGIN Texto -->
                                            <div class="row">
                                                <div class="col s12 mb-1">
                                                    <div class="input-field browser-default">
                                                        <input type="text" name="section_text[]" id="section_text" value="{{ isset($row) ? $section->texto : null }}" class="editor full--editor">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Texto -->

                                        </section>
                                        <!-- END section -->

                                    </div>

                                </div>
                                <!-- END card-content -->

                            </div>
                            <!-- END card -->

                        @endforeach

                    </div>

                    <button type="button" class="btn btn-small add-section waves-effect" value="{{ isset($row) ? $row->id : null }}">
                        <i class="material-icons left">add</i> Adicionar seção
                    </button>

                </div>
                <!-- END sections -->

            </div>

        </div>

    </form>

@endsection
