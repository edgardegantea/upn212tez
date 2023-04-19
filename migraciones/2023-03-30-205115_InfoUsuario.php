<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class InfoUsuario extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'datosAcademicos'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'datosLaborales'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            // 'created_at'        => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'created_at'        => ['type' => 'timestamp', 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        // $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id', 'usuarios', 'id');
        $this->forge->addForeignKey('datosAcademicos', 'datosacademicos', 'id');
        $this->forge->addForeignKey('datosLaborales', 'datoslaborales', 'id');
        $this->forge->createTable('infousuario', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('infousuario', true);
    }
}
