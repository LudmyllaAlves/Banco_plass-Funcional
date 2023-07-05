<?php
class transacaoDAO{
    public function addTransferencia($idCliente,$transferiu){
        $query = "INSERT INTO `transacao` (`id_cliente`, `transferiu`)
                VALUES ('$idCliente', '$transferiu' )";
        $configDB = new ConfigBD;
        $conn = $configDB->getConfig();
        $executar = mysqli_query($conn, $query);
        return $executar;
    }

    public function addSaque($idCliente,$sacou){
        $query = "INSERT INTO `transacao` (`id_cliente`, `sacou`)
                VALUES ('$idCliente', '$sacou' )";
        $configDB = new ConfigBD;
        $conn = $configDB->getConfig();
        $executar = mysqli_query($conn, $query);
        return $executar;
    }

    public function addDeposito($idCliente,$depositou){
        $query = "INSERT INTO `transacao` (`id_cliente`, `depositou`)
                VALUES ('$idCliente', '$depositou' )";
        $configDB = new ConfigBD;
        $conn = $configDB->getConfig();
        $executar = mysqli_query($conn, $query);
        return $executar;
    }

    public function valorAtual($idCliente){
        $query = " SELECT * FROM 
        saldo WHERE id_cliente = $idCliente";
        $dao = new DAO();
        $linha = $dao->selecionar1LinhaSQL($query);
        return $linha['valor'];
    }

    public function subtracaoDeValores($valorAtual, $valorEnviado){
        $resultado = $valorAtual - $valorEnviado;
        return $resultado;
    }

    public function corrigirValores($valor){
        $corigindo= str_replace('.','',$valor);
        $valorCorigido = str_replace(',','.',$corigindo);
    
        return $valorCorigido;
    }

    public function corrigirValorString($valor){
        $corigindo= str_replace('.','',$valor);
        $valorCorigido = str_replace(',','.',$corigindo);
        return $valorCorigido;
    }

    public function atualizarSaldo($valorCalculado, $idCliente){
        $configDB = new ConfigBD;
        $conn = $configDB->getConfig();
        $query= "UPDATE saldo SET valor = $valorCalculado WHERE id_cliente= $idCliente";
        $NovoSaldo = mysqli_query($conn, $query);

        return $NovoSaldo;
    }

    public function somaDeValores($saldoAnterior, $valorRecebido){
        $resultado = $saldoAnterior + $valorRecebido;
        return $resultado;
    }
    public function criarConta($idCliente){
        $query1 = "INSERT INTO `saldo` (`id_cliente`, `valor`)
                VALUES ('$idCliente', 0)";
            $configDB = new ConfigBD;
            $conn = $configDB->getConfig();
            $executar = mysqli_query($conn, $query1);
            return $executar;
    }

    
}
?>