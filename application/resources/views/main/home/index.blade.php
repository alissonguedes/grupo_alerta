@extends('main.layouts.app')

@section('main')

	<div class="dsvy-slider-area">

		<!-- START Slider Demo 2 REVOLUTION SLIDER 6.3.5 -->
		<p class="rs-p-wp-fix"></p>
		<rs-module-wrap id="rev_slider_1_1_wrapper" data-source="gallery" style="background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
			<rs-module id="rev_slider_1_1" style="" data-version="6.3.5">
				<rs-slides>

					@foreach ($banners as $slide)
						<!--início conjunto slide-->
						<rs-slide data-key="rs-1" data-title="Slide" data-thumb="{{ asset($slide->imagem) }}" data-anim="ei:d;eo:d;s:600;r:0;t:fade;sl:d;">
							<img src="{{ asset($slide->imagem) }}" title="slider-02-a" width="1920" height="950" data-bg="p:center top;" class="rev-slidebg" data-no-retina>
							<rs-layer id="slider-1-slide-1-layer-0" data-type="text" data-rsp_ch="on" data-xy="xo:681px,681px,370px,220px;yo:474px,474px,243px,240px;" data-text="s:70,70,50,30;l:80,80,55,34;fw:700;" data-frame_0="x:-50,-50,-31,-19;" data-frame_1="st:1190;sp:1000;sR:1190;" data-frame_999="o:0;st:w;sR:6810;" style="z-index:10;font-family:Barlow Condensed;text-transform:uppercase;">
								Sua segurança
							</rs-layer>
							<rs-layer id="slider-1-slide-1-layer-8" data-type="text" data-color="rgba(255, 255, 255, 0)" data-bsh="c:rgba(0,0,0,0.5);" data-rsp_ch="on" data-xy="xo:677px,677px,370px,220px;yo:395px,395px,186px,200px;" data-text="w:normal;s:70,70,50,30;l:75,75,50,30;ls:3px,3px,2px,2px;fw:900;" data-border="bor:6px,6px,6px,6px;" data-frame_0="y:-50,-50,-31,-19;" data-frame_1="st:630;sp:1000;sR:630;" data-frame_999="o:0;st:w;sR:7370;" style="z-index:11;background-color:rgba(255,255,255,0);font-family:Barlow Condensed;text-transform:uppercase;color:transparent !important;-webkit-text-stroke:1px rgba(255, 255, 255,1) !important;">
								FORÇA ALERTA
							</rs-layer>
							<rs-layer id="slider-1-slide-1-layer-11" data-type="text" data-color="rgba(255, 255, 255, 0.02)" data-rsp_ch="on" data-xy="x:r;y:m;yo:-10px,-10px,-6px,-3px;" data-text="w:normal;s:300,300,189,116;l:300,300,189,116;fw:900;" data-basealign="slide" data-frame_999="o:0;st:w;sR:8700;" data-loop_999="x:30px;sp:5000;yym:t;" style="z-index:8;font-family:Barlow Condensed;text-transform:uppercase;">
							</rs-layer>
							<rs-layer id="slider-1-slide-1-layer-12" data-type="text" data-rsp_ch="on" data-xy="xo:50px,50px,31px,19px;yo:50px,50px,31px,19px;" data-text="w:normal;s:20,20,12,7;l:25,25,15,9;" data-frame_999="o:0;st:w;sR:8700;" style="z-index:12;font-family:Roboto;">
							</rs-layer>
							<rs-layer id="slider-1-slide-1-layer-15" data-type="text" data-rsp_ch="on" data-xy="xo:681px,680px,370px,328px;yo:570px,565px,309px,242px;" data-text="s:70,70,50,30;l:74,74,55,30;fw:700;" data-padding="r:10,10,6,4;l:10,10,6,4;" data-frame_0="x:-50,-50,-31,-19;" data-frame_1="st:1190;sp:1000;sR:1190;" data-frame_999="o:0;st:w;sR:6810;" style="z-index:9;background-color:#e10000;font-family:Barlow Condensed;text-transform:uppercase;">
								profissional
							</rs-layer>
							<rs-layer id="slider-1-slide-1-layer-16" class="rev-btn" data-type="button" data-color="#000000" data-rsp_ch="on" data-xy="xo:688px,688px,370px,228px;yo:667px,667px,371px,228px;" data-text="w:normal;s:13,13,13,8;l:55,55,50,30;ls:1px,1px,1px,0px;fw:700;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,t,f" data-padding="r:40,40,25,15;l:40,40,25,15;" data-frame_0="y:50,50,31,19;" data-frame_1="st:2150;sp:1000;sR:2150;" data-frame_999="o:0;st:w;sR:5850;" data-frame_hover="c:#fff;bgc:#e10000;bor:0px,0px,0px,0px;" style="z-index:14;background-color:rgba(255,255,255,1);font-family:Barlow;text-transform:uppercase;">
								Saiba mais
							</rs-layer>
							<rs-layer id="slider-1-slide-1-layer-18" class="rev-btn" data-type="button" data-rsp_ch="on" data-xy="xo:858px,858px,512px,315px;yo:667px,667px,371px,228px;" data-text="w:normal;s:13,13,13,8;l:51,51,50,30;ls:1px,1px,1px,0px;fw:700;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,t,f" data-padding="r:40,40,25,15;l:40,40,25,15;" data-border="bos:solid;boc:#ffffff;bow:2px,2px,2px,2px;" data-frame_0="y:50,50,31,19;" data-frame_1="st:2530;sp:1000;sR:2530;" data-frame_999="o:0;st:w;sR:5470;" data-frame_hover="c:#fff;bgc:#e10000;boc:#e10000;bor:0px,0px,0px,0px;bos:solid;bow:2px,2px,2px,2px;" style="z-index:13;background-color:rgba(255,255,255,0);font-family:Barlow;text-transform:uppercase;">
								CONTRATE
							</rs-layer>
						</rs-slide>
						<!--fim conjunto slide-->
					@endforeach


					{{-- <!--início conjunto slide-->
                <rs-slide data-key="rs-2" data-title="Slide" data-thumb="{{ asset('assets/grupoalertaweb/wp-content/uploads/sites/3/2020/06/slider-03-a.jpg') }}" data-anim="ei:d;eo:d;s:600;r:0;t:fade;sl:d;">
                    <img src="{{ asset('assets/grupoalertaweb/wp-content/uploads/sites/3/2020/06/slider-03-a.jpg') }}" title="slider-02-a" width="1920" height="950" data-bg="p:center top;" class="rev-slidebg" data-no-retina>

                    <rs-layer id="slider-1-slide-2-layer-0" data-type="text" data-rsp_ch="on" data-xy="xo:681px,681px,370px,220px;yo:474px,474px,243px,240px;" data-text="s:70,70,50,30;l:80,80,55,34;fw:700;" data-frame_0="x:-50,-50,-31,-19;" data-frame_1="st:1190;sp:1000;sR:1190;" data-frame_999="o:0;st:w;sR:6810;" style="z-index:10;font-family:Barlow Condensed;text-transform:uppercase;">MONITORAMENTO
                    </rs-layer>

                    <rs-layer id="slider-1-slide-2-layer-8" data-type="text" data-color="rgba(255, 255, 255, 0)" data-bsh="c:rgba(0,0,0,0.5);" data-rsp_ch="on" data-xy="xo:677px,677px,370px,220px;yo:395px,395px,186px,200px;" data-text="w:normal;s:70,70,50,30;l:75,75,50,30;ls:3px,3px,2px,2px;fw:900;" data-border="bor:6px,6px,6px,6px;" data-frame_0="y:-50,-50,-31,-19;" data-frame_1="st:630;sp:1000;sR:630;" data-frame_999="o:0;st:w;sR:7370;" style="z-index:11;background-color:rgba(255,255,255,0);font-family:Barlow Condensed;text-transform:uppercase;color:transparent !important;-webkit-text-stroke:1px rgba(255, 255, 255,1) !important;">ALERTA ELETRÔNICA
                    </rs-layer>

                    <rs-layer id="slider-1-slide-2-layer-11" data-type="text" data-color="rgba(255, 255, 255, 0.02)" data-rsp_ch="on" data-xy="x:r;y:m;yo:-10px,-10px,-6px,-3px;" data-text="w:normal;s:300,300,189,116;l:300,300,189,116;fw:900;" data-basealign="slide" data-frame_999="o:0;st:w;sR:8700;" data-loop_999="x:30px;sp:5000;yym:t;" style="z-index:8;font-family:Barlow Condensed;text-transform:uppercase;">
                    </rs-layer>

                    <rs-layer id="slider-1-slide-2-layer-12" data-type="text" data-rsp_ch="on" data-xy="xo:50px,50px,31px,19px;yo:50px,50px,31px,19px;" data-text="w:normal;s:20,20,12,7;l:25,25,15,9;" data-frame_999="o:0;st:w;sR:8700;" style="z-index:12;font-family:Roboto;">
                    </rs-layer>

                    <rs-layer id="slider-1-slide-2-layer-15" data-type="text" data-rsp_ch="on" data-xy="xo:681px,680px,370px,328px;yo:570px,565px,309px,242px;" data-text="s:70,70,50,30;l:74,74,55,30;fw:700;" data-padding="r:10,10,6,4;l:10,10,6,4;" data-frame_0="x:-50,-50,-31,-19;" data-frame_1="st:1190;sp:1000;sR:1190;" data-frame_999="o:0;st:w;sR:6810;" style="z-index:9;background-color:#e10000;font-family:Barlow Condensed;text-transform:uppercase;">24 HORAS
                    </rs-layer>

                    <rs-layer id="slider-1-slide-2-layer-16" class="rev-btn" data-type="button" data-color="#000000" data-rsp_ch="on" data-xy="xo:688px,688px,370px,228px;yo:667px,667px,371px,228px;" data-text="w:normal;s:13,13,13,8;l:55,55,50,30;ls:1px,1px,1px,0px;fw:700;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,t,f" data-padding="r:40,40,25,15;l:40,40,25,15;" data-frame_0="y:50,50,31,19;" data-frame_1="st:2150;sp:1000;sR:2150;" data-frame_999="o:0;st:w;sR:5850;" data-frame_hover="c:#fff;bgc:#e10000;bor:0px,0px,0px,0px;" style="z-index:14;background-color:rgba(255,255,255,1);font-family:Barlow;text-transform:uppercase;">Saiba mais
                    </rs-layer>


                    <rs-layer id="slider-1-slide-2-layer-18" class="rev-btn" data-type="button" data-rsp_ch="on" data-xy="xo:858px,858px,512px,315px;yo:667px,667px,371px,228px;" data-text="w:normal;s:13,13,13,8;l:51,51,50,30;ls:1px,1px,1px,0px;fw:700;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,t,f" data-padding="r:40,40,25,15;l:40,40,25,15;" data-border="bos:solid;boc:#ffffff;bow:2px,2px,2px,2px;" data-frame_0="y:50,50,31,19;" data-frame_1="st:2530;sp:1000;sR:2530;" data-frame_999="o:0;st:w;sR:5470;" data-frame_hover="c:#fff;bgc:#e10000;boc:#e10000;bor:0px,0px,0px,0px;bos:solid;bow:2px,2px,2px,2px;" style="z-index:13;background-color:rgba(255,255,255,0);font-family:Barlow;text-transform:uppercase;">CONTRATE
                    </rs-layer>
                </rs-slide>
                <!--fim conjunto slide-->


                <!--início conjunto slide-->
                <rs-slide data-key="rs-3" data-title="Slide" data-thumb="{{ asset('assets/grupoalertaweb/wp-content/uploads/sites/3/2020/06/slider-01-a.jpg') }}" data-anim="ei:d;eo:d;s:600;r:0;t:fade;sl:d;">
                    <img src="{{ asset('assets/grupoalertaweb/wp-content/uploads/sites/3/2020/06/slider-01-a.jpg') }}" title="slider-04-a" width="1920" height="950" data-bg="p:center top;" class="rev-slidebg" data-no-retina>
                    <rs-layer id="slider-1-slide-3-layer-0" data-type="text" data-rsp_ch="on" data-xy="xo:681px,681px,370px,220px;yo:474px,474px,243px,240px;" data-text="s:70,70,50,30;l:80,80,55,34;fw:700;" data-frame_0="x:-50,-50,-31,-19;" data-frame_1="st:1190;sp:1000;sR:1190;" data-frame_999="o:0;st:w;sR:6810;" style="z-index:10;font-family:Barlow Condensed;text-transform:uppercase;">PROFISSIONAIS
                    </rs-layer>
                    <rs-layer id="slider-1-slide-3-layer-8" data-type="text" data-color="rgba(255, 255, 255, 0)" data-bsh="c:rgba(0,0,0,0.5);" data-rsp_ch="on" data-xy="xo:677px,677px,370px,220px;yo:395px,395px,186px,200px;" data-text="w:normal;s:70,70,50,30;l:75,75,50,30;ls:3px,3px,2px,2px;fw:900;" data-border="bor:6px,6px,6px,6px;" data-frame_0="y:-50,-50,-31,-19;" data-frame_1="st:630;sp:1000;sR:630;" data-frame_999="o:0;st:w;sR:7370;" style="z-index:11;background-color:rgba(255,255,255,0);font-family:Barlow Condensed;text-transform:uppercase;color:transparent !important;-webkit-text-stroke:1px rgba(255, 255, 255,1) !important;">ALERTA SERVIÇOS
                    </rs-layer>
                    <rs-layer id="slider-1-slide-3-layer-11" data-type="text" data-color="rgba(255, 255, 255, 0.02)" data-rsp_ch="on" data-xy="x:r;y:m;yo:-10px,-10px,-6px,-3px;" data-text="w:normal;s:300,300,189,116;l:300,300,189,116;fw:900;" data-basealign="slide" data-frame_999="o:0;st:w;sR:8700;" data-loop_999="x:30px;sp:5000;yym:t;" style="z-index:8;font-family:Barlow Condensed;text-transform:uppercase;">
                    </rs-layer>
                    <rs-layer id="slider-1-slide-3-layer-12" data-type="text" data-rsp_ch="on" data-xy="xo:50px,50px,31px,19px;yo:50px,50px,31px,19px;" data-text="w:normal;s:20,20,12,7;l:25,25,15,9;" data-frame_999="o:0;st:w;sR:8700;" style="z-index:12;font-family:Roboto;">
                    </rs-layer>
                    <rs-layer id="slider-1-slide-3-layer-15" data-type="text" data-rsp_ch="on" data-xy="xo:681px,680px,370px,328px;yo:570px,565px,309px,242px;" data-text="s:70,70,50,30;l:74,74,55,30;fw:700;" data-padding="r:10,10,6,4;l:10,10,6,4;" data-frame_0="x:-50,-50,-31,-19;" data-frame_1="st:1190;sp:1000;sR:1190;" data-frame_999="o:0;st:w;sR:6810;" style="z-index:9;background-color:#e10000;font-family:Barlow Condensed;text-transform:uppercase;">PREPARADOS
                    </rs-layer>
                    <rs-layer id="slider-1-slide-3-layer-16" class="rev-btn" data-type="button" data-color="#000000" data-rsp_ch="on" data-xy="xo:688px,688px,370px,228px;yo:667px,667px,371px,228px;" data-text="w:normal;s:13,13,13,8;l:55,55,50,30;ls:1px,1px,1px,0px;fw:700;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,t,f" data-padding="r:40,40,25,15;l:40,40,25,15;" data-frame_0="y:50,50,31,19;" data-frame_1="st:2150;sp:1000;sR:2150;" data-frame_999="o:0;st:w;sR:5850;" data-frame_hover="c:#fff;bgc:#e10000;bor:0px,0px,0px,0px;" style="z-index:14;background-color:rgba(255,255,255,1);font-family:Barlow;text-transform:uppercase;">Saiba mais
                    </rs-layer>
                    <rs-layer id="slider-1-slide-3-layer-18" class="rev-btn" data-type="button" data-rsp_ch="on" data-xy="xo:858px,858px,512px,315px;yo:667px,667px,371px,228px;" data-text="w:normal;s:13,13,13,8;l:51,51,50,30;ls:1px,1px,1px,0px;fw:700;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,t,f" data-padding="r:40,40,25,15;l:40,40,25,15;" data-border="bos:solid;boc:#ffffff;bow:2px,2px,2px,2px;" data-frame_0="y:50,50,31,19;" data-frame_1="st:2530;sp:1000;sR:2530;" data-frame_999="o:0;st:w;sR:5470;" data-frame_hover="c:#fff;bgc:#e10000;boc:#e10000;bor:0px,0px,0px,0px;bos:solid;bow:2px,2px,2px,2px;" style="z-index:13;background-color:rgba(255,255,255,0);font-family:Barlow;text-transform:uppercase;">CONTRATE
                    </rs-layer>
                </rs-slide>
                <!--fim conjunto slide-->

                <!--início conjunto slide-->
                <rs-slide data-key="rs-4" data-title="Slide" data-thumb="{{ asset('assets/grupoalertaweb/wp-content/uploads/sites/3/2020/06/slider-04-a.jpg') }}" data-anim="ei:d;eo:d;s:600;r:0;t:fade;sl:d;">
                    <img src="{{ asset('assets/grupoalertaweb/wp-content/uploads/sites/3/2020/06/slider-04-a.jpg') }}" title="slider-04-a" width="1920" height="950" data-bg="p:center top;" class="rev-slidebg" data-no-retina>
                    <rs-layer id="slider-1-slide-3-layer-0" data-type="text" data-rsp_ch="on" data-xy="xo:681px,681px,370px,220px;yo:474px,474px,243px,240px;" data-text="s:70,70,50,30;l:80,80,55,34;fw:700;" data-frame_0="x:-50,-50,-31,-19;" data-frame_1="st:1190;sp:1000;sR:1190;" data-frame_999="o:0;st:w;sR:6810;" style="z-index:10;font-family:Barlow Condensed;text-transform:uppercase;">SUA CONSTRUÇÃO EM
                    </rs-layer>
                    <rs-layer id="slider-1-slide-3-layer-8" data-type="text" data-color="rgba(255, 255, 255, 0)" data-bsh="c:rgba(0,0,0,0.5);" data-rsp_ch="on" data-xy="xo:677px,677px,370px,220px;yo:395px,395px,186px,200px;" data-text="w:normal;s:70,70,50,30;l:75,75,50,30;ls:3px,3px,2px,2px;fw:900;" data-border="bor:6px,6px,6px,6px;" data-frame_0="y:-50,-50,-31,-19;" data-frame_1="st:630;sp:1000;sR:630;" data-frame_999="o:0;st:w;sR:7370;" style="z-index:11;background-color:rgba(255,255,255,0);font-family:Barlow Condensed;text-transform:uppercase;color:transparent !important;-webkit-text-stroke:1px rgba(255, 255, 255,1) !important;">ALERTA CONSTRUTORA
                    </rs-layer>
                    <rs-layer id="slider-1-slide-3-layer-11" data-type="text" data-color="rgba(255, 255, 255, 0.02)" data-rsp_ch="on" data-xy="x:r;y:m;yo:-10px,-10px,-6px,-3px;" data-text="w:normal;s:300,300,189,116;l:300,300,189,116;fw:900;" data-basealign="slide" data-frame_999="o:0;st:w;sR:8700;" data-loop_999="x:30px;sp:5000;yym:t;" style="z-index:8;font-family:Barlow Condensed;text-transform:uppercase;">
                    </rs-layer>
                    <rs-layer id="slider-1-slide-3-layer-12" data-type="text" data-rsp_ch="on" data-xy="xo:50px,50px,31px,19px;yo:50px,50px,31px,19px;" data-text="w:normal;s:20,20,12,7;l:25,25,15,9;" data-frame_999="o:0;st:w;sR:8700;" style="z-index:12;font-family:Roboto;">
                    </rs-layer>
                    <rs-layer id="slider-1-slide-3-layer-15" data-type="text" data-rsp_ch="on" data-xy="xo:681px,680px,370px,328px;yo:570px,565px,309px,242px;" data-text="s:70,70,50,30;l:74,74,55,30;fw:700;" data-padding="r:10,10,6,4;l:10,10,6,4;" data-frame_0="x:-50,-50,-31,-19;" data-frame_1="st:1190;sp:1000;sR:1190;" data-frame_999="o:0;st:w;sR:6810;" style="z-index:9;background-color:#e10000;font-family:Barlow Condensed;text-transform:uppercase;">ÓTIMAS MÃOS
                    </rs-layer>
                    <rs-layer id="slider-1-slide-3-layer-16" class="rev-btn" data-type="button" data-color="#000000" data-rsp_ch="on" data-xy="xo:688px,688px,370px,228px;yo:667px,667px,371px,228px;" data-text="w:normal;s:13,13,13,8;l:55,55,50,30;ls:1px,1px,1px,0px;fw:700;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,t,f" data-padding="r:40,40,25,15;l:40,40,25,15;" data-frame_0="y:50,50,31,19;" data-frame_1="st:2150;sp:1000;sR:2150;" data-frame_999="o:0;st:w;sR:5850;" data-frame_hover="c:#fff;bgc:#e10000;bor:0px,0px,0px,0px;" style="z-index:14;background-color:rgba(255,255,255,1);font-family:Barlow;text-transform:uppercase;">Saiba mais
                    </rs-layer>
                    <rs-layer id="slider-1-slide-3-layer-18" class="rev-btn" data-type="button" data-rsp_ch="on" data-xy="xo:858px,858px,512px,315px;yo:667px,667px,371px,228px;" data-text="w:normal;s:13,13,13,8;l:51,51,50,30;ls:1px,1px,1px,0px;fw:700;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,t,f" data-padding="r:40,40,25,15;l:40,40,25,15;" data-border="bos:solid;boc:#ffffff;bow:2px,2px,2px,2px;" data-frame_0="y:50,50,31,19;" data-frame_1="st:2530;sp:1000;sR:2530;" data-frame_999="o:0;st:w;sR:5470;" data-frame_hover="c:#fff;bgc:#e10000;boc:#e10000;bor:0px,0px,0px,0px;bos:solid;bow:2px,2px,2px,2px;" style="z-index:13;background-color:rgba(255,255,255,0);font-family:Barlow;text-transform:uppercase;">CONTRATE
                    </rs-layer>
                </rs-slide>
                <!--fim conjunto slide--> --}}


				</rs-slides>
			</rs-module>
			<script>
			 setREVStartSize({
			  c: 'rev_slider_1_1',
			  rl: [1240, 1240, 778, 480],
			  el: [950, 950, 500, 400],
			  gw: [1230, 1230, 778, 480],
			  gh: [950, 950, 500, 400],
			  type: 'standard',
			  justify: '',
			  layout: 'fullwidth',
			  mh: "0"
			 });
			 var revapi1,
			  tpj;

			 function revinit_revslider11() {
			  jQuery(function() {
			   tpj = jQuery;
			   revapi1 = tpj("#rev_slider_1_1");
			   if (revapi1 == undefined || revapi1.revolution == undefined) {
			    revslider_showDoubleJqueryError("rev_slider_1_1");
			   } else {
			    revapi1.revolution({
			     sliderLayout: "fullwidth",
			     visibilityLevels: "1240,1240,778,480",
			     gridwidth: "1230,1230,778,480",
			     gridheight: "950,950,500,400",
			     spinner: "spinner0",
			     perspective: 600,
			     perspectiveType: "local",
			     editorheight: "950,768,500,400",
			     responsiveLevels: "1240,1240,778,480",
			     progressBar: {
			      disableProgressBar: true
			     },
			     navigation: {
			      mouseScrollNavigation: false,
			      onHoverStop: false,
			      bullets: {
			       enable: true,
			       tmp: "",
			       style: "hermes",
			       hide_onmobile: true,
			       hide_under: "1025px",
			       h_align: "right",
			       v_align: "center",
			       h_offset: 30,
			       v_offset: 0,
			       direction: "vertical"
			      }
			     },
			     fallbacks: {
			      allowHTML5AutoPlayOnAndroid: true
			     },
			    });
			   }

			  });
			 } // End of RevInitScript
			 var once_revslider11 = false;
			 if (document.readyState === "loading") {
			  document.addEventListener('readystatechange', function() {
			   if ((document.readyState === "interactive" || document.readyState === "complete") && !once_revslider11) {
			    once_revslider11 = true;
			    revinit_revslider11();
			   }
			  });
			 } else {
			  once_revslider11 = true;
			  revinit_revslider11();
			 }
			</script>
			<script>
			 var htmlDivCss = unescape("%23rev_slider_1_1_wrapper%20.hermes.tp-bullets%20%7B%0A%7D%0A%0A%23rev_slider_1_1_wrapper%20.hermes%20.tp-bullet%20%7B%0A%20%20%20%20overflow%3Ahidden%3B%0A%20%20%20%20border-radius%3A50%25%3B%0A%20%20%20%20width%3A16px%3B%0A%20%20%20%20height%3A16px%3B%0A%20%20%20%20background-color%3A%20rgba%280%2C%200%2C%200%2C%200%29%3B%0A%20%20%20%20box-shadow%3A%20inset%200%200%200%202px%20%23ffffff%3B%0A%20%20%20%20-webkit-transition%3A%20background%200.3s%20ease%3B%0A%20%20%20%20transition%3A%20background%200.3s%20ease%3B%0A%20%20%20%20position%3Aabsolute%3B%0A%7D%0A%0A%23rev_slider_1_1_wrapper%20.hermes%20.tp-bullet%3Ahover%20%7B%0A%09%20%20background-color%3A%20rgba%280%2C0%2C0%2C0.21%29%3B%0A%7D%0A%23rev_slider_1_1_wrapper%20.hermes%20.tp-bullet%3Aafter%20%7B%0A%20%20content%3A%20%27%20%27%3B%0A%20%20position%3A%20absolute%3B%0A%20%20bottom%3A%200%3B%0A%20%20height%3A%200%3B%0A%20%20left%3A%200%3B%0A%20%20width%3A%20100%25%3B%0A%20%20background-color%3A%20%23ffffff%3B%0A%20%20box-shadow%3A%200%200%201px%20%23ffffff%3B%0A%20%20-webkit-transition%3A%20height%200.3s%20ease%3B%0A%20%20transition%3A%20height%200.3s%20ease%3B%0A%7D%0A%23rev_slider_1_1_wrapper%20.hermes%20.tp-bullet.selected%3Aafter%20%7B%0A%20%20height%3A100%25%3B%0A%7D%0A%0A");
			 var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
			 if (htmlDiv) {
			  htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
			 } else {
			  var htmlDiv = document.createElement('div');
			  htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
			  document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
			 }
			</script>
			<script>
			 var htmlDivCss = unescape("%0A%0A");
			 var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
			 if (htmlDiv) {
			  htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
			 } else {
			  var htmlDiv = document.createElement('div');
			  htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
			  document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
			 }
			</script>
		</rs-module-wrap>
		<!-- END REVOLUTION SLIDER -->
	</div>

	<div class="site-content-contain">
		<div class="site-content-wrap">
			<div id="content" class="site-content container">
				<div class="dsvy-header-search-form-wrapper">
					<div class="dsvy-search-close"><i class="dsvy-base-icon-cancel"></i></div>
				</div>
				<div id="primary" class="content-area">
					<main id="main" class="site-main dsvy-page-content-wrapper">
						<div id="post-12263" class="post-12263 page type-page status-publish hentry">
							<div class="entry-content">
								<div data-elementor-type="wp-page" data-elementor-id="12263" class="elementor elementor-12263" data-elementor-settings="[]">
									<div class="elementor-section-wrap">
										@php
											$quem_somos = $pagina_model->getSections('quem-nos-somos', 'home-page');
										@endphp
										<!-- #quem-somos-nos -->
										<div class="elementor-section elementor-top-section elementor-element elementor-element-101fc9ae dsvy-col-stretched-right dsvy-right-col-stretched-content-yes dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="101fc9ae" data-element_type="section">
											<div class="elementor-container elementor-column-gap-default">
												@if (isset($quem_somos))
													<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-23b9ecba dsvy-bg-color-over-image" data-id="23b9ecba" data-element_type="column">
														<div class="elementor-widget-wrap elementor-element-populated">
															<div class="elementor-section elementor-inner-section elementor-element elementor-element-16090c15 dsvy-col-stretched-none dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="16090c15" data-element_type="section">
																<div class="elementor-container elementor-column-gap-default">
																	<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-5d790f6f dsvy-bg-color-over-image" data-id="5d790f6f" data-element_type="column">
																		<div class="elementor-widget-wrap elementor-element-populated">
																			<div class="elementor-element elementor-element-1e360db3 dsvy-heaing-style-2  dsvy-align-left elementor-widget elementor-widget-dsvy_heading" data-id="1e360db3" data-element_type="widget" data-widget_type="dsvy_heading.default">
																				<div class="elementor-widget-container">
																					<div class="dsvy-heading-subheading left-align dsvy-reverse-heading-yes">
																						<h4 class="dsvy-element-subtitle">
																							{{ $quem_somos->titulo }}
																						</h4>
																						<h2 class="dsvy-element-title">
																							{{ $quem_somos->subtitulo }}
																						</h2>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-37ab2b2f dsvy-bg-color-over-image" data-id="37ab2b2f" data-element_type="column">
																		<div class="elementor-widget-wrap elementor-element-populated">
																			<div class="elementor-element elementor-element-cf57d89 elementor-widget elementor-widget-text-editor" data-id="cf57d89" data-element_type="widget" data-widget_type="text-editor.default">
																				<div class="elementor-widget-container">
																					<div class="elementor-text-editor elementor-clearfix">
																						@php echo $quem_somos->texto @endphp
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- END #quem-somos-nos -->
															@php
																$subsections_quem_somos = $pagina_model->getSubSections($quem_somos->id);
															@endphp
															@if (isset($subsections_quem_somos))
																<section class="elementor-section elementor-inner-section elementor-element elementor-element-4060c82 dsvy-bg-color-yes dsvy-elementor-bg-color-white dsvy-ihbox-style-2-main dsvy-col-stretched-none dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="4060c82" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
																	<div class="elementor-container elementor-column-gap-default">
																		@foreach ($subsections_quem_somos as $index => $subsection)
																			<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-312c2867 dsvy-bg-color-over-image" data-id="312c2867" data-element_type="column">
																				<div class="elementor-widget-wrap elementor-element-populated">
																					<div class="elementor-element elementor-element-506ddf9b elementor-widget elementor-widget-dsvy_icon_heading" data-id="506ddf9b" data-element_type="widget" data-widget_type="dsvy_icon_heading.default">
																						<div class="elementor-widget-container">
																							<div class="dsvy-ihbox dsvy-ihbox-style-2">
																								<div class="dsvy-ihbox-box">
																									<div class="dsvy-ihbox-headingicon">
																										<div class="dsvy-ihbox-icon">
																											<div class="dsvy-ihbox-icon-wrapper">
																												{{-- ícone aqui --}}
																												@if (isset($subsection->icone))
																													<img src="{{ asset($subsection->icone) }}" alt="" style="height:70px; margin-top: -30px; background-color: var(--red-darken-2);">
																												@endif
																												@php @endphp
																											</div>
																										</div>
																										<div class="dsvy-ihbox-box-number">{{ $index < 10 ? '0' : null }}{{ $index + 1 }}</div>
																										<div class="dsvy-ihbox-contents">
																											<h4 class="dsvy-element-heading">
																												{{ $subsection->titulo }}
																											</h4>
																											<h2 class="dsvy-element-title">
																												{{ $subsection->subtitulo }}
																											</h2>
																											<div class="dsvy-heading-desc">
																												@php echo $subsection->texto @endphp
																											</div>
																										</div><!-- .dsvy-ihbox-contents -->
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		@endforeach
																	</div>
																</section>
															@endif
														</div>
													</div>
												@endif
												@php
													$coluna_esquerda = $pagina_model->getSections('contrate-um-dos-nossos-servicos', 'home-page');
												@endphp
												<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-28c0f7b7 dsvy-bg-color-yes dsvy-elementor-bg-color-globalcolor dsvy-text-color-white dsvy-bg-image-over-color" data-id="28c0f7b7" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
													@if (isset($coluna_esquerda))
														<div class="elementor-widget-wrap elementor-element-populated">
															<div class="elementor-element elementor-element-154827cf elementor-widget elementor-widget-heading" data-id="154827cf" data-element_type="widget" data-widget_type="heading.default">
																<div class="elementor-widget-container">
																	<h2 class="elementor-heading-title elementor-size-default">
																		{{ $coluna_esquerda->titulo }}
																	</h2>
																</div>
															</div>
															<div class="elementor-element elementor-element-4c8befed elementor-widget elementor-widget-heading" data-id="4c8befed" data-element_type="widget" data-widget_type="heading.default">
																<div class="elementor-widget-container">
																	<h2 class="elementor-heading-title elementor-size-default">
																		{{ $coluna_esquerda->subtitulo }}
																	</h2>
																</div>
															</div>
															<div class="elementor-element elementor-element-602a9e24 dsvy-btn-color-white elementor-align-center dsvy-btn-style-flat dsvy-btn-shape-square elementor-widget elementor-widget-button" data-id="602a9e24" data-element_type="widget" data-widget_type="button.default">
																<div class="elementor-widget-container">
																	@php echo $coluna_esquerda->texto @endphp
																</div>
															</div>
														</div>
													@endif
												</div>
											</div>
										</div>
										<!-- END quem-nos-somos -->
										<!-- #nossos-servicos -->
										<div class="elementor-section elementor-top-section elementor-element elementor-element-56041656 dsvy-bg-color-yes dsvy-elementor-bg-color-blackish elementor-section-stretched dsvy-col-stretched-none dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="56041656" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
											<div class="elementor-container elementor-column-gap-default">
												@php
													$nossos_servicos = $pagina_model->getSections('o-que-nos-fazemos', 'home-page');
												@endphp
												@if (isset($nossos_servicos))
													<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-441f655b dsvy-text-color-white dsvy-bg-color-over-image" data-id="441f655b" data-element_type="column">
														<div class="elementor-widget-wrap elementor-element-populated">
															<div class="elementor-element elementor-element-338afac dsvy-heaing-style-2  elementor-widget elementor-widget-dsvy_service_element" data-id="338afac" data-element_type="widget" data-widget_type="dsvy_service_element.default">
																<div class="elementor-widget-container">
																	<div class="designervily-element designervily-element-service dsvy-element-service-style-1 designervily-element-viewtype-carousel designervily-gap-30px" data-show="9" data-columns="3" data-loop="false" data-autoplay="false" data-center="false" data-nav="false" data-dots="true" data-autoplayspeed="1000" data-margin="30px">
																		<div class="designervily-element-inner">
																			<div class="dsvy-ele-header-area">
																				<div class="dsvy-heading-subheading center-align dsvy-reverse-heading-yes">
																					<h4 class="dsvy-element-subtitle">
																						{{ $nossos_servicos->titulo }}
																					</h4>
																					<h2 class="dsvy-element-title">
																						{{ $nossos_servicos->subtitulo }}
																					</h2>
																				</div>
																			</div>
																			@php
																				$servicos = $pagina_model->getSubSections($nossos_servicos->id);
																			@endphp
																			@if (isset($servicos))
																				<div class="dsvy-element-posts-wrapper row multi-columns-row">
																					@foreach ($servicos as $servico)
																						<article class="dsvy-ele dsvy-ele-service dsvy-service-style-1 col-md-4 management  ">
																							<div class="designervily-post-item">
																								@if (isset($servico->imagem))
																									<div class="dsvy-featured-wrapper">
																										<img src="{{ asset($servico->imagem) }}" alt="" />
																									</div>
																								@endif
																								<div class="designervily-box-content">
																									@if (isset($servico->icone))
																										<div class="dsvy-service-icon-wrapper" style="background:#e10000">
																											<img src="{{ asset($servico->icone) }}">
																										</div>
																									@endif
																									<div class="designervily-box-content-inner">
																										<h3 class="dsvy-service-title">
																											@php echo isset($servico->link) ? '<a href="' . $servico->link . '">' : null @endphp
																											{{ $servico->titulo }}
																											@php echo isset($servico->link) ? '</a>' : null @endphp
																										</h3>
																										<div class="dsvy-service-content">
																											@php echo $servico->texto; @endphp
																										</div>
																										<div class="dsvy-service-btn">
																										</div>
																									</div>
																								</div>
																							</div>
																						</article>
																					@endforeach
																				</div>
																			@endif
																		</div><!-- .designervily-element-inner -->
																	</div><!-- .designervily-element -->
																</div>
															</div>
														</div>
													</div>
												@endif
											</div>
										</div>

										<div class="elementor-section elementor-top-section elementor-element elementor-element-ee98d29 dsvy-col-stretched-right dsvy-right-bg-50 dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ee98d29" data-element_type="section">
											<div class="elementor-container elementor-column-gap-default">
												@php
													$nossa_seguranca = $pagina_model->getSections('nossa-seguranca', 'home-page');
												@endphp

												@if (isset($nossa_seguranca))
													<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6681a5df dsvy-bg-color-over-image" data-id="6681a5df" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
														<div class="elementor-widget-wrap elementor-element-populated">
															<div class="elementor-element elementor-element-67d483b1 dsvy-align-center dsvy-heaing-style-2  elementor-widget elementor-widget-dsvy_heading" data-id="67d483b1" data-element_type="widget" data-widget_type="dsvy_heading.default">
																<div class="elementor-widget-container">
																	<div class="dsvy-heading-subheading center-align dsvy-reverse-heading-yes">
																		<h4 class="dsvy-element-subtitle">
																			{{ $nossa_seguranca->titulo }}
																		</h4>
																		<h2 class="dsvy-element-title">
																			{{ $nossa_seguranca->subtitulo }}
																		</h2>
																	</div>
																</div>
															</div>

															@php
																$seguranca = $pagina_model->getSubSections($nossa_seguranca->id);

															@endphp
															@if (isset($seguranca))

																@foreach ($seguranca as $seg)
																	<div class="elementor-section elementor-inner-section elementor-element elementor-element-3cd27c31 dsvy-col-stretched-none dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3cd27c31" data-element_type="section">
																		<div class="elementor-container elementor-column-gap-default">
																			<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-6a8d36a dsvy-bg-color-yes dsvy-elementor-bg-color-globalcolor dsvy-vertical-text dsvy-bg-image-over-color" data-id="6a8d36a" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
																				<div class="elementor-widget-wrap elementor-element-populated">
																					<div class="elementor-element elementor-element-6c0bf031 elementor-widget elementor-widget-heading" data-id="6c0bf031" data-element_type="widget" data-widget_type="heading.default">
																						<div class="elementor-widget-container">
																							<h2 class="elementor-heading-title elementor-size-default">
																								@php echo $seg->texto @endphp
																							</h2>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-306f9810 dsvy-colum-gap-left-15 dsvy-bg-color-over-image" data-id="306f9810" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
																				<div class="elementor-widget-wrap elementor-element-populated" style="background-image: url({{ asset($seg->imagem) }})">
																					<div class="elementor-element elementor-element-371a7ca5 elementor-view-stacked dsvy-vertical-icon elementor-shape-circle elementor-widget elementor-widget-icon" data-id="371a7ca5" data-element_type="widget" data-widget_type="icon.default">
																						<div class="elementor-widget-container">
																							<div class="elementor-icon-wrapper">
																								<div class="elementor-icon" style="width: 80px; height: 80px; display: flex; padding: 0; align-items: center; place-content: center;">
																									@if (!isset($seg->icone))
																										<i aria-hidden="true" class="dsvy-digicop-icon dsvy-digicop-icon-policeman"></i>
																									@else
																										<img src="{{ asset($seg->icone) }}" alt="" style="width:80px;">
																									@endif
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-584fcad7 dsvy-bg-color-yes dsvy-elementor-bg-color-white dsvy-bg-color-over-image" data-id="584fcad7" data-element_type="column">
																				<div class="elementor-widget-wrap elementor-element-populated">
																					<div class="elementor-element elementor-element-4dc2415d elementor-widget elementor-widget-text-editor" data-id="4dc2415d" data-element_type="widget" data-widget_type="text-editor.default">
																						<div class="elementor-widget-container">
																							<div class="elementor-text-editor elementor-clearfix">
																								@php echo $nossa_seguranca->texto @endphp
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																@endforeach
															@endif

														</div>
													</div>
												@endif
											</div>
										</div>

										@php
											$video_comercial = $pagina_model->getSections('video-comercial', 'home-page');
										@endphp

										@if (isset($video_comercial))
											<div @if (isset($video_comercial->imagem)) style="background-image: url({{ asset($video_comercial->imagem) }})" @endif class="elementor-section elementor-top-section elementor-element elementor-element-fd5f04d elementor-section-stretched dsvy-col-stretched-none dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="fd5f04d" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
												<div class="elementor-background-overlay"></div>
												<div class="elementor-container elementor-column-gap-default">
													<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3b5cfb6e dsvy-bg-color-over-image" data-id="3b5cfb6e" data-element_type="column">
														<div class="elementor-widget-wrap elementor-element-populated">
															<div class="elementor-element elementor-element-55726796 dsvy-lightbox-video elementor-view-default elementor-widget elementor-widget-icon" data-id="55726796" data-element_type="widget" data-widget_type="icon.default">
																<div class="elementor-widget-container">
																	<div class="elementor-icon-wrapper">
																		<a class="elementor-icon" href="{{ $video_comercial->link }}">
																			<i aria-hidden="true" class="dsvy-digicop-icon dsvy-digicop-icon-null"></i>
																		</a>
																	</div>
																</div>
															</div>
															<div class="elementor-element elementor-element-7a7af822 elementor-widget elementor-widget-heading" data-id="7a7af822" data-element_type="widget" data-widget_type="heading.default">
																<div class="elementor-widget-container">
																	<h2 class="elementor-heading-title elementor-size-default">{{ $video_comercial->subtitulo }}</h2>
																</div>
															</div>
															<div class="elementor-element elementor-element-b2cd7be elementor-widget elementor-widget-heading" data-id="b2cd7be" data-element_type="widget" data-widget_type="heading.default">
																<div class="elementor-widget-container">
																	<div class="elementor-heading-title elementor-size-default">
																		@php echo $video_comercial->texto @endphp
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										@endif

										@php
											$section_comentarios = $pagina_model->getSections('comentarios', 'home-page');
										@endphp

										@if (isset($section_comentarios))

											<div class="elementor-section elementor-top-section elementor-element elementor-element-3dfb0629 dsvy-bg-color-yes dsvy-elementor-bg-color-white dsvy-col-stretched-right dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3dfb0629" data-element_type="section">
												<div class="elementor-container elementor-column-gap-default">
													<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-12acb29b dsvy-bg-color-yes dsvy-elementor-bg-color-globalcolor dsvy-text-color-white dsvy-bg-color-over-image" data-id="12acb29b" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
														<div class="elementor-widget-wrap elementor-element-populated">
															<div class="elementor-background-overlay"></div>
															<div class="elementor-element elementor-element-179367e1 dsvy-align-left elementor-widget elementor-widget-dsvy_heading" data-id="179367e1" data-element_type="widget" data-widget_type="dsvy_heading.default">
																<div class="elementor-widget-container">
																	<div class="dsvy-heading-subheading left-align dsvy-reverse-heading-yes">
																		<h4 class="dsvy-element-subtitle">
																		</h4>
																		<h2 class="dsvy-element-title">
																			{{ $section_comentarios->subtitulo }}
																		</h2>
																	</div>
																</div>
															</div>
															<div class="elementor-element elementor-element-2c478b96 dsvy-btn-color-white dsvy-btn-style-flat dsvy-btn-shape-square elementor-widget elementor-widget-button" data-id="2c478b96" data-element_type="widget" data-widget_type="button.default">
																<div class="elementor-widget-container" style="margin-bottom: 38px;">
																	<a href="#">
																		Enviar um comentário
																	</a>
																</div>
															</div>
														</div>
													</div>
													<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-352be331 dsvy-bg-color-yes dsvy-elementor-bg-color-light dsvy-testimonila-bg dsvy-bg-color-over-image" data-id="352be331" data-element_type="column">
														<div class="elementor-widget-wrap elementor-element-populated">
															<div class="elementor-element elementor-element-433d77b4 dsvy-align-left elementor-widget elementor-widget-dsvy_testimonial_element" data-id="433d77b4" data-element_type="widget" data-widget_type="dsvy_testimonial_element.default">
																<div class="elementor-widget-container">
																	<div class="designervily-element designervily-element-testimonial dsvy-element-testimonial-style-2 designervily-element-viewtype-carousel designervily-gap-0px" data-show="3" data-columns="2" data-loop="false" data-autoplay="false" data-center="false" data-nav="true" data-dots="false" data-autoplayspeed="1000" data-margin="0px">
																		<div class="designervily-element-inner">
																			<div class="dsvy-ele-header-area">
																				<div class="dsvy-heading-subheading left-align ">
																					<div class="dsvy-heading-desc">
																						@php echo $section_comentarios->texto @endphp
																					</div>
																				</div>
																			</div>
																			<div class="dsvy-element-posts-wrapper row multi-columns-row">
																				@if (isset($comentarios))
																					@foreach ($comentarios as $comentario)
																						<article class="dsvy-ele dsvy-ele-testimonial dsvy-testimonial-style-2 col-md-6  dsvy-odd dsvy-col-odd">
																							<div class="designervily-post-item">
																								<div class="designervily-box-content">
																									<div class="designervily-box-desc">
																										<div class="designervily-box-star-ratings">
																											@for ($i = 0; $i < 5; $i++)
																												@if ($i < $comentario->estrelas)
																													{? $active = 'dsvy-active'; ?}
																												@else
																													{? $active = null; ?}
																												@endif
																												<i class="dsvy-base-icon-star {{ $active }}"></i>
																												<style>
																													.dsvy-base-icon-star:not(.dsvy-active) {
																														color: #ccc;
																													}

																												</style>
																											@endfor
																										</div>
																										<blockquote class="designervily-testimonial-text">
																											{{ $comentario->texto }}
																										</blockquote>
																									</div>
																								</div>
																								<div class="designervily-box-img d-flex">
																									@if (!empty($comentario->imagem))
																										<div class="dsvy-featured-wrapper">
																											<img loading="lazy" width="150" height="150" src="{{ asset($comentario->imagem) }}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" />
																										</div>
																									@endif
																									<div class="designervily-box-author">
																										<h3 class="designervily-box-title">{{ $comentario->autor }}</h3>
																										<div class="designervily-testimonial-detail">{{ $comentario->profissao }}</div>
																									</div>
																								</div>
																							</div>
																						</article>
																					@endforeach
																				@endif
																			</div>
																		</div><!-- .designervily-element-inner -->
																	</div><!-- .designervily-element -->
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										@endif

										<br><br><br><br>
										<div class="elementor-section elementor-top-section elementor-element elementor-element-60e3e589 dsvy-col-stretched-right dsvy-text-color-white dsvy-bg-image-over-color elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="60e3e589" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
											<div class="elementor-container elementor-column-gap-default">
												<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-142ffea5 dsvy-bg-color-yes dsvy-elementor-bg-color-globalcolor dsvy-bg-image-over-color" data-id="142ffea5" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
													<div class="elementor-widget-wrap elementor-element-populated">
														<section class="elementor-section elementor-inner-section elementor-element elementor-element-60f3b105 dsvy-col-stretched-none dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="60f3b105" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
															<div class="elementor-container elementor-column-gap-default">
																<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-47901e10 dsvy-bg-color-over-image" data-id="47901e10" data-element_type="column">
																	<div class="elementor-widget-wrap elementor-element-populated">
																		<div class="elementor-element elementor-element-5721f6cf elementor-widget elementor-widget-dsvy_fid_element" data-id="5721f6cf" data-element_type="widget" data-widget_type="dsvy_fid_element.default">
																			<div class="elementor-widget-container">
																				<div class="designervily-ele designervily-ele-fid designervily-ele-fid-style-2 ">
																					<div class="dsvy-fld-contents">
																						<h4 class="dsvy-fid-inner">
																							{{-- <span class="dsvy-number-rotate" data-appear-animation="animateDigits" data-from="0" data-to="{{ $total_clientes }}" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style=""> --}}
																							{{ $total_clientes }}
																							{{-- </span> --}}
																							<span class="dsvy-fid-sub"><sup>+</sup></span>
																						</h4>
																						<h3 class="dsvy-fid-title"><span>Clientes<br></span></h3>
																					</div><!-- .dsvy-fld-contents -->
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-394b079a dsvy-bg-color-over-image" data-id="394b079a" data-element_type="column">
																	<div class="elementor-widget-wrap elementor-element-populated">
																		<div class="elementor-element elementor-element-75d5afed elementor-widget elementor-widget-dsvy_fid_element" data-id="75d5afed" data-element_type="widget" data-widget_type="dsvy_fid_element.default">
																			<div class="elementor-widget-container">
																				<div class="designervily-ele designervily-ele-fid designervily-ele-fid-style-2 ">
																					<div class="dsvy-fld-contents">
																						<h4 class="dsvy-fid-inner">
																							{{-- <span class="dsvy-number-rotate" data-appear-animation="animateDigits" data-from="0" data-to="200" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style=""> --}}
																							{{ $total_cidades }}
																							{{-- </span> --}}
																							<span class="dsvy-fid-sub"><sup>+</sup></span>
																						</h4>
																						<h3 class="dsvy-fid-title"><span>Cidades<br></span></h3>
																					</div><!-- .dsvy-fld-contents -->
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6739fda0 dsvy-bg-color-over-image" data-id="6739fda0" data-element_type="column">
																	<div class="elementor-widget-wrap elementor-element-populated">
																		<div class="elementor-element elementor-element-3e1c4229 elementor-widget elementor-widget-dsvy_fid_element" data-id="3e1c4229" data-element_type="widget" data-widget_type="dsvy_fid_element.default">
																			<div class="elementor-widget-container">
																				<div class="designervily-ele designervily-ele-fid designervily-ele-fid-style-2 ">
																					<div class="dsvy-fld-contents">
																						<h4 class="dsvy-fid-inner">
																							{{-- <span class="dsvy-number-rotate" data-appear-animation="animateDigits" data-from="0" data-to="10" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style=""> --}}
																							{{ $total_estados }}
																							{{-- </span> --}}
																							<span class="dsvy-fid-sub"><sup>+</sup></span>
																						</h4>
																						<h3 class="dsvy-fid-title"><span>Estados<br></span></h3>
																					</div><!-- .dsvy-fld-contents -->
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																{{-- <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-320364a8 dsvy-bg-color-over-image" data-id="320364a8" data-element_type="column">
																	<div class="elementor-widget-wrap elementor-element-populated">
																		<div class="elementor-element elementor-element-61852e66 elementor-widget elementor-widget-dsvy_fid_element" data-id="61852e66" data-element_type="widget" data-widget_type="dsvy_fid_element.default">
																			<div class="elementor-widget-container">
																				<div class="designervily-ele designervily-ele-fid designervily-ele-fid-style-2 ">
																					<div class="dsvy-fld-contents">
																						<h4 class="dsvy-fid-inner">
																							<span class="dsvy-number-rotate" data-appear-animation="animateDigits" data-from="0" data-to="5000" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">
																								5000 </span>
																							<span class="dsvy-fid-sub"><sup>+</sup></span>
																						</h4>
																						<h3 class="dsvy-fid-title"><span>Colaboradores<br></span></h3>
																					</div><!-- .dsvy-fld-contents -->
																				</div>
																			</div>
																		</div>
																	</div>
																</div> --}}
															</div>
														</section>
													</div>
												</div>
											</div>
										</div>

										@php
											$noticias = $pagina_model->getSections('atualizacoes', 'home-page');
										@endphp

										@if (isset($noticias))
											<div class="elementor-section elementor-top-section elementor-element elementor-element-2d3b8233 elementor-section-stretched dsvy-col-stretched-none dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2d3b8233" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
												<div class="elementor-container elementor-column-gap-default">
													<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6f03d5ec dsvy-bg-color-over-image" data-id="6f03d5ec" data-element_type="column">
														<div class="elementor-widget-wrap elementor-element-populated">
															<div class="elementor-section elementor-inner-section elementor-element elementor-element-5cc996b6 dsvy-col-stretched-none dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5cc996b6" data-element_type="section">
																<div class="elementor-container elementor-column-gap-default">
																	<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4b9b4a8b elementor-hidden-tablet dsvy-bg-color-over-image" data-id="4b9b4a8b" data-element_type="column">
																		<div class="elementor-widget-wrap">
																		</div>
																	</div>
																	<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-3acfc8ef dsvy-align-left dsvy-bg-color-over-image" data-id="3acfc8ef" data-element_type="column">
																		<div class="elementor-widget-wrap elementor-element-populated">
																			<div class="elementor-element elementor-element-156f026b dsvy-heaing-style-2  elementor-widget elementor-widget-dsvy_blog_element" data-id="156f026b" data-element_type="widget" data-widget_type="dsvy_blog_element.default">
																				<div class="elementor-widget-container">
																					<div class="designervily-element designervily-element-blog dsvy-element-blog-style-1 designervily-element-viewtype-carousel designervily-gap-15px" data-show="4" data-columns="2" data-loop="false" data-autoplay="false" data-center="false" data-nav="true" data-dots="false" data-autoplayspeed="1000" data-margin="15px">
																						<div class="designervily-element-inner">
																							<div class="dsvy-ele-header-area">
																								<div class="dsvy-heading-subheading left-align dsvy-reverse-heading-yes">
																									<h4 class="dsvy-element-subtitle">
																										{{ $noticias->titulo }}
																									</h4>
																									<h2 class="dsvy-element-title">
																										{{ $noticias->subtitulo }}
																									</h2>
																								</div>
																							</div>
																							<div class="dsvy-element-posts-wrapper row multi-columns-row">
																								@if (isset($destaques))
																									@foreach ($destaques as $destaque)
																										<article class="dsvy-ele dsvy-ele-blog dsvy-blog-style-1 col-md-6 private-security dsvy-odd dsvy-col-odd">
																											<div class="post-item">
																												<div class="dsvy-featured-container">
																													<div class="dsvy-featured-wrapper">
																														<img loading="lazy" style="height: 380px;" src="{{ asset($destaque->imagem) }}" class="attachment-dsvy-img-770x500 size-dsvy-img-770x500 wp-post-image" alt="" />
																													</div>
																												</div>
																												<div class="designervily-box-content">
																													<div class="dsvy-meta-container">
																														<div class="dsvy-meta-date-wrapper dsvy-meta-line">
																															<span>{{ data($destaque->created_at, 'd.m.Y', ' . ') }}</span>
																														</div>
																													</div>
																													<h3 class="dsvy-post-title"><a href="{{ route('noticias.id', $destaque->slug) }}">{{ $destaque->titulo }}</a></h3>
																													<div class="designervily-box-desc">
																														<div class="dsvy-read-more-link"><a href="{{ route('noticias.id', $destaque->slug) }}"><span>Leia mais</span></a></div>
																													</div>
																												</div>
																											</div>
																										</article>
																									@endforeach
																								@endif
																							</div>
																						</div><!-- .designervily-element-inner -->
																					</div><!-- .designervily-element -->
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										@endif

									</div>
								</div>
							</div><!-- .entry-content -->
						</div><!-- #post-## -->
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- #content -->
		</div><!-- .site-content-wrap -->
	</div>
@endsection
