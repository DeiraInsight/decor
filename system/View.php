<?php

namespace System;

use Latte\Engine;

class View
{
    private Engine $latte;

    public function __construct()
    {
        $this->latte = new Engine();
        
        // Mengarahkan file cache ke folder yang sudah kita siapkan sebelumnya
        $this->latte->setTempDirectory(__DIR__ . '/../storage/temp'); /*[cite: 1]*/
    }

    /**
     * Fungsi untuk merender template dan menyuntikkan data
     */
    public function render(string $template, array $params = []): void
    {
        $templatePath = __DIR__ . '/../views/' . $template . '.latte';
        $this->latte->render($templatePath, $params);
    }
}