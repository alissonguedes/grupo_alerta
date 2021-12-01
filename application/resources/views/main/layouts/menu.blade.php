@php
$empresa = new App\Models\Main\EmpresaModel();
$empresa = $empresa
    ->select('*')
    ->from('tb_empresa')
    ->where('matriz', 'S')
    ->first();
@endphp

<div class="dsvy-pre-header-wrapper  dsvy-bg-color-transparent dsvy-color-white">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="dsvy-pre-header-left">
                <ul class="dsvy-contact-info dsvy-skincolor-icon">
                    <li><i class="dsvy-base-icon-letter"></i> Atendimento: {{ get_config('contact_phone') }}</li>
                    <li><i class="dsvy-base-icon-placeholder-1"></i> Matriz - {{ $empresa->endereco }},
                        {{ $empresa->numero }} - {{ $empresa->bairro }},
                        {{ $empresa->cidade }} - {{ $empresa->estado }}</li>
                </ul>
            </div><!-- .dsvy-pre-header-left -->
            <div class="dsvy-pre-header-right">

                <ul class="dsvy-social-links">
                    <li class="dsvy-social-li dsvy-social-facebook ">
                    <li><a href="https://www.facebook.com/grupo.alerta.9" target="_blank"><span><i class="dsvy-base-icon-facebook-squared"></i></span></a></li>
                    <li class="dsvy-social-li dsvy-social-instagram "><a href="https://www.instagram.com/grupo_alerta_/" target="_blank"><span><i class="dsvy-base-icon-twitter"></i></span></a></li>
                    <!--<li class="dsvy-social-li dsvy-social-linkedin "><a href="#" target="_blank"><span><i class="dsvy-base-icon-linkedin-squared"></i></span></a></li>-->
                    <li class="dsvy-social-li dsvy-social-youtube "><a href="#" target="_blank"><span><i class="dsvy-base-icon-youtube-play"></i></span></a></li>
                </ul>

                <!--<div class="dsvy-header-search-btn"><a href="#"><i class="dsvy-base-icon-search"></i></a></div>-->
            </div>
            <!-- .dsvy-pre-header-right -->
        </div>
        <!-- .justify-content-between -->
    </div>
    <!-- .container -->
</div>
<!-- .dsvy-pre-header-wrapper -->

<!-- header -->
<div class="d-flex justify-content-between align-items-center dsvy-header-content">
    <div class="dsvy-logo-menuarea">
        <div class="site-branding dsvy-logo-area">
            <div class="wrap">
                <!-- Logo area -->
                <h1 class="site-title">
                    <a href="{{ route('home') }}" rel="home">
                        <img class="dsvy-main-logo" src="{{ asset('assets/grupoalertaweb/wp-content/uploads/sites/3/2020/06/logo-dark.png') }}" title="Alerta Segurança" />
                        <img class="dsvy-sticky-logo" src="{{ asset('assets/grupoalertaweb/wp-content/uploads/sites/3/2020/07/digicop-logo.png') }}" title="Alerta Segurança" />
                    </a>
                </h1>
            </div><!-- .wrap -->
        </div><!-- .site-branding -->

        <!-- Top Navigation Menu -->
        <div class="navigation-top">
            <button id="menu-toggle" class="nav-menu-toggle">
                <i class="dsvy-base-icon-menu"></i>
            </button>
            <div class="wrap">
                <nav id="site-navigation" class="main-navigation dsvy-navbar  dsvy-main-active-color-globalcolor dsvy-dropdown-active-color-globalcolor" aria-label="Top Menu">
                    <div class="menu-main-menu-container">

                        <ul id="dsvy-top-menu" class="menu">
                            @php

                                $m_pagina = new App\Http\Controllers\Main\PaginasController();
                                $m_menus = new App\Models\Main\PaginaModel();

                                $menus = $m_menus->getMenus();

                                foreach ($menus as $menu):
                                    $submenus = $m_menus->getSubPages($menu->id);

									$link = !is_null($menu->link) ? $menu->link : ($submenus->count() == 0 ? $menu->slug : '#');
									$target = !is_null($menu->target) ? 'target="' . $menu->target . '"' : null;
                                    $class_has_children = $submenus->count() > 0 ? 'menu-item-has-children' : null;

                                    echo '<li class="menu-item menu-item-type-custom menu-item-object-custom ' . $class_has_children . '">';
                                    echo '  <a href="' . url($link) . '" ' . $target . '>' . $menu->label . '</a>';
                                    if (is_null($menu->link) && $submenus->count() > 0):
                                        echo '<ul class="sub-menu">';
                                        foreach ($submenus as $sub):
                                            $link = url($menu->slug . '/' . $sub->slug);
                                            echo '<li class="menu-item menu-item-type-post_type menu-item-object-dsvy-service"><a href="' . $link . '">' . $sub->titulo . '</a></li>';
                                        endforeach;
                                        echo '</ul>';
                                    endif;
                                    echo '</li>';
                                endforeach;

                            @endphp
                        </ul>

                    </div>
                </nav><!-- #site-navigation -->
            </div><!-- .wrap -->
        </div><!-- .navigation-top -->
    </div>

    <div class="dsvy-right-box">
        <div class="dsvy-header-button">
            <a href="https://wa.me/558330665758" target="_blank">
                <span class="dsvy-header-button-text-1">Nos chame no Whatsapp?</span>
                <span class="dsvy-header-button-text-2">{{ get_config('contact_cel') }}</span>
            </a>
        </div>
    </div>
</div><!-- .justify-content-between -->
