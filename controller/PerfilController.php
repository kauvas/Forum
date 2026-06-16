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
        $id = $_GET['id'];
        $s = $_GET['s'] ?? null;
        if ($s == 1) {
            $posts = $service->getPostsSalvos($id);
        } else {
            $posts = $service-> getPostsID($id);
        }
        $comentarios = $service-> getComentarios($id);
        $dados_usuario = $service-> getUsuarioDados($id);
        $dados_credenciais = $service-> getCredenciais($id);

        $comentarios_por_usuario = [];
        $countCom = $service->getCountComentariosUsuario($id);
        $comentarios_por_usuario  = $countCom[0]['total_comentarios'] ?? 0;

        $posts_por_usuario = [];
        $countPosts = $service->getCountPosts($id);
        $posts_por_usuario  = $countPosts[0]['total_posts'] ?? 0;

        $contagens_por_posts = [];
        foreach ($posts as $post) {
            $resultado_comentarios = $service->getCountComentariosPost($post['post_id']);
            $resultado_interacoes = $service->getInteracoes($post['post_id']);
            $contagens_por_posts[$post['post_id']]['comentarios'] = $resultado_comentarios[0]['total_comentarios'] ?? 0;
            $contagens_por_posts[$post['post_id']]['interacoes'] = [
                "upvotes" => $resultado_interacoes[0]['total'] ?? 0,
                "downvotes" => $resultado_interacoes[1]['total'] ?? 0,
            ];
        }

        $posts_salvos = $service->getPostsSalvos($id);

        $this->template->layout("Perfil.php", ["posts" => $posts, "comentarios" => $comentarios, "dados_usuario" => $dados_usuario, "dados_credenciais" => $dados_credenciais, "comentarios_por_usuario" => $comentarios_por_usuario, "posts_por_usuario" => $posts_por_usuario, "contagens_por_posts" => $contagens_por_posts, "posts_salvos" => $posts_salvos, "id_pagina" => $id, "estado_salvo" => $s]);
    }

    public function editarBiografia()
    {
        $service = new PerfilControllerService();
        session_start();
        $id = $_SESSION['id_usuario'];
        $biografia = $_POST['biographyEdit'];
        $service->editarBiografia($id, $biografia);
        header("Location: perfil?id=$id");
    }

    public function adicionarCredencial()
    {
        $service = new PerfilControllerService();
        session_start();
        $id = $_SESSION['id_usuario'];
        $nome = $_POST['credentialName'];
        $descricao = $_POST['credentialDesc'];
        $service->adicionarCredencial($id, $nome, $descricao);
        header("Location: perfil?id=$id");
    }

    public function removerCredencial()
    {
        $service = new PerfilControllerService();
        session_start();
        $id_credencial = $_POST['id_credencial'];
        $id_usuario = $_POST['id_usuario'];
        $service->removerCredencial($id_usuario, $id_credencial);
        header("Location: perfil?id=$id_usuario");
    }
}
