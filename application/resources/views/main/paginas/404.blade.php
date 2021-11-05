@extends('main.layouts.app')

<?php $title = 'Página não encontrada'; ?>
@section('title', $title)

@section('main')

    <div class="dsvy-title-bar-wrapper  dsvy-bg-color-transparent dsvy-bg-image-yes dsvy-titlebar-style-left">
        <div class="container">
            <div class="dsvy-title-bar-content">
                <div class="dsvy-title-bar-content-inner">
                    <div class="dsvy-tbar">
                        <div class="dsvy-tbar-inner container">
                            <h1 class="dsvy-tbar-title" style="text-transform: uppercase;">{{ $title }}</h1>
                        </div>
                    </div>
                    <div class="dsvy-breadcrumb">
                        <div class="dsvy-breadcrumb-inner">
                            <span>
                                <a title="Go to Digicop Demo 2." href="" class="home">
                                    <span>404</span>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .dsvy-title-bar-content -->
        </div>
        <!-- .container -->
    </div>

    <!-- .dsvy-title-bar-wrapper -->
    <div class="site-content-contain">
        <div class="site-content-wrap">
            <div id="content" class="site-content container">
                <div class="row multi-columns-row">
                    <div id="primary" class="content-area col-md-9 col-lg-9">
                        <main id="main" class="site-main">

                            <h3>Desculpe!</h3>

                            <p>
                                A página que você procura não foi encontrada ou não está disponível no momento.
                                <br>
                                Por favor, tente novamente mais tarde.
                            </p>

                    </div>
                </div>
                </main>
            </div>
        </div>

    </div>

@endsection
