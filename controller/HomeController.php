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
        $_SESSION = [];
        session_destroy();
        $posts = $service->getPosts();
        $categorias = $service->getCategories();
        
        $comentarios_por_post = [];
        foreach ($posts as $post) {
            $resultado = $service->getCountComentarios($post['post_id']);
            $comentarios_por_post[$post['post_id']] = $resultado[0]['total_comentarios'] ?? 0;
        }
        
        $this->template->layout("Home.php", ["posts" => $posts, "categorias" => $categorias, "comentarios_por_post" => $comentarios_por_post]);
    }

    public function filtrarCategoria()
    {
        $service = new HomeControllerService();
        $categoria = $_GET['categoria'] ?? null;
        
        if ($categoria) {
            $posts = $service->getPostsByCategory($categoria);
        } else {
            $posts = $service->getPosts();
        }
        
        $categorias = $service->getCategories();
        
        // Obter contagem de comentários para cada post
        $comentarios_por_post = [];
        foreach ($posts as $post) {
            $resultado = $service->getCountComentarios($post['post_id']);
            $comentarios_por_post[$post['post_id']] = $resultado[0]['total_comentarios'] ?? 0;
        }
        
        session_start();
        if (isset($_SESSION['usuario'])) {
            $usuario = $_SESSION['usuario'];
            $this->template->layout("Home.php", ["usuario" => $usuario, "posts" => $posts, "categorias" => $categorias, "comentarios_por_post" => $comentarios_por_post]);
        }
        //session_destroy();
        $this->template->layout("Home.php", ["posts" => $posts, "categorias" => $categorias, "categoriaSelecionada" => $categoria, "comentarios_por_post" => $comentarios_por_post]);
    }
}
