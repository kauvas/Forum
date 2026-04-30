<?php

namespace template;

class HomeControllerTemp implements Itemplate
{
    public function cabecalho()
    {
        echo 
        "<header class='header'>
            <div class='header-container'>
                <!-- Logo -->
                <div class='logo'>
                    <i class='fas fa-comments'></i>
                    <span>MY FORUM</span>
                </div>

                <!-- Barra de Pesquisa -->
                <div class='search-bar'>
                    <input type='text' placeholder='Pesquisar tópicos, categorias...'>
                    <button><i class='fas fa-search'></i></button>
                </div>

                <!-- Botão de Login -->
                <div class='auth-buttons'>
                    <button class='btn-login'><i class='fas fa-sign-in-alt'></i> Entrar</button>
                    <button class='btn-register'><i class='fas fa-user-plus'></i> Registrar</button>
                </div>
            </div>
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