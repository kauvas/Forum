<?php

namespace generic;

class Controller
{
    private $arrChamadas = [];
    public function __construct()
    {
        $this->arrChamadas = [
            "home" => new Acao("HomeController","Home")
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