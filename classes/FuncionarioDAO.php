<?php
require 'Model.php';
class FuncionarioDAO extends Model
{   
    public function __construct() {
    	parent::__construct();
    	$this->tabela = 'funcionario';
    	$this->class = 'Funcionario';
    }
    public function insereFuncionario(Funcionario $funcionario){
    	$values = "null, 
        '{$funcionario->getNome()}', 
        '{$funcionario->getCpf()}',
        '{$funcionario->getRg()}',  
        '{$funcionario->getEmail()}',
        '{$funcionario->getCep()}',
        '{$funcionario->getCargo()}',
        '{$funcionario->getTelefone()}',
        '{$funcionario->getTituloEleitor()}',
        '{$funcionario->getHistoricoEscolar()}',
        '{$funcionario->getCtps()}',
        '{$funcionario->getSexo()}',
        '{$funcionario->getSenha()}',
        NOW()
        ";
    	return $this->inserir($values);
    }




 public function alterafuncionario(funcionario $funcionario){
    	$values = " 
        nome = '{$funcionario->getNome()}', 
        cpf = '{$funcionario->getCpf()}',
        rg = '{$funcionario->getRg()}',  
        email= '{$funcionario->getEmail()}',
        cep ='{$funcionario->getCep()}',
        cargo ='{$funcionario->getCargo()}',
        telefone ='{$funcionario->getTelefone()}',
        tituloEleitor = '{$funcionario->getTituloEleitor()}',
        historicoEscolar ='{$funcionario->getHistoricoEscolar()}',
        ctps ='{$funcionario->getCtps()}',
        sexo ='{$funcionario->getSexo()}',
        senha ='{$funcionario->getSenha()}'
        ";
    	$this->alterar($funcionario->getId(), $values);
} 
}