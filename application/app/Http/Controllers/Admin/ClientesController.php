<?php

namespace App\Http\Controllers\Admin {

    use App\Models\Admin\ClienteModel;
    use App\Models\Admin\IdiomaModel;
    use App\Models\Admin\MenuModel;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Validation\Rule;

    class ClientesController extends Controller
    {
        public function __construct()
        {
            $this->cliente_model = new ClienteModel();
            $this->menu_model = new MenuModel();
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
                $dados['paginate'] = $this->cliente_model->getCliente();

                return view('admin.clientes.list', $dados);
            }

            return view('admin.clientes.index');
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
                $dados['row'] = $this->cliente_model->getCliente($id)->first();
            }

            $dados['idiomas'] = $this->idioma_model->getIdioma();
            $dados['menus'] = $this->menu_model->getMenu();

            return view('admin.clientes.form', $dados);
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
                'nome' => ['required', 'unique:tb_cliente,nome', 'max:255'],
                'imagem' => ['required'],
            ]);

            $url = url('admin/clientes ');
            $type = 'back';

            if ($this->cliente_model->create($request)) {
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
                'nome' => ['required', Rule::unique('tb_cliente', 'nome')->ignore($_POST['id'], 'id'), 'max:255'],
            ]);

            $url = url('admin/clientes ');
            $type = 'back';

            if ($this->cliente_model->edit($request)) {
                $status = 'success';
                $message = 'Cliente atualizado com sucesso!';
            } else {
                $status = 'error';
                $message = 'Não foi possível atualizar o cliente. Por favor, tente novamente.';
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

            $url = url('admin/clientes');
            $type = null;

            if ($this->cliente_model->edit($request, $field)) {
                $status = 'success';
                $message = 'Cliente atualizado com sucesso!';
            } else {
                $status = 'error';
                $message = 'Não foi possível atualizar o cliente. Por favor, tente novamente.';
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

            $url = url('admin/clientes');
            $type = 'back';

            if ($this->cliente_model->remove($request)) {
                $status = 'success';
                $message = 'Cliente removido com sucesso!';
            } else {
                $type = null;
                $status = 'error';
                $message = 'Não foi possível remover o cliente. Por favor, tente novamente.';
            }

            return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url]);
        }
    }

}
