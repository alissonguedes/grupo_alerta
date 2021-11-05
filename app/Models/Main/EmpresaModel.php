<?php

namespace App\Models\Main {

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class EmpresaModel extends Model
    {

        protected $table = 'tb_empresa';
        use HasFactory;

        public function getEmpresas()
        {
            return $this->all();
        }

    }

}
