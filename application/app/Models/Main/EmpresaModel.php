<?php

namespace App\Models\Main {

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class EmpresaModel extends Model {

        protected $table = 'tb_empresa';
        use HasFactory;

        public function getEmpresas() {
            return $this->all();
        }

		public function get_total_cidades(){
            return $this->select('cidade')->groupBy('cidade')->get()->count();
		}

        public function get_total_uf() {
            return $this->select('estado')->groupBy('estado')->get()->count();
        }
    }

}
