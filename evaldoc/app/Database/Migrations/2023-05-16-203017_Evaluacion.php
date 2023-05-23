<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Evaluacion extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'profesor'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'asignatura'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'pregunta'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('profesor', 'profesores', 'id');
        $this->forge->addForeignKey('asignatura', 'asignaturas', 'id');
        $this->forge->addForeignKey('pregunta', 'preguntas', 'id');

        $this->forge->createTable('evaluacion', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('evaluacion', true);
    }
}
