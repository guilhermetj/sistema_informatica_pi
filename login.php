<?php 
session_start();
require 'classes/Funcionario.php';
require 'classes/FuncionarioDAO.php';
$funcionarioDAO = new FuncionarioDAO();

$email = $_POST['email'];
$senha = $_POST['senha'];

$funcionario = $funcionarioDAO->getLogin($email, $senha);

if (empty($funcionario)) {
	session_destroy();
	$msg = 'Usuário Invalido';
	header("Location:index.php?msg=$msg");
}else {
	$_SESSION['nome'] = $funcionario->getNome();
	$_SESSION['email'] = $funcionario->getEmail();
	$_SESSION['id_funcionario'] = $funcionario->getID();

	$msg = 'Usuário logado com sucesso!';
	header("Location:adm.php?msg=$msg");
}
 ?>
