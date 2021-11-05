<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class EmpresaModel extends Authenticatable
{

    use HasFactory, Notifiable;

    protected $table = 'tb_empresa';

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
        'razao_social',
        'status',
    ];

    public function getEmpresa($find = null)
    {

        $get = $this->select('*');

        if (!is_null($find)) {
            $get->where('id', $find);
            return $get;
        }

        if (isset($_GET['search']['value']) && !empty($_GET['search']['value'])) {
            $get->where(function ($get) {
                $search = $_GET['search']['value'];
                $get->orWhere('id', 'like', $search . '%')
                    ->orWhere('razao_social', 'like', $search . '%')
                    ->orWhere('status', 'like', $search . '%');
            });
        }

        // Order By
        if (isset($_GET['order']) && $_GET['order'][0]['column'] != 0) {
            $orderBy[$this->order[$_GET['order'][0]['column']]] = $_GET['order'][0]['dir'];
        } else {
            $orderBy[$this->order[1]] = 'desc';
        }

        foreach ($orderBy as $key => $val) {
            $get->orderBy($key, $val);
        }

        return $get->paginate($_GET['length'] ?? null);

    }

    public function create(Request $request)
    {

        $cnpj = $request->cnpj;
        $inscricao_estadual = $request->inscricao_estadual;
        $inscricao_municipal = $request->inscricao_municipal;
        $razao_social = $request->razao_social;
        $nome_fantasia = $request->nome_fantasia;
        $endereco = $request->endereco;
        $numero = $request->numero;
        $bairro = $request->bairro;
        $cep = $request->cep;
        $cidade = $request->cidade;
        $estado = $request->estado;
        $telefone = $request->telefone;
        $status = isset($request->status) ? $request->status : '0';
        $matriz = isset($request->matriz) ? $request->matriz : 'N';

        $data = [
            'cnpj' => $cnpj,
            'inscricao_estadual' => $inscricao_estadual,
            'inscricao_municipal' => $inscricao_municipal,
            'razao_social' => $razao_social,
            'nome_fantasia' => $nome_fantasia,
            'endereco' => $endereco,
            'numero' => $numero,
            'bairro' => $bairro,
            'cep' => $cep,
            'cidade' => $cidade,
            'estado' => $estado,
            'telefone' => $telefone,
            'status' => $status,
            'matriz' => $matriz,
        ];

        // Gravar imagem de capa
        $path = 'assets/grupoalertaweb/wp-content/uploads/' . date('Y') . '/' . date('m') . '/empresas/';
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
            // $data['original_name'] = $origName;
        }

        return $this->insert($data);

    }

    public function edit(Request $request, $field = null)
    {

        if (is_null($field)) {

            $cnpj = $request->cnpj;
            $inscricao_estadual = $request->inscricao_estadual;
            $inscricao_municipal = $request->inscricao_municipal;
            $razao_social = $request->razao_social;
            $nome_fantasia = $request->nome_fantasia;
            $endereco = $request->endereco;
            $numero = $request->numero;
            $bairro = $request->bairro;
            $cep = $request->cep;
            $cidade = $request->cidade;
            $estado = $request->estado;
            $telefone = $request->telefone;
            $status = isset($request->status) ? $request->status : '0';
            $matriz = isset($request->matriz) ? $request->matriz : 'N';

            $data = [
                'cnpj' => $cnpj,
                'inscricao_estadual' => $inscricao_estadual,
                'inscricao_municipal' => $inscricao_municipal,
                'razao_social' => $razao_social,
                'nome_fantasia' => $nome_fantasia,
                'endereco' => $endereco,
                'numero' => $numero,
                'bairro' => $bairro,
                'cep' => $cep,
                'cidade' => $cidade,
                'estado' => $estado,
                'telefone' => $telefone,
                'status' => $status,
                'matriz' => $matriz,
            ];

            // Gravar imagem de capa
            $path = 'assets/grupoalertaweb/wp-content/uploads/' . date('Y') . '/' . date('m') . '/empresas/';
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
                // $data['original_name'] = $origName;
            }

            return $this->where('id', $request->id)->update($data);

        } else {

            $data = [$field => $request->value];

            return $this->whereIn('id', $request->id)->update($data);

        }

    }

    private $error;

    public function setError($error)
    {

        switch ($error) {

            case 'user_not_allowed':
                $this->error = 'Você não possui permissão para remover alguns itens.';
                break;

            default:
                $this->error = 'Não foi possível remover o empresa. Por favor, tente novamente.';
                break;
        }

    }

    public function getMessage()
    {
        return $this->error;
    }

    public function remove(Request $request)
    {

        $i = 0;

        if ($this->whereIn('id', $request->id)->delete()) {
            return true;
        }

        return false;

    }

}
