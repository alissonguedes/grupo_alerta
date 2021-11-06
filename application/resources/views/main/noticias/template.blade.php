@extends('main.layouts.app')

@section('main')

    <div class="dsvy-title-bar-wrapper  dsvy-bg-color-transparent dsvy-bg-image-yes dsvy-titlebar-style-left">

        <div class="container">

            <div class="dsvy-title-bar-content">

                <div class="dsvy-title-bar-content-inner">
                    <div class="dsvy-tbar">
                        <div class="dsvy-tbar-inner container">
                            <h1 class="dsvy-tbar-title" style="text-transform: uppercase;">@yield('title')</h1>
                        </div>
                    </div>
                    <div class="dsvy-breadcrumb">
                        <div class="dsvy-breadcrumb-inner">
                            <span>
                                <a href="{{ route('home') }}" class="home">
                                    <span>GRUPO ALERTA</span>
                                </a>
                            </span>
                            <span class="sep">-</span>
                            <span>@yield('subtitle')</span>
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

            @yield('content')

        </div>
    </div>
    <!-- .site-content-wrap -->

@endsection
