<?php
    namespace dimensoes;

    /**
        *Model da entidade Cliente;
        *@author Gilson Castanheira  
    */

    class Cliente {
        /**
            *CPF do Cliente
            *@var string    
        */
        public $cpf;
        /**
            *Nome do Cliente
            *@var string    
        */
        public $nome;
        /**
            *Sexo do Cliente
            *@var string    
        */
        public $sexo;
        /**
            *Idade do Cliente
            *@var string    
        */
        public $idade;
        /**
            *Email do Cliente
            *@var string    
        */
        public $email;
        /**
            *Rua do Cliente
            *@var string    
        */
        public $rua;
        /**
            *Bairro do Cliente
            *@var string    
        */
        public $bairro;
        /**
            *Cidade do Cliente
            *@var string    
        */
        public $cidade;
        /**
            *UF do Cliente
            *@var string    
        */
        public $uf;

        /**
            *Carrega os atributos da Classe Prospect
            *@param $cpf CPF do Cliente 
            *@param $nome Nome do Cliente
            *@param $sexo Sexo do Cliente
            *@param $idade Idade do Cliente
            *@param $rua Rua do Cliente
            *@param $bairro Bairro do Cliente
            *@param $cidade Cidade do Cliente
            *@param $uf UF do Cliente
            *@return Void
        */
        public function setCliente($cpf, $nome, $sexo, $idade, $rua, $bairro, $cidade, $uf){
            $this->cpf= $cpf;
            $this->nome = $nome;
            $this->sexo = $sexo;
            $this->idade = $idade;
            $this->rua = $rua;
            $this->bairro = $bairro;
            $this->cidade = $cidade;
            $this->uf = $uf;
        }
        
    }
?>