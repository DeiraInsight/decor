<?php
// Location: app/Controllers/HomeController.php

namespace App\Controllers;

use Latte\Engine;

class HomeController {
    
    public function index() {

        $latte = new Engine();
        
       
        $latte->setTempDirectory(__DIR__ . '/../../storage/temp');
        
       
        $data = [
            'decor_title'   => 'Decor Framework | Welcome',
            'decor_message' => 'Build your native PHP applications is now faster, more secure, and more elegant.',
            'decor_version' => 'v1.0.0'
        ];
        
       
        $latte->render(__DIR__ . '/../../resources/views/home.latte', $data);
    }
}