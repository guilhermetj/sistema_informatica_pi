<?php
require_once 'Model.php';
class PermissaoDAO extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'permissoes';
        $this->class = 'Permissao';
    }

    public function listarPermissao()
    {
        $sql = "SELECT p.*, c.nome AS nome_cargo, co.nome AS nome_controle FROM {$this->tabela} p 
        LEFT JOIN cargos c ON c.id = p.id_cargo
        LEFT JOIN controles co ON co.id = p.id_controle
        ORDER BY p.id_cargo DESC
        ";
        /*var_dump($sql);exit;*/
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function inserePermissao(Permissao $permissao) {
    	$values = "null, 
                    '{$permissao->getIdControle()}', 
                    '{$permissao->getIdCargo()}',  
                    '{$permissao->getLer()}', 
                    '{$permissao->getEditar()}', 
                    '{$permissao->getCadastrar()}', 
                    '{$permissao->getDeletar()}'";
    	return $this->inserir($values);
    }
        public function alteraPermissao(Permissao $permissao) {
        $values = "
        id_controle = '{$permissao->getIdControle()}',
        id_cargo = '{$permissao->getIdCargo()}',
        ler = '{$permissao->getLer()}',
        editar = '{$permissao->getEditar()}',
        cadastrar = '{$permissao->getCadastrar()}',
        deletar = '{$permissao->getDeletar()}'";                      
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
/*
    public function listarControles($condicao = '')
    {
        $where = '';
        if($condicao != '') {
            $where = " WHERE {$condicao}";
        }
        $sql = "SELECT p.*, c.nome as controle FROM {$this->tabela} p
                LEFT JOIN controles c ON c.id = p.controle_id
                 {$where}
                 ORDER BY controle";
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function verificaControlePerfil($id_controle, $id_perfil)
    {
        $sql = "SELECT * FROM {$this->tabela}
                WHERE controle_id = {$id_controle} AND perfil_id = {$id_perfil}";
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetch();
    }*/
}