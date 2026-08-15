<?php

$router = new \Bramus\Router\Router();

$router->get('/', 'App\Controllers\HomeController@index');

$router->get('/tes/(\d+)', function($id) {
    
    echo "<h1>Mencoba Parameter ID: " . htmlspecialchars($id) . "</h1>";
    echo "<p>Rute dinamis ini didukung oleh Decor Framework.</p>";
});


$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo "<div style='text-align: center; margin-top: 50px; font-family: sans-serif;'>";
    echo "<h1 style='color: #e74c3c;'>404 - Not Found</h1>";
    echo "<p>The page you are looking for was not found on the Decor server.</p>";
    echo "</div>";
});

$router->run();