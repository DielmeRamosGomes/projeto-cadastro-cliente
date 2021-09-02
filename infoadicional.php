<!DOCTYPE html>
<html>
    <head>
      <title>Informações Adicionais</title>
      <meta name="viewport" content="initial-scale=1.0">
      <meta charset="utf-8">

      <!-- INCLUINDO JQUERY -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
      <!-- INCLUINDO ANIMATE CSS -->
      <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
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
              <ul class="right hide-on-med-and-down">
					      <li><a class="item-menu" href="altera_usuario.php"><b>Alterar Cliente</b></a></li>					
				      </ul>
        </div>
      </nav>  
    </div>
    <!-- FIM DO MENU -->

    <br>
    <br>
    
    <div>
      <h5  class="center">Dados do Telefone</h5>
        <br>
        <br>

        <form method="post" action="processa_infoadicional.php?resp=cadastrado">

            Numero do Telefone: <input id="numeroTelefone1" type="text" name="numeroTelefone" class="campo" maxlenght="50" required><br>

            <label class="container">
            <input type="radio" name="idTipoTelefone" value="1">
            <span class="checkmark"></span>
            </label>Comercial<br>
          
            <label class="container">
            <input type="radio" name="idTipoTelefone" value="2">
            <span class="checkmark"></span>
            </label>Residencial<br>
          
            <label class="container">
            <input type="radio" name="idTipoTelefone" value="3">
            <span class="checkmark"></span>
            </label>Celular<br>
      
            <h5  class="center">Dados do Endereço</h5>
            <br>
            <br>

            Endereço: <input id="endereco1" type="text" name="endereco" class="campo" maxlenght="50" required><br>

            <label class="container">
            <input type="radio" name="idTipoEndereco" value="1">
            <span class="checkmark"></span>
            </label>Comercial<br>
          
            <label class="container">
            <input type="radio" name="idTipoEndereco" value="2">
            <span class="checkmark"></span>
            </label>Residencial<br>
          
            <label class="container">
            <input type="radio" name="idTipoEndereco" value="3">
            <span class="checkmark"></span>
            </label>Outros<br>
            
            <h5  class="center">Rede Social </h5>
            <br>
            <br>

            <label class="container">
            <input type="radio" name="idTipoRedeSocial" value="1">
            <span class="checkmark"></span>
            </label>Facebook<br>
          
            <label class="container">
            <input type="radio" name="idTipoRedeSocial" value="2">
            <span class="checkmark"></span>
            </label>Linkedin<br>
          
            <label class="container">
            <input type="radio" name="idTipoRedeSocial" value="3">
            <span class="checkmark"></span>
            </label>Twitter<br>

            <label class="container">
            <input type="radio" name="idTipoRedeSocial" value="4">
            <span class="checkmark"></span>
            </label>Instagram<br>
            
            <br>

          <input type="submit" value="Salvar" class="btn" href="infoadicional.php">
        
        </form>

  </div>

    <!-- COMEÇO DO RODAPÉ -->
  
  <footer class="page-footer" id="red-contato">
  
    <div class="footer-copyright">
      <div class="container">
        <center> Desenvolvido por Dielme Ramos Gomes</center>
      </div>
    </div>
  </footer>
  <!-- FIM DO RODAPÉ -->


  </body>
</html>


<?php
  if (isset($_GET['respLogin'])){
   if($_GET['respLogin'] == 'sucesso'){

?>
<script type="text/javascript">
  alert("Login realizado com sucesso!");
</script>

<?php } }
 if (isset($_GET['resp'])){
   if($_GET['resp'] == 'sucesso'){

?>
<script type="text/javascript">
  alert("Informações Adicionais cadastradas com sucesso!");
</script>

<?php } }

 ?>
