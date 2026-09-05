<?php

namespace System;

class Migrator
{
    private Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
        $this->initMigrationTable();
    }

    /**
     * Membuat tabel pelacak otomatis agar migrasi tidak dijalankan berulang kali
     */
    private function initMigrationTable(): void
    {
        $this->db->conn->query(
            "CREATE TABLE IF NOT EXISTS _decor_migrations (
                id SERIAL PRIMARY KEY,
                filename VARCHAR(255) NOT NULL UNIQUE,
                executed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )"
        );
    }

    /**
     * Memindai dan mengeksekusi file di src/Migrations/
     */
    public function run(): void
    {
        // 1. Cari semua file PHP di dalam folder migrasi
        $migrationFiles = glob(__DIR__ . '/../src/Migrations/*.php');
        
        if (empty($migrationFiles)) {
            echo "Belum ada file migrasi di src/Migrations/.\n";
            return;
        }

        $migratedCount = 0;

        foreach ($migrationFiles as $file) {
            $filename = basename($file);
            
            // 2. Cek apakah file ini sudah pernah dieksekusi sebelumnya
            $isMigrated = $this->db->conn->has('_decor_migrations', ['filename' => $filename]);
            
            if (!$isMigrated) {
                require_once $file;
                
                // Asumsi nama Class sama dengan nama File
                $className = "\\Src\\Migrations\\" . pathinfo($filename, PATHINFO_FILENAME);
                
                if (class_exists($className)) {
                    // Suntikkan koneksi Medoo ke dalam class Migrasi
                    $migration = new $className($this->db->conn);
                    
                    // Eksekusi pembuatan tabel
                    $migration->up();
                    
                    // Catat ke dalam sejarah database
                    $this->db->conn->insert('_decor_migrations', ['filename' => $filename]);
                    
                    echo "✅ Berhasil mengeksekusi: {$filename}\n";
                    $migratedCount++;
                }
            }
        }

        if ($migratedCount === 0) {
            echo "👍 Database sudah dalam versi paling mutakhir (Nothing to migrate).\n";
        } else {
            echo "🚀 {$migratedCount} migrasi baru berhasil diterapkan!\n";
        }
    }
}