<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class EvaluacionDocente extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'evaluador'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'datosParaEvaluacion'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'created_at'        => ['type' => 'timestamp', 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('id', 'usuarios', 'id');
        $this->forge->addForeignKey('evaluador', 'usuarios', 'id', 'CASCADE', 'SET_NULL');
        $this->forge->addForeignKey('datosParaEvaluacion', 'datosparaevaluacion', 'id', 'CASCADE', 'SET_NULL');
        $this->forge->createTable('evaluaciondocente', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('evaluaciondocente', true);
    }
}
