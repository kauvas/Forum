<?php

namespace dao\mysql;

//use dao\IPerfilController]DAO;
use generic\MysqlFactory;

class PerfilControllerDAO extends MysqlFactory /*implements IPerfilControllerDAO*/
{
    public function getPostsID($usuario_id)
    {
        $sql = "select * from posts where usuario_id = :usuario_id";
        $param = [
            ":usuario_id" => $usuario_id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getComentarios($usuario_id)
    {
        $sql = "select * from comentarios where usuario_id = :usuario_id";
        $param = [
            ":usuario_id" => $usuario_id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getUsuarioDados($usuario_id)
    {
        $sql = "select usuario, biografia from usuarios where id = :usuario_id";
        $param = [
            ":usuario_id" => $usuario_id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function editarBiografia($usuario_id, $biografia)
    {
        $sql = "update usuarios set biografia = :biografia where id = :usuario_id";
        $param = [
            ":biografia" => $biografia,
            ":usuario_id" => $usuario_id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function adicionarCredencial($usuario_id, $nome, $descricao)
    {
        $sql = "insert into credenciais (usuario_id, nome, descricao) values (:usuario_id, :nome, :descricao)";
        $param = [
            ":usuario_id" => $usuario_id,
            ":nome" => $nome,
            ":descricao" => $descricao
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getCredenciais($usuario_id)
    {
        $sql = "select nome,descricao,credencial_id from credenciais where usuario_id = :usuario_id";
        $param = [
            ":usuario_id" => $usuario_id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function removerCredencial($usuario_id, $credencial_id)
    {
        $sql = "delete from credenciais where usuario_id = :usuario_id and credencial_id = :credencial_id";
        $param = [
            ":usuario_id" => $usuario_id,
            ":credencial_id" => $credencial_id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getCountComentariosUsuario($usuario_id)
    {
        $sql = "SELECT COUNT(*) as total_comentarios FROM comentarios WHERE usuario_id = :usuario_id";
        $param = [
            ":usuario_id" => $usuario_id,
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getCountPosts($usuario_id)
    {
        $sql = "SELECT COUNT(*) as total_posts FROM posts WHERE usuario_id = :usuario_id";
        $param = [
            ":usuario_id" => $usuario_id,
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getCountComentariosPost($post_id)
    {
        $sql = "SELECT COUNT(*) as total_comentarios FROM comentarios WHERE post_id = :post_id";
        $param = [
            ":post_id" => $post_id,
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

    public function getPostsSalvos($usuario_id)
    {
        $sql = "SELECT DISTINCT p.post_id, p.titulo, p.conteudo, p.usuario_id AS autor_post
                FROM posts p
                INNER JOIN interacoes i ON p.post_id = i.post_id
                WHERE i.tipo = 3 
                AND i.usuario_id = :usuario_id";
        $param = [ 
            ":usuario_id" => $usuario_id,
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
}
