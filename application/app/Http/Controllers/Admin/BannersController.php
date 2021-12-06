<?php

namespace App\Http\Controllers\Admin {

    use App\Models\Admin\BannerModel;
    use App\Models\Admin\IdiomaModel;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Validation\Rule;

    class BannersController extends Controller
    {

        public function __construct()
        {
            $this->banner_model = new BannerModel();
            $this->idioma_model = new IdiomaModel();
        }

        public function index(Request $request)
        {

            if (!Session::has('userdata')) {
                if ($request->ajax()) {
                    return abort(403);
                } else {
                    return redirect()->route('admin.auth.login');
                }

            }

            if ($request->ajax()) {
                $dados['paginate'] = $this->banner_model->getBanner();
                return view('admin.banners.list', $dados);
            }

            // return view('admin.banners.form-2');
            return view('admin.banners.index');

        }

        public function show_form(Request $request, $id = null)
        {

            if (!Session::has('userdata')) {
                if ($request->ajax()) {
                    return abort(403);
                } else {
                    return redirect()->route('admin.auth.login');
                }

            }

            $dados = [];

            if (!is_null($id)) {
                $dados['row'] = $this->banner_model->getBanner($id)->first();
            }

            $dados['idiomas'] = $this->idioma_model->getIdioma();

            return view('admin.banners.form', $dados);
        }

        public function insert(Request $request)
        {

            if (!Session::has('userdata')) {
                if ($request->ajax()) {
                    return abort(403);
                } else {
                    return redirect()->route('admin.auth.login');
                }

            }

            $request->validate([
                'titulo' => ['required', 'unique:tb_banner,titulo', 'max:100'],
                'imagem' => ['required'],
            ]);

            $url = url('admin/banners ');
            $type = 'back';

            if ($this->banner_model->create($request)) {
                $status = 'success';
                $message = 'Idioma cadastrado com sucesso!';
            } else {
                $status = 'error';
                $message = 'Não foi possível cadastrar o idioma. Por favor, tente novamente.';
            }

            return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url]);
        }

        public function update(Request $request)
        {

            if (!Session::has('userdata')) {
                if ($request->ajax()) {
                    return abort(403);
                } else {
                    return redirect()->route('admin.auth.login');
                }

            }

            $request->validate([
                'titulo' => ['required', Rule::unique('tb_banner', 'titulo')->ignore($request->id, 'id'), 'max:100'],
            ]);

            $url = url('admin/banners ');
            $type = 'back';

            if ($this->banner_model->edit($request)) {
                $status = 'success';
                $message = 'Banner atualizado com sucesso!';
            } else {
                $status = 'error';
                $message = 'Não foi possível atualizar o banner. Por favor, tente novamente.';
            }

            return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url]);
        }

        public function replace(Request $request, $field)
        {

            if (!Session::has('userdata')) {
                if ($request->ajax()) {
                    return abort(403);
                } else {
                    return redirect()->route('admin.auth.login');
                }

            }

            $url = url('admin/banners');
            $type = null;

            if ($this->banner_model->edit($request, $field)) {
                $status = 'success';
                $message = 'Banner atualizado com sucesso!';
            } else {
                $status = 'error';
                $message = 'Não foi possível atualizar o banner. Por favor, tente novamente.';
            }

            return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url]);
        }

        public function delete(Request $request)
        {

            if (!Session::has('userdata')) {
                if ($request->ajax()) {
                    return abort(403);
                } else {
                    return redirect()->route('admin.auth.login');
                }

            }

            $url = url('admin/banners');
            $type = 'back';

            if ($this->banner_model->remove($request)) {
                $status = 'success';
                $message = 'Banner removido com sucesso!';
            } else {
                $type = null;
                $status = 'error';
                $message = $this->banner_model->getMessage();
            }

            return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url]);
        }
    }

}
