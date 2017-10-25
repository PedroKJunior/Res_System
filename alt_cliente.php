<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css"  href="arquivos/styles_corpo.css" />
<link rel="stylesheet" href="arquivos/styles.css" type="text/css" />
<link rel="stylesheet" href="arquivos/cadastro.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ReS 1.0</title>
</head>	

<?php

	include('conexao.php');
	$db = mysql_select_db("res",$conexao);
	$id = $_POST['id'];
	
	if(isset($_POST['apagar'])){
		
			$sqlDel = " DELETE FROM res.cliente WHERE id LIKE '%".$id."%'";
			mysql_query($sqlDel);
			
			echo '<div class="minwidth"><div id="end">SEU CADASTRO FOI APAGADO!!!</div></div>';
			
	}
	
	if(isset($_POST['editar'])){
		
		$sqlEdit = "SELECT * FROM res.cliente WHERE id LIKE '%".$id."%'";
		$query = mysql_query($sqlEdit);
		while($cliente = mysql_fetch_array($query))
	{ 
?>

 <div class="minwidth">		
 <div id="corpo">
    	<form action="cad_cliente.php" method="post" name="alt_cliente">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
        <blockquote>
			<table width="200" border="0" cellpadding="5" cellspacing="1" align="center"><tbody>
	        <tr><td colspan="2" align="center"><h2>Editar Cliente</h2></td></tr>
        	<tr><td>Nome:</td><td><input type="text" name="nome" id="nome" size="50" value="<?php echo $cliente['nome']; ?>" /></td></tr>
        	<tr><td>Email:</td><td><input type="text" name="email" id="email" size="50" value="<?php echo $cliente['email']; ?>" /></td></tr>
            <tr><td>Telefone:</td><td><input type="text" name="tel" id="tel" size="20" value="<?php echo $cliente['tel']; ?>" /></td></tr>
            <tr><td>Celular:</td><td><input type="text" name="cel" id="cel" size="20" value="<?php echo $cliente['cel']; ?>" /></td></tr>
            <tr><td>Observa<?php echo utf8_encode('çõ'); ?>es:</td><td>&nbsp;</td></tr>
            <tr><td colspan="2"><textarea rows="3" cols="55" name="obs"><?php echo $cliente['obs']; ?></textarea></td></tr>
        	<tr><td colspan="2"><hr /></td></tr>
            <tr><td>&nbsp;</td><td align="right"><input type="submit" name="atualizar" value="Editar"/></td></tr>
        </tbody></table>
		  </form>
        </blockquote>
    </div>	
  </div>  
		
		<?php }}  include('index.html'); ?>
		
