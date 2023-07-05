<?php
include('../config.php');
include('../model/clienteDAO.php');
include('../DAO.php');
include('../model/cliente.php');


    $configDB = new ConfigBD;
    $conn = $configDB->getConfig();
    //Lista de cobranca de um cobrador especifico
    $clientesDAO= new ClienteDAO();
    $lista = $clientesDAO->getClientes();

    $listadeCobrancas= json_encode($lista);

    print($listadeCobrancas);
?>
