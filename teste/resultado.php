<?php

$conn = @mysql_connect("localhost", "root") or die ("Problemas na conex�o.");
$db = @mysql_select_db("teste", $conn) or die ("Problemas na conex�o");

// Seleciona todos os usu�rios
$sql = mysql_query("SELECT * FROM usuarios ORDER BY nome");
 
// Exibe as informa��es de cada usu�rio
while ($usuario = mysql_fetch_object($sql)) {
	// Exibimos a foto
	echo "<img src='fotos/".$usuario->foto."' alt='Foto de exibi��o' /><br />";
	// Exibimos o nome e email
	echo "<b>Nome:</b> " . $usuario->nome . "<br />";
	echo "<b>Email:</b> " . $usuario->email . "<br /><br />";
}
?>
