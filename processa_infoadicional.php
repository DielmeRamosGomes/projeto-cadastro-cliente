<?php 

include_once("conexao.php");

$numeroTelefone = $_POST['numeroTelefone'];
$idTipoTelefone = $_POST['idTipoTelefone'];
$idUsuarioTelefone = $_SESSION['usuario_sessao'];

$sql = "CALL cadastroTelefone('$numeroTelefone','$idUsuarioTelefone','$idTipoTelefone');" ;

$salvar = mysqli_query($conexao,$sql) ;
//$row_total = mysqli_fetch_array($salvar);
/*
if ($row_total > 0){
  $_SESSION['idTelefone_sessao'] = $row_total['idTelefone'] ;
  $idTelefone_sessao = $_SESSION['idTelefone_sessao'] ;
}
*/

mysqli_next_result($conexao);

$endereco = $_POST['endereco'];
$idTipoEndereco =  $_POST['idTipoEndereco'];
$idUsuarioEndereco = $_SESSION['usuario_sessao'];

$sql = "CALL cadastroEndereco('$endereco','$idUsuarioEndereco', '$idTipoEndereco');" ;

$salvar = mysqli_query($conexao,$sql);
//$row_total = mysqli_fetch_array($salvar);
/*
if ($row_total > 0){
  $_SESSION['idEndereco_sessao'] = $row_total['idEndereco'] ;
  $idEndereco_sessao = $_SESSION['idEndereco_sessao'] ;
}
*/

mysqli_next_result($conexao);

$idUsuarioRedeSocial = $_SESSION['usuario_sessao'];
$idTipoRedeSocial = $_POST['idTipoRedeSocial'];

$sql = "CALL cadastroRedeSocial('$idUsuarioRedeSocial','$idTipoRedeSocial');" ;

$salvar = mysqli_query($conexao,$sql);
//$row_total = mysqli_fetch_array($salvar);
/*
if ($row_total > 0){
  $_SESSION['idRedeSocial_sessao'] = $row_total['idRedeSocial'] ;
  $idRedeSocial_sessao = $_SESSION['idRedeSocial_sessao'] ;
}
*/

if($salvar){
          echo"<script language='javascript' type='text/javascript'>alert('Informações Adicionais cadastradas com sucesso!!');window.location.href='infoadicional.php'</script>";
          header("Location: infoadicional.php?resp=sucesso");

}else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar as Informações Adicionais!!');window.location.href='infoadicional.php'</script>";
        }

mysqli_close($conexao);


?>

