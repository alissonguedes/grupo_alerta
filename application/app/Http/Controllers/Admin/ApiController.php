<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApiController extends Controller {

    public function __construct() {
    }

    public function translate($lang) {

        $translate = [];

        setcookie('idioma', $lang, time() + 60 * 60 * 24 * 30, '/');

        $tradutor = $this->api->getTranslate($lang);

        return json_encode(['idioma' => $lang]);

    }

    public function token(Request $request) {

        if (Session::has('app_session')) {
            return json_encode(['token' => Session::get('app_session')]);
        }

        return json_encode([]);

    }

    public function upload_img_tinymce(Request $request) {

        $path     = 'assets/grupoalertaweb/wp-content/uploads/' . date('Y') . '/' . date('m') . '/paginas/';
        $origName = null;
        $fileName = null;
        $image    = null;

        if ($request->file('file')) {

            $file = $request->file('file');

            $fileName = sha1($file->getClientOriginalName());
            $fileExt  = $file->getClientOriginalExtension();

            $imgName  = explode('.', $file->getClientOriginalName());
            $origName = limpa_string($imgName[count($imgName) - 2], '_') . '.' . $fileExt;
            $image    = limpa_string($fileName) . '.' . $fileExt;

            $file->storeAs($path, $image);

        }

        $location = asset($path . $image);
        return json_encode(['location' => $location]); // response(json_encode([ 'location' => $location ]), 200);

    }

    /**
     * Obtém a versão do produto
     */
    public function get_version() {

        $config = new \App\Models\Admin\ConfigModel();

        $versao = $config->select('config', 'value AS versao')
            ->from('tb_sys_config')
            ->where('config', 'version')
            ->get()
            ->first();

        return response(['version' => $versao->versao], 200);

    }

    /**
     * Obtém as atualizações do sitema
     */
    public function get_updates() {

    }

}
