<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php

require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';
$chamado = new Chamado();
$chamadoDAO = new ChamadoDAO();
$chamados = $chamadoDAO->listar();
require 'classes/Cliente.php';
require 'classes/ClienteDAO.php';
$clienteDAO = new ClienteDAO();
$clientes = $clienteDAO->listar();

require 'classes/Funcionario.php';
require 'classes/FuncionarioDAO.php';
$funcionarioDAO = new FuncionarioDAO();
$funcionarios = $funcionarioDAO->listar();
require 'classes/HistoricoChamado.php';
require 'classes/HistoricoChamadoDAO.php';


if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $chamadoDAO = new ChamadoDAO();
    $chamado = $chamadoDAO->getChamado($id);

    $historicoChamadoDAO = new HistoricoChamadoDAO();
    $historicoChamados = $historicoChamadoDAO->getHistorico($id);
    /*var_dump($historicoChamados);exit;*/
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
    span {
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
                    <?php
                if (isset($_GET['msg']) && $_GET['msg'] != '') {
                    echo '<div class="alert alert-info text-center">' . $_GET['msg'] . '</div>';
                }
                ?>
    <br>
    <div class="row">
        <div class="col-md-6 <?php echo (!isset($_GET['id']) && $_GET['id'] == '' ? 'offset-4' : '') ?>">

            <form action="controle_chamado.php?acao=<?= ($chamado->getId() != '' ? 'editar' : 'cadastrar') ?>" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" id="id" value="<?=($chamado->getId() != '' ? $chamado->getId(): '')?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cliente:</label>
                        <?php if ($chamado->getID() == ''){ ?>
                        <select class="custom-select" name="id_cliente" id="id_cliente">
                            <?php foreach($clientes as $cliente){ ?>
                                    <option value="<?= $cliente->getID() ?>"><?= $cliente->getNome() ?></option>
                            <?php } ?>
                        </select>
                        <?php }else{
                            echo $chamado->nome_cliente;
                         ?>
                        <input type="hidden" name="id_cliente" value="<?= $chamado->getIdCliente() ?>">
                        <?php } ?>
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
        <?php if (isset($_GET['id']) && $_GET['id'] != '') { ?>
        <div class="col-md-6">
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Registrar Historico
                </button>
        <tbody class="table-striped">
            <?php foreach ($historicoChamados as $historicoChamado) { ?>
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">Funcionario: <?= $historicoChamado->nome; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Data: <?= $historicoChamado->getDtHistorico() ?></h6>
                        <p class="card-text"><?= $historicoChamado->getDescricao() ?></p>
                        <p class="card-text"><?= $historicoChamado->getSolucao() ?></p>
                      </div>
                    </div>
            <?php } ?>
        </tbody>
        </div>
        <?php } ?>
    </div>
</div>
    <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrar historico</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="controle_historico.php?acao=cadastrar" method="post">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="id_chamado" class="form-control" id="id" value="<?=($chamado->getId() != '' ? $chamado->getId(): '')?>">
                                </div>
                                <label>Funcionario:</label>
                                <select class="custom-select" name="id_funcionario"id="id_funcionario">
                                    <?php foreach($funcionarios as $funcionario){ ?>
                                            <option value="<?= $funcionario->getID() ?>"><?= $funcionario->getNome() ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descrição</label>
                                <textarea class="form-control" cols="10" rows="5" charswidth="23" name="descricao" style="resize: none; width: 340px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Solução</label>
                                <textarea class="form-control" cols="10" rows="5" charswidth="23" name="solucao" style="resize: none; width: 340px;"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
     <!-- ////////////////// -->           
<?php include './layout/footer.php'; ?>