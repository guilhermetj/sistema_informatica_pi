<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Cargos.php';
require 'classes/CargosDAO.php';
$cargos = new Cargos();

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $cargosDAO = new CargosDAO();
    $cargos = $cargosDAO->get($id);
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
    spam {
        color: #A9A9A9;
    }
</style>

<div class="container">
<br>
    <div class="h3topo" style="text-align: center;">
        <h3>Gerenciar Cargo</h3>
        <spam>Preença todos os campos abaixo</spam>
    </div>
    <hr>
    <br>
    <div class="col cargos">
            <form action="controle_cargos.php?acao=<?=($cargos->getId() != '' ? 'editar' : 'cadastrar')?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="hidden" name="id" class="form-control" id="id" value="<?=($cargos->getId() != '' ? $cargos->getId(): '')?>">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" value="<?=($cargos->getNome() != '' ? $cargos->getNome(): '')?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-check form-check-inline">
                  <label class="form-check-label" for="ler">Ler</label>
                  <input class="form-check-input" type="checkbox" id="ler" name="ler" value="1">
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label" for="editar">Editar</label>
                  <input class="form-check-input" type="checkbox" id="editar" name="editar" value="1">
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label" for="cadastrar">Cadastrar</label>
                  <input class="form-check-input" type="checkbox" id="cadastrar" name="cadastrar" value="1">
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label" for="excluir">Excluir</label>
                  <input class="form-check-input" type="checkbox" id="excluir" name="excluir" value="1">
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