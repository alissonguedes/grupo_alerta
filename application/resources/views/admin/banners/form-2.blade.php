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

@section('title', (isset($row) ? 'Editar' : 'Novo') . ' banner')

@section('buttons')
	@if (isset($row))
		<button class="btn btn-large excluir waves-effect" value="{{ isset($row) ? $row->id : null }}" data-tooltip="Excluir" data-link="{{ route('admin.banners.delete') }}" style="border: none">
			<i class="material-icons">delete_forever</i>
		</button>
	@endif
@endsection

@section('container')

	<div id="main">

		<div class="row">

			<div class="col s8 mt-3">
				<div id="slider" width="300" height="150">
					<div class="layer" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;"></div>
					{{-- <div data-key="rs-2" data-title="Slide" data-thumb="{{ asset('assets/grupoalertaweb/wp-content/uploads/sites/3/2020/06/slider-03-a.jpg') }}" data-anim="ei:d;eo:d;s:600;r:0;t:fade;sl:d;">
                        <img src="{{ asset('assets/grupoalertaweb/wp-content/uploads/sites/3/2020/06/slider-03-a.jpg') }}" title="slider-02-a" width="1920" height="950" data-bg="p:center top;" class="rev-slidebg" data-no-retina>
                        <div id="slider-1-slide-2-layer-0" data-type="text" data-rsp_ch="on" data-xy="xo:681px,681px,370px,220px;yo:474px,474px,243px,240px;" data-text="s:70,70,50,30;l:80,80,55,34;fw:700;" data-frame_0="x:-50,-50,-31,-19;" data-frame_1="st:1190;sp:1000;sR:1190;" data-frame_999="o:0;st:w;sR:6810;" style="z-index:10;font-family:Barlow Condensed;text-transform:uppercase;">MONITORAMENTO</div>
                        <div id="slider-1-slide-2-layer-8" data-type="text" data-color="rgba(255, 255, 255, 0)" data-bsh="c:rgba(0,0,0,0.5);" data-rsp_ch="on" data-xy="xo:677px,677px,370px,220px;yo:395px,395px,186px,200px;" data-text="w:normal;s:70,70,50,30;l:75,75,50,30;ls:3px,3px,2px,2px;fw:900;" data-border="bor:6px,6px,6px,6px;" data-frame_0="y:-50,-50,-31,-19;" data-frame_1="st:630;sp:1000;sR:630;" data-frame_999="o:0;st:w;sR:7370;" style="z-index:11;background-color:rgba(255,255,255,0);font-family:Barlow Condensed;text-transform:uppercase;color:transparent !important;-webkit-text-stroke:1px rgba(255, 255, 255,1) !important;">ALERTA ELETRÔNICA</div>
                        <div id="slider-1-slide-2-layer-11" data-type="text" data-color="rgba(255, 255, 255, 0.02)" data-rsp_ch="on" data-xy="x:r;y:m;yo:-10px,-10px,-6px,-3px;" data-text="w:normal;s:300,300,189,116;l:300,300,189,116;fw:900;" data-basealign="slide" data-frame_999="o:0;st:w;sR:8700;" data-loop_999="x:30px;sp:5000;yym:t;" style="z-index:8;font-family:Barlow Condensed;text-transform:uppercase;"></div>
                        <div id="slider-1-slide-2-layer-12" data-type="text" data-rsp_ch="on" data-xy="xo:50px,50px,31px,19px;yo:50px,50px,31px,19px;" data-text="w:normal;s:20,20,12,7;l:25,25,15,9;" data-frame_999="o:0;st:w;sR:8700;" style="z-index:12;font-family:Roboto;"></div>
                        <div id="slider-1-slide-2-layer-15" data-type="text" data-rsp_ch="on" data-xy="xo:681px,680px,370px,328px;yo:570px,565px,309px,242px;" data-text="s:70,70,50,30;l:74,74,55,30;fw:700;" data-padding="r:10,10,6,4;l:10,10,6,4;" data-frame_0="x:-50,-50,-31,-19;" data-frame_1="st:1190;sp:1000;sR:1190;" data-frame_999="o:0;st:w;sR:6810;" style="z-index:9;background-color:#e10000;font-family:Barlow Condensed;text-transform:uppercase;">24 HORAS</div>
                        <div id="slider-1-slide-2-layer-16" class="rev-btn" data-type="button" data-color="#000000" data-rsp_ch="on" data-xy="xo:688px,688px,370px,228px;yo:667px,667px,371px,228px;" data-text="w:normal;s:13,13,13,8;l:55,55,50,30;ls:1px,1px,1px,0px;fw:700;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,t,f" data-padding="r:40,40,25,15;l:40,40,25,15;" data-frame_0="y:50,50,31,19;" data-frame_1="st:2150;sp:1000;sR:2150;" data-frame_999="o:0;st:w;sR:5850;" data-frame_hover="c:#fff;bgc:#e10000;bor:0px,0px,0px,0px;" style="z-index:14;background-color:rgba(255,255,255,1);font-family:Barlow;text-transform:uppercase;">Saiba mais</div>
                        <div id="slider-1-slide-2-layer-18" class="rev-btn" data-type="button" data-rsp_ch="on" data-xy="xo:858px,858px,512px,315px;yo:667px,667px,371px,228px;" data-text="w:normal;s:13,13,13,8;l:51,51,50,30;ls:1px,1px,1px,0px;fw:700;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,t,f" data-padding="r:40,40,25,15;l:40,40,25,15;" data-border="bos:solid;boc:#ffffff;bow:2px,2px,2px,2px;" data-frame_0="y:50,50,31,19;" data-frame_1="st:2530;sp:1000;sR:2530;" data-frame_999="o:0;st:w;sR:5470;" data-frame_hover="c:#fff;bgc:#e10000;boc:#e10000;bor:0px,0px,0px,0px;bos:solid;bow:2px,2px,2px,2px;" style="z-index:13;background-color:rgba(255,255,255,0);font-family:Barlow;text-transform:uppercase;">CONTRATE</div>
                    </div> --}}
				</div>
			</div>

			<div class="col s4 mt-2">

				<form method="post" action="{{ route('admin.banners.insert') }}" novalidate enctype="multipart/form-data" autocomplete="off">

					@csrf

					<!-- BEGIN título -->
					<div class="row">
						<div class="col s12 mb-1">
							<div class="input-field">
								<label>Título do banner</label>
								<input type="text" name="titulo" id="titulo" value="{{ isset($row) ? $row->titulo : null }}" autofocus="autofocus">
							</div>
						</div>
					</div>
					<!-- END título -->

					<div class="row">
						<div class="col s12">
							<div id="banner-maker" class="file-field input-field">
								<div class="btn">
									<div class="file">
										<i class="material-icons">attach_file</i>
									</div>
								</div>
								<input type="file" name="imagem" id="imagem">
								<div class="file-path-wrapper">
									<input type="text" class="file-path validate" placeholder="Imagem do banner">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s12 mt-3">
							<label class="left" for="fullscreen">Slide fullscreen</label>
							<div class="switch right">
								<label>
									<input type="checkbox" name="fullscreen" id="fullscreen">
									<span class="lever no-margin"></span>
								</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s6 mt-8">
							<button type="reset" data-action="back" class="btn btn-small left mr-2 waves-effect">
								<i class="material-icons left">arrow_back</i> Cancelar
							</button>
						</div>
						<div class="col s6 mt-8">
							<button type="submit" class="btn inverse btn-small right waves-effect">
								<i class="material-icons left">save</i> Salvar
							</button>
						</div>
						<input type="hidden" name="id" value="{{ isset($row) ? $row->id : null }}">
						<input type="hidden" name="_method" value="{{ isset($row) ? 'put' : 'post' }}">
						@if (!isset($row))
							<input type="hidden" name="editavel" value="{{ $editavel }}">
						@endif
						<input type="hidden" name="dicionario" value="{{ isset($row) ? $row->id_dicionario : null }}">
						{{ $input_label_hidden }}
					</div>

				</form>

			</div>

		</div>

		<div class="row">
			<div class="col mt-2"></div>
		</div>

		<div class="row">
			<div class="col pt-1">
				<button type="button" class="btn btn-small" id="add_texto">
					<i class="material-icons">title</i>
				</button>
			</div>
			<div class="col l2 s12">
				<select name="font-family" disabled="disabled">
					<option value="" selected="selected" disabled="disabled">Fonte</option>
					<option value="inherit">Herdado</option>
					<option value="Arial">Arial</option>
					<option value="Barlow Condensed">Barlow Condensed</option>
				</select>
			</div>
			<div class="col l2 s12">
				<select name="font-size" disabled="disabled">
					<option value="" selected="selected" disabled="disabled">Tamanho da Fonte</option>
					@for ($i = 8; $i <= 100; $i++)
						@if ($i % 2 == 0)
							<option value="{{ $i }}px">{{ $i }}px</option>
						@endif
					@endfor
				</select>
			</div>
			<div class="col pt-1">
				<input type="color" id="text-color" class="left" name="text-color" value="#ffffff">
				<label for="text-color" class="col mt-3">Cor do texto</label>
			</div>
			<div class="col pt-1">
				<input type="color" id="preenchimento" name="preenchimento" colorformat="opacity rgba cmyk hsla" value="#ffffff">
				<label for="preenchimento" class="col mt-3 right">Cor do preenchimento</label>
			</div>
			<div class="col">
				Transparência
				<div class="range-field">
					<input type="range" value="1" name="opacity" min="0" max="1" step="0.1">
				</div>
			</div>
			{{-- <div class="col">
                Transparência
                <div class="range-field">
                    <input type="range" name="opacity" min="0" max="1" step="0.1">
                </div>
            </div> --}}
		</div>

		<div class="row">
			<div class="col l3 s12 mt-2">
				<div class="input-field">
					<label for="" class="active">Padding</label>
					<div class="row">
						<div class="col s3">
							<input type="number" name="padding" class="center-align" placeholder="L" value="" min="0" max="20" step="1">
						</div>
						<div class="col s3">
							<input type="number" name="padding" class="center-align" placeholder="R" value="" min="0" max="20" step="1">
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<style>
		input[type="range"] {
			margin: 0;
		}

		input[type=range]+.thumb.active .value {
			font-size: 14px;
			margin-top: 4px;
			margin-left: 0px;
			color: #fff;
			font-weight: bold;
		}

		#slider {
			border: 1px solid #ccc;
			width: 100%;
			height: 383px;
			position: relative;
			overflow: hidden;
			background-color: #333;
		}

		#slider:before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
			text-align: center;
			display: flex;
			align-items: center;
			place-content: center;
		}

		#slider::after {
			content: '';
			position: absolute;
			display: flex;
			width: 1px;
			height: 100%;
			top: 0;
			bottom: 0;
			left: 50%;
			right: 50%;
			background: #444;
		}

		#slider .layer {
			content: '';
			position: absolute;
			width: 100%;
			height: 1px;
			top: 50% !important;
			bottom: 50% !important;
			left: 0% !important;
			right: 0% !important;
			background: #444;
		}

		#slider .draggable {
			position: relative;
			width: 100%;
			height: 100%;
			z-index: 1 !important;
			overflow: hidden;
		}

		#slider .draggable img {
			position: absolute;
			top: 0;
			height: 100%;
			z-index: 1
		}

		#slider .input-field {
			padding: 0;
			margin: 0;
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
		}

		#slider .input-field input[type="file"] {
			position: absolute;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
			width: 100%;
			background: blue;
			cursor: pointer;
			z-index: 999;
			opacity: 0;
		}

		#slider img {
			cursor: move
		}

		#slider .selected {
			box-shadow: 0 0px 5px 2px rgba(0, 0, 255, 0.8);
		}

		input[type="color"] {
			border: none;
			width: 32px;
			height: 32px;
			position: relative;
			padding: 0;
			-webkit-appearance: none;
			background-color: white !important;
		}

		input[type="color"]::-webkit-color-swatch-wrapper {
			padding: 0;
		}

		input[type="color"]::-webkit-color-swatch {
			border: none;
		}

		input[type="color"]:before {
			content: 'format_color_text';
			font-family: 'Material Icons';
			position: absolute;
			z-index: 999;
			line-height: 30px;
			text-align: center;
			width: inherit;
			height: inherit;
		}

		input[type="color"][name="preenchimento"]:before {
			content: 'format_color_fill';
		}

	</style>

@endsection
