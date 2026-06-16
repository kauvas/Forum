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
            "perfil" => new Acao("PerfilController", "Perfil"),
            "logout" => new Acao("Usuario", "logout"),
            "post" => new Acao("Post", "Post"),
            "CriarPost" => new Acao("Post", "carregarCriarPost"),
            "salvarPost" => new Acao("Post", "criarPost"),
            "criarComentario" => new Acao("Post", "criarComentario"),
            "upvote" => new Acao("Post", "upvote"),
            "downvote" => new Acao("Post", "downvote"),
            "salvar" => new Acao("Post", "salvar"),
            "editarBiografia" => new Acao("PerfilController", "editarBiografia"),
            "adcionarCredencial" => new Acao("PerfilController", "adicionarCredencial"),
            "removerCredencial" => new Acao("PerfilController", "removerCredencial"),
            "limpa" => new Acao("HomeController", "Limpa"),
            "login" => new Acao("Usuario", "login")
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
