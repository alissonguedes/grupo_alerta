@extends('main.noticias.template')

@if (!isset($row)) {
    {{ exit(view('main.paginas.404')) }}
@endif


@section('title', 'Notícias')
@section('subtitle', 'Notícias')

@section('content')

    <div id="content" class="site-content container">
        <div class="row multi-columns-row">
            <div id="primary" class="content-area col-md-9 col-lg-9">
                <main id="main" class="site-main">
                    <article id="post-12703" class="dsvy-service-single-style-1 post-12703 dsvy-service type-dsvy-service status-publish has-post-thumbnail hentry dsvy-service-category-protection">
                        <div class="dsvy-service-single">
                            <div class="dsvy-entry-content">
                                <div data-elementor-type="wp-post" data-elementor-id="12703" class="elementor elementor-12703" data-elementor-settings="[]">
                                    <div class="elementor-section-wrap">

                                        <h1 class="dsvy-element-title" style="font-size: 3.5rem; line-height: 4rem; margin-bottom: 3rem;">
                                            @php echo $row->titulo @endphp
                                        </h1>

                                        <h2 style=" margin-bottom: 3rem; font-size: 2rem; padding-left: 0; line-height: 2.6rem; color: #555; font-family: Barlow,sans-serif; text-align: left; font-weight: normal;">{{ $row->subtitulo }}</h2>

                                        @php
                                            echo $row->texto;
                                        @endphp

                                    </div>
                                </div>
                            </div>
                            <!-- .entry-content -->

                        </div>
                    </article>
                </main>
                <!-- #main -->

            </div>
            <!-- #primary -->
            <aside id="secondary" class="widget-area designervily-sidebar col-md-3 col-lg-3" aria-label="Service Sidebar">

                <aside id="dsvy-list-all-posts-1" class="widget-odd widget-first widget-1 widget dsvy_widget_list_all_posts digicop_widget  digicop_widget_count_1">

                    <div class="dsvy-all-post-list-w">

                        <ul class="dsvy-all-post-list">
                            {{-- <?php include 'menuservicos.php'; ?> --}}
                        </ul>

                    </div>

                </aside>
                <aside id="text-2" class="widget-even widget-2 widget widget_text digicop_widget  digicop_widget_count_2">
                    <h2 class="widget-title">Mais</h2>
                    <div class="textwidget">
                        <div class="download">
                            <div class="item-download">
                                <a href="grupo.php" target="_blank" rel="noopener noreferrer">O GRUPO</a>
                            </div>
                            <div class="item-download">
                                <a href="orcamento" target="_blank" rel="noopener noreferrer"> Orçamento</a>
                            </div>

                        </div>
                    </div>
                </aside>
                <aside id="media_image-2" class="widget-odd widget-last widget-3 widget widget_media_image digicop_widget  digicop_widget_count_3">
                    <img width="308" height="481" src="{{ asset('assets/grupoalertaweb/img/banner-a2.jpg') }}" class="image wp-image-13784  attachment-full size-full" alt="" loading="lazy" style="max-width: 100%; height: auto;" />
                </aside>
            </aside>
            <!-- #secondary -->
        </div>
        <!-- .row -->
    </div>
    {{-- <div class="title_pg">{{ $title }}</div>

    <br>
    <br>
    <br>

    <div class="geral">

        @if (isset($row))

            @foreach ($row as $news)

                {? $titulo = json_decode($news->titulo, true) ?}
                {? $subtitulo = json_decode($news->subtitulo, true) ?}
                {? $data_add = $news->created_at ?}

                <a href="{{ route('noticias.id', $news->slug) }}">

                    <div class="conj_item_cont">

                        @if (!empty($news->imagem))
                            <div class="img_item_cont">
                                <img src="{{ asset($news->imagem) }}" class="img_cem">
                            </div>
                        @endif

                        <div class="info_item_cont">

                            <div class="title_itemm_cont">
                                {{ tradutor($titulo) }}
                                <div class="subtitlepage" style="font-size: 16px; font-weight: normal;">
                                    {{ tradutor($subtitulo) }}
                                </div>
                            </div>

                            <div class="data_item">
                                {{ tradutor($data_add) }}
                            </div>

                        </div>

                    </div>

                </a>

            @endforeach

        @else

            <span data-translate="nao_exitem_noticias_publicadas_no_momento">Não existem notícias publicadas no
                momento.</span>

        @endif

        {{-- <div class="paginacao">
		<ul>
		<li><div class="n_page n_select">01</div></li>
		<li><div class="n_page">02</div></li>
		<li><div class="n_page">03</div></li>
		<li><div class="n_page">04</div></li>
		<li><div class="n_page">05</div></li>
		</ul>
	</div> --}}
    <!--fim conteúdo-->

    </div> --}}

@endsection
