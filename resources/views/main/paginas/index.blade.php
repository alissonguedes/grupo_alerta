@extends('main.layouts.app')

@if (!isset($row))
    {{ exit(view('main.paginas.404')) }}
@endif

@section('title', tradutor($row->titulo))

@section('main')

    <div class="title_pg">{{ tradutor($row->titulo) }}</div>

    <div class="geral">

        <div class="menu_categs">

            @php echo $paginas -> getMenus($row->id_menu) @endphp

        </div>

        <div class="container2">

        asdfasdf

            {? $data_add = $row -> created_at; ?}
            {? $data_upd = $row -> updated_at; ?}

            <div class="datapost">{{ tradutor($data_upd) }}</div>

            <div class="subtitlepage">{{ tradutor($row->subtitulo) }}</div>

            {? $imagem = !empty($noticia -> imagem) && file_exists(public_path($row->imagem)) ? asset($noticia -> imagem) : null; ?}

            @if (!is_null($imagem))
                <div class="img_news">
                    <img src="{{ $imagem }}" class="img_cem">
                </div>
            @endif

            <div class="texto_pagina">
                @php
                    echo tradutor($row->texto, null, 'teste');
                @endphp
            </div>

        </div>

    </div>

@endsection
