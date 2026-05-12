<?php

namespace service;

use dao\mysql\PostDAO;

class PostService extends PostDAO
{
    public function getPost($id)
    {
        return parent::getPost($id);
    }

    public function criarPost($usuario_id, $titulo, $categoria, $tags, $conteudo)
    {
        return parent::criarPost($usuario_id, $titulo, $categoria, $tags, $conteudo);
    }
    
}
