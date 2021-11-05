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

@section('title', (isset($row) ? 'Editar' : 'Nova') . ' empresa')

@section('buttons')
    @if (isset($row))
        <button class="btn btn-large excluir waves-effect" value="{{ isset($row) ? $row->id : null }}" data-tooltip="Excluir" data-link="{{ route('admin.empresas.delete') }}" style="border: none">
            <i class="material-icons">delete_forever</i>
        </button>
    @endif
@endsection

@section('form')

    <form method="post" action="{{ route('admin.empresas.insert') }}" novalidate enctype="multipart/form-data" autocomplete="off">

        <!-- Informações -->
        <div id="informations">

            <!-- BEGIN Matriz -->
            <div class="row mb-3">
                <div class="col s12">
                    <label for="matriz">Matriz</label>
                    <div class="switch right">
                        <label class=" no-margin">
                            {? $checked = !isset($row) || (isset($row) && $row->matriz === 'S') ? 'checked="checked"' : null; ?}
                            <input type="checkbox" name="matriz" id="matriz" value="S" {{ $checked }}>
                            <span class="lever no-margin"></span>
                        </label>
                    </div>
                </div>
            </div>
            <!-- END matriz -->

            <!-- BEGIN título -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="input-field">
                        <label>Título da empresa</label>
                        <input type="text" name="razao_social" id="razao_social" value="{{ isset($row) ? $row->razao_social : null }}" autofocus="autofocus">
                    </div>
                </div>
            </div>
            <!-- END título -->

            <!-- BEGIN endereço -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="input-field">
                        <label>Endereço</label>
                        <input type="text" name="endereco" id="endereco" value="{{ isset($row) && !is_null($row->endereco) ? $row->endereco : null }}">
                    </div>
                </div>
            </div>
            <!-- END endereço -->

            <!-- BEGIN Número -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="input-field">
                        <label>Número</label>
                        <input type="text" name="numero" id="numero" value="{{ isset($row) && !is_null($row->numero) ? $row->numero : null }}">
                    </div>
                </div>
            </div>
            <!-- END Número -->

            <!-- BEGIN CEP -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="input-field">
                        <label>CEP</label>
                        <input type="text" name="cep" id="cep" value="{{ isset($row) && !is_null($row->cep) ? $row->cep : null }}">
                    </div>
                </div>
            </div>
            <!-- END CEP -->

            <!-- BEGIN Bairro -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="input-field">
                        <label>Bairro</label>
                        <input type="text" name="bairro" id="bairro" value="{{ isset($row) && !is_null($row->bairro) ? $row->bairro : null }}">
                    </div>
                </div>
            </div>
            <!-- END Bairro -->

            <!-- BEGIN Cidade -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="input-field">
                        <label>Cidade</label>
                        <input type="text" name="cidade" id="cidade" value="{{ isset($row) && !is_null($row->cidade) ? $row->cidade : null }}">
                    </div>
                </div>
            </div>
            <!-- END Cidade -->

            <!-- BEGIN Estado -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="input-field">
                        <label>UF</label>
                        <input type="text" name="estado" id="estado" value="{{ isset($row) && !is_null($row->estado) ? $row->estado : null }}">
                    </div>
                </div>
            </div>
            <!-- END Estado -->

            <!-- BEGIN Telefone -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="input-field">
                        <label>Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="is_phone" value="{{ isset($row) && !is_null($row->telefone) ? $row->telefone : null }}">
                    </div>
                </div>
            </div>
            <!-- END Telefone -->

            <!-- BEGIN imagem -->
            <div class="row">
                <div class="col s12 mb-1">
                    <div class="file-field input-field">
                        <div class="btn" style="background-image: url({{ isset($row) && isset($row->imagem) ? asset($row->imagem) : null }}); background-size: cover;">
                            <div class="file">
                                <i class="material-icons">attach_file</i>
                            </div>
                            <input type="file" name="imagem">
                        </div>
                        <div class="file-path-wrapper">
                            <input type="text" class="file-path validate" placeholder="Selecione um arquivo">
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
