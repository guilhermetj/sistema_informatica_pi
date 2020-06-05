<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>

    <div class="content p-1">
        <div class="list-group-item">
            <div class="d-flex">
                <div class="mr-auto p-2">
                <?php
                  if (isset($_GET['msg']) && $_GET['msg'] != '') {
                    echo '<div class="alert alert-success">' . $_GET['msg'] . '</div>';
                  }
                  ?>
                    <h2 class="display-4 titulo">Dashboard</h2>
                </div>
            </div>
            <div class="row">
                <div class="col" style="text-align: center">
                    <a href="cliente.php" style="text-decoration: none;">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <i class="fas fa-users fa-3x"></i>
                                <h6 class="card-title">Clientes</h6>
                                <h2 class="lead cliente"><?= $total_cliente['cliente'] ?? 0; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col" style="text-align: center;">
                    <a href="chamado.php" style="text-decoration: none;">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <i class="fas fa-headset fa-3x"></i>
                                <h6 class="card-title">Chamados em andamento</h6>
                                <h2 class="lead chamado"><?= $total_chamado['chamado'] ?? 0; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col" style="text-align: center;">
                    <a href="chamado.php" style="text-decoration: none;">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <i class="fas fa-headset fa-3x"></i>
                                <h6 class="card-title">Chamados Finalizados</h6>
                                <h2 class="lead chamado"><?= $total_chamado['chamado'] ?? 0; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col" style="text-align: center;">
                     <a href="funcionario.php" style="text-decoration: none;">
                        <div class="card bg-secondary text-white">
                            <div class="card-body">
                                <i class="fas fa-address-card fa-3x"></i> 
                                <h6 class="card-title">Funcionarios</h6>
                                <h2 class="lead funcionario"><?= $total_funcionario['funcionario'] ?? 0; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
    </div>

<?php include './layout/footer.php'; ?>

