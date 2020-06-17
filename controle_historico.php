<?php 
require 'classes/HistoricoChamado.php';
require 'classes/HistoricoChamadoDAO.php';

$historicoChamado = new HistoricoChamado();
$historicoChamadoDAO = new HistoricoChamadoDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != ''){
	$id = $_GET['id'];
}

if ($acao == 'deletar') {
	deletar($historicoChamadoDAO, $id);
	$msg = 'Deletado com Sucesso';

} else if ($acao == 'cadastrar'){
	cadastrar($historicoChamadoDAO, $historicoChamado);
	$msg = 'Historico Cadastrado com Sucesso';
} else if ($acao == 'editar'){
	editar($historicoChamadoDAO, $historicoChamado, $id);
	$msg = 'Editado com Sucesso';
}


function cadastrar($historicoChamadoDAO, $historicoChamado){

$historicoChamado->setIdChamado($_POST['id_chamado']);
$historicoChamado->setIdFuncionario($_POST['id_funcionario']);
$historicoChamado->setDescricao($_POST['descricao']);
$historicoChamado->setSolucao($_POST['solucao']);
$historicoChamadoDAO->inserehistoricoChamado($historicoChamado);

}
function deletar($historicoChamadoDAO, $id){
	 $historicoChamadoDAO->deletar($id);
}
header("Location: form_chamado.php?msg=$msg");