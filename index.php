<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>َLogin</title>
    <link rel="stylesheet" href="assets/css/style_login.css">
  </head>
  <body>

<form class="box" action="login.php" method="post">
  <h1>Login</h1>
  <input type="email" name="email" placeholder="E-mail">
  <input type="password" name="senha" placeholder="Senha">
  <?php
  if (isset($_GET['msg']) && $_GET['msg'] != '') {
    echo '<div class="alert alert-danger" id="msg">' . $_GET['msg'] . '</div>';
  }
  ?>
  <input type="submit" value="Login">
</form>
  </body>
</html>
