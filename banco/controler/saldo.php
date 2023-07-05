<?php 
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header ('Content-type:application/json');
include("../DAO.php");
include("../config.php");
include ("../model/transacaoDAO.php");
include("../model/transacao.php");
$transacaoDAO = new transacaoDAO;

//$saldo = $transacaoDAO->valorAtual($idCliente);

//$json =json_encode($saldo);
print($_SESSION['id_cliente']);

?>