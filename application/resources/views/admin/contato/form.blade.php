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

@section('title', 'Informações do Site')

@section('buttons')
    @if (isset($row))
        <button class="btn btn-large excluir waves-effect" value="{{ isset($row) ? $row->id : null }}" data-tooltip="Excluir" data-link="{{ route('admin.contatos.delete') }}" style="border: none">
            <i class="material-icons">delete_forever</i>
        </button>
    @endif
@endsection

@section('content')

    <form method="post" action="{{ route('admin.contato.insert') }}" novalidate enctype="multipart/form-data" autocomplete="off">

        <div class="row">

            <div class="col s12">

                <div class="top flex mb-1">

                    <div class="actions action-btns flex-row align-itens-center">

                        <button type="submit" class="btn btn-large black-text waves-effect right" style="width: auto;">
                            <i class="material-icons left">save</i>
                            Salvar Tudo
                        </button>

                        {{-- <ul class="tabs">
                            @foreach ($idiomas as $idioma)
                                <li class="tab">
                                    <a href="#{{ limpa_string($idioma->sigla, '') }}">{{ $idioma->descricao }}</a>
                                </li>
                            @endforeach
                        </ul> --}}

                    </div>

                </div>

            </div>

        </div>

        <!-- BEGIN card Informações -->
        <div class="row">

            <!-- BEGIN col.s6 -->
            <div class="col l6 s12 no-padding">

                <!-- BEGIN col s12 -->
                <div class="col s12">

                    <!-- BEGIN card.bg-opacity -->
                    <div class="card bg-opacity-1">

                        <!-- BEGIN card-content -->
                        <div class="card-content padding-6">

                            <!-- BEGIN Título do Site -->
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">corporate_fare</i>
                                    <label class="grey-text">Título do site</label>
                                    <input type="text" name="site_title" id="site_title" value="{{ get_config('site_title') }}">
                                </div>
                            </div>
                            <!-- END Título do Site -->

                            <!-- BEGIN Descrição do site -->
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">notes</i>
                                    <label class="grey-text">Descrição do site</label>
                                    <input type="text" name="site_description" id="site_description" value="{{ get_config('site_description') }}" maxlength="160">
                                </div>
                            </div>
                            <!-- END Descrição do site -->

                            <!-- BEGIN Domínio -->
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">vpn_lock</i>
                                    <label class="grey-text">Domínio</label>
                                    <input type="url" name="site_url" id="site_url" value="{{ get_config('site_url') }}">
                                </div>
                            </div>
                            <!-- END Domínio -->

                            <!-- BEGIN Idioma -->
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">language</i>
                                    <label class="grey-text">Idioma Padrão</label>
                                    <select name="language">
                                        <option value="" disabled="disabled" selected="selected">Selecione o idioma padrão do site</option>

                                        @foreach ($idiomas as $lang)
                                            <option value="{{ $lang->sigla }}" {{ configuracoes('language') === $lang->sigla || get_config('language') == $lang->sigla ? 'selected="selected"' : null }}>{{ $lang->descricao . ' (' . $lang->sigla . ')' }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <!-- END Idioma -->

                            <!-- BEGIN site_logo -->
                            <div class="row">
                                <div class="col s12 mb-1">
                                    <div class="file-field input-field">
                                        {{-- style="background-image: url({{ asset(get_config('site_logo')) }}); background-size: cover;" --}}
                                        <div class="btn">
                                            <div class="file">
                                                @if (!isset($row))
                                                    <i class="material-icons">attach_file</i>
                                                @endif
                                            </div>
                                            <input type="file" name="imagem">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input type="text" class="file-path validate" placeholder="Selecione um arquivo">
                                        </div>
                                    </div>
                                    <div class="z-depth-4 material-icons">
                                        @if (!empty(get_config('site_logo')))
                                            <img src="{{ asset(get_config('site_logo')) }}" class="img_cem materialboxed original" width="100%">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="input-field media conj_img_edit">
                                    <div class="img_icon_pdf image_view z-depth-4 material-icons">
                                        @if (!empty(get_config('site_logo')))
                                            <img src="{{ asset(get_config('site_logo')) }}" class="img_cem materialboxed original">
                                        @endif
                                    </div>
                                    <div class="nome_arquivo" data-placeholder="{{ !empty(get_config('original_logo_name')) ? get_config('original_logo_name') : 'Logo do site' }}">
                                    </div>
                                    <div class="bt_excluir waves-effect redefinir amber" style="{{ !empty(get_config('site_logo')) ? 'display: none;' : '' }}">
                                        <i class="material-icons">undo</i>
                                    </div>
                                    <div class="btn_add_new_image waves-effect image_alt amber">
                                        <i class="material-icons">add_photo_alternate</i>
                                    </div>
                                    <input type="file" name="site_logo" id="img_perfil" accept="image">
                                </div>
                            </div> --}}
                            <!-- END site_logo -->

                            <!-- BEGIN Tags do site -->
                            <div class="row">

                                {? $tags = []; ?}
                                {? $site_tags = ! empty(get_config('site_tags')) ? explode(',', get_config('site_tags')) : null; ?}

                                @if (isset($site_tags))

                                    @foreach ($site_tags as $val)
                                        @php
                                            $tags[] = ['tag' => $val];
                                        @endphp
                                    @endforeach

                                @endif

                                <div class="chips" data-tags="{{ json_encode($tags) }}">
                                    <input id="site_tags" type="text" placeholder="Tags do site">
                                </div>
                                <input type="hidden" name="site_tags" value="{{ get_config('site_tags') }}">

                            </div>
                            <!-- END Tags do site -->

                        </div>
                        <!-- END card-content -->

                        <!-- BEGIN card-action -->
                        <!-- END card-action -->

                    </div>
                    <!-- END card.bg-opacity -->

                </div>
                <!-- END col s12 -->

                <!--------------------------------------------------------->

                <!-- BEGIN col s12 -->
                <div class="col s12">

                    <!-- BEGIN card.bg-opacity -->
                    <div class="card bg-opacity-1">

                        <!-- BEGIN card-content -->
                        <div class="card-content padding-6">

                            <div class="row">
                                <h3 class="card-title white-text">
                                    <i class="material-icons left">forum</i>
                                    Contatos
                                </h3>
                            </div>

                            <!-- BEGIN Empresa -->
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">mail_outline</i>
                                    <label class="grey-text">E-Mail</label>
                                    <input type="email" name="contact_email" id="contact_email" value="{{ get_config('contact_email') }}">
                                </div>
                            </div>
                            <!-- END Empresa -->

                            <!-- BEGIN Telefone -->
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">call</i>
                                    <label class="grey-text {{ !empty(get_config('contact_phone')) ? 'active' : null }}">Telefone</label>
                                    <input type="tel" name="contact_phone" id="contact_phone" class="box_input is_phone" value="{{ get_config('contact_phone') }}">
                                </div>
                            </div>
                            <!-- END Telefone -->

                            <!-- BEGIN Celular -->
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">textsms</i>
                                    <label class="grey-text {{ !empty(get_config('contact_cel')) ? 'active' : null }}">Celular</label>
                                    <input type="tel" name="contact_cel" id="contact_cel" class="box_input is_celular" value="{{ get_config('contact_cel') }}">
                                </div>
                            </div>
                            <!-- END Celular -->

                            <!-- BEGIN Celular -->
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">access_time_filled</i>
                                    <label class="grey-text {{ !empty(get_config('horario_atendimento')) ? 'active' : null }}">Horário de atendimento (08h às 18h)</label>
                                    <input type="tel" name="horario_atendimento" id="horario_atendimento" class="box_input" value="{{ get_config('horario_atendimento') }}">
                                </div>
                            </div>
                            <!-- END Celular -->

                        </div>
                        <!-- END card-content -->

                    </div>
                    <!-- END card.bg-opacity -->

                </div>
                <!-- END col s12 -->

                <!--------------------------------------------------------->

            </div>
            <!-- END col.l6.s12 -->

            <!--------------------------------------------------------->
            <!--------------------------------------------------------->

            <!-- BEGIN col.l6.s12 -->
            <div class="col l6 s12 no-padding">

                <!-- BEGIN col s12 -->
                <div id="informations" class="col s12">

                    <!-- BEGIN card.bg-opacity -->
                    <div class="card bg-opacity-1">

                        <!-- BEGIN card-content -->
                        <div class="card-content padding-6">

                            <div class="row">
                                <h3 class="card-title white-text">
                                    <i class="material-icons left">share</i>
                                    Redes Sociais
                                </h3>
                            </div>

                            <!-- BEGIN Facebook -->
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">facebook</i>
                                    <label class="grey-text">Facebook</label>
                                    <input type="url" name="facebook" id="facebook" value="{{ get_config('facebook') }}">
                                </div>
                            </div>
                            <!-- END Facebook -->

                            <!-- BEGIN Instagram -->
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">party_mode</i>
                                    <label class="grey-text">Instagram</label>
                                    <input type="url" name="instagram" id="instagram" value="{{ get_config('instagram') }}">
                                </div>
                            </div>
                            <!-- END Instagram -->

                            <!-- BEGIN LinkedIn -->
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">workspaces</i>
                                    <label class="grey-text">LinkedIn</label>
                                    <input type="url" name="linkedin" id="linkedin" value="{{ get_config('linkedin') }}">
                                </div>
                            </div>
                            <!-- END LinkedIn -->

                        </div>
                        <!-- END card-content -->

                    </div>
                    <!-- END card.bg-opacity -->

                </div>
                <!-- END col s12 -->

                <!--------------------------------------------------------->

                <!-- BEGIN col s12 -->
                <div class="col s12">

                    <!-- BEGIN card.bg-opacity -->
                    <div id="endereco" class="card bg-opacity-1">

                        <!-- BEGIN card-content -->
                        <div class="card-content padding-6">

                            <div class="row">
                                <h3 class="card-title white-text">
                                    <i class="material-icons left">place</i>
                                    Endereço
                                </h3>
                            </div>

                            <!-- BEGIN Endereço/Número -->
                            <div class="row">

                                <!-- BEGIN Endereço -->
                                <div class="col s8 pl-0">
                                    <div class="input-field">
                                        <label class="grey-text">Endereço</label>
                                        <input type="text" name="address" id="address" value="{{ get_config('address') }}">
                                    </div>
                                </div>
                                <!-- END Endereço -->

                                <!-- BEGIN Número -->
                                <div class="col s4 pr-0">
                                    <div class="input-field">
                                        <label class="grey-text">Número</label>
                                        <input type="text" name="address_nro" id="address_nro" value="{{ get_config('address_nro') }}">
                                    </div>
                                </div>
                                <!-- END Número -->

                            </div>
                            <!-- END Endereço/Número -->

                            <!-- BEGIN CEP/Complemento -->
                            <div class="row">

                                <!-- BEGIN CEP -->
                                <div class="col s4 pl-0">
                                    <div class="input-field">
                                        <label class="grey-text">CEP</label>
                                        <input type="text" name="cep" id="cep" class="box_input is_cep" value="{{ get_config('cep') }}">
                                    </div>
                                </div>
                                <!-- END CEP -->

                                <!-- BEGIN Complemento -->
                                <div class="col s8 pl-3 pr-0">
                                    <div class="input-field">
                                        <label class="grey-text">Complemento</label>
                                        <input type="text" name="complemento" id="complemento" value="{{ get_config('complemento') }}">
                                    </div>
                                </div>
                                <!-- END Complemento -->

                            </div>
                            <!-- END CEP/Complemento -->

                            <!-- BEGIN Bairro / Cidade / UF -->
                            <div class="row">

                                <!-- BEGIN Bairro -->
                                <div class="col s4 pl-0">
                                    <div class="input-field">
                                        <label class="grey-text">Bairro</label>
                                        <input type="text" name="bairro" id="bairro" value="{{ get_config('bairro') }}">
                                    </div>
                                </div>
                                <!-- END Bairro -->

                                <!-- BEGIN Cidade -->
                                <div class="col s5">
                                    <div class="input-field">
                                        <label class="grey-text">Cidade</label>
                                        <input type="text" name="cidade" id="cidade" value="{{ get_config('cidade') }}">
                                    </div>
                                </div>
                                <!-- END Cidade -->

                                <!-- BEGIN UF -->
                                <div class="col s1 pr-0">
                                    <div class="input-field">
                                        <label class="grey-text">UF</label>
                                        <input type="text" name="uf" id="uf" maxlength="2" value="{{ get_config('uf') }}">
                                    </div>
                                </div>
                                <!-- END UF -->

                                <!-- BEGIN PAÍS -->
                                <div class="col s2 pr-0">
                                    <div class="input-field">
                                        <label class="grey-text">País</label>
                                        <input type="text" name="pais" id="pais" value="{{ get_config('pais') }}">
                                    </div>
                                </div>
                                <!-- END PAÍS -->

                            </div>
                            <!-- END Bairro / Cidade / UF -->

                            <!-- BEGIN Maps -->
                            <div class="row">

                                <!-- Maps -->
                                <div id="btn-iframe" class="col s12 pl-0 pr-0">
                                    <div class="col s11 pl-0">
                                        <div class="input-field">
                                            <label class="grey-text">Mapa</label>
                                            <input type="text" name="gmaps" id="gmaps" value="{{ get_config('gmaps') }}">
                                        </div>
                                    </div>
                                    <div class="col s1 right right-align pr-0 pt-4">
                                        <button type="button" class="btn right btn-floating padding-4 waves-effect activator" id="preview" data-tooltip="Ver o mapa" disabled="disabled">
                                            <i class="material-icons grey-text">more_vert</i>
                                        </button>
                                    </div>
                                </div>
                                <!-- END Maps -->

                                <div class="col s1">
                                </div>

                            </div>
                            <!-- END Maps -->

                        </div>
                        <!-- END card-content -->

                        <div class="card-reveal">
                            <button type="button" class="btn btn-floating right card-title grey-text text-darken-4 black waves-effect waves-light" data-tooltip="Fechar o mapa">
                                <i class="material-icons">close</i>
                            </button>
                            <div id="iframe"></div>
                        </div>

                    </div>
                    <!-- END card.bg-opacity -->

                </div>
                <!-- END col s12 -->

                <!--------------------------------------------------------->

            </div>
            <!-- END col.l6.s12 -->

        </div>
        <!-- END card informações -->

    </form>

@endsection
