<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class DatosParaEvaluacion extends Migration
{
    public function up()
    {

        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'asignatura'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'created_at'        => ['type' => 'timestamp', 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('asignatura', 'asignaturas', 'id');
        $this->forge->createTable('datosparaevaluacion', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('datosparaevaluacion', true);
    }
}
