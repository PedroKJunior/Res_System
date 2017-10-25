<link rel="stylesheet" href="arquivos/cadastro.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="charset" content="ISO-8859-1" />

<?php

include('conexao.php');
//header("Content-Type: text/html; charset=ISO-8859-1",true);

if(isset($_POST['id'])){  $_cliente = $_POST['id']; }
$nome = $_POST['nome'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$cel = $_POST['cel'];
$obs = $_POST['obs'];


$banco = mysql_select_db('res',$conexao); //conectando com a tabela do banco de dados
	
	if(isset($_POST['cadastrar'])){
		$query =" INSERT INTO res.cliente VALUES(NULL, '$nome', '$email', '$tel',' $cel', '$obs')";
		mysql_query($query,$conexao);
	
		echo '<div id="end">CADASTRO EFETUADO COM SUCESSO!!!</div>';
	}

	if(isset($_POST['atualizar'])){
		$query  = mysql_query("UPDATE cliente SET  nome='$nome', email='$email', tel='$tel', cel='$cel', obs='$obs' WHERE cliente.id=".$_cliente);
	
		echo '<div id="end">CADASTRO EDITADO COM SUCESSO!!!</div>';
	
	}				
include("index.html");		
?> 