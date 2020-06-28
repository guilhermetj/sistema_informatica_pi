<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';
$chamadoDAO = new ChamadoDAO();
$funcionario = $_SESSION['id_funcionario'];
$chamados = $chamadoDAO->listarTodos($funcionario);
?>



<div class="content-wrapper">
  	<div class="container-fluid" style="margin-top: 30px;">
		  <div class="d_flex"></div>
			<div class="container">
				<div class="h3topo" style="text-align: center;">
        			<h3>Lista de tickets</h3>
    			</div><br>
				<div class="row">
				<?php foreach ($chamados as $chamado) { ?>
					<div class="col-sm-6">
						<div class="card">
						<div class="card-body">
							<h5 class="card-title">Chamado n° <?= $chamado->getid() ?></h5>
							<p class="card-text">Com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p>
							<a href="#" class="btn btn-primary">Visitar</a>
						</div>
						</div>
					</div>
				<?php } ?>
					<!-- <div class="col-sm-6">
						<div class="card">
						<div class="card-body">
							<h5 class="card-title">Chamado n° <?= $chamado->getid() ?></h5>
							<p class="card-text">Com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p>
							<a href="#" class="btn btn-primary">Visitar</a>
						</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div>





<?php include 'layout/footer.php'; ?>