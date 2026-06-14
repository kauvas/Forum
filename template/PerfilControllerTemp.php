<?php

namespace template;

class PerfilControllerTemp implements Itemplate
{
        public function cabecalho()
    {
        //session_start();
        if (isset($_SESSION['usuario'])) {
            echo "<header class='header'>
            <div class='header-container'>
                <!-- Logo -->
                <div class='logo'>
                    <a class='logo' href='redirect' style='text-decoration: none'> <i class='fas fa-comments'></i> </a>
                    <span>MY FORUM</span>
                </div>

                <!-- Barra de Pesquisa -->
                <div class='search-bar'>
                    <input type='text' placeholder='Pesquisar tópicos, categorias...'>
                    <button><i class='fas fa-search'></i></button>
                </div>
                <div class='logo'>
                <span> Bem Vindo, " . htmlspecialchars($_SESSION['usuario']) . "!</span>
                </div>
                <div class='logo'>
                    <a href='perfil?id=" . htmlspecialchars($_SESSION['id_usuario']) . "'><button class='btn-login' onclick='openEntrarModal()'> <i class='fas fa-comments'></i> </button></a>
                </div>
            </div>
        </header>";
        }
        else {
        echo
        "<header class='header'>
            <div class='header-container'>
                <!-- Logo -->
                <div class='logo'>
                    <a class='logo' href='redirect' style='text-decoration: none'> <i class='fas fa-comments'></i> </a>
                    <span>MY FORUM</span>
                </div>

                <!-- Barra de Pesquisa -->
                <div class='search-bar'>
                    <input type='text' placeholder='Pesquisar tópicos, categorias...'>
                    <button><i class='fas fa-search'></i></button>
                </div>

                <!-- Botão de Login -->
                <div class='auth-buttons'>
                    <button class='btn-login' onclick='openEntrarModal()'> <i class='fas fa-sign-in-alt'></i> Entrar</button>
                </div>
            </div>
        </header>";
        }
    }
    public function layout($caminho, $parametro = null)
    {   
        $this->cabecalho();
        if ($parametro !== null) {
            // Torna $parametro disponível no arquivo incluído
            // Se quiser tornar cada chave de $parametro[0] como variável, use extract($parametro[0]);
        }
        include $_SERVER["DOCUMENT_ROOT"] . "/Forum/public/" . ltrim($caminho, "\\/");
    }
}
