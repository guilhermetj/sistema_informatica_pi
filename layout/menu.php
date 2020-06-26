<?php 
  $permissaoClienteMenu = retornaControle('cliente');
  $permissaoChamadoMenu = retornaControle('chamado');
  $permissaoFuncionarioMenu = retornaControle('funcionario');
  $permissaoPermissoes = retornaControle('permissoes');
  $permissaoPermissoes = retornaControle('chamados_geral');
?>
<nav class="sidebar">
    <ul class="list-unstyled">
        <li><a href="adm.php"><i class="far fa-chart-bar"></i></i> Dashboard</a></li>
        <?php if(!empty($permissaoChamadoMenu)): ?>
        <li>
            <a href="#submenu4" data-toggle="collapse">
                <i class="fas fa-headset"></i> Chamados</a>
            <ul id="submenu4" class="list-unstyled collapse">
                <li><a href="form_chamado.php"><i class="fas fa-plus-circle"></i> Cadastrar</a></li>
                <?php if(!empty($permissaoPermissoes)): ?>
                <li><a href="chamado_todos.php"><i class="fas fa-list-alt"></i> Todos</a></li>
                <?php endif; ?>
                <li><a href="chamado_espera.php"><i class="fas fa-list-alt"></i> Em Espera</a></li>
                <li><a href="chamado_andamento.php"><i class="fas fa-list-alt"></i> Em Andamento</a></li>
                <li><a href="chamado_finalizado.php"><i class="fas fa-list-alt"></i> Finalizados</a></li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(!empty($permissaoFuncionarioMenu)): ?>
        <li>
            <a href="#submenu2" data-toggle="collapse"><i class="fas fa-address-card"></i> Funcionários</a>
            <ul id="submenu2" class="list-unstyled collapse">
                <li><a href="funcionario.php"><i class="fas fa-list-alt"></i> Listar</a></li>
                <li><a href="form_funcionario.php"><i class="fas fa-plus-circle"></i> Cadastrar</a></li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(!empty($permissaoClienteMenu)): ?>
        <li>
            <a href="#submenu3" data-toggle="collapse">
            <i class="fas fa-users fa"></i> Clientes</a>
            <ul id="submenu3" class="list-unstyled collapse">
                <li><a href="cliente.php"><i class="fas fa-list-alt"></i> Listar</a></li>
                <li><a href="form_cliente.php"><i class="fas fa-plus-circle"></i> Cadastrar</a></li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(!empty($permissaoPermissoes)): ?>
        <li>
            <a href="#submenu5" data-toggle="collapse">
            <i class="fas fa-key fa"></i> Permissões</a>
            <ul id="submenu5" class="list-unstyled collapse">
                <li><a href="permissoes.php"><i class="fas fa-list-alt"></i> Listar</a></li>
                <li><a href="form_permissao.php"><i class="fas fa-plus-circle"></i> Cadastrar</a></li>
            </ul>
        </li>
        <?php endif; ?>
    </ul>
</nav>