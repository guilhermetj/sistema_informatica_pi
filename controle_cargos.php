<?php 
require 'classes/Cargos.php';
require 'classes/CargosDAO.php';

$cargos = new Cargos();
$cargosDAO = new CargosDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != ''){
	$id = $_GET['id'];
}

if ($acao == 'deletar') {
	deletar($cargosDAO, $id);
	$msg = 'Deletado com Sucesso';

} else if ($acao == 'cadastrar'){
	cadastrar($cargosDAO, $cargos);
	$msg = 'Cadastrado com Sucesso';
} else if ($acao == 'editar'){
	editar($cargosDAO, $cargos, $id);
	$msg = 'Editado com Sucesso';
}


function cadastrar($cargosDAO, $cargos){

$cargos->setNome($_POST['nome']);
$cargosDAO->insereCargos($cargos);

}
function editar($cargosDAO, $cargos, $id){

$cargos->setId($_POST['id']);
$cargos->setNome($_POST['nome']);
$cargosDAO->alteraCargos($cargos);

}
function deletar($cargosDAO, $id){
	 $cargosDAO->deletar($id);
}
header("Location: permissoes.php?msg=$msg");