<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Perfil extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
            'nombre'        => ['type' => 'varchar', 'constraint' => 50, 'unique' => true],
            'descripcion'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at'    => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'    => ['type' => 'timestamp', 'null' => true],
            'deleted_at'    => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('perfiles', true);
    }

    public function down()
    {
        $this->forge->dropKey('id', true);
        $this->forge->dropTable('perfiles', true);
    }
}
