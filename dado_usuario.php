<!DOCTYPE html>
<html>
  <head>
    <title>DADOS</title>
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
  <h5  class="center">MOSTRAR DADOS POR NOME</h5>

  <br><br>
  <form method="POST" action="mostrar_dados_por_nomes.php">

    NOME: <input type="text" name="nomeUsuario" class="campo" maxlenght="50" required=""><br>

    <input type="submit" value="MOSTRAR DADOS" class="btn" href="dado_usuario.php">
  </form>

  <script>
    printf("entra no script");
    let xmlhttp;
    if (window.XMLHttpRequest()){
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET", 'mostrar_dados_por_nomes.php', false);
    xmlhttp.send();
    xmlDoc = xmlhttp.responseXML();
    document.write("<table border='1'>");
    let x = xmlDoc.getElementsByTagName("marker");
    for (let i = 0; i < x.length; i++){
        document.write("<tr><td>");
        document.write("ID: " + x[i].[0].childNodes[0].nodeValue);
        document.write("</br>")
        document.write("NOME: " + x[i].[0].childNodes[0].nodeValue);
        document.write("</td></tr>");
    }
    document.write("</table>");
</script>

</div>


<div>
    <h5  class="center">MOSTRAR TODOS OS USUARIOS </h5>
  
    <form method="post" action="mostrar_dados_usuarios.php"><br>

      <input type="submit" value="Mostrar Usuarios" class="btn">
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
  alert("Cadastro realizado com sucesso!");
</script>

<?php } }

 ?>
