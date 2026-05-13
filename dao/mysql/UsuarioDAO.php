<?php

namespace dao\mysql;

//use dao\IUsuarioDAO;
use generic\MysqlFactory;

class UsuarioDAO extends MysqlFactory /*implements IUsuarioDAO*/
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

    public function getPosts()
    {
        $sql = "select * from posts";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }
}
