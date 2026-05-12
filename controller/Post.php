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
        if (!isset($_SESSION)) {
            session_start();
        }
        $service = new PostService();
        $id = $_POST['post_id'];
        $post = $service->getPost($id);
        $this->template->layout("Post.php", ["post" => $post]);
    }

    public function postVisitante()
    {
        $service = new PostService();
        $id = $_POST['post_id'];
        $post = $service->getPost($id);
        $this->template->layout("Post.php", ["post" => $post]);
    }

    public function carregarCriarPost()
    {
        session_start();
        $usuario_id = $_SESSION['id_usuario'];
        $this->template->layout("CriarPost.php", ["usuario_id" => $usuario_id]);
    }

    public function criarPost()
    {
        session_start();
        $usuario_id = $_SESSION['id_usuario'];
        $service = new PostService();
        $titulo = $_POST['titulo'];
        $categoria = $_POST['categoria'];
        $tags = $_POST['tags'];
        $conteudo = $_POST['conteudo'];
        $service->criarPost($usuario_id, $titulo, $categoria, $tags, $conteudo);
        header("Location: redirect");
    }
}
