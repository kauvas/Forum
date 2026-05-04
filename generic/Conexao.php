<?php

namespace generic;

use PDO;

class Conexao
{
    private static $instance = null;

    private $conexao;
    private $dsn = "mysql:host=localhost;dbname=forum;";
    private $usuario = "root";
    private $senha = "";
    private $options = null;

    private function __construct()
    {
        if ($this->conexao == null) {
            $this->conexao = new PDO($this->dsn, $this->usuario, $this->senha, $this->options);
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Conexao();
        }
        return self::$instance;
    }

    public function executar($query, $param = array())
    {

        if ($this->conexao) {
            $sth = $this->conexao->prepare($query);
            foreach ($param as $k => $v) {

                $sth->bindValue($k, $v);
            }


            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
