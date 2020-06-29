<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 
	require 'classes/Funcionario.php'; 
	require 'classes/FuncionarioDAO.php';
    require 'classes/Estados.php'; 
    require 'classes/EstadosDAO.php';
    require 'classes/Cargos.php';
    require 'classes/CargosDAO.php';

	$funcionario = new Funcionario();

    $estadosDAO = new EstadosDAO();
    $estados = $estadosDAO->listar();

    $cargosDAO = new CargosDAO();
    $cargos = $cargosDAO->listar();

	
	if(isset($_GET['id']) && $_GET['id'] != ''){
		$id = $_GET['id'];
		$funcionarioDAO = new FuncionarioDAO();
		$funcionario = $funcionarioDAO->getFuncionario($id);
	}
?>

<div class="content-wrapper">
  	<div class="container-fluid">	
	  	<div class="h3topo" style="text-align: center; margin-top: 20px;">
            <h3>Visualizar funcionário</h3>
        </div><br>
		<div class="card text-center" style="margin-bottom: 80px;">
			<div class="card-header">
				<h5>Nome: <?php echo $funcionario->getNome() ?></h5>
			</div>
			<div class="card-body">
				<div class="container">
					<label><strong>Nome: </strong><?php echo $funcionario->getNome() ?></label><br>
					<label><strong>CPF: </strong><?php echo $funcionario->getCpf() ?></label><br>
					<label><strong>E-mail: </strong><?php echo $funcionario->getEmail() ?></label><br>
					<label><strong>Cep: </strong><?php echo $funcionario->getCep() ?></label><br>
					<label><strong>Telefone: </strong><?php echo $funcionario->getTelefone() ?></label><br>
					<label><strong>Titulo de Eleitor: </strong><?php echo $funcionario->getTituloEleitor() ?></label><br>
					<label><strong>CTPS: </strong><?php echo $funcionario->getCtps() ?><br>
					<label><strong>Sexo: </strong><?php echo $funcionario->getSexo() ?></label><br>
					<label><strong>RG: </strong><?php echo $funcionario->getRg() ?></label><br>
					<label><strong>Escolaridade: </strong><?php echo $funcionario->getEscolaridade() ?></label><br>
					<label><strong>Estado: </strong><?php echo $funcionario->getEstado() ?></label><br>
					<label><strong>Endereço: </strong><?php echo $funcionario->getEndereco() ?></label><br>
					<label><strong>Nascimento: </strong><?php echo $funcionario->getNascimento() ?></label><br>
					<label><strong>Cargo: </strong><?= $funcionario->nome_cargo; ?></label><br>
					<label><strong>Criado em : </strong><?php echo $funcionario->getCreated() ?></label><br>
				</div>
				<a href="funcionario.php" class="btn btn-primary">Voltar</a>
			</div>
		</div>
	</div>
</div>


<?php include './layout/footer.php'; ?> 