<?php

namespace Src\Migrations;

use Medoo\Medoo;

class M01_CreateUsersTable
{
    private Medoo $db;

    // Mesin DECOR otomatis menyuntikkan Medoo ke sini!
    public function __construct(Medoo $db)
    {
        $this->db = $db;
    }

    public function up(): void
    {
        // Kueri murni PostgreSQL untuk membuat tabel
        $this->db->query("
            CREATE TABLE IF NOT EXISTS users (
                id SERIAL PRIMARY KEY,
                nama VARCHAR(100) NOT NULL,
                email VARCHAR(100) UNIQUE NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    }
}