<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ConfigModel extends Authenticatable {

    use HasFactory, Notifiable;

    protected $table = 'tb_sys_config';

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

    public function debug($get) {
        echo '==> ';
        echo '<br>';
        $query = str_replace(array('?'), array('\'%s\''), $get->toSql());
        $query = vsprintf($query, $get->getBindings());
        dump($query);
        echo '<br>';
        echo '==> ';
    }

    public function getConfig($find = null) {

        $get = $this->select('id', 'config', 'value');

        if (!is_null($find)) {
            $get->where('config', $find);
            $get->orWhere('id', $find);
            return $get;
        }

        // if (isset($_GET['search']['value']) && !empty($_GET['search']['value'])) {
        //     $get->where(function ($get) {
        //         $search = $_GET['search']['value'];
        //         $get->orWhere('id', 'like', $search . '%')
        //             ->orWhere('config', 'like', $search . '%')
        //             ->orWhere('value', 'like', $search . '%');
        //     });
        // }

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

    public function create($request) {

        $data     = [];
        $path     = 'assets/grupoalertaweb/wp-content/uploads/' . date('Y') . '/' . date('m') . '/';
        $origName = null;
        $fileName = null;
        $imagem   = null;

        if ($request->file('site_logo')) {
            $file     = $request->file('site_logo');
            $fileName = sha1($file->getClientOriginalName());
            $fileExt  = $file->getClientOriginalExtension();
            $imgName  = explode('.', ($file->getClientOriginalName()));
            $origName = limpa_string($imgName[count($imgName) - 2], '_') . '.' . $fileExt;
            $imagem   = limpa_string($fileName) . '.' . $fileExt;
            $file->storeAs($path, $imagem);
            $data[] = ['config' => 'site_logo', 'value' => $path . $imagem];
            $data[] = ['config' => 'original_logo_name', 'value' => $origName];
        }

        $traducao = [];

        foreach ($_POST as $ind => $val) {

            $lang = explode(':', $ind);

            if (count($lang) == 2) {
                // $traducao[$lang[1]][$lang[0]] = $val;
                // $config['config'][$lang[1]] = $lang[1];
                // $config['value'][$lang[1]] = json_encode($traducao[$lang[1]]);
                // $data[$traducao[$lang[1]][$lang[0]]] = $config;
            } else {
                $data[] = ['config' => $ind, 'value' => (!empty($val) ? $val : null)];
                // $data['config'][$ind] = $config;
            }

        }

        // for ($i = 0; $i < count($data); $i++) {
        foreach ($data as $conf) {

            $issetConfig = $this->select('config', 'value')->where('config', $conf['config'])->first();

            if (isset($issetConfig)) {
                if ($conf != $issetConfig->value) {
                    $this->where('config', $conf['config'])->update($conf);
                }
            } else {
                $this->insert($conf);
            }

        }

        return true;

    }

}
