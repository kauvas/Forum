<?php

namespace controller;

use service\PostService;
use template\PostTemp;
use template\Itemplate;

class Post
{
    private Itemplate $template;
    public function __construct()
    {
        $this->template = new PostTemp();
    }

    public function Post()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $service = new PostService();
        $id = $_POST['post_id'];
        $post = $service->getPost($id);
        $this->template->layout("Post.php", ["post" => $post]);
    }

    public function postVisitante()
    {
        $service = new PostService();
        $id = $_POST['post_id'];
        $post = $service->getPost($id);
        $this->template->layout("Post.php", ["post" => $post]);
    }
}
