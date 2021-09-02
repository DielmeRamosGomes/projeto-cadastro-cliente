<?php 

include_once("conexao.php");

$nomeUsuario = $_POST['nomeUsuario'];
$senhaUsuario = $_POST['senhaUsuario'];

if (!isset($_POST['nomeUsuario']) || !isset($_POST['senhaUsuario'])){
	
}else{
	echo"<script language='javascript' type='text/javascript'>alert('Forneça o Nome e a Senha!');
	window.location.href='cadastro.php'</script>";
}

$sql = "CALL verificaLogin('$senhaUsuario','$nomeUsuario');";

$salvar = mysqli_query($conexao,$sql);
$total = mysqli_num_rows($salvar); 
$row_total = mysqli_fetch_array($salvar);

if ($row_total > 0){
	$_SESSION['usuario_sessao'] = $row_total['idUsuario'] ;
	header("Location: infoadicional.php?respLogin=sucesso");	
}else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o login');window.location.href='cadastro.php'</script>";
        }

mysqli_close($conexao);

?>