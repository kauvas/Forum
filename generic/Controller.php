<?php

namespace generic;

class Controller
{
    private $arrChamadas = [];
    public function __construct()
    {
        $this->arrChamadas = [
            "home" => new Acao("HomeController", "Home"),
            "registrar" => new Acao("Usuario", "registrar"),
            "homeL" => new Acao("Usuario", "login"),
            "perfil" => new Acao("PerfilController", "Perfil"),
            "redirect" => new Acao("Usuario", "redirect")
        ];
    }

    public function verificarChamadas($rota)
    {
        if (isset($this->arrChamadas[$rota])) {
            $acao = $this->arrChamadas[$rota];
            $acao->executar();
            return;
        }

        echo "Rota não existe";
    }
}
