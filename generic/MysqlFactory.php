<?php

namespace generic;

class MysqlFactory
{
    public Conexao $banco;
    public function __construct()
    {
        $this->banco = Conexao::getInstance();
    }
}