<?php

namespace controller;

use service\PerfilControllerService;
use template\PerfilControllerTemp;
use template\Itemplate;

class PerfilController
{
    private Itemplate $template;
    public function __construct()
    {
        $this->template = new PerfilControllerTemp();
    }

    public function Perfil()
    {
        //$service = new PerfilControllerService();
        $dados = "teste"; /*$service->getDadosHome();*/
        $this->template->layout("Perfil.php", ["dados" => $dados]);
    }
}
