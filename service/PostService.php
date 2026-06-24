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
    public function criarComentario($post_id, $usuario_id, $conteudo)
    {
        return parent::criarComentario($post_id, $usuario_id, $conteudo);
    }
    public function getCountComentarios($post_id)
    {
        return parent::getCountComentarios($post_id);
    }
    public function getComentarios($post_id)
    {
        return parent::getComentarios($post_id);
    }
    public function getIDUsuarioComentarios($post_id)
    {
        return parent::getIDUsuarioComentarios($post_id);
    }
    public function getCredenciaisPorUsuario($usuario_id)
    {
        return parent::getCredenciaisPorUsuario($usuario_id);
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
    public function checarInteracao($post_id, $usuario_id, $tipo)
    {
        return parent::checarInteracao($post_id, $usuario_id, $tipo);
    }
    public function deletarInteracao($post_id, $usuario_id, $tipo)
    {
        return parent::deletarInteracao($post_id, $usuario_id, $tipo);
    }
    public function mudarInteracao($post_id, $usuario_id, $tipo)
    {
        return parent::mudarInteracao($post_id, $usuario_id, $tipo);
    }
    public function getInteracoes($post_id)
    {
        return parent::getInteracoes($post_id);
    }
}
