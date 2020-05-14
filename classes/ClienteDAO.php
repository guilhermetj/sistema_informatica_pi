<?php
require 'Model.php';
class ClienteDAO extends Model
{   
    public function __construct() {
    	parent::__construct();
    	$this->tabela = 'cliente';
    	$this->class = 'Cliente';
    }
    public function insereCliente(Cliente $cliente){
    	$values = "null, 
        '{$cliente->getNome()}', 
        '{$cliente->getCpf()}',
        '{$cliente->getTelefone()}',  
        '{$cliente->getSexo()}',
        '{$cliente->getEmail()}',
        '{$cliente->getCep()}',
        '{$cliente->getEndereco()}'

        ";
    	return $this->inserir($values);
    }
        public function alteraCliente(Cliente $cliente){
        $values = " 
        nome = '{$cliente->getNome()}', 
        cpf = '{$cliente->getCpf()}',
        telefone = '{$cliente->getTelefone()}',  
        sexo = '{$cliente->getSexo()}',
        email = '{$cliente->getEmail()}',
        cep = '{$cliente->getCep()}',
        endereco = '{$cliente->getEndereco()}'

        ";
        return $this->alterar($cliente->getId(), $values);
    }
}