<?php

namespace dao\mysql;

//use dao\IHomeControllerDAO;
use generic\MysqlFactory;

class HomeControllerDAO extends MysqlFactory /*implements IHomeControllerDAO*/
{     
    public function teste()
    {
        $sql = "select * from forum";
        $param = [
            "",
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
