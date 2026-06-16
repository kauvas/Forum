<?php

namespace controller;

use service\HomeControllerService;
use template\HomeControllerTemp;
use template\Itemplate;

class HomeController
{
    private Itemplate $template;
    public function __construct()
    {
        $this->template = new HomeControllerTemp();
    }

    public function Home()
    {
        $service = new HomeControllerService();
        session_start();
        ini_set('display_errors', '0');
        if (!$_SESSION['logado']) {
        $_SESSION = [];
        session_destroy();
        }
        ini_set('display_errors', '1');
        $posts = $service->getPosts();
        $categorias = $service->getCategories();
        
        $comentarios_por_post = [];
        $interacoes_por_post = [];
        foreach ($posts as $post) {
            $resultado_comentarios = $service->getCountComentarios($post['post_id']);
            $resultado_interacoes = $service->getInteracoes($post['post_id']);
            $comentarios_por_post[$post['post_id']] = $resultado_comentarios[0]['total_comentarios'] ?? 0;
            $interacoes_por_post[$post['post_id']] = [
                "upvotes" => $resultado_interacoes[0]['total'] ?? 0,
                "downvotes" => $resultado_interacoes[1]['total'] ?? 0,
            ];
        }
        
        ini_set('display_errors', '0');
        if ($_GET['categoria']){
            $categoria = $_GET['categoria'];
            $posts = $service->getPostsByCategory($categoria);
            $this->template->layout("Home.php", ["posts" => $posts, "categorias" => $categorias, "categoriaSelecionada" => $categoria, "comentarios_por_post" => $comentarios_por_post, "interacoes_por_post" => $interacoes_por_post]);
        } else {
            ini_set('display_errors', '1');
            $this->template->layout("Home.php", ["posts" => $posts, "categorias" => $categorias, "comentarios_por_post" => $comentarios_por_post, "interacoes_por_post" => $interacoes_por_post]);
        }
    }

    public function Limpa()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
        header("Location: home");
    }
}
