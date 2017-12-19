<?php


$nomePost = strtolower( $_POST['nome']);
if($nomePost != "" && $nomePost != null){
    
require_once 'clientes_db.php';

$get = new clientes_db;

$iniciar = curl_init();

curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);

$dados = array(
    
  'nome' =>$nomePost
    
);


curl_setopt($iniciar, CURLOPT_PORT, true);

curl_setopt($iniciar, CURLOPT_POSTFIELDS, $dados);

curl_exec($iniciar);

curl_close($iniciar);
$get->getClientes($dados);
}else{
    
}