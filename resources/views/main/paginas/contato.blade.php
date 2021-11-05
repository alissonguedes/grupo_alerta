@extends('main.paginas.template')

@section('title', 'Contato')
@section('subtitle', 'Contato')

@php
$empresa = new App\Models\Main\EmpresaModel();
$empresa = $empresa
    ->select('*')
    ->from('tb_empresa')
    ->where('matriz', 'S')
    ->first();
@endphp

@section('content')

    <div class="elementor elementor-12986">

        <div class="elementor-section-wrap">

            <div class="elementor-section elementor-top-section elementor-element elementor-element-afb8a9c dsvy-bg-color-yes dsvy-elementor-bg-color-light elementor-section-stretched dsvy-col-stretched-none dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="afb8a9c" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-a348b44 dsvy-bg-color-yes dsvy-elementor-bg-color-white dsvy-bg-color-over-image" data-id="a348b44" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-3d97149 dsvy-heaing-style-1 dsvy-align-left elementor-widget elementor-widget-dsvy_heading" data-id="3d97149" data-element_type="widget" data-widget_type="dsvy_heading.default">
                                <div class="elementor-widget-container">
                                    <div class="dsvy-heading-subheading left-align dsvy-reverse-heading-yes">
                                        <h4 class="dsvy-element-subtitle">
                                            Fale conosco
                                        </h4>
                                        <h2 class="dsvy-element-title">
                                            via formulário
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-f915180 elementor-widget elementor-widget-shortcode" data-id="f915180" data-element_type="widget" data-widget_type="shortcode.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-shortcode">
                                        <div role="form" class="wpcf7" id="wpcf7-f13031-p12986-o1" lang="en-US" dir="ltr">
                                            <div class="screen-reader-response">
                                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                <ul></ul>
                                            </div>
                                            <form action="processaform2.php" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">

                                                <div class="main-form">
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="input-group">
                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                    <input type="text" name="nome" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Nome" required />
                                                                </span>
                                                            </div>
                                                            </p>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="wpcf7-form-control-wrap your-email">
                                                                    <input type="text" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="E-mail" required />
                                                                </span>
                                                            </div>
                                                            </p>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="wpcf7-form-control-wrap phone">
                                                                    <input type="text" name="phone" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Telefone" required />
                                                                </span>
                                                            </div>
                                                            </p>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="wpcf7-form-control-wrap phone">
                                                                    <input type="text" name="cidade" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Cidade" required />
                                                                </span>
                                                            </div>
                                                            </p>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="wpcf7-form-control-wrap phone">
                                                                    <select name="setor" class="wpcf7-form-control wpcf7-text" aria-invalid="false" required>
                                                                        <option selected disabled>Escolha o setor</option>
                                                                        <option value="">Força Alerta</option>
                                                                        <option value="">Força Alerta Segurança Eletrônica</option>
                                                                        <option value="">Força Alerta Serviços</option>
                                                                        <option value="">Força Alerta Construtora</option>
                                                                        <option value="">Força Alerta Portaria Virtual</option>
                                                                        <option value="">Força Alerta Segurança de Valores</option>
                                                                    </select>
                                                                </span>
                                                            </div>
                                                            </p>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="input-group input-button">
                                                                <span class="wpcf7-form-control-wrap message">
                                                                    <textarea name="msg" cols="40" rows="4" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Mensagem"></textarea>
                                                                </span>
                                                            </div>
                                                            </p>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group input-button">
                                                                <input type="submit" value="Enviar contato" class="wpcf7-form-control wpcf7-submit btn-block" />
                                                            </div>
                                                            </p>
                                                        </div>

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="wpcf7-response-output" aria-hidden="true"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-3d332bd dsvy-bg-color-over-image" data-id="3d332bd" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-58a96a2 dsvy-heaing-style-1 dsvy-align-left elementor-widget elementor-widget-dsvy_heading" data-id="58a96a2" data-element_type="widget" data-widget_type="dsvy_heading.default">
                                <div class="elementor-widget-container">
                                    <div class="dsvy-heading-subheading left-align dsvy-reverse-heading-yes">
                                        <h4 class="dsvy-element-subtitle">
                                            Outros canais de
                                        </h4>
                                        <h2 class="dsvy-element-title">
                                            Atendimento
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-5eba5ed elementor-widget elementor-widget-dsvy_icon_heading" data-id="5eba5ed" data-element_type="widget" data-widget_type="dsvy_icon_heading.default">
                                <div class="elementor-widget-container">
                                    <div class="dsvy-ihbox dsvy-ihbox-style-5">
                                        <div class="d-flex">
                                            <div class="dsvy-ihbox-icon">
                                                <div class="dsvy-ihbox-icon-wrapper">
                                                    <img src="{{ asset('assets/grupoalertaweb/img/icon_local.jpg') }}">
                                                </div>
                                            </div>
                                            <div class="dsvy-ihbox-contents">
                                                <h2 class="dsvy-element-title">
                                                    Matriz
                                                </h2>
                                                <div class="dsvy-heading-desc">
                                                    {{ $empresa->endereco }},
                                                    {{ $empresa->numero }} - {{ $empresa->bairro }}<br>
                                                    {{ $empresa->cidade }} - {{ $empresa->estado }}
                                                </div>
                                            </div>
                                            <!-- .dsvy-ihbox-contents -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="elementor-element elementor-element-5eba5ed elementor-widget elementor-widget-dsvy_icon_heading" data-id="5eba5ed" data-element_type="widget" data-widget_type="dsvy_icon_heading.default">
                                <div class="elementor-widget-container">
                                    <div class="dsvy-ihbox dsvy-ihbox-style-5">
                                        <div class="d-flex">
                                            <div class="dsvy-ihbox-icon">
                                                <div class="dsvy-ihbox-icon-wrapper">
                                                    <img src="{{ asset('assets/grupoalertaweb/img/icon_fone.jpg') }}">
                                                </div>
                                            </div>
                                            <div class="dsvy-ihbox-contents">
                                                <h2 class="dsvy-element-title">
                                                    Telefones
                                                </h2>
                                                <div class="dsvy-heading-desc">
                                                    {{ get_config('contact_phone') }}
                                                </div>
                                            </div><!-- .dsvy-ihbox-contents -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="elementor-element elementor-element-5eba5ed elementor-widget elementor-widget-dsvy_icon_heading" data-id="5eba5ed" data-element_type="widget" data-widget_type="dsvy_icon_heading.default">
                                <div class="elementor-widget-container">
                                    <div class="dsvy-ihbox dsvy-ihbox-style-5">
                                        <div class="d-flex">
                                            <div class="dsvy-ihbox-icon">
                                                <div class="dsvy-ihbox-icon-wrapper">
                                                    <img src="{{ asset('assets/grupoalertaweb/img/icon_email.jpg') }}">
                                                </div>
                                            </div>
                                            <div class="dsvy-ihbox-contents">
                                                <h2 class="dsvy-element-title">
                                                    E-mail
                                                </h2>
                                                <div class="dsvy-heading-desc">
                                                    {{ get_config('contact_email') }}
                                                </div>
                                            </div>
                                            <!-- .dsvy-ihbox-contents -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-4adaf19 dsvy-contact-social-area elementor-widget elementor-widget-text-editor" data-id="4adaf19" data-element_type="widget" data-widget_type="text-editor.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-text-editor elementor-clearfix">
                                        <ul class="dsvy-social-links">
                                            <li class="dsvy-social-li dsvy-social-facebook ">
                                                <a href="https://www.facebook.com/grupo.alerta.9" target="_blank">
                                                    <span>
                                                        <i class="dsvy-base-icon-facebook-squared"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="dsvy-social-li dsvy-social-instagram ">
                                                <a href="https://www.instagram.com/grupo_alerta_/" target="_blank">
                                                    <span>
                                                        <i class="dsvy-base-icon-instagram"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="dsvy-social-li dsvy-social-youtube ">
                                                <a href="https://www.youtube.com/channel/UCxwySgWq03fFj8XwLAlZbpg" target="_blank">
                                                    <span><i class="dsvy-base-icon-youtube-play"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
