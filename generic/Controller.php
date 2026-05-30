<?php

namespace generic;

class Controller
{
    private $arrChamadas = [];
    public function __construct()
    {
        $this->arrChamadas = [
            "home" => new Acao("HomeController", "Home"),
            "filtrarCategoria" => new Acao("HomeController", "filtrarCategoria"),
            "registrar" => new Acao("Usuario", "registrar"),
            "homeL" => new Acao("Usuario", "login"),
            "perfil" => new Acao("PerfilController", "Perfil"),
            "redirect" => new Acao("Usuario", "redirect"),
            "redirectVisitante" => new Acao("Usuario", "redirectVisitante"),
            "logout" => new Acao("Usuario", "logout"),
            "post" => new Acao("Post", "Post"),
            "postVisitante" => new Acao("Post", "postVisitante"),
            "carregarCriarPost" => new Acao("Post", "carregarCriarPost"),
            "salvarPost" => new Acao("Post", "criarPost"),
            "criarComentario" => new Acao("Post", "criarComentario"),
            "upvote" => new Acao("Post", "upvote"),
            "downvote" => new Acao("Post", "downvote"),
            "salvar" => new Acao("Post", "salvar"),
            "postI" => new Acao("post", "PostI"),
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
