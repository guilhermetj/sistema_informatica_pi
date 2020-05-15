<?php 
require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';

$chamado = new Chamado();
$chamadoDAO = new ChamadoDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != ''){
	$id = $_GET['id'];
}

if ($acao == 'deletar') {
	deletar($chamadoDAO, $id);
	$msg = 'Deletado com Sucesso';

} else if ($acao == 'cadastrar'){
	cadastrar($chamadoDAO, $chamado);
	$msg = 'Cadastrado com Sucesso';
} else if ($acao == 'editar'){
	editar($chamadoDAO, $chamado, $id);
	$msg = 'Editado com Sucesso';
}


function cadastrar($chamadoDAO, $chamado){

$chamado->setIdCliente($_POST['id_cliente']);
$chamado->setStatus($_POST['status']);
$chamado->setDescricao($_POST['descricao']);
$chamadoDAO->inserechamado($chamado);

}
function editar($chamadoDAO, $chamado, $id){

$chamado->setId($_POST['id']);
$chamado->setIdCliente($_POST['id_cliente']);
$chamado->setStatus($_POST['status']);
$chamado->setDescricao($_POST['descricao']);
$chamadoDAO->alterachamado($chamado);

}

function deletar($chamadoDAO, $id){
	 $chamadoDAO->deletar($id);
}
header("Location: chamado.php?msg=$msg");