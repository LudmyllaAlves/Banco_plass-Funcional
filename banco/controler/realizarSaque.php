<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header ('Content-type:application/json');
include('../config.php');
include('../DAO.php');
include('../model/transacaoDAO.php');
$valor = $_POST['valor'] = "20.00";

$transacaoDAO = new transacaoDAO();
$valorAtual=$transacaoDAO->valorAtual($_SESSION['id_cliente']);

if($valorAtual >= $valor){
    $restante = $transacaoDAO->subtracaoDeValores($valorAtual, $valor);
    $sacar = $transacaoDAO->atualizarSaldo($restante, $_SESSION['id_cliente']);
    $sacou = $transacaoDAO->addSaque($_SESSION['id_cliente']  , $valor);
    echo "sacou: $valor";
}else{
    echo "Saldo insuficiente";
}

?>