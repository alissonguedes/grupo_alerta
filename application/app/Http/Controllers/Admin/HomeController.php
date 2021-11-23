<?php

namespace App\Http\Controllers\Admin {

	use App\Models\Admin\BannerModel;
	use App\Models\Admin\ClienteModel;
	use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

	use \App\Models\Admin\UsuarioModel;

	class HomeController extends Controller {

		/**
		 * Exemplo padrão para autenticar usuários nas próximas atualizações.
		 */
		public function __construct() {

			$this -> middleware(function($request, $next){

				if ( ! Session::has('userdata')) {
					if ( $request -> ajax() )
						return abort(403);
					else
						return redirect() -> route('admin.auth.login');
				} else {

// 					if ( Session::has('userdata') and Session::get('userdata')['id_grupo'] == 1 ) {
// 						exit(view('errors.404'));
// 					}

				}

				return $next($request);

			});

		}

		public function index(Request $request) {

			$dados['total_banners'] = BannerModel::count();
			$dados['total_clientes'] = ClienteModel::count();
			$dados['total_produtos'] = 0;
			$dados['total_intencoes'] = 0;
			$dados['total_distribuidores'] = 0;
			$dados['total_emails'] = 0;

			return response(view('admin.dashboard', $dados), 200);

		}

		public function quem_somos(Request $request) {

			return response(view('admin.home.quem_somos'), 200);

		}

	}

}
