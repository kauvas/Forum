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
        $comentarios = $service->getComentarios($id);
        $this->template->layout("Post.php", ["post" => $post, "id" => $id, "comentarios" => $comentarios]);
    }

    public function postVisitante()
    {
        $service = new PostService();
        $id = $_POST['post_id'];
        $post = $service->getPost($id);
        $comentarios = $service->getComentarios($id);
        $this->template->layout("Post.php", ["post" => $post, "id" => $id, "comentarios" => $comentarios]);
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

    public function criarComentario()
    {
        session_start();
        $usuario_id = $_SESSION['id_usuario'];
        $service = new PostService();
        $post_id = $_POST['post_id'];
        $conteudo = $_POST['conteudo'];
        $service->criarComentario($post_id, $usuario_id, $conteudo);
        $post = $service->getPost($post_id);
        $comentarios = $service->getComentarios($post_id);
        $this->template->layout("Post.php", ["post" => $post, "id" => $post_id, "comentarios" => $comentarios]);
    }
}
