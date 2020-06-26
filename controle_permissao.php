<?php 
require 'classes/Permissao.php';
require 'classes/PermissaoDAO.php';



$permissao = new Permissao();
$permissaoDAO = new PermissaoDAO();
$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != ''){
	$id = $_GET['id'];
}

if ($acao == 'deletar') {
	deletar($permissaoDAO, $id);
	$msg = 'Deletado com Sucesso';

} else if ($acao == 'cadastrar'){
	cadastrar($permissaoDAO, $permissao);
	$msg = 'Cadastrado com Sucesso';
} else if ($acao == 'editar'){
	editar($permissaoDAODAO, $permissaoDAO, $id);
	$msg = 'Editado com Sucesso';
}


function cadastrar($permissaoDAO, $permissao){

$permissao->setIdControle($_POST['id_controle']);
$permissao->setIdCargo($_POST['id_cargo']);
$permissao->setCadastrar($_POST['cadastro']);
$permissao->setEditar($_POST['editar']);
$permissao->setLer($_POST['ler']);
$permissao->setDeletar($_POST['delete']);
$permissaoDAO->inserePermissao($permissao);

}
function editar($permissaoDAO, $permissao, $id){

$funcionario->setId($_POST['id']);
$permissao->setIdControle($_POST['id_controle']);
$permissao->setIdCargo($_POST['id_cargo']);
$permissao->setCadastrar($_POST['cadastro']);
$permissao->setEditar($_POST['editar']);
$permissao->setLer($_POST['ler']);
$permissao->setDeletar($_POST['delete']);
$permissaoDAO->alteraPermissao($permissao);

}
function deletar($permissaoDAO, $id){
	 $permissaoDAO->deletar($id);
}
header("Location: permissoes.php?msg=$msg");