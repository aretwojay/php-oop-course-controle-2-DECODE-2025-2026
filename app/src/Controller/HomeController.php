<?php

namespace App\Controller;

use App\Lib\Abstracts\AbstractController;

class HomeController extends AbstractController
{
    public function index()
    {
        return $this->renderView('/index.php', ['title' => 'Accueil']);
    }
}