<?php

/*
 *Conexão com o Banco de dados.
 */

/**
 * Description of conexao
 *
 * @author Gabriel
 */

    class Conexao 
{

    private $dsn;
    private $username;
    private $password;
    private $dbname;
    private $options;
    public $con;

    public function __construct()
    {
        $this->dsn = '127.0.0.1';
        $this->username = 'root';
        $this->password = '';
        $this->dbname = 'avaliacao';
        $this->options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"];
    }

    public function pdo()
    {

        return $this->con = new PDO('mysql:host=' . $this->dsn . ';dbname=' . $this->dbname, $this->username, $this->password, $this->options);
    }

    public function lastInsertId()
    {
        return $this->con->lastInsertId();
    }

}