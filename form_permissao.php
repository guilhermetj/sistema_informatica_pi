<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Permissao.php';
require 'classes/PermissaoDAO.php';
$permissao = new Permissao();

require 'classes/Controle.php';
require 'classes/ControleDAO.php';
$controleDAO = new ControleDAO();
$controles = $controleDAO->listar();

require 'classes/Cargos.php';
require 'classes/CargosDAO.php';
$cargosDAO = new CargosDAO();
$cargos = $cargosDAO->listar();

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $permissaoDAO = new PermissaoDAO();
    $permissao = $permissaoDAO->get($id);
    /*var_dump($permissao); exit;*/
}
?>

<style>
  .d_flex {
    margin: 0 330px 0 330px;
  }
</style>

<div class="content-wrapper">
  	<div class="container-fluid" style="margin-top: 30px;">
		<div class="h3topo" style="text-align: center; margin-right: 85px; margin-bottom: 10px;">
			<h3>Formulário de Permissões</h3>
			<spam>Preencha todos os campos abaixo</spam>
		</div><br>
    	<div class="d_flex">
            <form action="controle_permissao.php?acao=<?=($permissao->getId() != '' ? 'editar' : 'cadastrar')?>" method="post">
                <div class="row">
                    <div class="form-group col-md-10">
                        <input type="hidden" name="id" class="form-control" id="id" value="<?=($permissao->getId() != '' ? $permissao->getId(): '')?>">
                        <label for="id_controle">Controle</label>
                        <select class="custom-select" name="id_controle"id="id_controle">
                            <?php foreach($controles as $controle){ ?>
                                <option value="<?= $controle->getId() ?>"><?= $controle->getNome() ?></option>
                            <?php } ?>
                        </select>
                        <label for="id_cargo">Cargo</label>
                        <select class="custom-select" name="id_cargo"id="id_cargo">
                            <?php foreach($cargos as $cargo){ ?>
                                <option value="<?= $cargo->getId() ?>"><?= $cargo->getNome() ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row" style="margin-left: 15px;">
                    <div class="custom-control custom-control-inline">
                        <input type="checkbox" class="form-check-input" checked type="checkbox" id="ler" value="1" name="ler">
                        <label class="form-check-label" for="ler">Ler</label>
                    </div>
                    <div class="custom-control custom-control-inline">
                        <input type="checkbox" class="form-check-input" checked type="checkbox" id="cadastro" value="1" name="cadastro">
                        <label class="form-check-label" for="cadastro">Cadastrar</label>
                    </div>
                    <div class="custom-control custom-control-inline">
                        <input type="checkbox" class="form-check-input" checked type="checkbox" id="editar" value="1" name="editar">
                        <label class="form-check-label" for="editar">Editar</label>
                    </div>
                    <div class="custom-control custom-control-inline">
                        <input type="checkbox" class="form-check-input" checked type="checkbox" id="delete" value="1" name="delete">
                        <label class="form-check-label" for="delete">Deletar</label>
                    </div>
                </div>
                <button type="submit" href="permissoes.php" class="btn btn-success" style="width: 82%; margin-top: 10px;">Salvar</button>
            </form>
        </div>
	</div>
</div>
<?php include './layout/footer.php'; ?>