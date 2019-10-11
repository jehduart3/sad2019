<?php
namespace dimensoes;
mysqli_report(MYSQLI_REPORT_STRICT);
require_once('Cliente.php');
use dimensoes\Cliente;


    class DimCliente{
        public function carregarDimCliente(){
            $dataAtual = date('Y-m-d'); 
            try{
            $connDimensao= $this->conectarBanco('dm_comercial');
            $connComercial= $this->conectarBanco('bd_comercial');
            }catch(\Exception $e){
                die($e->getMessage());
            }
            $sqlDim=$connDimensao->prepare('select SK_cliente, cpf, nome, sexo, idade, rua, bairro, cidade, uf from dm_cliente');
            $sqlDim->execute();
            $result = $sqlDim->get_result();

            if($result->num_rows === 0){
                $sqlComercial = $connComercial->prepare("select * from cliente");//Cria a variável com comando SQL
                $sqlComercial->execute();//Executa o comando SQL
                $resultComercial = $sqlComercial->get_result(); //Atribui a variavel o resultado da consulta
                if($resultComercial->num_rows !== 0){ //Teste se a consulta retornou dados
                    while($linhaCliente = $resultComercial->fetch_assoc()){ //Atribui a variavel cada linha até o ultimo
                        $cliente = new Cliente();
                        $linhaCliente->setCliente($linhaCliente['cpf'], $linhaCliente['nome'], $linhaCliente['sexo'], $linhaCliente['idade'], $linhaCliente['rua'], $linhaCliente['bairro'], $linhaCliente['cidade'], $linhaCliente['uf']);

                        $sqlInsertDim = $connDimensao->prepare("insert into dm_cliente(cpf,nome,sexo,idade,rua,bairro,cidade,uf,data_ini) values (?,?,?,?,?,?,?,?,?");

                        $sqlInsertDim->bind_param("ssssisssss", $cliente->cpf, $cliente->nome, $cliente->sexo, $cliente->idade, $cliente->rua, $cliente->bairro, $cliente->cidade, $cliente->cidade, $cliente->uf, $dataAtual);
                        
                        $sqlInsertDim->execute();
                    }
                    $sqlComercial->close();
                    $sqlDim->close();
                    $sqlInsertDim->close();
                    $connComercial->close();
                    $connDimensao->close();
                }
            }else{
                
            }
        }
        private function conectarBanco($banco){
            if(!defined('DS')){
                define('DS', DIRECTORY_SEPARATOR);
            }
            if(!defined('BASE_DIR')){
                define('BASE_DIR', dirname(__FILE__).DS);
            }
            require(BASE_DIR.'config.php');

            try{
                $conn = new \MySQLi($dbhost, $user, $password, $banco);
                return $conn;
            }catch(mysqli_sql_exception $e){
                throw new \Exception($e);
                die;
            }   
        }
    }

?>