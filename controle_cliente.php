<?php 
require 'classes/Cliente.php';
require 'classes/ClienteDAO.php';

$cliente = new Cliente();
$clienteDAO = new ClienteDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != ''){
	$id = $_GET['id'];
}

if ($acao == 'deletar') {
	deletar($clienteDAO, $id);
	$msg = 'Deletado com Sucesso';

} else if ($acao == 'cadastrar'){
	cadastrar($clienteDAO, $cliente);
	$msg = 'Cadastrado com Sucesso';
} else if ($acao == 'editar'){
	editar($clienteDAO, $cliente, $id);
	$msg = 'Editado com Sucesso';
}


function cadastrar($clienteDAO, $cliente){

$cliente->setNome($_POST['nome']);
$cliente->setCpf($_POST['cpf']);
$cliente->setTelefone($_POST['telefone']);
$cliente->setSexo($_POST['sexo']);
$cliente->setEmail($_POST['email']);
$cliente->setCep($_POST['cep']);
$cliente->setEndereco($_POST['endereco']);
$clienteDAO->inserecliente($cliente);

}
function editar($clienteDAO, $cliente, $id){

$cliente->setId($_POST['id']);
$cliente->setNome($_POST['nome']);
$cliente->setCpf($_POST['cpf']);
$cliente->setTelefone($_POST['telefone']);
$cliente->setSexo($_POST['sexo']);
$cliente->setEmail($_POST['email']);
$cliente->setCep($_POST['cep']);
$cliente->setEndereco($_POST['endereco']);
$clienteDAO->alteracliente($cliente);

}
function deletar($clienteDAO, $id){
	 $clienteDAO->deletar($id);
}
header("Location: cliente.php?msg=$msg");