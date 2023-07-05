<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header ('Content-type:application/json');
include('../model/clienteDAO.php');
include('../DAO.php');
include('../config.php');
include('../model/cliente.php');
include ('../model/transacao.php');
include('../model/transacaoDAO.php');

$clienteDAO = new ClienteDAO();
$_SESSION['nome'] = $_POST['nome'];
$_SESSION['cpfcnpj'] = $clienteDAO->formatCnpjCpf($_POST['cpfcnpj']);
$telefone = $clienteDAO->telefone($_POST['telefone']);
$endereco= $_POST['endereco'];
$senha= $_POST ['senha'];


$validando= $clienteDAO-> verificaCliente($_SESSION['cpfcnpj']);

if($_SESSION['nome'] != 0){
    if($_SESSION['cpfcnpj'] !=0){
        if($telefone != 0){
            if($endereco != 0){
                if($senha !=0){
                    if($validando <= 0){
                        $cadastrar = $clienteDAO->addCliente($_SESSION['nome'], $_SESSION['cpfcnpj'], $telefone, $endereco, $senha);
                        if($cadastrar !=null){
                            $transacaoDAO = new transacaoDAO();
                            $idCliente = $clienteDAO->getCliente($_SESSION['cpfcnpj']);
                            $criarConta= $transacaoDAO->criarConta($idCliente);
                            echo("Bem-vindo!!!");
                        }
                        else{
                            echo "não foi possivel criar conta";
                        }
                    }else{
                        echo("Usuario não pode ser cadastrado");
                    }
                }else{
                    echo "Você precisa preenche todos os campos";
                }
            }else{
                echo "Você precisa preenche todos os campos";
            }
        }else{
            echo "Você precisa preenche todos os campos";
        }
    }else{
        echo "Você precisa preenche todos os campos";
    }
}else{
    echo "Você precisa preenche todos os campos";
}

?>

