<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header ('Content-type:application/json');
include('../config.php');
include('../DAO.php');
include('../model/transacaoDAO.php');
$valor = $_POST['valor'];
$idCliente = $_SESSION['id_cliente'];

$transacaoDAO = new transacaoDAO();
$valorAtual= $transacaoDAO->valorAtual($idCliente);
if($valorAtual >= 0){ 
    $novoValor = $transacaoDAO->somaDeValores($valorAtual, $valor);
    print($novoValor);
    $deposito = $transacaoDAO->atualizarSaldo($novoValor, $idCliente);
    $depositou = $transacaoDAO->addDeposito($idCliente, $valor);
    echo "Depositou: $valor";
}else{
    echo "Saldo insuficiente";
}



?>