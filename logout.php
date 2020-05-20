<?php 
session_start();
session_destroy();

$msg = "Sessão Finalizada";
header("Location: index.php?msg=$msg");

 ?>