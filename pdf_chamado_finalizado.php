
<?php 
	require_once 'vendor/autoload.php';
	require 'classes/Chamado.php';
	require 'classes/ChamadoDAO.php';
	require 'classes/HistoricoChamado.php';
	require 'classes/HistoricoChamadoDAO.php';

	$chamado = new Chamado();
	$mpdf = new \Mpdf\Mpdf();
	$id = $_GET['id'];
	$chamadoDAO = new ChamadoDAO();
	$chamado = $chamadoDAO->getChamado($id);
	$historicoChamadoDAO = new HistoricoChamadoDAO();
    $historicoChamados = $historicoChamadoDAO->getHistorico($id);

$html  = "
<style>
#img {
	text-align : center;
}
img {
	height: 150px;
}
#center{
	text-align : center;
}
</style>




";



$html .= "
<div id='img'>
<img src='assets/img/logo.png'>
</div>
<h2 id='center'>Chamado Numero " .$chamado->getId()."</h2>
<br>
<br>
<label>Cliente:</label> ".$chamado->nome_cliente."
<br>
<br>
<label>Funcionario:</label> ".$chamado->nome_funcionario."
<br>
<br>
<label>Status do chamado:</label> ".$chamado->getStatus()."
<br>
<br>
<label>Equipamento:</label> ".$chamado->getEquipamento()."
<br>
<br>
<label>Aberto dia:</label> ".$chamado->getAbertura()."
<br>
<br>
<label>Encerrado dia:</label> ".$chamado->getEncerramento()."
<br>
<br>
<h2 id='center'>Historico do chamado</h2><hr>
";
foreach ($historicoChamados as $historicoChamado){

	$html.= "<label>Funcionario:</label> ".$historicoChamado->nome."<br>
			<label>Data:</label> ".$historicoChamado->getDtHistorico()."<br>
			<label>Descrição:</label> ".$historicoChamado->getDescricao()."<br>
			<label>Solução:</label> ".$historicoChamado->getSolucao()."<br><hr>";
}

$arquivo = "lista.pdf";



$mpdf->WriteHTML($html);

$mpdf->Output($arquivo,'I');


 ?>
<?php include './layout/footer.php'; ?> 