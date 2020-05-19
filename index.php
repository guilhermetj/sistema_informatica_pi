<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>

    <div class="content p-1">
        <div class="list-group-item">
            <div class="d-flex">
                <div class="mr-auto p-2">
                    <h2 class="display-4 titulo">Dashboard</h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3 col-sm-6">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <i class="fas fa-users fa-3x"></i>
                            <h6 class="card-title">Clientes</h6>
                            <h2 class="lead">95</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <i class="fas fa-headset fa-3x"></i>
                            <h6 class="card-title">Chamados</h6>
                            <h2 class="lead">63</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card bg-secondary text-white">
                        <div class="card-body">
                            <i class="fas fa-address-card fa-3x"></i> 
                            <h6 class="card-title">Funcionarios</h6>
                            <h2 class="lead">15</h2>
                        </div>
                    </div>
                </div>
<!--                 <div class="col-lg-3 col-sm-6">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <i class="fas fa-comments fa-3x"></i>
                            <h6 class="card-title">Comentários</h6>
                            <h2 class="lead">17</h2>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

<?php include './layout/footer.php'; ?>