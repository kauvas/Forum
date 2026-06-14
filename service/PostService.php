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

    public function getComentarios($post_id)
    {
        return parent::getComentarios($post_id);
    }

    public function getCredenciaisPorUsuario($usuario_id)
    {
        return parent::getCredenciaisPorUsuario($usuario_id);
    }

    public function criarComentario($post_id, $usuario_id,$conteudo)
    {
        return parent::criarComentario($post_id, $usuario_id,$conteudo);
    }

    public function upvote($post_id, $usuario_id, $tipo)
    {
        return parent::upvote($post_id, $usuario_id, $tipo);
    }

    public function downvote($post_id, $usuario_id, $tipo)
    {
        return parent::downvote($post_id, $usuario_id, $tipo);
    }

    public function salvar($post_id, $usuario_id, $tipo)
    {
        return parent::salvar($post_id, $usuario_id, $tipo);
    }
}
