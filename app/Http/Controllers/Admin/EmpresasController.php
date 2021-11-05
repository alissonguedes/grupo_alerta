<?php

namespace App\Http\Controllers\Admin {

    use App\Models\Admin\EmpresaModel;
    use App\Models\Admin\IdiomaModel;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Validation\Rule;

    class EmpresasController extends Controller
    {

        public function __construct()
        {
            $this->empresa_model = new EmpresaModel();
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
                $dados['paginate'] = $this->empresa_model->getEmpresa();
                return view('admin.empresas.list', $dados);
            }

            return view('admin.empresas.index');

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
                $dados['row'] = $this->empresa_model->getEmpresa($id)->first();
            }

            $dados['idiomas'] = $this->idioma_model->getIdioma();

            return view('admin.empresas.form', $dados);
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
                'razao_social' => ['required', 'unique:tb_empresa,razao_social', 'max:100'],
                // 'cnpj' => ['required'],
                // 'inscricao_estadual' => ['required'],
                // 'inscricao_municipal' => ['required'],
                'razao_social' => ['required'],
                // 'nome_fantasia' => ['required'],
                'endereco' => ['required'],
                'numero' => ['required'],
                'bairro' => ['required'],
                // 'cep' => ['required'],
                'cidade' => ['required'],
                'estado' => ['required'],
                'telefone',
                // 'imagem' => ['required'],
            ]);

            $url = url('admin/empresas ');
            $type = 'back';

            if ($this->empresa_model->create($request)) {
                $status = 'success';
                $message = 'Empresa cadastrada com sucesso!';
            } else {
                $status = 'error';
                $message = 'Não foi possível cadastrar o empresa. Por favor, tente novamente.';
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
                'razao_social' => ['required', Rule::unique('tb_empresa', 'razao_social')->ignore($request->id, 'id'), 'max:100'],
                // 'cnpj' => ['required'],
                // 'inscricao_estadual' => ['required'],
                // 'inscricao_municipal' => ['required'],
                // 'nome_fantasia' => ['required'],
                'endereco' => ['required'],
                'numero' => ['required'],
                'bairro' => ['required'],
                // 'cep' => ['required'],
                'cidade' => ['required'],
                'estado' => ['required'],
                'telefone',
                // 'imagem' => ['required'],
            ]);

            $url = url('admin/empresas ');
            $type = 'back';

            if ($this->empresa_model->edit($request)) {
                $status = 'success';
                $message = 'Empresa atualizada com sucesso!';
            } else {
                $status = 'error';
                $message = 'Não foi possível atualizar o empresa. Por favor, tente novamente.';
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

            $url = url('admin/empresas');
            $type = null;

            if ($this->empresa_model->edit($request, $field)) {
                $status = 'success';
                $message = 'Empresa atualizado com sucesso!';
            } else {
                $status = 'error';
                $message = 'Não foi possível atualizar o empresa. Por favor, tente novamente.';
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

            $url = url('admin/empresas');
            $type = 'back';

            if ($this->empresa_model->remove($request)) {
                $status = 'success';
                $message = 'Empresa removido com sucesso!';
            } else {
                $type = null;
                $status = 'error';
                $message = $this->empresa_model->getMessage();
            }

            return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url]);
        }
    }

}
