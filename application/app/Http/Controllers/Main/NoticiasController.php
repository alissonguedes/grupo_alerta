<?php

namespace App\Http\Controllers\Main;

use App\Models\Admin\MenuModel;
use App\Models\Main\NoticiaModel;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{

    public function __construct()
    {
        $this->menu_model = new MenuModel();
        $this->noticia_model = new NoticiaModel();
    }

    public function index(Request $request)
    {

        $dados['row'] = $this->noticia_model->getNoticia();

        return view('main.noticias.index', $dados);

    }

    public function show(Request $request, $id)
    {

        $url = $request->url();
        $title = explode('/', $url);
        $title = $title[count($title) - 2];

        $dados['title'] = $this->menu_model->getTitulo($title);
        $dados['row'] = $this->noticia_model->getNoticia($id);
        $dados['noticias'] = $this->noticia_model->getNoticia();

        return view('main.noticias.details', $dados);

    }

}
