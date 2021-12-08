@extends('main.paginas.template')

{{-- @if (!isset($row))
    {{ exit(view('main.paginas.404')) }}
@endif --}}

@section('title', 'O Grupo')
@section('subtitle', 'quem somos')

@section('content')

	<div data-elementor-type="wp-page" data-elementor-id="12980" class="elementor elementor-12980" data-elementor-settings="[]">
		<div class="elementor-section-wrap">
			<div class="elementor-section elementor-top-section elementor-element elementor-element-27ed5ea2 dsvy-bg-color-yes dsvy-elementor-bg-color-white dsvy-col-stretched-none dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="27ed5ea2" data-element_type="section">
				<div class="elementor-container elementor-column-gap-default">
					@php
						if (isset($sobre_o_grupo->imagem)):
						$div = 'elementor-col-50';
						else:
						$div = 'elementor-col-100';
						endif;
					@endphp
					<div class="elementor-column {{ $div }} elementor-top-column elementor-element elementor-element-3068cbd6 dsvy-bg-color-over-image" data-id="3068cbd6" data-element_type="column">
						<div class="elementor-widget-wrap elementor-element-populated">
							<div class="elementor-element elementor-element-43041b3f dsvy-heaing-style-2 elementor-widget elementor-widget-dsvy_heading" data-id="43041b3f" data-element_type="widget" data-widget_type="dsvy_heading.default">
								<div class="elementor-widget-container">
									<div class="dsvy-heading-subheading -align dsvy-reverse-heading-yes">
										<h4 class="dsvy-element-subtitle">
											{{ $sobre_o_grupo->titulo }}
										</h4>
										<h2 class="dsvy-element-title">
											{{ $sobre_o_grupo->subtitulo }}
										</h2>
										<div class="dsvy-heading-desc">
											<?= $sobre_o_grupo->texto ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@if (isset($sobre_o_grupo->imagem))
						<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7d428e2b dsvy-bg-color-over-image" data-id="7d428e2b" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<section class="elementor-section elementor-inner-section elementor-element elementor-element-58764e3c dsvy-col-stretched-none dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="58764e3c" data-element_type="section">
									<div class="elementor-container elementor-column-gap-narrow">
										<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-58a7102d dsvy-bg-color-over-image" data-id="58a7102d" data-element_type="column">
											<div class="elementor-widget-wrap elementor-element-populated">
												<div class="elementor-element elementor-element-2cdb94fc dsvy-responsive-imge-1 elementor-widget elementor-widget-image" data-id="2cdb94fc" data-element_type="widget" data-widget_type="image.default">
													<div class="elementor-widget-container">
														<div class="elementor-image">
															<img width="260" height="270" src="{{ asset($sobre_o_grupo->imagem) }}" class="attachment-full size-full" alt="" loading="lazy" />
														</div>
													</div>
												</div>
												<div class="elementor-element elementor-element-543b2b9e elementor-widget elementor-widget-dsvy_icon_heading" data-id="543b2b9e" data-element_type="widget" data-widget_type="dsvy_icon_heading.default">
													<div class="elementor-widget-container">
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
					@endif
				</div>
			</div>

			<div class="elementor-section elementor-top-section elementor-element elementor-element-9e7ea0 dsvy-col-stretched-right dsvy-bg-color-over-image elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9e7ea0" data-element_type="section">
				<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-30f5f49a dsvy-bg-color-yes dsvy-elementor-bg-color-blackish dsvy-bg-color-over-image" data-id="30f5f49a" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-widget-wrap elementor-element-populated">
							<div class="elementor-element elementor-element-7c582796 elementor-widget elementor-widget-heading" data-id="7c582796" data-element_type="widget" data-widget_type="heading.default">
								<div class="elementor-widget-container" style="padding:20px 0 0 40px;">
									<h2 class="elementor-heading-title elementor-size-default" style="color:#fff;">
										Alguns dos<br>nossos Clientes
									</h2>
								</div>
							</div>
							<div class="elementor-element elementor-element-279d0820 elementor-widget elementor-widget-heading" data-id="279d0820" data-element_type="widget" data-widget_type="heading.default"> </div>
						</div>
					</div>
					<div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-2bd87c1a dsvy-bg-color-yes dsvy-elementor-bg-color-globalcolor dsvy-bg-image-over-color" data-id="2bd87c1a" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-widget-wrap elementor-element-populated">
							<div class="elementor-element elementor-element-d23d95c elementor-widget elementor-widget-dsvy_client_element" data-id="d23d95c" data-element_type="widget" data-widget_type="dsvy_client_element.default">
								<div class="elementor-widget-container">
									<div class="designervily-element designervily-element-client dsvy-element-client-style-1 designervily-element-viewtype-row-column designervily-gap-30px" data-show="4" data-columns="4" data-loop="false" data-autoplay="false" data-center="false" data-nav="false" data-dots="false" data-autoplayspeed="1000" data-margin="30px">
										<div class="designervily-element-inner">
											<div class="dsvy-ele-header-area">
												<div class="dsvy-heading-subheading left-align "></div>
											</div>
											<div class="dsvy-element-posts-wrapper row multi-columns-row">
												@if (isset($parceiros))
													@foreach ($parceiros as $row)
														<article class="dsvy-ele dsvy-ele-client dsvy-client-style-1 col-md-6 col-lg-3   ">
															<div class="dsvy-client-wrapper">
																<h4 class="dsvy-hide">{{ $row->nome }}</h4>
																<div class="dsvy-featured-wrapper">
																	<br>
																	@if (!is_null($row->site))<a href="{{ $row->site }}">@endif
																	<img loading="lazy" width="145" height="60" src="{{ asset($row->imagem) }}" alt="" />
																	@if (!is_null($row->site))</a>@endif
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

			<br><br><br>

			<div class="row">
				<div class="container">
					<div class="col s4">
						<div class="card mt-0 mb-0 z-depth-0 border-0">
							<div class="card-content no-padding">
								<div class="card-title dsvy-heaing-style-2">
									<div class="dsvy-heading-subheading">
										<h4 class="dsvy-element-subtitle">
											{{ $nossos_servicos->titulo }}
										</h4>
										<h2 class="dsvy-element-title no-margin no-padding" style="margin: inherit;">
											{{ $nossos_servicos->subtitulo }}
										</h2>
									</div>

									<?= $nossos_servicos->texto ?>

									<div class="elementor-element elementor-element-75da9f26 elementor-align-left dsvy-btn-color-globalcolor dsvy-btn-style-flat dsvy-btn-shape-square elementor-widget elementor-widget-button" data-id="75da9f26" data-element_type="widget" data-widget_type="button.default">
										<div class="elementor-widget-container">
											<div class="elementor-button-wrapper">
												<a href="{{ route('orcamento') }}" class="elementor-button-link elementor-button elementor-size-md" role="button">
													<span class="elementor-button-content-wrapper">
														<span class="elementor-button-text">Faça um Orçamento</span>
													</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					@php
						$subsections = $pagina_model->getSubSections($nossos_servicos->id);
					@endphp
					@if (isset($subsections))
						@foreach ($subsections as $sub)
							<div class="col s4">
								<div class="elementor-column  elementor-inner-column elementor-element elementor-element-72bc26f1 dsvy-bg-color-over-image" data-id="72bc26f1" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-6524f98 elementor-widget elementor-widget-dsvy_icon_heading" data-id="6524f98" data-element_type="widget" data-widget_type="dsvy_icon_heading.default">
											<div class="elementor-widget-container">
												<div class="dsvy-ihbox dsvy-ihbox-style-1">
													<div class="dsvy-ihbox-box">
														<div class="dsvy-ihbox-icon">
															<div class="dsvy-ihbox-icon-wrapper">
																<i class="dsvy-digicop-icon dsvy-digicop-icon-cctv-1"></i>
															</div>
														</div>
														<div class="dsvy-ihbox-contents">
															<h4 class="dsvy-element-heading">
																{{ $sub->titulo }}
															</h4>
															<h2 class="dsvy-element-title" style="margin: inherit;">
																{{ $sub->subtitulo }}
															</h2>
															<div class="dsvy-heading-desc">
																<?= $sub->texto ?>
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
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection
