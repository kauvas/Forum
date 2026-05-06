<?php

namespace dao\mysql;

//use dao\IPost]DAO;
use generic\MysqlFactory;

class PostsDAO extends MysqlFactory /*implements IPostDAO*/
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
