<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profesor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nombre'            => ['type' => 'varchar', 'constraint' => 50],
            'apellidoPaterno'   => ['type' => 'varchar', 'constraint' => 50],
            'apellidoMaterno'   => ['type' => 'varchar', 'constraint' => 50],
            'foto'              => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('profesores', true);
    }

    public function down()
    {
        $this->forge->dropTable('profesores', true);
    }
}
