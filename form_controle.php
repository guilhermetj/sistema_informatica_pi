<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Controle.php';
require 'classes/ControleDAO.php';
$controles = new Controle();

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $controlesDAO = new ControleDAO();
    $controles = $controlesDAO->get($id);
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
        <h3>Gerenciar Controle</h3>
        <spam>Preença todos os campos abaixo</spam>
    </div>
    <hr>
    <br>
    <div class="col cargos">
            <form action="controle_controles.php?acao=<?=($controles->getId() != '' ? 'editar' : 'cadastrar')?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="hidden" name="id" class="form-control" id="id" value="<?=($controles->getId() != '' ? $controles->getId(): '')?>">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" value="<?=($controles->getNome() != '' ? $controles->getNome(): '')?>">
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