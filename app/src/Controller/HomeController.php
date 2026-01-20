<?php

namespace App\Controller;

use App\Lib\Abstract\AbstractController;
use App\Repository\PostRepository;

class HomeController extends AbstractController
{
    private PostRepository $postRepository;
    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    public function index()
    {
        $post = $this->postRepository->find(1);
        return $this->renderView('/index.php', ['title' => 'Accueil', 'post' => $post]);
    }
}