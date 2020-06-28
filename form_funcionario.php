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
  .d_flex {
    margin: 0 250px 0 250px;
  }

  form {
      margin-bottom: 80px;
  }
</style>

<div class="content-wrapper">
    <div class="container-fluid" style="margin-top: 30px;">
        <div class="container">
        <div class="h3topo" style="text-align: center; margin-right: 55px;">
            <h3>Formulário de Funcionários</h3>
            <spam>Preencha todos os campos abaixo</spam>
        </div><br>
        <div class="d_flex">
            <form action="controle_funcionario.php?acao=<?= ($funcionario->getId() != '' ? 'editar' : 'cadastrar') ?>" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" id="id" value="<?=($funcionario->getId() != '' ? $funcionario->getId(): '')?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome" value="<?=($funcionario->getNome() != '' ? $funcionario->getNome(): '')?>" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="<?=($funcionario->getCpf() != '' ? $funcionario->getCpf(): '')?>" required>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" name="rg" id="rg" value="<?=($funcionario->getRg() != '' ? $funcionario->getRg(): '')?>" required>
                </div>
                <div class="form-group col-md-7">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?=($funcionario->getEmail() != '' ? $funcionario->getEmail(): '')?>" required>
                </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-7">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco"value="<?=($funcionario->getEndereco() != '' ? $funcionario->getEndereco(): '')?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" class="form-control" id="cep"value="<?=($funcionario->getCep() != '' ? $funcionario->getCep(): '')?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="estado">UF</label>
                            <select class="custom-select" name="estado"id="estado">
                                <?php foreach($estados as $estado){ ?>
                                        <option value="<?= $estado->getNome() ?>"><?= $estado->getUf() ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="<?=($funcionario->getTelefone() != '' ? $funcionario->getTelefone(): '')?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sexo">Sexo</label>
                            <select class="custom-select" name="sexo"id="sexo">
                                <option value="">Selecione</option>
                                <option value="Femenino"<?= ($funcionario->getSexo() == 'Feminino' ? 'selected="selected"' : '')?> >Feminino</option>
                                <option value="Masculino" <?= ($funcionario->getSexo() == 'Masculino' ? 'selected="selected"' : '') ?>>Masculino</option>
                                <option value="Não informado" <?= ($funcionario->getSexo() == 'Não informado' ? 'selected="selected"' : '') ?>>Não informado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="ctps">N° CTPS</label>
                            <input type="text" class="form-control" name="ctps" id="ctps" value="<?=($funcionario->getCtps() != '' ? $funcionario->getCtps(): '')?>" required>
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
                        <div class="form-group col-md-4">
                            <label for="tituloEleitor">Titulo Eleitor</label>
                            <input type="text" class="form-control" name="tituloEleitor" id="tituloEleitor" value="<?=($funcionario->getTituloEleitor() != '' ? $funcionario->getTituloEleitor(): '')?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="nascimento">Data de Nascimento</label>
                            <input class="form-control" type="date" name="nascimento" id="nascimento"value="<?=($funcionario->getNascimento() != '' ? $funcionario->getNascimento(): '')?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" value="<?=($funcionario->getSenha() != '' ? $funcionario->getSenha(): '')?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="id_cargos">Cargo</label>
                            <select class="custom-select" name="id_cargos"id="id_cargos">
                                <?php foreach($cargos as $cargo){ ?>
                                        <option value="<?= $cargo->getID() ?>"><?= $cargo->getNome() ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                <button type="submit" class="btn btn-success" href="funcionario.php" style="width: 91%;">Salvar</button>
            </form>
        </div>
    </div>
</div>


<?php include './layout/footer.php'; ?> 