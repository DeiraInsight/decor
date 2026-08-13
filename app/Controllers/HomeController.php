<?php
// Lokasi: decor/app/Controllers/HomeController.php

namespace App\Controllers;

use Latte\Engine;

class HomeController {
    
    public function index() {
        $latte = new Engine();
        $latte->setTempDirectory(__DIR__ . '/../../storage/temp');
        
        $data = [
            'decor_tittle' => 'Decor Framework | Welcome',
            'decor_massage' => 'Building your native PHP applications is now faster, more secure, and more elegant.',
            'decor_version'         => 'v1.0.0'
        ];
        
        $latte->render(__DIR__ . '/../../resources/views/home.latte', $data);
    }
}