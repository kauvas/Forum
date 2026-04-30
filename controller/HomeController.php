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
        //$service = new HomeControllerService();
        $dados = "teste"; /*$service->getDadosHome();*/
        $this->template->layout("Home.php", ["dados" => $dados]);
    }
}