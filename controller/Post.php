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
        $count_interacoes = $service->getInteracoes($id);

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

        $this->template->layout("Post.php", ["post" => $post, "id" => $id, "comentarios" => $comentarios, "credenciais" => $credenciais, "cont_comentarios" => $comentarios_por_post, "interacoes" => $count_interacoes]);
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
        if ($conteudo == "") {
            header("Location: post?id=$post_id#erroComentario");
            return;
        }
        $service->criarComentario($post_id, $usuario_id, $conteudo);
        header("Location: post?id=$post_id");
    }

    public function upvote()
    {
        $service = new PostService();
        $usuario_id = $_POST['usuario_id'];
        $post_id = $_POST['post_id'];
        $checkup = $service->checarInteracao($post_id, $usuario_id, 1);
        $checkdown = $service->checarInteracao($post_id, $usuario_id, 2);

        if ($checkdown[0]['usuario_id'] == $usuario_id) {
            $service->mudarInteracao($post_id, $usuario_id, 1);
            header("Location: post?id=$post_id#mudarUp");
            return;
        }

        if ($checkup[0]['usuario_id'] == $usuario_id) {
            $service->deletarInteracao($post_id, $usuario_id, 1);
            header("Location: post?id=$post_id#deletarUp");
            return;
        }

        $tipo = 1;
        $service->upvote($post_id, $usuario_id, $tipo);
        header("Location: post?id=$post_id#Upvote");
    }

    public function downvote()
    {
        $service = new PostService();
        $usuario_id = $_POST['usuario_id'];
        $post_id = $_POST['post_id'];
        $checkdown = $service->checarInteracao($post_id, $usuario_id, 2);
        $checkup = $service->checarInteracao($post_id, $usuario_id, 1);

        if ($checkup[0]['usuario_id'] == $usuario_id) {
            $service->mudarInteracao($post_id, $usuario_id, 2);
            header("Location: post?id=$post_id#mudarDown");
            return;
        }

        if ($checkdown[0]['usuario_id'] == $usuario_id) {
            $service->deletarInteracao($post_id, $usuario_id, 2);
            header("Location: post?id=$post_id#deletarDown");
            return;
        }

        $tipo = 2;
        $service->downvote($post_id, $usuario_id, $tipo);
        header("Location: post?id=$post_id#Downvote");
    }

    public function salvar()
    {
        $service = new PostService();
        $usuario_id = $_POST['usuario_id'];
        $post_id = $_POST['post_id'];

        $check = $service->checarInteracao($post_id, $usuario_id, 3);

        if ($check[0]['usuario_id'] == $usuario_id) {
            $service->deletarInteracao($post_id, $usuario_id, 3);
            header("Location: post?id=$post_id");
            return;
        }

        $tipo = 3;
        $service->salvar($post_id, $usuario_id, $tipo);
        header("Location: post?id=$post_id");
    }
}
