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
        $service = new PerfilControllerService();
        session_start();
        $posts = $service-> getPostsID($_SESSION['id_usuario']);
        $comentarios = $service-> getComentarios($_SESSION['id_usuario']);
        $this->template->layout("Perfil.php", ["posts" => $posts, "comentarios" => $comentarios]);
    }
}
