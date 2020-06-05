<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="icon" href="assets/img/logo.png">
  <title>َLogin</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style_login.css">
</head>

<body>
  <form form class="box" action="login.php" method="post">
  <div class="sidenav">
    <div class="login-main-text">
      <h2>SoftFlow<br> Página de acesso</h2>
      <p>Faça login ou contate o administrador para ter acesso.</p>
    </div>
  </div>
  <div class="main">
    <div class="col-md-6 col-sm-12" style="margin-left: 205px;">
      <div class="login-form" style="margin-top: 45%;">
        <form>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control" placeholder="Senha">
            <?php
            if (isset($_GET['msg']) && $_GET['msg'] != '') {
              echo '<div class="alert alert-danger" id="msg">' . $_GET['msg'] . '</div>';
            }
            ?>
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
      </div>
    </div>
  </div>
  </form>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>