<?php

	$conexao = mysql_connect("127.0.0.1", "root") or die ("Não foi possivel conectar ao servidor MySQL");
	
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');

?>