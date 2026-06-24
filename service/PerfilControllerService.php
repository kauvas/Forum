<?php

namespace service;

use dao\mysql\PerfilControllerDAO;

class PerfilControllerService extends PerfilControllerDAO
{
    public function getPostsID($usuario_id)
    {
        return parent::getPostsID($usuario_id);
    }
    public function getPostsPostID($post_id)
    {
        return parent::getPostsPostID($post_id);
    }
    public function getComentarios($usuario_id)
    {
        return parent::getComentarios($usuario_id);
    }
    public function getUsuarioDados($usuario_id, $t)
    {
        return parent::getUsuarioDados($usuario_id, $t);
    }
    public function editarBiografia($usuario_id, $biografia)
    {
        return parent::editarBiografia($usuario_id, $biografia);
    }
    public function adicionarCredencial($usuario_id, $nome, $descricao)
    {
        return parent::adicionarCredencial($usuario_id, $nome, $descricao);
    }
    public function getCredenciais($usuario_id)
    {
        return parent::getCredenciais($usuario_id);
    }
    public function removerCredencial($usuario_id, $credencial_id)
    {
        return parent::removerCredencial($usuario_id, $credencial_id);
    }
    public function getCountComentariosUsuario($usuario_id)
    {
        return parent::getCountComentariosUsuario($usuario_id);
    }
    public function getCountPosts($usuario_id)
    {
        return parent::getCountPosts($usuario_id);
    }
    public function getCountComentariosPost($post_id)
    {
        return parent::getCountComentariosPost($post_id);
    }
    public function getInteracoes($post_id)
    {
        return parent::getInteracoes($post_id);
    }
    public function getPostsSalvos($usuario_id)
    {
        return parent::getPostsSalvos($usuario_id);
    }
}
