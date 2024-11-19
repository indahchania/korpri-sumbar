<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Crud extends Migration
{
    public function up()
    {
        //Tabel users
        $this->forge->addField([
            'users_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],

            'users_name' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],

            'users_uname' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],

            'users_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'users_pass' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],

            'users_status' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
        ]);
        $this->forge->addKey('users_id', true);
        $this->forge->createTable('users');

        //Tabel content_category

        $this->forge->addField([
            'concategory_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],

            'category_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addKey('concategory_id', true);
        $this->forge->createTable('content_category');

        //Tabel content
        $this->forge->addField([
            'content_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],

            'content_title' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],

            'content_author' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],

            'content_posted' => [
                'type' => 'DATE',
            ],

            'content_updated' => [
                'type' => 'DATE',
            ],

            'content_body' => [
                'type' => 'TEXT',
            ],

            'content_img' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'content_file' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'content_status' => [
                'type'       => 'ENUM',
                'constraint' => ['publik', 'arsip', 'draft'],
                'default'    => 'draft',
            ],

            'content_category' => [
                'type'       => 'int',
                'constraint' => 11,
            ],

            'users_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('content_id', true);
        $this->forge->addForeignKey('users_id', 'users', 'users_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('content_category', 'content_category', 'concategory_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('content');

        //tabel pages
        $this->forge->addField([
            'pages_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],

            'pages_title' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],

            'pages_author' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],

            'pages_posted' => [
                'type' => 'DATE',
            ],

            'pages_updated' => [
                'type' => 'DATE',
            ],

            'pages_body' => [
                'type' => 'TEXT',
            ],

            'pages_img' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'pages_status' => [
                'type'       => 'ENUM',
                'constraint' => ['publik', 'arsip', 'draft'],
                'default'    => 'draft',
            ],

            'pages_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],

            'users_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('pages_id', true);
        $this->forge->addForeignKey('users_id', 'users', 'users_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pages');

        //tabel kategori karir
        $this->forge->addField([
            'carcategory_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],

            'category_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addKey('carcategory_id', true);
        $this->forge->createTable('career_category');

        //tabel karir
        $this->forge->addField([
            'career_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],

            'career_title' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],

            'career_author' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],

            'career_posted' => [
                'type' => 'DATE',
            ],

            'career_updated' => [
                'type' => 'DATE',
            ],

            'career_body' => [
                'type' => 'TEXT',
            ],

            'career_img' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'career_status' => [
                'type'       => 'ENUM',
                'constraint' => ['publik', 'arsip', 'draft'],
                'default'    => 'draft',
            ],

            'career_category' => [
                'type'       => 'int',
                'constraint' => 11,
            ],

            'users_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('career_id', true);
        $this->forge->addForeignKey('users_id', 'users', 'users_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('career_category', 'career_category', 'carcategory_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('career');
    }

    public function down()
    {
        // Drop table users
        $this->forge->dropTable('users');
        // Drop table content_category
        $this->forge->dropTable('content_category');
        // Drop table content
        $this->forge->dropTable('content');
        // Drop table pages
        $this->forge->dropTable('pages');
        // Drop table career_category
        $this->forge->dropTable('career_category');
        // Drop table career
        $this->forge->dropTable('career');
    }
}
