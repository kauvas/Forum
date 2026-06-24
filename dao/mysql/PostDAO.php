<?php

namespace dao\mysql;

use generic\MysqlFactory;

class PostDAO extends MysqlFactory
{
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

    public function criarComentario($post_id, $usuario_id, $conteudo)
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

    public function getCountComentarios($post_id)
    {
        $sql = "SELECT COUNT(*) as total_comentarios FROM comentarios WHERE post_id = :post_id";
        $param = [
            ":post_id" => $post_id,
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getComentarios($post_id)
    {
        $sql = "select c.*, u.nome as nome_usuario, u.id as usuario_id from comentarios c left join usuarios u on c.usuario_id = u.id where c.post_id = :post_id";
        $param = [
            ":post_id" => $post_id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getIDUsuarioComentarios($post_id)
    {
        $sql = "select usuario_id from comentarios where post_id = :post_id";
        $param = [
            ":post_id" => $post_id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getCredenciaisPorUsuario($usuario_id)
    {
        $sql = "select credencial_id, usuario_id, nome, descricao from credenciais where usuario_id = :usuario_id";
        $param = [
            ":usuario_id" => $usuario_id
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

    public function checarInteracao($post_id, $usuario_id, $tipo)
    {
        $sql = "select usuario_id from interacoes where post_id = :post_id and usuario_id = :usuario_id and tipo = :tipo";
        $param = [
            ":post_id" => $post_id,
            ":usuario_id" => $usuario_id,
            ":tipo" => $tipo
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function deletarInteracao($post_id, $usuario_id, $tipo)
    {
        $sql = "delete from interacoes where post_id = :post_id and usuario_id = :usuario_id and tipo = :tipo";
        $param = [
            ":post_id" => $post_id,
            ":usuario_id" => $usuario_id,
            ":tipo" => $tipo
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function mudarInteracao($post_id, $usuario_id, $tipo)
    {
        $sql = "update interacoes set tipo = :tipo where post_id = :post_id and usuario_id = :usuario_id";
        $param = [
            ":post_id" => $post_id,
            ":usuario_id" => $usuario_id,
            ":tipo" => $tipo
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getInteracoes($post_id)
    {
        $sql = "select count(*) as total from interacoes where post_id = :post_id group by tipo";
        $param = [
            ":post_id" => $post_id,
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
}
