<!DOCTYPE html>
<html>
  <head>
    <title>ALTERA CONTA</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">


    <!-- INCLUINDO JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <!-- INCLUINDO MATERIALIZE CSS-->
    <link rel="stylesheet" href="assets/css/materialize.min.css">
    <!-- INCLUINDO WOW JavaScript -->
    <script src="assets/js/wow.min.js" type="text/javascript"></script>
    <!-- INCLUINDO MATERIALIZE JavaScript -->
    <script src="assets/js/materialize.min.js"></script>
    <!--ICONES MATERIALIZE -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Meus imports -->
    <!-- INCLUINDO  CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- INCUINDO JavaScript -->
    <script type="text/javascript" src="assets/js/function.js"></script>

  </head>
  <body>


    <!-- COMEÇO DO MENU -->

  <div class="navbar-fixed cover">
    <nav>
      <div class="nav-wrapper" id="menu">
        <div class="conj-texto-imagem">
          <a href="index.html" class="brand-logo">
            <b class="txt">Início</b>
          </a>
        </div>
        <a href="#" class="sidenav-trigger" data-target="mobile-nav">
                <i class="material-icons">menu</i>
            </a>
      </div>
    </nav>  
  </div>
  <!-- FIM DO MENU -->

<br>
<br>
<br>
<br>
<br>
<br>

<div>
    <h5  class="center">ALTERAR CONTA</h5>
  
    <form method="post" action="processa_altera_usuario.php">

    Nome: <input type="text" name="nomeUsuario" class="campo" maxlenght="50" required=""><br>
          
    Senha: <input type="password" name="senhaUsuario" class="campo" maxlenght="40" required=""><br>

    Data Nascimento: <input type="date" name="dataNascimento" class="campo" maxlenght="50" required><br>

    CPF: <input type="text" name="cpfUsuario" class="campo" maxlenght="50" required=""><br>

    RG: <input type="text" name="rgUsuario" class="campo" maxlenght="50" required=""><br>

    <input type="submit" value="SALVAR" class="btn">
      </form>
      
  </div>


    <!-- COMEÇO DO RODAPÉ -->
  
  <footer class="page-footer" id="red-contato">
  
    <div class="footer-copyright">
      <div class="container">
        <center>Desenvolvido por Dielme Ramos Gomes</center>
      </div>
    </div>
  </footer>
  <!-- FIM DO RODAPÉ -->

  </body>
</html>


<?php
  if (isset($_GET['respCad'])){
   if($_GET['respCad'] == 'sucesso'){

?>
<script type="text/javascript">
  alert("Atualizado com sucesso!");
</script>

<?php } }

 ?>
