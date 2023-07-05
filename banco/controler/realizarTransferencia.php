<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header ('Content-type:application/json');
include('../config.php');
include('../DAO.php');
include('../model/transacaoDAO.php');
include('../model/clienteDAO.php');
include('../model/cliente.php');

$clienteDAO = new ClienteDAO();

$clientePrincipal = $_SESSION['id_cliente'];
$clienteReceptor = $_POST['receptor']= "879.021.145-65";
$valorEnviado = $_POST['valor'] = 120.27;


$idClienteReceptor = $clienteDAO->verificaCliente($clienteReceptor);

if($idClienteReceptor >= 1){
    $transacaoDAO = new transacaoDAO();
    $valorAtual=$transacaoDAO->valorAtual($clientePrincipal);
    if($valorAtual >= $valorEnviado){
        $saldoCP = $transacaoDAO->subtracaoDeValores($valorAtual, $valorEnviado);

        $novoSaldo = $transacaoDAO->atualizarSaldo($saldoCP, $clientePrincipal);

        $tranferiu = $transacaoDAO->addTransferencia($clientePrincipal, $valorEnviado);
        
        $valorAtualReceptor = $transacaoDAO->valorAtual($idClienteReceptor);
        print ($idClienteReceptor);}}
        
/*
        $novoSaldoReceptor = $transacaoDAO->somaDeValores($valorAtualReceptor, $valorEnviado);

        $transferencia = $transacaoDAO->atualizarSaldo($novoSaldoReceptor, $idClienteReceptor);

        $tranferiu = $transacaoDAO->addTransferencia($idClienteReceptor, $valorEnviado);
    }else{
        echo "Você precisa de um saldo maior";
    }
}else{
    echo "Este cliente não existe";
}


?>