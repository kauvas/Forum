<?php

namespace dao\mysql;

use generic\MysqlFactory;

class UsuarioDAO extends MysqlFactory
{
    public function registrar($nome, $usuario, $email, $senha)
    {
        $sql = "insert into usuarios (nome, usuario, email, senha) values (:nome, :usuario, :email, :senha)";
        $param = [
            ":nome" => $nome,
            ":usuario" => $usuario,
            ":email" => $email,
            ":senha" => $senha
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getID($email)
    {
        $sql = "select id from usuarios where email = :email";
        $param = [
            ":email" => $email,
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function login($email, $senha)
    {
        $sql = "select usuario,id from usuarios where email = :email and senha = :senha";
        $param = [
            ":email" => $email,
            ":senha" => $senha
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function atualizarContaEmail($usuario_id, $email)
    {
        $sql = "update usuarios set Email = :email where id = :usuario_id";
        $param = [
            ":usuario_id" => $usuario_id,
            ":email" => $email
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function atualizarContaSenha($usuario_id, $senha)
    {
        $sql = "update usuarios set Senha = :senha where id = :usuario_id";
        $param = [
            ":usuario_id" => $usuario_id,
            ":senha" => $senha
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function deletarConta($usuario_id)
    {
        $sqlComentarios = "delete from comentarios where usuario_id = :usuario_id";
        $param = [":usuario_id" => $usuario_id];
        $this->banco->executar($sqlComentarios, $param);

        $sqlCredenciais = "delete from credenciais where usuario_id = :usuario_id";
        $param = [":usuario_id" => $usuario_id];
        $this->banco->executar($sqlCredenciais, $param);

        $sqlInteracoes = "delete from interacoes where usuario_id = :usuario_id";
        $param = [":usuario_id" => $usuario_id];
        $this->banco->executar($sqlInteracoes, $param);

        $sqlPosts = "delete from posts where usuario_id = :usuario_id";
        $param = [":usuario_id" => $usuario_id];
        $this->banco->executar($sqlPosts, $param);

        $sqlUsuarios = "delete from usuarios where id = :usuario_id";
        $param = [":usuario_id" => $usuario_id];
        $this->banco->executar($sqlUsuarios, $param);

        return;
    }
}
