<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\IdiomaModel;
use App\Models\Admin\MenuModel;
use App\Models\Admin\PaginaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class PaginasController extends Controller {

    private $menus_pag = [];

    public function __construct() {
        $this->pagina_model = new PaginaModel();
        $this->menu_model   = new MenuModel();
        $this->idioma_model = new IdiomaModel();
    }

    public function index(Request $request) {

        if (!Session::has('userdata')) {
            if ($request->ajax()) {
                return abort(403);
            } else {
                return redirect()->route('admin.auth.login');
            }

        }

        if ($request->ajax()) {
            $dados['paginate'] = $this->pagina_model->getPagina();

            return view('admin.paginas.list', $dados);
        }

        $dados['paginas']  = $this;
        $dados['paginate'] = $this->menu_model->getMenu();

        return view('admin.paginas.index', $dados);
    }

    public function show_form(Request $request, $id = null) {

        if (!Session::has('userdata')) {
            if ($request->ajax()) {
                return abort(403);
            } else {
                return redirect()->route('admin.auth.login');
            }

        }

        $dados = [];

        if (!is_null($id)) {
            $dados['row'] = $this->pagina_model->getPagina($id)->first();
        }

        $dados['sections'] = $this->pagina_model->getSections($id);
        $dados['paginas']  = $this->pagina_model->getGrupo($id);
        $dados['idiomas']  = $this->idioma_model->getIdioma();
        $dados['menus']    = $this->menu_model->getMenu();

        return view('admin.paginas.form', $dados);
    }

    public function insert(Request $request) {

        if (!Session::has('userdata')) {
            if ($request->ajax()) {
                return abort(403);
            } else {
                return redirect()->route('admin.auth.login');
            }

        }

        $validate = [
            'menu'                        => ['required'],
            'titulo'                      => [
                'required',
                'unique:tb_pagina,titulo',
            ],
            // 'subtitulo'            => ['required'],
            'descricao'                   => ['required'],
            'section.*subsection.*.title' => [
                'required',
                'unique:tb_pagina_sections,titulo',
            ],
            'section_subtitle.*'          => ['required'],
            'section_text.*'              => ['required'],
        ];

        $request->validate($validate);

        $url  = url('admin/paginas');
        $type = 'back';

        if ($this->pagina_model->create($request)) {
            $status  = 'success';
            $message = 'Idioma cadastrado com sucesso!';
        } else {
            $status  = 'error';
            $message = 'Não foi possível cadastrar o idioma. Por favor, tente novamente.';
        }

        return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url]);
    }

    public function update(Request $request) {

        if (!Session::has('userdata')) {
            if ($request->ajax()) {
                return abort(403);
            } else {
                return redirect()->route('admin.auth.login');
            }
        }

        $validate = [
            'titulo'                           => [
                'required',
                Rule::unique('tb_pagina', 'titulo')->ignore($_POST['id'], 'id'),
                'max:255',
            ],
            'menu'                             => ['required'],
            'section.*.title'                  => [
                'required',
                'distinct',
            ],
            'section.*.subsection.*.title' => [
                'required',
                'distinct',
            ],
            'arquivo'                          => 'required|max:8192',
        ];

        // $field = [];
        // for ( $i = 0; $i < count($request->section); $i++){
        //     $validate['section_title.*'] = [
        //         Rule::unique('tb_pagina_sections', 'titulo') -> ignore($request->section[$i], 'id')
        //     ];
        // }

        $request->validate($validate);

        $url  = url('admin/paginas ');
        $type = null;

        if ($this->pagina_model->edit($request)) {
            $status  = 'success';
            $message = 'Pagina atualizado com sucesso!';
        } else {
            $status  = 'error';
            $message = 'Não foi possível atualizar o pagina. Por favor, tente novamente.';
        }

        return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url]);

    }

    public function update_menu() {

        $arvore = [];

        if (isset($_POST['menus'])) {
            $this->menus_pag = $_POST['menus'];
        }

        return $this->pagina_model->update_menu($this->menus_pag);

    }

    public function replace(Request $request, $field) {

        if (!Session::has('userdata')) {
            if ($request->ajax()) {
                return abort(403);
            } else {
                return redirect()->route('admin.auth.login');
            }

        }

        $url  = url('admin/paginas');
        $type = null;

        if ($this->pagina_model->edit($request, $field)) {
            $status  = 'success';
            $message = 'Pagina atualizado com sucesso!';
        } else {
            $status  = 'error';
            $message = 'Não foi possível atualizar o pagina. Por favor, tente novamente.';
        }

        return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url]);
    }

    public function delete(Request $request) {

        if (!Session::has('userdata')) {
            if ($request->ajax()) {
                return abort(403);
            } else {
                return redirect()->route('admin.auth.login');
            }

        }

        $url  = url('admin/paginas');
        $type = 'back';

        if ($this->pagina_model->remove($request)) {
            $status  = 'success';
            $message = 'Pagina removido com sucesso!';
        } else {
            $type    = null;
            $status  = 'error';
            $message = 'Não foi possível remover o pagina. Por favor, tente novamente.';
        }

        return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url]);
    }

    public function delete_file(Request $request, $id, $file) {

        if (!Session::has('userdata')) {
            if ($request->ajax()) {
                return abort(403);
            } else {
                return redirect()->route('admin.auth.login');
            }

        }

        $url  = url('admin/paginas');
        $type = 'back';

        if ($this->pagina_model->remove_file($file)) {
            $status  = 'success';
            $message = 'Arquivo removido com sucesso!';
        } else {
            $type    = null;
            $status  = 'error';
            $message = 'Não foi possível remover o arquivo. Por favor, tente novamente.';
        }

        return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url]);

    }

    public function getPaginas($id_menu, $id_parent = 0) {

        $ul = '';
        $li = '';

        $menus = $this->pagina_model->getSubPages($id_menu, $id_parent);

        if ($menus) {

            $ul .= '<ol class="dd-list" data-menu="' . $id_menu . '">';

            foreach ($menus as $m) {

                $submenus = $this->pagina_model->getSubPages($id_menu, $m->id_pagina);

                $submenu = null;

                $link = url($m->link . '/' . $m->slug);

                $ul .= '<li class="dd-item" data-id="' . $m->id_pagina . '">';

                $ul .= '<div class="dd-handle dd3-handle"></div>';
                $ul .= '<div class="dd-content">';
                $ul .= $m->titulo;
                $ul .= '<button class="btn btn-small btn-flat btn-floating" style="margin-top: 0 !important;" data-href="' . route('admin.paginas.edit', $m->id_pagina) . '"><i class="material-icons">edit</i></button></div>';

                $ul .= $this->getPaginas($id_menu, $m->id_pagina);
                $ul .= '</li>';

            }

            $ul .= '</ol>';

        }

        return $ul;

    }

}
