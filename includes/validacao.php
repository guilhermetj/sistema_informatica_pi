<?php  
session_start();

if (empty($_SESSION['nome'])) {
	
$msg = "Sessão Finalizada";
header("Location: index.php?msg=$msg");
}