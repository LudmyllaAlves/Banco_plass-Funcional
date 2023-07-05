<?php
session_start([
    'cookie_lifetime' => 86400,
    'read_and_close'  => true,
]);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header ('Content-type:application/json');
include('../config.php');
include('../DAO.php');
include('../model/cliente.php');
include('../model/clienteDAO.php');


$clienteDAO = new ClienteDAO;

$cpfcnpj =$clienteDAO->formatCnpjCpf($_POST ['cpfcnpj']);
$senha = $_POST ['senha'] ;
$_SESSION['cpfcnpj'] = $cpfcnpj;
$_SESSION['senha'] = $senha;
$nome = $clienteDAO->getNome($_SESSION['cpfcnpj']);
$_SESSION['nome']= $nome;
$_SESSION['id_cliente'] = $clienteDAO->validarLogin($_SESSION['cpfcnpj'], $_SESSION['senha']);


if($_SESSION['id_cliente']  >= 1){
    echo "Logado";
    header ("Location:http://localhost/banco/controler/saldo.php ");
}else{
    echo "Cliente não consta no banco de dados";
}

?>