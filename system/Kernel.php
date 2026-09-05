<?php

namespace System;

class Kernel
{
    public Container $container;
    public Router $router;

    public function __construct()
    {
        ExceptionHandler::register();
        // 1. Hidupkan DI Container
        $this->container = new Container();
        
        // 2. Daftarkan Database sebagai Singleton agar hanya terkoneksi 1 kali
        $this->container->singleton(Database::class, new Database());

        $this->container->singleton(View::class, new View());

        // 3. Hidupkan Router dan suntikkan Container ke dalamnya
        $this->router = new Router($this->container);
    }

    public function boot(): void
    {
        // 3. Masukkan variabel router ke dalam cakupan (scope) agar bisa dibaca web.php
        $router = $this->router;
        
        // 4. Muat daftar URL pengguna
        require_once __DIR__ . '/../endpoints/web.php';
        
        // 5. Eksekusi mesin rute
        $router->run();
    }
}