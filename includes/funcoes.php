<?php
if(!isset($_SESSION['permissoes'])) session_start();

function retornaControle($controle = '')
{
	$permissoes = [];
	foreach($_SESSION['permissoes'] as $key => $data) {
	    if(array_search($controle, $_SESSION['permissoes'][$key])) {
			$permissoes = $_SESSION['permissoes'][$key];
			break;
		}
	}
	return $permissoes;
}