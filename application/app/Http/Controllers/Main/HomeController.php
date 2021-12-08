<?php

namespace App\Http\Controllers\Main;

use App\Models\Main\BannerModel;
use App\Models\Main\EmpresaModel;
use App\Models\Main\LinkModel;
use App\Models\Main\NoticiaModel;
use App\Models\Main\PaginaModel;
use App\Models\Main\ParceiroModel;

class HomeController extends Controller {

    public function __construct() {
        $this->banner_model   = new BannerModel();
        $this->page_model     = new PaginaModel();
        $this->noticia_model  = new NoticiaModel();
        $this->link_model     = new LinkModel();
        $this->parceiro_model = new ParceiroModel();
        $this->empresa_model  = new EmpresaModel();
    }

    public function index() {

        $dados['pagina_model']   = $this->page_model;
        $dados['banners']        = $this->banner_model->getBanners();
        $dados['destaques']      = $this->noticia_model->getDestaques();
        $dados['link']           = $this->link_model->getLink();
        $dados['comentarios']    = $this->parceiro_model->getComentarios();
        $dados['total_clientes'] = $this->parceiro_model->count();
        $dados['total_cidades']  = $this->empresa_model->get_total_cidades();
        $dados['total_estados']  = $this->empresa_model->get_total_uf();
        return view('main.home.index', $dados);

    }

}
