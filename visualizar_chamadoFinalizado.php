<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 
	require 'classes/Chamado.php';
	require 'classes/ChamadoDAO.php';

	$chamado = new Chamado();

	if(isset($_GET['id']) && $_GET['id'] != ''){
		$id = $_GET['id'];
		$chamadoDAO = new ChamadoDAO();
		$chamado = $chamadoDAO->get($id);
	}

	$id = $_SESSION['id_funcionario'];
?>



<div class="content-wrapper">
  	<div class="container-fluid">
	  	<div class="h3topo" style="text-align: center; margin-top: 20px;">
            <h3>Visualizar Chamado</h3>
        </div><br>
		<div class="card text-center">
		<div class="card-header">
			<h5>Chamado Número <?php echo $chamado->getId() ?></strong></h5>
		</div>
			<div class="card-body">
				<div class="container">
					<label>Status: <?php echo $chamado->getStatus() ?></label><br>
					<label>Data da abertura: <?php echo $chamado->getAbertura() ?></label><br>
					<label>Cliente: <?php echo $chamado->getIdCliente() ?></label><br>
					<label>Equipamento: <?php echo $chamado->getEquipamento() ?></label><br>
					<label>Descrição: <?php echo $chamado->getDescricao() ?></label><br>
				</div>
				<a href="chamado_espera.php" class="btn btn-primary">Voltar</a>
				<a href="pdf_chamado_finalizado.php?id=<?= $chamado->getId() ?>" class="btn btn-success"><i class="fas fa-file-pdf"></i></a>
			</div>
		</div>
	</div>
</div>



<?php include './layout/footer.php'; ?> 



