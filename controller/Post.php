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
        //$service = new PostService();
        $dados = "ops"; /*$service->getDadosHome();*/
        $this->template->layout("Post.php", ["dados" => $dados]);
    }

    public function postVisitante()
    {
        $dados = "ops"; /*$service->getDadosHome();*/
        $this->template->layout("Post.php", ["dados" => $dados]);
    }
}
