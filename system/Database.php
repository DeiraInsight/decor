<?php

namespace System;

use Medoo\Medoo;

class Database
{
    public Medoo $conn;

    public function __construct()
    {
        // Menarik kredensial dari environment variables (.env) yang diteruskan oleh Podman
        $this->conn = new Medoo([
            'type'     => 'pgsql',
            'host'     => getenv('DB_HOST') ?: 'db',
            'database' => getenv('DB_NAME') ?: 'decor_db',
            'username' => getenv('DB_USER') ?: 'postgres',
            'password' => getenv('DB_PASS') ?: 'decor#12345',
            'port'     => getenv('DB_PORT') ?: 5432,
            
            // Opsi standar PDO untuk keamanan dan penanganan error
            'error' => \PDO::ERRMODE_EXCEPTION
        ]);
    }
}