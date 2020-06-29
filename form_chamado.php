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


<div class="content-wrapper">
  <div class="container-fluid" style="margin-top: 30px;">
    <div class="h3topo" style="text-align: center;">
        <h3>Formulário de Tickets</h3>
        <spam>Preencha todos os campos abaixo</spam>
    </div>
    <br>
    <div class="row">
    <div class=" col-md-4" style="margin-left: 372px;">
      <form action="controle_chamado.php?acao=<?= ($chamado->getId() != '' ? 'editar' : 'cadastrar') ?>" method="post">
        <div class="form-group">
          <input type="hidden" name="id" class="form-control" id="id" value="<?=($chamado->getId() != '' ? $chamado->getId(): '')?>">
        </div>
        <div class="form-group">
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
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="status">Status</label>
              <input type="text" id="status" name="status" class="form-control" 
              value="<?=($chamado->getStatus() != '' ? $chamado->getStatus(): 'Em espera')?>" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="equipamento">Equipamento</label>
            <input type="text" class="form-control" id="equipamento" name="equipamento"value="<?=($chamado->getEquipamento() != '' ? $chamado->getEquipamento(): '')?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Descição</label>
          <textarea class="form-control" rows="5" id="exampleFormControlTextarea1" name="descricao" style="resize: none;"><?= ($chamado->getDescricao() != '' ? $chamado->getDescricao() : '') ?></textarea>
        </div>
          <button type="submit" class="btn btn-success" style="width: 100%;">Salvar</button>
      </form>
    </div>  
  <?php if (isset($_GET['id']) && $_GET['id'] != '') { ?>
    <div class="chamado">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroHistorico" style="float: right; margin-top: 25px;"><i class="fas fa-edit"></i></button>
      <div class="card" style="position: absolute; width: 20%; margin-left: 50px; margin-top: 25px;">
        <?php foreach ($historicoChamados as $historicoChamado) { ?>
        <div class="card-header">
          Histórico do chamado
        </div>
        <div class="card-body">
          <h5 class="card-title">Histórico do chamado</h5>
          <label>Funcionário: <strong><?= $historicoChamado->nome; ?></strong></label>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>Descrição: </strong><?= $historicoChamado->getDescricao() ?></li>
              <li class="list-group-item"><strong>Solução: </strong><?= $historicoChamado->getSolucao() ?></li>
              <li class="list-group-item"><strong>Data: </strong><?= $historicoChamado->getDtHistorico() ?></li>
            </ul><br>
          </div>
        <?php } ?>
      </div>
    </div>
  <?php } ?>
  
</div>
</div>

        
<?php include './layout/footer.php'; ?>

<div class="modal fade" id="registroHistorico" tabindex="-1" role="dialog" aria-labelledby="TituloregistroHistorico" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="d_flex">
        <div class="col">
          <form action="controle_historico.php?acao=cadastrar" method="post" style="text-align: center;">
              <div class="form-group" style="padding-left: 65px;">
                <input type="hidden" name="id_chamado" class="form-control" id="id" value="<?=($chamado->getId() != '' ? $chamado->getId(): '')?>">
              </div>
            <div class="form-group" style="padding-left: 65px;">
              <label style="margin-right: 70px;">Funcionário:</label>
              <select class="custom-select" name="id_funcionario"id="id_funcionario" style="width: 340px; margin-right: 60px;">
                <?php foreach($funcionarios as $funcionario){ ?>
                  <option value="<?= $funcionario->getID() ?>"><?= $funcionario->getNome() ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Descrição</label>
              <textarea class="form-control" cols="10" rows="5" charswidth="23" name="descricao" style="resize: none; width: 340px; margin-left: 65px;"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Solução</label>
              <textarea class="form-control" cols="10" rows="5" charswidth="23" name="solucao" style="resize: none; width: 340px; margin-left: 65px;"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary">Salvar mudanças</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>