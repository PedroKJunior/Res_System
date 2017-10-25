<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css"  href="arquivos/styles_corpo.css" />
<link rel="stylesheet" href="arquivos/styles.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	
	include("menu.html");
	
	$conexao = mysql_connect('127.0.0.1','root');
	$db = mysql_select_db("res",$conexao);
	
	$pesquisa = $_GET['id'];
	
	$sql = "SELECT * FROM `imoveis` WHERE `id_imovel` LIKE '%".$pesquisa."%'";
	
	$result = mysql_query($sql);	
	while($imovel = mysql_fetch_array($result)) {
?>
<script>
	function OpenImg(){
		document.getElementById('Block').style.display = "block";
		document.getElementById('foto').style.display = "block";
	}
	
	function CloseImg(){
		document.getElementById('Block').style.display = "none";
		document.getElementById('foto').style.display = "none";
	}
	
</script>
<body>
<div class="minwidth">
	 <div id="corpo" style="border-top:0px">
	 <form id="inf_imovel" name="inf_imovel" method="post" action="alt_imovel.php">
		
		 <input type="hidden" name="id" value="<?php echo $pesquisa; ?>" />
		
 		 <table width="730" height="267" border="0" cellpadding="5" cellspacing="10" style="color:#800">
		  <tr>
			<td width="189">Ref: <span class="documentation"><?php 
																								
			if ($imovel['id_imovel'] <10){ echo "000".$imovel['id_imovel']; }
			else if($imovel['id_imovel'] < 100 AND $imovel['id_imovel'] >10){ echo "00".$imovel['id_imovel']; }
			else if($imovel['id_imovel'] <1000 AND $imovel['id_imovel'] >100){ echo "0".$imovel['id_imovel']; }
			else{ echo $imovel['id_imovel']; }
			
			?></span></td>
			<td width="162">Tipo Imóvel:<span class="documentation">
            <?php
				
					$db = mysql_select_db('res', $conexao);
            		$query ="SELECT * FROM res.tpimovel WHERE id_tipo = '".$imovel['id_tipo']."';";
					$select_imovel = mysql_query($query);
					while($tpimovel = mysql_fetch_array($select_imovel)){
						echo utf8_encode($tpimovel['tipo']);
					}
			?>
            </span></td>
			<td width="122">Valor: <span class="documentation">R$ <?php echo $imovel['valor']; ?></span></td>
			<td width="167" rowspan="6"><?php echo '<img style="cursor:pointer; border:1px solid" onclick="OpenImg()" src="fotos/'.$imovel['img'].'" width="200 heigth="150">'; ?></td>
		  </tr>
		  <tr>
			<td colspan="2">Endereço:<span class="documentation"> <?php echo utf8_encode($imovel['endereco']); ?></class></td>
			<td>nº: <span class="documentation"> <?php echo $imovel['n_casa']; ?></span></td>
		  </tr>
		  <tr>
			<td>Complemento:<span class="documentation"> <?php echo utf8_encode($imovel['complemento']); ?></span></td>
			<td colspan="2">Residencial:<span class="documentation"> <?php echo utf8_encode($imovel['residencial']); ?></span></td>
		  </tr>
          <tr>
			<td colspan="2">Bairro:<span class="documentation"> <?php echo utf8_encode($imovel['bairro']); ?></span></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>CEP:<span class="documentation"> <?php echo $imovel['cep']; ?></span></td>
			<td>Cidade:<span class="documentation"> <?php echo utf8_encode($imovel['cidade']); ?></span></td>
			<td>Estado:<span class="documentation" style="text-transform:uppercase"> <?php echo $imovel['uf']; ?></span></td>
		  </tr>
		  <tr>
			<td colspan="3">Proprietário: <a href="#" class="documentation">
            	<?php
					$db = mysql_select_db('res', $conexao);
            		$query ="SELECT * FROM res.cliente WHERE id = '".$imovel['id_cliente']."';";
					$select_cliente = mysql_query($query);
					while($cliente = mysql_fetch_array($select_cliente)){
						echo utf8_encode("<a class='documentation' href=inf_cliente.php?id=".$cliente['id'].">".$cliente['nome']."</a>");
					}
					?>
            </a></td>
		  </tr>
		  <tr>
			<td colspan="4">OBs: <span class="documentation"><?php echo utf8_encode($imovel['obs']); ?></span></td>
		  </tr>
		  <tr>
			<td>
			  <input type="button" name="voltar" id="voltar" value="Voltar" onClick="window.location='pesquisa_imovel.php';">
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

<div id="foto"><span class="close" onclick="CloseImg()">x</span><?php echo '<img src="fotos/'.$imovel['img'].'" width="500 heigth="375" style="border:1px solid #600">'; ?></div>
<div id="Block"></div>
	<?php } include('index.html');	?>

	</body>
</html>
