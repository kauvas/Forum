<?php

namespace controller;

use service\HomeControllerService;
use template\HomeControllerTemp;
use template\Itemplate;

class HomeController
{
    private Itemplate $template;
    public function __construct()
    {
        $this->template = new HomeControllerTemp();
    }

    public function Home()
    {
        $service = new HomeControllerService();
        if (session_status() != PHP_SESSION_NONE) {
            $_SESSION = [];
            session_destroy();
        }
        $posts = $service->getPosts();
        //$service = new HomeControllerService();
        $this->template->layout("Home.php", ["posts" => $posts]);
    }
}
