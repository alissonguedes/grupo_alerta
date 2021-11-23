<?php

namespace App\Models\Main {

    use Illuminate\Database\Eloquent\Model;

    class ParceiroModel extends Model {

        protected $table = 'tb_cliente';

        public function getParceiros() {
            return $this->get();
        }

    }

}
