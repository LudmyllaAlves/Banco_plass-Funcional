<?php
class ClienteDAO{
    public function addCliente($nome, $cpfCpnj, $telefone, $endereco, $senha){
        $query = "INSERT INTO `cliente` (`nome`, `cpf_cnpj`, `telefone`, `endereco`, `senha`)
                VALUES ('$nome', '$cpfCpnj', '$telefone',  '$endereco', '$senha')";
        $configDB = new ConfigBD;
        $conn = $configDB->getConfig();
        $executar = mysqli_query($conn, $query);
        return $executar;
    }

    public function getClientes(){
        $query= "SELECT  * FROM cliente";
            
            $dao = new DAO();
            $resultado = $dao->selecionarNLinhasSQL($query);
            $clientes=array();
            
            while ($linha = mysqli_fetch_assoc($resultado)) {
                
                $cliente = new Cliente();
                $cliente->idCliente = $linha["id_cliente"];
                $cliente->nome = $linha["nome"];
                $cliente->cpfCnpj = $linha["cpf_cnpj"];
                $cliente-> telefone = $linha["telefone"];
                $cliente-> endereco= $linha["endereco"];
                $cliente-> senha= $linha["senha"];
                
                array_push($clientes, $cliente);
            }
            return $clientes;
    }

    function formatCnpjCpf($value){
        $CPF_LENGTH = 11;
        $cpfCnpj = preg_replace("/\D/", '', $value);
        
        if (strlen($cpfCnpj) === $CPF_LENGTH) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpfCnpj);
        } 
        
        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cpfCnpj);
    }

    function telefone($n){
        $tam = strlen(preg_replace("/[^0-9]/", "", $n));
        
        if ($tam == 13) {
            // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
            return "+".substr($n, 0, $tam-11)." (".substr($n, $tam-11, 2).") ".substr($n, $tam-9, 5)."-".substr($n, -4);
        }
        if ($tam == 12) {
            // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
            return "+".substr($n, 0, $tam-10)." (".substr($n, $tam-10, 2).") ".substr($n, $tam-8, 4)."-".substr($n, -4);
        }
        if ($tam == 11) {
            // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
            return " (".substr($n, 0, 2).") ".substr($n, 2, 5)."-".substr($n, 7, 11);
        }
        if ($tam == 10) {
            // COM CÓDIGO DE ÁREA NACIONAL
            return " (".substr($n, 0, 2).") ".substr($n, 2, 4)."-".substr($n, 6, 10);
        }
        if ($tam <= 9) {
            // SEM CÓDIGO DE ÁREA
            return substr($n, 0, $tam-4)."-".substr($n, -4);
        }
    }

    public function validarLogin($cpfCnpj, $senha){
        $query =
        " SELECT * ".
        "   FROM cliente ".
        "  WHERE cpf_cnpj= '".$cpfCnpj."'".
        "    AND senha= '".$senha."'";
        
        $dao = new DAO();
        $resultado = $dao->selecionar1LinhaSQL($query);

        $id = 0;
        try {
            if (isset($resultado["id_cliente"]) ){
                $id = $resultado["id_cliente"];
            }
        } catch(Exception $e) {
            $id =0;
        }
        
        $retorno = -1;
        if ($id>=1){
            $retorno = $id;
        }
        return $retorno;
    }

    public function verificaCliente($cpfCnpj){
        $query =
        " SELECT * ".
        "   FROM cliente ".
        "  WHERE cpf_cnpj= '".$cpfCnpj."'";
        
        $dao = new DAO();
        $resultado = $dao->selecionar1LinhaSQL($query);

        $id =0;
        try {
            if (isset($resultado["id_cliente"]) ){
                $id = $resultado["id_cliente"];
            }
        } catch(Exception $e) {
            $id =0;
        }
        
        $retorno = -1;
        if ($id>=1){
            $retorno = $id;
        }
        return $retorno;
    }

    public function getCliente($cpfCnpj){
            $query = " SELECT id_cliente FROM cliente WHERE cpf_cnpj= '".$cpfCnpj."'" ;
            $dao = new DAO();
            $linha = $dao->selecionar1LinhaSQL($query);
            $cliente= new Cliente();
            $cliente= $linha["id_cliente"];
            return $cliente;  
    }
    public function getNome($cpfCnpj){
        $query = " SELECT nome FROM cliente WHERE cpf_cnpj= '".$cpfCnpj."'" ;
        $dao = new DAO();
        $linha = $dao->selecionar1LinhaSQL($query);
        $cliente= new Cliente();
        $cliente= $linha["nome"];
        return $cliente;  
}
}





?>