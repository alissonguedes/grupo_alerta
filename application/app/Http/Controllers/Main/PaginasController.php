<?php

namespace App\Http\Controllers\Main;

use App\Mail\ContactPage;
use App\Mail\OrderShipped;
use App\Models\Main\BannerModel;
use App\Models\Main\NoticiaModel;
use App\Models\Main\PaginaModel;
use App\Models\Main\ParceiroModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaginasController extends Controller {

    private $mail_to = 'contato@grupoalertaweb.com.br';

    public function __construct() {
        $this->banner_model   = new BannerModel();
        $this->pagina_model   = new PaginaModel();
        $this->news_model     = new NoticiaModel();
        $this->parceiro_model = new ParceiroMOdel();
    }

    public function index($menu = null, $page = null) {

        $dados['pagina_model'] = $this->pagina_model;

        $dados['paginas'] = $this;
        $pagina           = $this->pagina_model->getPagina($menu);

        if (isset($pagina)) {

            $dados['row'] = $pagina;

            if ($pagina->tipo == 'galeria') {
                return $this->fotos($pagina, $page);
            }

        }

        $dados['row'] = $this->pagina_model->getPagina($menu, $page);
        return view('main.paginas.index', $dados);

    }

    public function grupo(Request $request) {

        $dados['pagina_model']    = $this->pagina_model;
        $dados['sobre_o_grupo']   = $this->pagina_model->getSections('sobre-o-grupo-alerta', 'o-grupo');
        $dados['nossos_servicos'] = $this->pagina_model->getSections('nossos-servicos', 'o-grupo');
        $dados['parceiros']       = $this->parceiro_model->getParceiros();

        return view('main.paginas.grupo', $dados);

    }

    public function fotos($page, $album = null) {

        $dados['page'] = $page;

        $dados['albuns'] = $this->pagina_model->getAlbuns();
        $dados['album']  = $this->pagina_model->getAlbuns($album);

        if (!is_null($album)) {
            return view('main.galeria.fotos', $dados);
        } else {
            return view('main.galeria.index', $dados);
        }

    }

    public function orcamento(Request $request) {

        return view('main.paginas.orcamento');

    }

    public function contato(Request $request) {

        return view('main.paginas.contato');

    }

    public function send_contact_form(Request $request) {

        $validate = [
            'nome'     => 'required',
            'email'    => 'required',
            'telefone' => 'required',
            'cidade'   => 'required',
            'setor'    => 'required',
            'mensagem' => 'required',
        ];

        $request->validate($validate);

        $toUser        = $this->mail_to;
        $moreUsers     = [];
        $evenMoreUsers = [];

        Mail::to($toUser)
            ->cc($moreUsers)
            ->bcc($evenMoreUsers)
            ->send(new ContactPage($request));

        if (Mail::failures()) {
            $status  = 'error';
            $message = 'Desculpe. Infelizmente, sua mensagem não foi enviada. Tente novamente mais tarde!';
        } else {
            $status  = 'success';
            $message = 'Obrigado por entrar em contato. <br> Sua mensagem foi enviada com sucesso! <br> Responderemos em breve. Aguarde!';
        }

        return json_encode(['status' => $status, 'message' => $message]);

    }

    public function send_orcamento_form(Request $request) {

        $validate = [
            'nome'     => 'required',
            'email'    => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'cidade'   => 'required',
            'estado'   => 'required',
        ];

        if (!$request->outros_servicos && is_null($request->servicos)) {
            $validate['servicos[]'] = ['required'];
        }

        if ($request->outros_servicos && (!isset($_POST['outros']) || empty(trim($_POST['outros'])))) {
            $validate['outros'] = ['required'];
        }

        $request->validate($validate);

        $toUser        = $this->mail_to;
        $moreUsers     = [];
        $evenMoreUsers = [];

        Mail::to($toUser)
            ->cc($moreUsers)
            ->bcc($evenMoreUsers)
            ->send(new OrderShipped($request));
        // ->send(new ContactPage($request));

        if (Mail::failures()) {
            $status  = 'error';
            $message = 'Desculpe. Infelizmente, sua mensagem não foi enviada. Tente novamente mais tarde!';
        } else {
            $status  = 'success';
            $message = 'Obrigado por entrar em contato. <br> Sua mensagem foi enviada com sucesso! <br> Responderemos em breve. Aguarde!';
        }

        return json_encode(['status' => $status, 'message' => $message]);

    }

    public function getMenus($id_menu, $id_parent = 0) {

        $ul = '';
        $li = '';

        $menus = $this->pagina_model->getSubPages($id_menu, $id_parent);

        if ($menus) {

            if ($id_parent != 0) {
                $ul .= '<ul>';
            } else {
                $ul .= ' <ul class="menu">';
            }

            foreach ($menus as $m) {

                $submenu = null;

                // $submenus = $this->pagina_model->select('id')
                //     ->from('tb_pagina')
                //     ->where('id_pagina', $m->id_parent)
                //     ->where('id_menu', $id_menu)
                //     ->get();

                // $link = $m->id_parent == 0 ? 'javascript:void(0);' : url($m->link . '/' . $m->slug);

                $link = url($m->link . '/' . $m->slug);

                $ul .= '<li>';
                $ul .= '<a href="' . $link . '" data-target="menu_pag_' . $m->id_parent . '">' . tradutor($m->titulo);

                $submenus = $this->pagina_model->getSubPages($id_menu, $m->id_pagina);

                if ($submenus->count() > 0) {
                    $ul .= '<i class="material-icons">arrow_right</i>';
                }

                $ul .= '</a>';

                $ul .= $this->getMenus($id_menu, $m->id_pagina);

                $ul .= '</li>';
            }

            $ul .= $li;
            $ul .= '</ul>';

        }

        return $ul;

    }

}
