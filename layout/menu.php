<?php 
  $permissaoClienteMenu = retornaControle('cliente');
  $permissaoChamadoMenu = retornaControle('chamado');
  $permissaoFuncionarioMenu = retornaControle('funcionario');
  $permissaoPermissoes = retornaControle('permissoes');
  $permissaoPermissoes = retornaControle('chamados_geral');
?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="adm.php"><img src="assets/img/logo.png" style="width: 20%;"> SoftFlow</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="adm.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
          <?php if(!empty($permissaoChamadoMenu)): ?>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Chamado">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#chamadospri" data-parent="#exampleAccordion">
            <i class="fas fa-headset"></i>
            <span class="nav-link-text"> Chamados</span>
          </a>
          <ul class="sidenav-second-level collapse" id="chamadospri">
            <li>
            <a href="form_chamado.php"><i class="fas fa-plus-circle"></i> Cadastrar</a></li>
            <?php if(!empty($permissaoPermissoes)): ?>
            <li><a href="chamado_todos.php"><i class="fas fa-globe-americas"></i> Todos</a></li>
            <?php endif; ?>
            <li><a href="chamado_espera.php"><i class="fas fa-clock"></i> Em Espera</a></li>
            <li><a href="chamado_andamento.php"><i class="fas fa-list-alt"></i> Em Andamento</a></li>
            <li><a href="chamado_finalizado.php"><i class="fas fa-tasks"></i> Finalizados</a></li>
          </ul>
        </li>
        <?php endif; ?>
        <?php if(!empty($permissaoFuncionarioMenu)): ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Funcionario">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#funcionario" data-parent="#exampleAccordion">
            <i class="fas fa-user-tie"></i>
            <span class="nav-link-text">Funcionários </span>
          </a>
          <ul class="sidenav-second-level collapse" id="funcionario">
            <li><a href="funcionario.php"><i class="fas fa-list-ol"></i> Listar</a></li>
            <li><a href="form_funcionario.php"><i class="fas fa-plus-circle"></i> Cadastrar</a></li>
          </ul>
        </li>
        <?php endif; ?>
        <?php if(!empty($permissaoClienteMenu)): ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cliente">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#cliente" data-parent="#exampleAccordion">
            <i class="fas fa-user-friends"></i>
            <span class="nav-link-text">Clientes</span>
          </a>
          <ul class="sidenav-second-level collapse" id="cliente">
            <li><a href="cliente.php"><i class="fas fa-list-ol"></i> Listar</a></li>
            <li><a href="form_cliente.php"><i class="fas fa-plus-circle"></i> Cadastrar</a></li>
          </ul>
        </li>
        <?php endif; ?>
        <?php if(!empty($permissaoPermissoes)): ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Permissoes">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#permissoes" data-parent="#exampleAccordion">
            <i class="fas fa-check-double"></i>
            <span class="nav-link-text">Permissões</span>
          </a>
          <ul class="sidenav-second-level collapse" id="permissoes">
            <li><a href="permissoes.php"><i class="fas fa-list-ol"></i> Listar</a></li>
            <li><a href="form_permissao.php"><i class="fas fa-plus-circle"></i> Cadastrar</a></li>
          </ul>
        </li><br><br>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" href="logout.php" data-target="#logout">
            <i class="fa fa-fw fa-sign-out"></i>Sair</a>
        </li>
      </ul>
    </div>
  </nav>