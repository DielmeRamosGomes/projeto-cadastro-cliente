<?php 

include_once("conexao.php");

$idUsuario = $_SESSION['usuario_sessao'];
$nomeUsuario = $_POST['nomeUsuario'];
$senhaUsuario = $_POST['senhaUsuario'];
$dataNascimento = $_POST['dataNascimento'];
$cpfUsuario = $_POST['cpfUsuario'];
$rgUsuario = $_POST['rgUsuario'];

if (!isset($_SESSION['usuario_sessao']) || !isset($_POST['nomeUsuario']) || !isset($_POST['senhaUsuario']) || !isset($_POST['dataNascimento']) || !isset($_POST['cpfUsuario']) || !isset($_POST['rgUsuario'])){
	
}else{
	echo"<script language='javascript' type='text/javascript'>alert('Forneça os dados corretamente!');
	window.location.href='cadastro.php'</script>";
}

$sql = "CALL atualizaUsuario('$idUsuario','$nomeUsuario','$senhaUsuario','$dataNascimento','$cpfUsuario','$rgUsuario');" ;
$salvar = mysqli_query($conexao,$sql);
//$row_total = mysqli_fetch_array($salvar);

if(!$salvar){
  printf("Error: %s \n", mysqli_error($conexao));
}

if($salvar){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário atualizado com sucesso!');window.location.href='cadastro.php'</script>";
          header("Location: cadastro.php?respCad=sucesso");

}else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível atualizar esse usuário');window.location.href='cadastro.php'</script>";
        }

mysqli_close($conexao);


?>

