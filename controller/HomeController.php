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
        if (session_status() != PHP_SESSION_NONE) {
            $_SESSION = [];
            session_destroy();
        }
        //$service = new HomeControllerService();
        $dados = "teste"; /*$service->getDadosHome();*/
        $this->template->layout("Home.php", ["dados" => $dados]);
    }
}
