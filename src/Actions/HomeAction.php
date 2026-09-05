<?php

namespace Src\Actions;

use Src\Domain\DecorManager;
use System\View;

class HomeAction
{
    private DecorManager $manager;
    private View $view;

    // ✨ DI Container akan otomatis merakit DecorManager DAN View sekaligus!
    public function __construct(DecorManager $manager, View $view)
    {
        $this->manager = $manager;
        $this->view = $view;
    }

    public function __invoke()
    {
        // 1. Ambil data dari Domain
        $data = $this->manager->getWelcomeData();
        
        // 2. Tembakkan ke layar browser menggunakan Latte Engine
        $this->view->render('home', $data);
    }
}