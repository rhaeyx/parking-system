<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingsTable extends Migration
{
    public function up()
    {
      $this->forge->addField([
        'id INT(11) PRIMARY KEY AUTO_INCREMENT',
        'booked_by INT(11) ',
        'street VARCHAR(255) NOT NULL',
        'start DATETIME NOT NULL',
        'end DATETIME NOT NULL',
        'confirmed TINYINT(1) DEFAULT 0',
        'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()',
        'updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP()',
      ]);

      $this->forge->createTable('bookings');
      $this->forge->addForeignKey('booked_by', 'users', 'id');
    }

    public function down()
    {
      $this->forge->dropForeignKey('users', 'booked_by');
      $this->forge->dropTable('bookings');
    }
}
