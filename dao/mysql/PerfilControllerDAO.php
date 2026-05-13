<?php

namespace dao\mysql;

//use dao\IPerfilController]DAO;
use generic\MysqlFactory;

class PerfilControllerDAO extends MysqlFactory /*implements IPerfilControllerDAO*/
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

    public function getPostsID($usuario_id)
    {
        $sql = "select * from posts where usuario_id = :usuario_id";
        $param = [
            ":usuario_id" => $usuario_id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
}
