<?php

namespace System;

use ReflectionClass;
use Exception;

class Container
{
    /**
     * Menyimpan instance tunggal (Singleton) seperti koneksi Database
     */
    private array $instances = [];

    /**
     * Mendaftarkan sebuah class agar hanya dibuat satu kali (Singleton)
     */
    public function singleton(string $class, $instance): void
    {
        $this->instances[$class] = $instance;
    }

    /**
     * Mengambil instance dari class (Auto-wiring)
     */
    public function get(string $class)
    {
        // Jika sudah ada di memori singleton, kembalikan yang sudah ada
        if (isset($this->instances[$class])) {
            return $this->instances[$class];
        }

        // Jika belum ada, rakit secara otomatis
        return $this->resolve($class);
    }

    /**
     * Merakit class beserta seluruh dependensinya menggunakan Reflection API
     */
    private function resolve(string $class)
    {
        $reflection = new ReflectionClass($class);

        if (!$reflection->isInstantiable()) {
            throw new Exception("DECOR Error: Class {$class} tidak dapat diinstansiasi.");
        }

        $constructor = $reflection->getConstructor();

        // Jika class tidak punya constructor, langsung buat objeknya
        if (is_null($constructor)) {
            return new $class;
        }

        // Ambil parameter di dalam constructor
        $parameters = $constructor->getParameters();
        $dependencies = $this->getDependencies($parameters);

        // Buat instance baru dengan menyuntikkan dependensinya
        return $reflection->newInstanceArgs($dependencies);
    }

    /**
     * Membaca dan membuat (resolve) setiap parameter/dependensi
     */
    private function getDependencies(array $parameters): array
    {
        $dependencies = [];
        
        foreach ($parameters as $parameter) {
            $type = $parameter->getType();
            
            if (!$type || $type->isBuiltin()) {
                throw new Exception("DECOR Error: Gagal merakit parameter '{$parameter->getName()}'. DI Container hanya mendukung injeksi berbasis Class/Interface.");
            }
            
            // Lakukan pemanggilan rekursif untuk merakit dependensi di dalam dependensi
            $dependencies[] = $this->get($type->getName());
        }
        
        return $dependencies;
    }
}