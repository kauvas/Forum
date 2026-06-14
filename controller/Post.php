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
        $id = $_GET['id'];
        $post = $service->getPost($id);
        $comentarios = $service->getComentarios($id);
        $id_usuario_comentarios = $service->getIDUsuarioComentarios($id);

        $credenciais = [];
        foreach ($id_usuario_comentarios as $usuario) {
            $credenciais_usuario = $service->getCredenciaisPorUsuario($usuario['usuario_id']);
            $credenciais[$usuario['usuario_id']] = $credenciais_usuario;
        }

        $comentarios_por_post = [];
        foreach ($post as $post) {
            $resultado = $service->getCountComentarios($post['post_id']);
            $comentarios_por_post = $resultado[0]['total_comentarios'] ?? 0;
        }

        $this->template->layout("Post.php", ["post" => $post, "id" => $id, "comentarios" => $comentarios, "credenciais" => $credenciais, "cont_comentarios" => $comentarios_por_post]);
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
        header("Location: home");
    }

    public function criarComentario()
    {
        session_start();
        $usuario_id = $_SESSION['id_usuario'];
        $service = new PostService();
        $post_id = $_POST['post_id'];
        $conteudo = $_POST['conteudo'];
        $service->criarComentario($post_id, $usuario_id, $conteudo);
        header("Location: post?id=$post_id");
    }

    public function upvote()
    {
        session_start();
        $usuario_id = $_POST['usuario_id'];
        $service = new PostService();
        $post_id = $_POST['post_id'];
        $tipo = 1;
        $post = $service->getPost($post_id);
        $comentarios = $service->getComentarios($post_id);
        $service->upvote($post_id, $usuario_id, $tipo);
        header("Location: post?id=$post_id");
    }

    public function downvote()
    {
        session_start();
        $usuario_id = $_POST['usuario_id'];
        $service = new PostService();
        $post_id = $_POST['post_id'];
        $tipo = 2;
        $post = $service->getPost($post_id);
        $comentarios = $service->getComentarios($post_id);
        $service->downvote($post_id, $usuario_id, $tipo);
        header("Location: post?id=$post_id");
    }

    public function salvar()
    {
        session_start();
        $usuario_id = $_POST['usuario_id'];
        $service = new PostService();
        $post_id = $_POST['post_id'];
        $tipo = 3;
        $post = $service->getPost($post_id);
        $comentarios = $service->getComentarios($post_id);
        $service->salvar($post_id, $usuario_id, $tipo);
        header("Location: post?id=$post_id");
    }
}
