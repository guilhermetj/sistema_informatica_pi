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
    .cargos {
        margin: 0 auto;
        padding: 0 auto;
        width: 50%;
        padding-left: 30px;
        padding-right: 0px;
        margin-right: 200px;
    }
    span {
        color: #A9A9A9;
    }
</style>

<div class="container">
<br>
    <div class="h3topo" style="text-align: center;">
        <h3>Gerenciar Permissão</h3>
        <spam>Preença todos os campos abaixo</spam>
    </div>
    <hr>
    <br>
    <div class="col cargos">
            <form action="controle_permissao.php?acao=<?=($permissao->getId() != '' ? 'editar' : 'cadastrar')?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
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
                <div class="row">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" checked type="checkbox" id="cadastro" value="1" name="cadastro">
                  <label class="form-check-label" for="cadastro">Cadastrar</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" checked type="checkbox" id="editar" value="1" name="editar">
                  <label class="form-check-label" for="editar">editar</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" checked type="checkbox" id="delete" value="1" name="delete">
                  <label class="form-check-label" for="delete">deletar</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" checked type="checkbox" id="ler" value="1" name="ler">
                  <label class="form-check-label" for="ler">ler</label>
                </div>
                </div>
            </div>
            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
</div>

<?php include './layout/footer.php'; ?>