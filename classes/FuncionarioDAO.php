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
        '{$funcionario->getNascimento()}',  
        '{$funcionario->getEmail()}',
        '{$funcionario->getEndereco()}',
        '{$funcionario->getCep()}',
        '{$funcionario->getEstado()}',
        '{$funcionario->getTelefone()}',
        '{$funcionario->getTituloEleitor()}',
        '{$funcionario->getEscolaridade()}',
        '{$funcionario->getCtps()}',
        '{$funcionario->getSexo()}',
        '{$funcionario->getSenha()}',
        '{$funcionario->getIdCargo()}',
        NOW()
        ";
    	return $this->inserir($values);
    }




 public function alterafuncionario(funcionario $funcionario){
    	$values = " 
        nome = '{$funcionario->getNome()}', 
        cpf = '{$funcionario->getCpf()}',
        rg = '{$funcionario->getRg()}', 
        nascimento = '{$funcionario->getNascimento()}',  
        email= '{$funcionario->getEmail()}',
        endereco= '{$funcionario->getEndereco()}',
        cep ='{$funcionario->getCep()}',
        estado ='{$funcionario->getEstado()}',
        telefone ='{$funcionario->getTelefone()}',
        tituloEleitor = '{$funcionario->getTituloEleitor()}',
        escolaridade ='{$funcionario->getEscolaridade()}',
        ctps ='{$funcionario->getCtps()}',
        sexo ='{$funcionario->getSexo()}',
        senha ='{$funcionario->getSenha()}',
        id_cargo ='{$funcionario->getIdCargo()}'
        ";
    	$this->alterar($funcionario->getId(), $values);
    } 

    public function getLogin($email, $senha){
        $sql = "SELECT * FROM {$this->tabela}
                WHERE email = :email AND senha = :senha";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetch();
    }
}