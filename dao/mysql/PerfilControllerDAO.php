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

    public function getCountComentarios($usuario_id)
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
}
