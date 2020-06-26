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

<style>
    .container {
        margin-bottom: 50px;
    }
    .funcionario {
        margin: 0 auto;
        padding: 0 auto;
        width: 50%;
        margin-right: 210px;

    }
    spam {
        color: #A9A9A9;
    }
</style>

<div class="container">

	<div class="container">
	<label>Nome: <?php echo $funcionario->getNome() ?></label><br>
	<label>CPF: <?php echo $funcionario->getCpf() ?></label><br>
	<label>E-mail: <?php echo $funcionario->getEmail() ?></label><br>
	<label>Cep: <?php echo $funcionario->getCep() ?></label><br>
	<label>Telefone: <?php echo $funcionario->getTelefone() ?></label><br>
	<label>Titulo de Eleitor: <?php echo $funcionario->getTituloEleitor() ?></label><br>
	<label>CTPS: <?php echo $funcionario->getCtps() ?><br>
	<label>Sexo: <?php echo $funcionario->getSexo() ?></label><br>
	<label>RG: <?php echo $funcionario->getRg() ?></label><br>
	<label>Escolaridade: <?php echo $funcionario->getEscolaridade() ?></label><br>
	<label>Estado: <?php echo $funcionario->getEstado() ?></label><br>
	<label>Endereço: <?php echo $funcionario->getEndereco() ?></label><br>
	<label>Nascimento: <?php echo $funcionario->getNascimento() ?></label><br>
	<label>Cargo: <?= $funcionario->nome_cargo; ?></label><br>
	<label>Criado em : <?php echo $funcionario->getCreated() ?></label><br>
	</div>
	<div class="container">
		<a href="funcionario.php" class="btn btn-primary">Voltar</a>
	</div>
</div>

<?php include './layout/footer.php'; ?> 