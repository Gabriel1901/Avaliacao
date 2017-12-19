<?php

/*
 * Classe get Cadastros
 */

/**
 * Description of ObterCadastro
 *
 * @author Get Cadastro
 */
require_once 'Conexao.php';

class clientes_db {

    private $con;

    function __construct() {

        $this->con = new Conexao();
    }

    public function getClientes($cliente) {


        $sql = "SELECT 
            cli_id AS 'codigo', 
            concat( Upper(substr(cli_nome, 1,1)),lower(substr(cli_nome, 2,length(cli_nome))) ) AS 'nome', 
            cli_idade AS 'idade', 
            cli_telefone AS 'telefone', 
            cli_endereco AS 'endereco', 
            cat_nome AS 'categoria' 
            FROM tbl_clientes cli left Join 
            tbl_categoria cat on cat.cat_id = cli.cat_categoria
            WHERE cli_nome = :cliente";

        $getCliente[':cliente'] = $cliente['nome'];
        $get = $this->con->pdo()->prepare($sql);
        $get->execute($getCliente);
        $dados = $get->fetchAll(PDO::FETCH_ASSOC);


        if ($dados) {
            echo json_encode($dados);
        } else {
            echo 'não cadastrado';
        }
        return;
    }

}
