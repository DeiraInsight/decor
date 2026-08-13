<?php
// Lokasi: decor/routes/web.php

// Call library Bramus Router
$router = new \Bramus\Router\Router();
// Rute Beranda (SEKARANG MEMANGGIL CONTROLLER!)
$router->get('/', 'App\Controllers\HomeController@index');

// ... sisa kode router lainnya ...

// Rute Beranda (Akan menampilkan teks biasa)
$router->get('/', function() {
    echo "<h1>Bramus Router Berfungsi!</h1>";
    echo "<p>Selamat datang di jantung DeiraCoreSystem v2.</p>";
    
});

// Contoh Rute dengan Parameter ID
$router->get('/tes/(\d+)', function($id) {
    echo "<h1>Mengetes parameter ID: " . $id . "</h1>";
});

// Rute Error 404
$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo "<h1 style='color:red;'>404 - Alamat tidak ditemukan di DCS v2!</h1>";
});

// Jalankan sistem routing

$router->run();
