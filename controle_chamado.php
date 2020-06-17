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
	header("Location: chamado_espera.php?msg=$msg");
} else if ($acao == 'cadastrar'){
	cadastrar($chamadoDAO, $chamado);
	$msg = 'Cadastrado com Sucesso';
	header("Location: chamado_espera.php?msg=$msg");
} else if ($acao == 'editar'){
	editar($chamadoDAO, $chamado, $id);
	$msg = 'Editado com Sucesso';
	header("Location: chamado_andamento.php?msg=$msg");
} else if ($acao == 'finalizarChamado'){
	finalizarChamado($chamadoDAO, $id);
	$msg = 'Finalizado com Sucesso';
	header("Location: chamado_finalizado.php?msg=$msg");
} else if ($acao == 'aceitarChamado'){
	aceitarChamado($chamadoDAO, $chamado, $id);
	$msg = 'Aceito com Sucesso';
	header("Location: chamado_andamento.php?msg=$msg");
}


function cadastrar($chamadoDAO, $chamado){

$chamado->setIdCliente($_POST['id_cliente']);
$chamado->setStatus($_POST['status']);
$chamado->setEquipamento($_POST['equipamento']);
$chamado->setDescricao($_POST['descricao']);
$chamadoDAO->inserechamado($chamado);
}
function editar($chamadoDAO, $chamado, $id){

$chamado->setId($_POST['id']);
$chamado->setIdCliente($_POST['id_cliente']);
$chamado->setStatus($_POST['status']);
$chamado->setEquipamento($_POST['equipamento']);
$chamado->setDescricao($_POST['descricao']);
$chamadoDAO->alterachamado($chamado);
}
function finalizarChamado($chamadoDAO, $id){
$values = "

        status = 'Finalizado',
        encerramento = NOW()

        ";
$chamadoDAO->alterar($id, $values);
}
function aceitarChamado($chamadoDAO, $chamado, $id){

$chamado->setId($_POST['id']);
$chamado->setIdFuncionario($_POST['id_funcionario']);
$chamado->setStatus($_POST['status']);
$chamadoDAO->aceitarChamado($chamado);
}

function deletar($chamadoDAO, $id){
	 $chamadoDAO->deletar($id);
}
