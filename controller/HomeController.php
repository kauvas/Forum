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
        $this->template->layout("Home.php", ["posts" => $posts, "categorias" => $categorias]);
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
        session_start();
        if (isset($_SESSION['usuario'])) {
            $usuario = $_SESSION['usuario'];
            $this->template->layout("Home.php", ["usuario" => $usuario, "posts" => $posts, "categorias" => $categorias, "teste" => 1]);
        }
        //session_destroy();
        $this->template->layout("Home.php", ["posts" => $posts, "categorias" => $categorias, "categoriaSelecionada" => $categoria, "teste" => 2]);
    }
}
