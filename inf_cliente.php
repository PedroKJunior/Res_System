<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css"  href="arquivos/styles_corpo.css" />
<link rel="stylesheet" href="arquivos/styles.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<div class="minwidth">
	 <div id="corpo" style="border-top:0px">
     
     <?php
	 	include('conexao.php');
		
		$id = $_GET['id'];
	 	$db = mysql_select_db('res',$conexao);
		$sql = "SELECT * FROM `cliente` WHERE `id` LIKE '".$id."'";
		$cliente_select = mysql_query($sql);
		
		while($cliente = mysql_fetch_array($cliente_select)){
	?>
	<form action="alt_cliente.php" method="post" name="cliente">
	<input type="hidden" name="id" value="<?php echo $id; ?>" />
<table width="800" border="0" cellspacing="7" cellpadding="3" style="color:#800">
  <tr>
    <td width="400">Nome: <span class="documentation"><?php echo $cliente['nome']; ?></span></td>
    <td width="400">email: <span class="documentation"><?php echo $cliente['email']; ?></span></td>
  </tr>
  <tr>
    <td>Tel: <span class="documentation"><?php echo $cliente['tel']; ?></span></td>
    <td>Cel: <span class="documentation"><?php echo $cliente['cel']; ?></span></td>
  </tr>
  <tr>
    <td colspan="2">Obs: <span class="documentation"><?php echo  utf8_encode($cliente['obs']); ?></span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    
    <!--------------- TABELA CLIENTE -------------------->
    <?php
    			$query = "SELECT * FROM `imoveis` WHERE `id_cliente` LIKE '".$id."' ";
				$result = mysql_query($query);
	?>
    	 <table cellspacing="2" cellpadding="3" style="border:1px solid #003;" id="zebra">
				<tr style="font-weight:bold; font-size:12px; color:#FFF; background:#900; text-shadow:1px 1px 1px #000;">
					<td width="100" align="center"> Referência</td>
					<td width="400"  align="center"> Endereço </td>
				</tr>
		<?php while($imovel = mysql_fetch_array($result)) { ?>
				<tr style="font:bold 12px Arial; color:#333" ><td align="center" >
					<?php 
						
						if ($imovel['id_imovel'] <10){ echo "000".$imovel['id_imovel']; }
						else if($imovel['id_imovel'] < 100 AND $imovel['id_imovel'] >=10){ echo "00".$imovel['id_imovel']; }
						else if($imovel['id_imovel'] <1000 AND $imovel['id_imovel'] >=100){ echo "0".$imovel['id_imovel']; }
						else{ echo $imovel['id_imovel']; }
						?>
				</td><td>
					<?php echo "<a style='text-decoration:none; color:#333;' href='inf_imovel.php?id=".$imovel['id_imovel']."'>".$imovel['endereco']."</a>  - ".$imovel['n_casa']." - ".$imovel['bairro'];?>
				</td></tr>
					<?php }	 ?>
			</table>   
            
            <!------------------------------------------------------------------------------------------->
    </td>
  </tr>
		  <tr>
			<td>
			  <input type="button" name="voltar" id="voltar" value="Voltar" onClick="window.location='pesquisa_cliente.php';">
			</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="editar" id="editar" value="Editar" ></td>
			<td>
				<input type="submit" name="apagar" id="apagar" value="Apagar" />
			</td>
		  </tr>
  
  </table>
 </form> 
 
</div>
</div>
 <?php } include('index.html') ?>
</body>
</html>