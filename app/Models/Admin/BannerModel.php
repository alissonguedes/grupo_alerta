<?php

namespace App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class BannerModel extends Authenticatable
{

    use HasFactory, Notifiable;

	protected $table = 'tb_banner';

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
		'titulo',
		'status',
	];

	public function getBanner($find = null) {

		$get = $this -> select('*');

		if ( !is_null($find) ) {
			$get -> where('id', $find);
			return $get ;
		}

		if (isset($_GET['search']['value']) && !empty($_GET['search']['value'])) {
            $get->where(function ($get) {
                $search = $_GET['search']['value'];
                $get->orWhere('id', 'like', $search . '%')
                    ->orWhere('titulo', 'like', $search . '%')
                    ->orWhere('status', 'like', $search . '%');
            });
        }

		// Order By
		if (isset($_GET['order']) && $_GET['order'][0]['column'] != 0 ) {
			$orderBy[$this -> order[$_GET['order'][0]['column']]] = $_GET['order'][0]['dir'];
		} else {
			$orderBy[$this -> order[1]] = 'desc';
		}

		foreach($orderBy as $key => $val) {
			$get -> orderBy($key, $val);
		}

		return $get -> paginate($_GET['length'] ?? null);

	}

	public function getTitulo($link) {

		$get = $this -> select('*');

		$get -> where('link', $link);
		return $get -> get() -> first();

	}

	public function create(Request $request) {

		$label		= $request -> titulo;
		$descricao	= $request -> descricao;
		$link		= limpa_string($label);
		$status		= isset($request -> status) ? $request -> status : '0';
		$editavel	= isset($request -> editavel) ? $request -> editavel : ( Session::get('userdata')['id_grupo'] === '1' ? '0' : '1' );
		// $traducao	= [];

		//	foreach($_POST as $ind => $val) {
		//		$lang = explode(':', $ind);
		//		if ( count($lang) == 2) {
		//			$traducao[$lang[1]] = $val;
		//		}
		//	}

		$data = [
			'titulo' => $label,
			'descricao' => $descricao,
			'link' => $link,
			'status' => $status,
			'autor' => Session::get('userdata')['id'],
			'publish_up' => null,
			'publish_down' => null,
			'tags' => null,
			// 'editavel' => $editavel
		];

        // Gravar imagem de capa
        $path = 'assets/grupoalertaweb/wp-content/uploads/' . date('Y') . '/' . date('m') . '/banners/';
        $origName = null;
        $fileName = null;
        $imagem = null;

        if ($request->file('imagem')) {

            $file = $request->file('imagem');

            $fileName = sha1($file->getClientOriginalName());
            $fileExt = $file->getClientOriginalExtension();

            $imgName = explode('.', ($file->getClientOriginalName()));

            $origName = limpa_string($imgName[count($imgName) - 2], '_') . '.' . $fileExt;
            $imagem = limpa_string($fileName) . '.' . $fileExt;

            $file->storeAs($path, $imagem);

        }

        if (!is_null($imagem)) {
            $data['imagem'] = $path . $imagem;
			$data['original_name'] = $origName;
        }

		return $this -> insert($data);

	}

	public function edit(Request $request, $field = null) {

		if ( is_null($field) ) {

			// $get = $this -> select('editavel') -> where('id', $request -> id) -> first();

			$id			= $request -> id;
			$label     = $request->titulo;
			$descricao = $request->descricao;
			$link      = limpa_string($label);
			$status    = isset($request->status) ? $request->status : '0';
			$editavel  = isset($request->editavel) ? $request->editavel : (Session::get('userdata')['id_grupo'] === '1' ? '0' : '1');

			// $label		= Session::get('userdata')['id_grupo'] === 1 || ( Session::get('userdata')['id_grupo'] > 1 && $get -> editavel === '1' ) ? $request -> label : null;
			// $link		= limpa_string($request -> label);
			// $status		= isset($request -> status) ? $request -> status : '0';
			// $editavel	= isset($request -> editavel) ? $request -> editavel : '0';

// 			$traducao	= [];
//
// 			foreach($_POST as $ind => $val) {
// 				$lang = explode(':', $ind);
// 				if ( count($lang) == 2) {
// 					$traducao[$lang[1]] = $val;
// 				}
// 			}

			// if ( !is_null($label))
			// 	$data['label'] = $label;
			// $data['traducao'] 	= json_encode($traducao);
			// $data['id_palavra'] = 0;
			// $data['id_secao'] 	= 2;
			// $data['link'] 		= $link;
			// $data['status'] 	= $status;
			// $data['editavel'] 	= $editavel;

			$data = [
				'titulo' => $label,
				'descricao' => $descricao,
				'link' => $link,
				'status' => $status,
				'autor' => Session::get('userdata')['id'],
				'publish_up' => null,
				'publish_down' => null,
				'tags' => null,
				// 'editavel' => $editavel
			];

			// Gravar imagem de capa
			$path = 'assets/grupoalertaweb/wp-content/uploads/' . date('Y') . '/' . date('m') . '/banners/';
			$origName = null;
			$fileName = null;
			$imagem = null;

			if ($request->file('imagem')) {

				$file = $request->file('imagem');

				$fileName = sha1($file->getClientOriginalName());
				$fileExt = $file->getClientOriginalExtension();

				$imgName = explode('.', ($file->getClientOriginalName()));

				$origName = limpa_string($imgName[count($imgName) - 2], '_') . '.' . $fileExt;
				$imagem = limpa_string($fileName) . '.' . $fileExt;

				$file->storeAs($path, $imagem);

			}

			if (!is_null($imagem)) {
				$data['imagem'] = $path . $imagem;
				$data['original_name'] = $origName;
			}

			return $this -> where('id', $id) -> update($data);

		} else {

			$data = [ $field =>  $request -> value ];

			return $this -> whereIn('id', $request -> id) -> update($data);

		}

	}

	private $error;

	public function setError($error) {

		switch($error) {

			case 'user_not_allowed' :
				$this -> error = 'Você não possui permissão para remover alguns itens.';
				break;

			default :
				$this -> error = 'Não foi possível remover o banner. Por favor, tente novamente.';
				break;
		}

	}

	public function getMessage() {
		return $this -> error;
	}

	public function remove(Request $request) {

		// $editavel = $this -> select('editavel') -> whereIn('id', $request -> id) -> get();

		$i = 0;
		// foreach($editavel as $e ){
			// if ( $e -> editavel === '1' ){
				// $this -> whereIn('id', $request -> id) -> delete();
				// $i ++;
			// } else {
			// 	$this -> setError('user_not_allowed');
			// }
		// }

		if ( $this -> whereIn('id', $request -> id) -> delete() )
			return true;
		// if ($i > 0 ) return true;

		return false;

	}

}
