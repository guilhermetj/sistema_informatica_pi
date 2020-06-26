<?php 
require 'classes/Controle.php';
require 'classes/ControleDAO.php';

$controle = new Controle();
$controleDAO = new ControleDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != ''){
	$id = $_GET['id'];
}

if ($acao == 'deletar') {
	deletar($controleDAO, $id);
	$msg = 'Deletado com Sucesso';

} else if ($acao == 'cadastrar'){
	cadastrar($controleDAO, $controle);
	$msg = 'Cadastrado com Sucesso';
} else if ($acao == 'editar'){
	editar($controleDAO, $controle, $id);
	$msg = 'Editado com Sucesso';
}


function cadastrar($controleDAO, $controle){

$controle->setNome($_POST['nome']);
$controleDAO->insereControle($controle);

}
function editar($controleDAO, $controle, $id){

$controle->setId($_POST['id']);
$controle->setNome($_POST['nome']);
$cargosDAO->alteraControle($controle);

}
function deletar($controleDAO, $id){
	 $controleDAO->deletar($id);
}
header("Location: permissoes.php?msg=$msg");