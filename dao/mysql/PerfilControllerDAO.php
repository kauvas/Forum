<?php

namespace dao\mysql;

//use dao\IPerfilController]DAO;
use generic\MysqlFactory;

class PerfilControllersDAO extends MysqlFactory /*implements IPerfilControllerDAO*/
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
}
