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
$funcionario->setNascimento($_POST['nascimento']);
$funcionario->setEmail($_POST['email']);
$funcionario->setEndereco($_POST['endereco']);
$funcionario->setCep($_POST['cep']);
$funcionario->setEstado($_POST['estado']);
$funcionario->setTelefone($_POST['telefone']);
$funcionario->setTituloEleitor($_POST['tituloEleitor']);
$funcionario->setEscolaridade($_POST['escolaridade']);
$funcionario->setCtps($_POST['ctps']);
$funcionario->setSexo($_POST['sexo']);
$funcionario->setSenha($_POST['senha']);
$funcionario->setIdCargo($_POST['id_cargos']);
$funcionarioDAO->insereFuncionario($funcionario);

}
function editar($funcionarioDAO, $funcionario, $id){

$funcionario->setId($_POST['id']);
$funcionario->setNome($_POST['nome']);
$funcionario->setCpf($_POST['cpf']);
$funcionario->setRg($_POST['rg']);
$funcionario->setNascimento($_POST['nascimento']);
$funcionario->setEmail($_POST['email']);
$funcionario->setEndereco($_POST['endereco']);
$funcionario->setCep($_POST['cep']);
$funcionario->setEstado($_POST['estado']);
$funcionario->setTelefone($_POST['telefone']);
$funcionario->setTituloEleitor($_POST['tituloEleitor']);
$funcionario->setEscolaridade($_POST['escolaridade']);
$funcionario->setCtps($_POST['ctps']);
$funcionario->setSexo($_POST['sexo']);
$funcionario->setSenha($_POST['senha']);
$funcionario->setIdCargo($_POST['id_cargos']);
$funcionarioDAO->alterafuncionario($funcionario);

}
function deletar($funcionarioDAO, $id){
	 $funcionarioDAO->deletar($id);
}
header("Location: funcionario.php?msg=$msg");