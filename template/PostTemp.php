<?php

namespace template;

class postTemp implements Itemplate
{
    public function cabecalho()
    {
        echo
        "<header class='header'>
            <div class='header-container'>
                <!-- Logo -->
                <div class='logo'>
                    <a href='home?t=0'><img src='style\Path 5.svg'></a>
                    <span>OnCred</span>
                </div>

                <!-- Barra de Pesquisa -->
                <div class='search-bar'>
                    <input type='text' placeholder='Pesquisar tópicos, categorias...'>
                    <button><i class='fas fa-search'></i></button>
                </div>";
        if (isset($_SESSION['usuario'])) {
            echo " <div class='logo'> <span> Bem Vindo, " . htmlspecialchars($_SESSION['usuario']) . "!</span> </div>
                <div class='logo'>
                    <a href='perfil?id=" . htmlspecialchars($_SESSION['id_usuario']) . "'><button class='btn-login' onclick='openEntrarModal()'> <i class='fas fa-user'></i> </button></a>
                </div>";
        } else {
            echo
            "<div class='auth-buttons'>
                    <button class='btn-login' onclick='openEntrarModal()'> <i class='fas fa-sign-in-alt'></i> Entrar</button>
                </div>";
        }
        echo "</div>
            </header>";
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
