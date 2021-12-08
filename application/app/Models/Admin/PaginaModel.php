<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;

class PaginaModel extends Authenticatable {

    use HasFactory, Notifiable;

    protected $table = 'tb_pagina';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private $order = [
        null,
        'descricao',
        'status',
    ];

    public function getPagina($find = null) {

        $get = $this->select('*');

        if (!is_null($find)) {
            $get->where('id', $find);
            return $get;
        }

        if (isset($_GET['search']['value']) && !empty($_GET['search']['value'])) {
            $get->where(function ($get) {
                $search = $_GET['search']['value'];
                $get->orWhere('id', 'like', $search . '%')
                    ->orWhere('label', 'like', $search . '%')
                    ->orWhere('status', 'like', $search . '%');
            });
        }

        // Order By
        if (isset($_GET['order']) && $_GET['order'][0]['column'] != 0) {
            $orderBy[$this->order[$_GET['order'][0]['column']]] = $_GET['order'][0]['dir'];
        } else {
            $orderBy[$this->order[1]] = 'asc';
        }

        foreach ($orderBy as $key => $val) {
            $get->orderBy($key, $val);
        }

        return $get;
        return $get->paginate($_GET['length'] ?? null);

    }

    public function getSections($id) {

        $get = $this->select('id', 'titulo', 'slug', 'subtitulo', 'texto', 'imagem', 'icone', 'link');
        $get->from('tb_pagina_sections');
        $get->where('id_pagina', $id);
        $get->where('id_parent', '0');
        $get->orderBy('ordem', 'ASC');
        return $get->get();

    }

    public function getSubSections($id) {
        $get = $this->select('id', 'titulo', 'slug', 'subtitulo', 'texto', 'imagem', 'icone', 'link');
        $get->from('tb_pagina_sections');
        $get->where('id_parent', $id);
        // $get -> orderBy('ordem', 'ASC');
        return $get->get();
    }

    public function getAttach($id) {

        return $this->select('*')
            ->from('tb_attachment')
            ->where('id_modulo', $id)
            ->where('modulo', 'page')
            ->orderBy('realname')
            ->get();

    }

    public function getGrupo($id = null) {
        $pag = $this->select('id', 'id_pagina', 'titulo')
            ->from('tb_pagina');

        if (!is_null($id)) {
            $pag->where('id', '<>', $id);
        }

        return $pag->get();
    }

    public function create($request) {

        $section = [];

        $path     = 'assets/embaixada/documentos/';
        $origName = null;
        $fileName = null;
        $arquivo  = null;

        $traducao = [];
        $data     = [
            'id_pagina' => isset($request->grupo) ? $request->grupo : 0,
            'id_menu'   => $request->menu,
            'titulo'    => $request->titulo,
            'slug'      => limpa_string($request->titulo),
            'subtitulo' => $request->subtitulo,
            'descricao' => $request->descricao,
            'texto'     => $request->texto,
            'idioma'    => get_config('language'),
            'status'    => isset($request->status) ? $request->status : '0',
        ];

        if ($request->file('arquivo')) {

            $file = $request->file('arquivo');

            foreach ($file as $f) {

                $fileName = $f->getClientOriginalName();
                $fileExt  = $f->getClientOriginalExtension();
                $fileExt  = $fileExt != '' ? '.' . $fileExt : '.txt';

                $imgName = explode('.', ($f->getClientOriginalName()));

                $origName = limpa_string($imgName[count($imgName) - 2 > 0 ? count($imgName) - 2 : 0], '_') . $fileExt;
                $arquivo  = uniqid(sha1(limpa_string($fileName))) . $fileExt;

                $f->storeAs($path, $arquivo);

                $files[] = [
                    'id_modulo' => $id,
                    'modulo'    => 'page',
                    'path'      => $path . $arquivo,
                    'realname'  => $origName,
                    'author'    => Session::get('userdata')['nome'],
                    'titulo'    => null,
                    'descricao' => null,
                    'clicks'    => 0,
                    'url'       => null,
                    'size'      => $f->getSize(),
                ];

            }

            $this->from('tb_attachment')->insert($files);

        }

        if (!is_null($arquivo)) {
            $data['arquivo'] = $path . $arquivo;
        }

        if ($id_pagina = $this->insertGetId($data)) {

            if ($request->section) {

                $ordem        = 0;
                $data_section = [];

                foreach ($request->section as $section) {

                    $data_subsection = [];

                    $data_section['id_pagina'] = $id_pagina;
                    $data_section['titulo']    = $section['title'];
                    $data_section['slug']      = limpa_string($section['title']);
                    $data_section['subtitulo'] = $section['subtitle'];
                    $data_section['texto']     = $section['text'];
                    $data_section['link']      = $section['link'];
                    $data_section['imagem']    = $section['imagem'];
                    $data_section['icone']     = $section['icone'];
                    $data_section['ordem']     = ++$ordem;

                    if (is_object($section['imagem'])) {

                        $file = $section['imagem'];

                        $fileName = $file->getClientOriginalName();
                        $fileExt  = $file->getClientOriginalExtension();
                        $fileExt  = $fileExt != '' ? '.' . $fileExt : '.txt';
                        $imgName  = explode('.', $fileName);
                        $origName = limpa_string($imgName[count($imgName) - 2 > 0 ? count($imgName) - 2 : 0], '_') . $fileExt;
                        $imagem   = uniqid(sha1($fileName)) . $fileExt;

                        $file->storeAs($path, $imagem);

                        $data_section['imagem'] = $path . $imagem;

                    }

                    if (is_object($section['icone'])) {

                        $file = $section['icone'];

                        $fileName = $file->getClientOriginalName();
                        $fileExt  = $file->getClientOriginalExtension();
                        $fileExt  = $fileExt != '' ? '.' . $fileExt : '.txt';
                        $imgName  = explode('.', $fileName);
                        $origName = limpa_string($imgName[count($imgName) - 2 > 0 ? count($imgName) - 2 : 0], '_') . $fileExt;
                        $imagem   = uniqid(sha1($fileName)) . $fileExt;

                        $file->storeAs($path, $imagem);

                        $data_section['icone'] = $path . $imagem;

                    }

                    $id_section = $this->from('tb_pagina_sections')->insertGetId($data_section);

                    if (isset($section['subsection'])) {

                        foreach ($section['subsection'] as $ind => $subsection) {

                            $data_subsection['id_pagina'] = $id_pagina;
                            $data_subsection['id_parent'] = $id_section;
                            $data_subsection['titulo']    = $subsection['title'];
                            $data_subsection['slug']      = limpa_string($subsection['title']);
                            $data_subsection['subtitulo'] = $subsection['subtitle'];
                            $data_subsection['texto']     = $subsection['text'];
                            $data_subsection['link']      = $subsection['link'];
                            $data_subsection['imagem']    = $subsection['imagem'];
                            $data_subsection['icone']     = $subsection['icone'];

                            if (is_object($subsection['imagem'])) {

                                $file = $subsection['imagem'];

                                $fileName = $file->getClientOriginalName();
                                $fileExt  = $file->getClientOriginalExtension();
                                $fileExt  = $fileExt != '' ? '.' . $fileExt : '.txt';
                                $imgName  = explode('.', $fileName);
                                $origName = limpa_string($imgName[count($imgName) - 2 > 0 ? count($imgName) - 2 : 0], '_') . $fileExt;
                                $imagem   = uniqid(sha1($fileName)) . $fileExt;

                                $file->storeAs($path, $imagem);

                                $data_subsection['imagem'] = $path . $imagem;

                            }

                            if (is_object($subsection['icone'])) {

                                $file = $subsection['icone'];

                                $fileName = $file->getClientOriginalName();
                                $fileExt  = $file->getClientOriginalExtension();
                                $fileExt  = $fileExt != '' ? '.' . $fileExt : '.txt';
                                $imgName  = explode('.', $fileName);
                                $origName = limpa_string($imgName[count($imgName) - 2 > 0 ? count($imgName) - 2 : 0], '_') . $fileExt;
                                $imagem   = uniqid(sha1($fileName)) . $fileExt;

                                $file->storeAs($path, $imagem);

                                $data_subsection['icone'] = $path . $imagem;

                            }

                            $this->from('tb_pagina_sections')->insertGetId($data_subsection);

                        }

                    }

                }

            }

            return true;

        }

        return false;

    }

    public function edit($request, $field = null) {

        $files     = [];
        $path      = 'assets/grupoalertaweb/uploads/' . date('Y') . '/' . date('m') . '/paginas/';
        $origName  = null;
        $fileName  = null;
        $arquivo   = null;
        $id_pagina = $request->id;

        if (is_null($field)) {

            // Primeiro remove todos os registros referente à mesma página para adicioná-los poteriormente
            $this->from('tb_pagina_sections')->where('id_pagina', $id_pagina)->delete();

            if ($request->section) {

                $ordem        = 0;
                $data_section = [];

                foreach ($request->section as $section) {

                    $data_subsection = [];

                    $data_section['id_pagina'] = $id_pagina;
                    $data_section['titulo']    = $section['title'];
                    $data_section['slug']      = limpa_string($section['title']);
                    $data_section['subtitulo'] = $section['subtitle'];
                    $data_section['texto']     = $section['text'];
                    $data_section['link']      = $section['link'];
                    $data_section['imagem']    = $section['imagem'];
                    $data_section['icone']     = $section['icone'];
                    $data_section['ordem']     = ++$ordem;

                    if (is_object($section['imagem'])) {

                        $file = $section['imagem'];

                        $fileName = $file->getClientOriginalName();
                        $fileExt  = $file->getClientOriginalExtension();
                        $fileExt  = $fileExt != '' ? '.' . $fileExt : '.txt';
                        $imgName  = explode('.', $fileName);
                        $origName = limpa_string($imgName[count($imgName) - 2 > 0 ? count($imgName) - 2 : 0], '_') . $fileExt;
                        $imagem   = uniqid(sha1($fileName)) . $fileExt;

                        $file->storeAs($path, $imagem);

                        $data_section['imagem'] = $path . $imagem;

                    }

                    if (is_object($section['icone'])) {

                        $file = $section['icone'];

                        $fileName = $file->getClientOriginalName();
                        $fileExt  = $file->getClientOriginalExtension();
                        $fileExt  = $fileExt != '' ? '.' . $fileExt : '.txt';
                        $imgName  = explode('.', $fileName);
                        $origName = limpa_string($imgName[count($imgName) - 2 > 0 ? count($imgName) - 2 : 0], '_') . $fileExt;
                        $imagem   = uniqid(sha1($fileName)) . $fileExt;

                        $file->storeAs($path, $imagem);

                        $data_section['icone'] = $path . $imagem;

                    }

                    $id_section = $this->from('tb_pagina_sections')->insertGetId($data_section);

                    if (isset($section['subsection'])) {

                        foreach ($section['subsection'] as $ind => $subsection) {

                            $data_subsection['id_pagina'] = $id_pagina;
                            $data_subsection['id_parent'] = $id_section;
                            $data_subsection['titulo']    = $subsection['title'];
                            $data_subsection['slug']      = limpa_string($subsection['title']);
                            $data_subsection['subtitulo'] = $subsection['subtitle'];
                            $data_subsection['texto']     = $subsection['text'];
                            $data_subsection['link']      = $subsection['link'];
                            $data_subsection['imagem']    = $subsection['imagem'];
                            $data_subsection['icone']     = $subsection['icone'];

                            if (is_object($subsection['imagem'])) {

                                $file = $subsection['imagem'];

                                $fileName = $file->getClientOriginalName();
                                $fileExt  = $file->getClientOriginalExtension();
                                $fileExt  = $fileExt != '' ? '.' . $fileExt : '.txt';
                                $imgName  = explode('.', $fileName);
                                $origName = limpa_string($imgName[count($imgName) - 2 > 0 ? count($imgName) - 2 : 0], '_') . $fileExt;
                                $imagem   = uniqid(sha1($fileName)) . $fileExt;

                                $file->storeAs($path, $imagem);

                                $data_subsection['imagem'] = $path . $imagem;

                            }

                            if (is_object($subsection['icone'])) {

                                $file = $subsection['icone'];

                                $fileName = $file->getClientOriginalName();
                                $fileExt  = $file->getClientOriginalExtension();
                                $fileExt  = $fileExt != '' ? '.' . $fileExt : '.txt';
                                $imgName  = explode('.', $fileName);
                                $origName = limpa_string($imgName[count($imgName) - 2 > 0 ? count($imgName) - 2 : 0], '_') . $fileExt;
                                $imagem   = uniqid(sha1($fileName)) . $fileExt;

                                $file->storeAs($path, $imagem);

                                $data_subsection['icone'] = $path . $imagem;

                            }

                            $this->from('tb_pagina_sections')->insertGetId($data_subsection);

                        }

                    }

                }

            }

            return true;

        } else {

            $data = [$field => $request->value];

            return $this->whereIn('id', $request->id)->update($data);

        }

    }

    public function update_menu($menu) {

        $arr_id  = [];
        $id_menu = $_POST['idMenu'];

        for ($i = 0; $i < count($menu); $i++) {

            $id = $menu[$i]['id'];

            if (isset($menu[$i]['children'])) {

                for ($j = 0; $j < count($menu[$i]['children']); $j++) {
                    $this->from('tb_pagina')->where('id', $menu[$i]['children'][$j]['id'])->update(['id_pagina' => $menu[$i]['id']]);
                    $this->update_menu($menu[$i]['children']);
                }

            }

            $arr_id[] = $id;

        }

        $debug = $this->from('tb_pagina')->where('id_menu', $id_menu)->whereNotIn('id', $arr_id); //->update(['id_pagina' => 0]);
        $this->debug($debug);

    }

    public function remove($request) {

        $this->remove_file($request->id);
        return $this->whereIn('id', $request->id)->delete();

    }

    public function remove_file($id) {

        if (is_array($id)) {
            $column = 'id_modulo';
        } else {
            $column = 'id';
        }

        $files = $this->from('tb_attachment')
            ->select('path')
            ->where($column, $id)
            ->get();

        if (isset($files)) {

            foreach ($files as $file) {

                $file = public_path($file->path);
                $un   = file_exists($file) ? unlink($file) : true;

                if ($un) {
                    return $this->from('tb_attachment')->where($column, $id)->delete();
                }

            }

            return true;

        }

        return false;

    }

    public function debug($get) {
        echo '==> ';
        echo '<br>';
        $query = str_replace(array('?'), array('\'%s\''), $get->toSql());
        $query = vsprintf($query, $get->getBindings());
        dump($query);
        echo '<br>';
        echo '==> ';
    }

    // public function getSubPages($page = null, $idioma = null)
    // {
    //     $get = $this->select('P.id AS id_pagina', 'P.id_menu', 'P.id_pagina AS id_parent', 'P.titulo', 'P.descricao AS titulo_principal', 'P.slug')
    //         ->from('tb_pagina AS P')
    //         ->where('P.status', '1');
    //     $page = !is_null($page) ? $page : 0;
    //     $get->where('P.id_pagina', $page);
    //     // if (!is_null($this->limit)) {
    //     //     $get->limit($this->limit);
    //     // }
    //     // $get->orderBy('descricao', 'asc');
    //     return $get->get();
    // }

    public function getSubPages($id_menu, $page = null, $idioma = null) {

        $get = $this->select('P.id AS id_pagina', 'P.id_menu', 'M.link', 'P.id_pagina AS id_parent', 'P.titulo', 'P.descricao', 'P.slug')
            ->from('tb_pagina AS P')
            ->join('tb_acl_menu AS M', 'M.id', '=', 'P.id_menu')
            ->where('P.status', '1');

        $get->where('P.id_menu', $id_menu);

        $page = !is_null($page) ? $page : 0;

        $get->where('P.id_pagina', $page);

        // if (!is_null($this->limit)) {
        //     $get->limit($this->limit);
        // }

        $get->orderBy('descricao', 'asc');

        return $get->get();

    }

}
