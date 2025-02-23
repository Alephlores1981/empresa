<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DepartamentosSeeder extends Seeder
{
    public function run()
    {
        $data =[
          [
            'nombre'=>'Almacen'
          ],
           [
            'nombre'=>'Contabilidad'
          ],
           [
            'nombre'=>'Finanzas'
          ],
           [
            'nombre'=>'Recursos Humanos'
          ],
           [
            'nombre'=>'Sistemas'
          ],
        ];
        $this->db->table('departamentos')->insertBatch($data);
    }
}
