<?php

namespace App\Models\Main {

    use Illuminate\Database\Eloquent\Model;

    class ParceiroModel extends Model {

        protected $table = 'tb_cliente';

        public function getParceiros() {
            return $this->where('status', '1')
                ->get();
        }

        public function getComentarios() {
            return $this->from('tb_comentario')
                ->where('status', '1')
                ->get();
        }

    }

}
