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
		$funcionario = $funcionarioDAO->get($id);
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
<br>
    <div class="h3topo" style="text-align: center;">
        <h3>Gerenciar Funcionário</h3>
        <spam>Preencha todos os campos abaixo</spam>
    </div>
    <hr>
    <br>
    <div class=" col funcionario">
        <form action="controle_funcionario.php?acao=<?= ($funcionario->getId() != '' ? 'editar' : 'cadastrar') ?>" method="post">

            <div class="form-row">
                <div class="form-group col-md-6">
                <input type="hidden" name="id" id="id" value="<?=($funcionario->getId() != '' ? $funcionario->getId(): '')?>">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" value="<?=($funcionario->getNome() != '' ? $funcionario->getNome(): '')?>">
                </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="abertura">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?=($funcionario->getCpf() != '' ? $funcionario->getCpf(): '')?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="status">RG</label>
                    <input type="text" class="form-control" name="rg" id="rg" value="<?=($funcionario->getRg() != '' ? $funcionario->getRg(): '')?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?=($funcionario->getEmail() != '' ? $funcionario->getEmail(): '')?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco"value="<?=($funcionario->getEndereco() != '' ? $funcionario->getEndereco(): '')?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" class="form-control" id="cep"value="<?=($funcionario->getCep() != '' ? $funcionario->getCep(): '')?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="estado">UF</label>
                    <select class="custom-select" name="estado"id="estado">
                        <?php foreach($estados as $estado){ ?>
                                <option value="<?= $estado->getNome() ?>"><?= $estado->getUf() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?=($funcionario->getTelefone() != '' ? $funcionario->getTelefone(): '')?>">
                </div>
                <div class="form-group col-md-4">
					<label for="sexo">Sexo:</label>
					<select class="custom-select" name="sexo"id="sexo">
						<option value="">Selecione</option>
						<option value="Femenino"<?= ($funcionario->getSexo() == 'Feminino' ? 'selected="selected"' : '')?> >Feminino</option>
						<option value="Masculino" <?= ($funcionario->getSexo() == 'Masculino' ? 'selected="selected"' : '') ?>>Masculino</option>
						<option value="Não informado" <?= ($funcionario->getSexo() == 'Não informado' ? 'selected="selected"' : '') ?>>Não informado</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="ctps">N° CTPS</label>
					<input type="text" class="form-control" name="ctps" id="ctps" value="<?=($funcionario->getCtps() != '' ? $funcionario->getCtps(): '')?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="escolaridade">Escolaridade</label>
                    <select class="custom-select" name="escolaridade"id="escolaridade">
                        <option value="">Selecione</option>
                        <option value="Fundamental Incompleto"<?= ($funcionario->getEscolaridade() == 'Fundamental Incompleto' ? 'selected="selected"' : '')?> >Fundamental-Incompleto</option>
                        <option value="FundamentalCompleto"<?= ($funcionario->getEscolaridade() == 'Fundamental Completo' ? 'selected="selected"' : '')?> >
                        Fundamental - Completo</option>
                        <option value="MedioIncompleto"<?= ($funcionario->getEscolaridade() == 'Medio Incompleto' ? 'selected="selected"' : '')?> >
                        Médio - Incompleto</option>
                        <option value="MedioCompleto"<?= ($funcionario->getEscolaridade() == 'Medio Completo' ? 'selected="selected"' : '')?> >
                        Médio - Completo</option>
                        <option value="SuperiorIncompleto"<?= ($funcionario->getEscolaridade() == 'Superior Incompleto' ? 'selected="selected"' : '')?> >
                        Superior-Incompleto</option>                       
                        <option value="SuperiorCompleto"<?= ($funcionario->getEscolaridade() == 'Superior Completo' ? 'selected="selected"' : '')?> >
                        Superior-Completo</option>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="tituloEleitor">Titulo Eleitor</label>
					<input type="text" class="form-control" name="tituloEleitor" id="tituloEleitor" value="<?=($funcionario->getTituloEleitor() != '' ? $funcionario->getTituloEleitor(): '')?>">
                </div>
                    <div class="form-group col-md-6">
                    <label for="nascimento">Data de Nascimento</label>
                    <input class="form-control" type="date" name="nascimento" id="nascimento"value="<?=($funcionario->getNascimento() != '' ? $funcionario->getNascimento(): '')?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="senha">Senha</label>
					<input type="text" class="form-control" name="senha" id="senha" value="<?=($funcionario->getSenha() != '' ? $funcionario->getSenha(): '')?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="id_cargos">Cargo</label>
                    <select class="custom-select" name="id_cargos"id="id_cargos">
                        <?php foreach($cargos as $cargo){ ?>
                                <option value="<?= $cargo->getID() ?>"><?= $cargo->getNome() ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <br>
            <div style="text-align: center;  width: 450px;">
                <a href="funcionario.php" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
</div>

<?php include './layout/footer.php'; ?> 