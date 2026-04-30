<?php

namespace dao\mysql;

//use dao\IHomeControllerDAO;
use generic\MysqlFactory;

class HomeControllersDAO extends MysqlFactory /*implements IHomeControllerDAO*/
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
}