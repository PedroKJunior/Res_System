<?php

$conn = @mysql_connect("localhost", "root") or die ("Problemas na conexão.");
$db = @mysql_select_db("teste", $conn) or die ("Problemas na conexão");

// Seleciona todos os usuários
$sql = mysql_query("SELECT * FROM usuarios ORDER BY nome");
 
// Exibe as informações de cada usuário
while ($usuario = mysql_fetch_object($sql)) {
	// Exibimos a foto
	echo "<img src='fotos/".$usuario->foto."' alt='Foto de exibição' /><br />";
	// Exibimos o nome e email
	echo "<b>Nome:</b> " . $usuario->nome . "<br />";
	echo "<b>Email:</b> " . $usuario->email . "<br /><br />";
}
?>
