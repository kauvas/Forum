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
        //$service = new PostService();
        $dados = "ops"; /*$service->getDadosHome();*/
        $this->template->layout("Post.php", ["dados" => $dados]);
    }
}
