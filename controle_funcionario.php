<?php 
require 'classes/Funcionario.php';
require 'classes/FuncionarioDAO.php';

$funcionario = new Funcionario();
$funcionarioDAO = new FuncionarioDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != ''){
	$id = $_GET['id'];
}

if ($acao == 'deletar') {
	deletar($funcionarioDAO, $id);
	$msg = 'Deletado com Sucesso';

} else if ($acao == 'cadastrar'){
	cadastrar($funcionarioDAO, $funcionario);
	$msg = 'Cadastrado com Sucesso';
} else if ($acao == 'editar'){
	editar($funcionarioDAO, $funcionario, $id);
	$msg = 'Editado com Sucesso';
}


function cadastrar($funcionarioDAO, $funcionario){

$funcionario->setNome($_POST['nome']);
$funcionario->setCpf($_POST['cpf']);
$funcionario->setRg($_POST['rg']);
$funcionario->setEmail($_POST['email']);
$funcionario->setCep($_POST['cep']);
$funcionario->setCargo($_POST['cargo']);
$funcionario->setTelefone($_POST['telefone']);
$funcionario->setTituloEleitor($_POST['tituloEleitor']);
$funcionario->setHistoricoEscolar($_POST['historicoEscolar']);
$funcionario->setCtps($_POST['ctps']);
$funcionario->setSexo($_POST['sexo']);
$funcionario->setSenha($_POST['senha']);
$funcionarioDAO->insereFuncionario($funcionario);

}
function editar($funcionarioDAO, $funcionario, $id){

$funcionario->setId($_POST['id']);
$funcionario->setNome($_POST['nome']);
$funcionario->setCpf($_POST['cpf']);
$funcionario->setRg($_POST['rg']);
$funcionario->setEmail($_POST['email']);
$funcionario->setCep($_POST['cep']);
$funcionario->setCargo($_POST['cargo']);
$funcionario->setTelefone($_POST['telefone']);
$funcionario->setTituloEleitor($_POST['tituloEleitor']);
$funcionario->setHistoricoEscolar($_POST['historicoEscolar']);
$funcionario->setCtps($_POST['ctps']);
$funcionario->setSexo($_POST['sexo']);
$funcionario->setSenha($_POST['senha']);
$funcionarioDAO->alterafuncionario($funcionario);

}
function deletar($funcionarioDAO, $id){
	 $funcionarioDAO->deletar($id);
}
header("Location: funcionario.php?msg=$msg");