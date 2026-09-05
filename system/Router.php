<?php

namespace System;

use Bramus\Router\Router as BramusRouter;

class Router
{
    private BramusRouter $bramus;
    private Container $container;

    public function __construct(Container $container)
    {
        $this->bramus = new BramusRouter();
        $this->container = $container;
    }

    /**
     * Mendaftarkan URL GET ke sistem Container
     */
    public function get(string $pattern, string $actionClass): void
    {
        $this->bramus->get($pattern, function (...$params) use ($actionClass) {
            // 1. Container otomatis merakit Action beserta semua dependensinya (Domain/Gateway)
            $actionInstance = $this->container->get($actionClass);
            
            // 2. Eksekusi Action menggunakan magic method __invoke() khas arsitektur ADR
            return $actionInstance(...$params);
        });
    }

    /**
     * Mendaftarkan URL POST ke sistem Container
     */
    public function post(string $pattern, string $actionClass): void
    {
        $this->bramus->post($pattern, function (...$params) use ($actionClass) {
            $actionInstance = $this->container->get($actionClass);
            return $actionInstance(...$params);
        });
    }

    /**
     * Menjalankan mesin rute
     */
    public function run(): void
    {
        $this->bramus->run();
    }
}