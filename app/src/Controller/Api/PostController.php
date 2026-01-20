<?php


namespace App\Controller\Api;
use App\Lib\Abstract\AbstractController;
use App\Repository\PostRepository;

class PostController extends AbstractController {

    private PostRepository $postRepository;
    public function __construct() {
        $this->postRepository = new PostRepository();
    }

    public function findMany(): string {
        $limit = $_GET["limit"] ?? 10;
        $page = $_GET["page"] ?? 0;
        echo var_dump($limit, $page);
        $offset = ($page - 1) * $limit;
        $posts = $this->postRepository->findMany([], ["created_at" => "desc"], $limit, $offset);
        return json_encode($posts);
    }
}