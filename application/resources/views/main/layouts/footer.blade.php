<footer id="colophon" class="dsvy-footer-section site-footer  dsvy-text-color-white dsvy-bg-color-blackish dsvy-footer-menu-no dsvy-footer-widget-yes" style="border-top: solid 2px #e10000;">

    <div class="dsvy-footer-section footer-wrap dsvy-footer-widget-area  dsvy-bg-color-transparent">
        <div class="container">
            <div class="row">
                @php
                    $empresa = new App\Models\Main\EmpresaModel();
                @endphp

                @foreach ($empresa->getEmpresas() as $row)
                    <div class="dsvy-footer-widget dsvy-footer-widget-col-1 col-md-6 col-lg-2">
                        <aside id="text-4" class="widget-odd widget-last widget-first widget-1 widget widget_text digicop_widget  digicop_widget_count_1">
                            <h2 class="widget-title">{{ $row->razao_social }}</h2>
                            <div class="textwidget">
                                <p>{{ $row->endereco }}, {{ $row->numero }} - {{ $row->bairro }}, {{ $row->cidade }}-{{ $row->estado }}.</p>
                                <p>{{ $row->telefone }}</p>
                            </div>
                        </aside>
                    </div>
                @endforeach

                <div class="dsvy-footer-widget dsvy-footer-widget-col-1 col-md-6 col-lg-2">
                    <aside id="text-4" class="widget-odd widget-last widget-first widget-1 widget widget_text digicop_widget  digicop_widget_count_1">
                        <h2 class="widget-title">{{ get_config('contact_phone') }}</h2>
                        <div class="textwidget">
                            <p>{{ get_config('horario_atendimento') }}</p>
                        </div>
                    </aside>
                </div>
                <!-- .dsvy-footer-widget -->
            </div>
            <!-- .row -->
        </div>
    </div>
    <div class="dsvy-footer-section dsvy-footer-text-area" style="background: #000; border-top: solid 2px #e10000;">
        <div class="container">
            <div class="dsvy-footer-text-inner">

                <div class="row">
                    <div class="col-md-4">
                        <div class="dsvy-footer-copyright-text-area"> Copyright &copy; 2021 <a href="index.html">Grupo Alerta Segurança</a>, Todos os direitos reservados.</div>
                    </div>
                    <div class="col-md-4">
                        <div class="dsvy-footer-logo-box">
                            <div class="dsvy-footer-logo"><img class="dsvy-footer-logo" src="{{ asset('assets/grupoalertaweb/img/logo_footer.png') }}" alt="Digicop Demo 2" title="Digicop Demo 2"></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="dsvy-footer-social-area">
                            <ul class="dsvy-social-links">
                                <li class="dsvy-social-li dsvy-social-facebook "><a href="https://www.facebook.com/grupo.alerta.9" target="_blank"><span><i class="dsvy-base-icon-facebook-squared"></i></span></a></li>
                                <li class="dsvy-social-li dsvy-social-twitter "><a href="https://www.instagram.com/grupo_alerta_/" target="_blank"><span><i class="dsvy-base-icon-instagram"></i></span></a></li>
                                <!--<li class="dsvy-social-li dsvy-social-linkedin "><a href="#" target="_blank"><span><i class="dsvy-base-icon-linkedin-squared"></i></span></a></li>-->
                                <li class="dsvy-social-li dsvy-social-youtube "><a href="https://www.youtube.com/channel/UCxwySgWq03fFj8XwLAlZbpg" target="_blank"><span><i class="dsvy-base-icon-youtube-play"></i></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- .site-content-contain -->
</div><!-- #page -->
<a href="#" class="scroll-to-top"><i class="dsvy-base-icon-up-open-big"></i></a>
