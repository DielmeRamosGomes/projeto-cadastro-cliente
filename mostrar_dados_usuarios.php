<?php 

require("conexao.php");

function parseToXML($htmlStr){
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

$sql = "CALL mostrarDadosDoUsuario();";
$salvar = mysqli_query($conexao,$sql);

header("Content-type: text/xml");

// Começando arquivo XML
echo '<markers>';

// Iterando sobre cada linha, imprimindo cada no do XML
while ($row_markers = mysqli_fetch_assoc($salvar)){
	// Adiciona ao XML um no ao documento
	echo '<marker> ';
	echo 'idUsuario = "' . $row_markers['idUsuario'] . '" ';
	echo 'nomeUsuario = "' . parseToXML($row_markers['nomeUsuario']) . '" ';
	echo 'senhaUsuario = "' . parseToXML($row_markers['senhaUsuario']) . '" ';
	echo 'dataNascimento = "' . $row_markers['dataNascimento'] . '" ';
	echo 'cpfUsuario = "' . parseToXML($row_markers['cpfUsuario']) . '" ';
	echo 'rgUsuario = "' . parseToXML($row_markers['rgUsuario']) . '" ';
	echo '</marker>';
  }
 
// fim do arquivo XML
echo '</markers>';
