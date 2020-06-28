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
  .d_flex {
    margin: 0 400px 0 400px;
  }
</style>

<div class="content-wrapper">
  <div class="container-fluid" style="margin-top: 30px;">
    <div class="h3topo" style="text-align: center;">
        <h3>Formulário de Tickets</h3>
        <spam>Preencha todos os campos abaixo</spam>
    </div><br>
    <div class="d_flex <?php echo (!isset($_GET['id']) && $_GET['id'] == '' ? 'offset-4' : '') ?>">
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
	</div>
</div>


<?php if (isset($_GET['id']) && $_GET['id'] != '') { ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="d_flex" style="margin-left: 410px; margin-right: 410px;">
      <div class="row">
      <?php foreach ($historicoChamados as $historicoChamado) { ?>
        <div class="card" style="margin-bottom: 15px; width: 98%;">
          <div class="card-header">
          Data: <?= $historicoChamado->getDtHistorico() ?>
          </div>
          <div class="card-body">
            <h5 class="card-title">Funcionário: <?= $historicoChamado->nome; ?></h5>
            <p class="card-text">Informações do chamado</p>
            <ul class="list-group">
              <li class="list-group-item">Descrição: <?= $historicoChamado->getDescricao() ?></li>
              <li class="list-group-item">Solução: <?= $historicoChamado->getSolucao() ?></li>
            </ul>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
    <div class="d_flex" style="text-align: center;">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroHistorico" style="margin-bottom: 80px;">Registrar Historico</button></div>
    </div>
</div>
<?php } ?>
        
<?php include './layout/footer.php'; ?>

<div class="modal fade" id="registroHistorico" tabindex="-1" role="dialog" aria-labelledby="TituloregistroHistorico" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloregistroHistorico">Título do modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
  </div>
</div>
