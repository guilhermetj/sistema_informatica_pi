<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';
require 'classes/Cliente.php';
require 'classes/ClienteDAO.php';
$chamado = new Chamado();
$clienteDAO = new clienteDAO();
$clientes = $clienteDAO->listar();


if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $chamadoDAO = new ChamadoDAO();
    $chamado = $chamadoDAO->get($id);
}
?>
<style>
    .chamado {
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
        <h3>Gerenciar Chamado</h3>
        <spam>Preença todos os campos abaixo</spam>
    </div>
    <hr>
    <br>
    <div class="col chamado">
        <form action="controle_chamado.php?acao=<?= ($chamado->getId() != '' ? 'editar' : 'cadastrar') ?>" method="post">
            <div class="form-row">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" id="id" value="<?=($chamado->getId() != '' ? $chamado->getId(): '')?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Cliente:</label>
                    <select class="custom-select" name="id_cliente"id="id_cliente">
                        <?php foreach($clientes as $cliente){ ?>
                                <option value="<?= $cliente->getID() ?>"><?= $cliente->getNome() ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3" style="padding-right: 5px;">
                    <label for="status">Status</label>
                    <input type="text" id="status" name="status" class="form-control" 
                    value="<?=($chamado->getStatus() != '' ? $chamado->getStatus(): 'Em espera')?>" readonly>
                </div>
                <div class="form-group col-md-5">
                    <label for="equipamento">Equipamento</label>
                    <input type="text" class="form-control" id="equipamento" name="equipamento"value="<?=($chamado->getEquipamento() != '' ? $chamado->getEquipamento(): '')?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" cols="10" rows="5" charswidth="23" name="descricao" style="resize: none; width: 340px;"><?= ($chamado->getDescricao() != '' ? $chamado->getDescricao() : '') ?>
                </textarea>
            </div>
            <div style="text-align: center;  width: 345px;">
                <button href="" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
</div>

<?php include './layout/footer.php'; ?>