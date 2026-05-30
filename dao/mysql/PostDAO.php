<?php

namespace dao\mysql;

//use dao\IPost]DAO;
use generic\MysqlFactory;

class PostDAO extends MysqlFactory /*implements IPostDAO*/
{
    public function Perfil()
    {
        $sql = "select * from forum";
        $param = [
            "",
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getPost($id)
    {
        
        $sql = "select p.*, u.nome as nome_usuario from posts p left join usuarios u on p.usuario_id = u.id where p.post_id = :post_id";
        $param = [
            ":post_id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function criarPost($usuario_id, $titulo, $categoria, $tags, $conteudo)
    {
        $sql = "insert into posts (usuario_id, titulo, categoria, tags, conteudo) values (:usuario_id, :titulo, :categoria, :tags, :conteudo)";
        $param = [
            ":usuario_id" => $usuario_id,
            ":titulo" => $titulo,
            ":categoria" => $categoria,
            ":tags" => $tags,
            ":conteudo" => $conteudo
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function criarComentario($post_id, $usuario_id,$conteudo)
    {
        $sql = "insert into comentarios (post_id, usuario_id, conteudo) values (:post_id, :usuario_id, :conteudo)";
        $param = [
            ":post_id" => $post_id,
            ":usuario_id" => $usuario_id,
            ":conteudo" => $conteudo
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getComentarios($post_id)
    {
        $sql = "select c.*, u.nome as nome_usuario from comentarios c left join usuarios u on c.usuario_id = u.id where c.post_id = :post_id";
        $param = [
            ":post_id" => $post_id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function upvote($post_id, $usuario_id, $tipo)
    {
        $sql = "insert into interacoes (post_id, usuario_id, tipo) values (:post_id, :usuario_id, :tipo)";
        $param = [
            ":post_id" => $post_id,
            ":usuario_id" => $usuario_id,
            ":tipo" => $tipo
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function downvote($post_id, $usuario_id, $tipo)
    {
        $sql = "insert into interacoes (post_id, usuario_id, tipo) values (:post_id, :usuario_id, :tipo)";
        $param = [
            ":post_id" => $post_id,
            ":usuario_id" => $usuario_id,
            ":tipo" => $tipo
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function salvar($post_id, $usuario_id, $tipo)
    {
        $sql = "insert into interacoes (post_id, usuario_id, tipo) values (:post_id, :usuario_id, :tipo)";
        $param = [
            ":post_id" => $post_id,
            ":usuario_id" => $usuario_id,
            ":tipo" => $tipo
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
}
