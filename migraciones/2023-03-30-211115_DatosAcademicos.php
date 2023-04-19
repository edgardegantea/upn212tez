<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class DatosAcademicos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'licenciatura'          => ['type' => 'varchar', 'constraint' => 150],
            'cedProfLicenciatura'   => ['type' => 'varchar', 'constraint' => 255],
            'maestria'              => ['type' => 'varchar', 'constraint' => 150],
            'cedProfMaestria'       => ['type' => 'varchar', 'constraint' => 255],
            'certificacion1'        => ['type' => 'varchar', 'constraint' => 255],
            'certificacion2'        => ['type' => 'varchar', 'constraint' => 255],
            'certificacion3'        => ['type' => 'varchar', 'constraint' => 255],
            'estudianteActivo'      => ['type' => 'boolean', 'default' => false],
            'created_at'            => ['type' => 'timestamp', 'null' => false],
            'updated_at'            => ['type' => 'timestamp', 'null' => true],
            'deleted_at'            => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('datosacademicos', true);
    }

    public function down()
    {
        // $this->forge->dropKey('datosacademicos', 'id');
        $this->forge->dropTable('datosacademicos', true);
    }
}
