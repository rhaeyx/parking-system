<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use App\Models\User;

class CreateUsersTable extends Migration
{
    public function up()
    {
      $this->forge->addField([
        'id INT(11) PRIMARY KEY AUTO_INCREMENT',
        'first_name VARCHAR(255) NOT NULL',
        'last_name VARCHAR(255) NOT NULL',
        'username VARCHAR(255) NOT NULL',
        'password VARCHAR(255) NOT NULL',
        'role VARCHAR(255) NOT NULL DEFAULT "user"',
        'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()',
        'updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP()',
      ]);

      $this->forge->createTable('users');

      $user = new User();
      $user->insert([
        'username' => 'admin',
        'password' => password_hash('password', PASSWORD_DEFAULT),
        'role' => 'admin'
      ]);

    }

    public function down()
    {
      $this->forge->dropTable('users');
    }
}
