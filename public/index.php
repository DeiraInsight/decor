<?php

// 1. Panggil autoloader dari Composer
require_once __DIR__ . '/../vendor/autoload.php';

// 2. Panggil namespace Kernel dari mesin inti DECOR
use System\Kernel;

// 3. Hidupkan mesin dan jalankan aplikasi!
$kernel = new Kernel();
$kernel->boot();