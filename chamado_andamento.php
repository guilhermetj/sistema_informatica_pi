<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';
require 'classes/HistoricoChamado.php';
require 'classes/HistoricoChamadoDAO.php';
require 'classes/Funcionario.php';
require 'classes/FuncionarioDAO.php';
  $funcionarioDAO = new FuncionarioDAO();
  $funcionarios = $funcionarioDAO->listar();
  $historicoChamadoDAO = new HistoricoChamadoDAO();
$chamadoDAO = new ChamadoDAO();
$funcionario = $_SESSION['id_funcionario'];
$chamados = $chamadoDAO->listarAndamento($funcionario);
?>


<div class="content-wrapper">
  <div class="container-fluid" style="margin-top: 30px;">
  	<div class="h3topo" style="text-align: center;">
    	<h3>Chamados em andamento</h3>
    </div><br>
  	<table class="table text-center">
		<thead>
			<tr>
				<th>Cliente</th>
				<th>Funcionário</th>
				<th>Status</th>
				<th>Equipamento</th>
				<th>Descrição</th>
				<th>Abertura</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($chamados as $chamado) { 
				$historicoChamados = $historicoChamadoDAO->getHistorico($chamado->getid());

				?>

				<tr>
					<td><?= $chamado->nome_cliente; ?></td>
					<td><?= $chamado->nome_funcionario; ?></td>
					<td><?= $chamado->getStatus() ?></td>
					<td><?= $chamado->getEquipamento() ?></td>
					<td><?= $chamado->getDescricao() ?></td>
					<td><?= $chamado->getAbertura() ?></td>
					<td>
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#historico<?= $chamado->getId(); ?>"><i class="fas fa-history"></i></a>
						<a target="__blank" href="pdf_chamado_andamento.php?id=<?= $chamado->getId() ?>" class="btn btn-success"><i class="fas fa-file-pdf"></i></a>
						<a class="btn btn-danger" href="controle_chamado.php?acao=finalizarChamado&id=<?= $chamado->getId() ?>" onclick="return confirm('Deseja realmente Finalizar esse chamado?')"><i class="far fa-check-square"></i></a>
					</td>
				</tr>
			
		</tbody>
		<div class="modal fade" id="historico<?= $chamado->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Descrição do chamado</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
											<strong><?= $chamado->getDescricao() ?></strong><br>

									</div>
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Historico do chamado</h5>
									</div>
									<div class="modal-body">
									<?php foreach ($historicoChamados as $historicoChamado) { ?>
											<strong>Funcionario:<?= $historicoChamado->nome; ?></strong><br>
											<strong>Data: <?= $historicoChamado->getDtHistorico() ?></strong><br>
											<strong>Descrição: <?= $historicoChamado->getDescricao() ?></strong><br>
											<strong>Solução: <?= $historicoChamado->getSolucao() ?></strong><hr>
										<?php } ?> 
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroHistorico<?= $chamado->getId(); ?>" data-dismiss="modal">Registrar historico</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
									</div>
									</div>
								</div>
								</div>
								<!-- modal cadastro -->
								<div class="modal fade" id="registroHistorico<?= $chamado->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="TituloregistroHistorico" aria-hidden="true">
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
		<?php } ?>
	</table>
  </div>
</div>


<?php include 'layout/footer.php'; ?>