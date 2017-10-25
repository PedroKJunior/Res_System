<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css"  href="arquivos/styles_corpo.css" />
<link rel="stylesheet" href="arquivos/styles.css" type="text/css" />
<link rel="stylesheet" href="arquivos/cadastro.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ReS 1.0</title>
</head>
<body>

<?php

	include('conexao.php');
	$db = mysql_select_db("res",$conexao);
	$id = $_POST['id'];
	
	if(isset($_POST['apagar'])){
		
		$sqlDel = " DELETE FROM res.imoveis WHERE id_imovel LIKE '%".$id."%'";
		mysql_query($sqlDel);
		
		echo '<div class="minwidth"><div id="end">SEU CADASTRO FOI APAGADO!!!</div></div>';
		
	}
	
	if(isset($_POST['editar'])){
		
		$sqlEdit = "SELECT * FROM res.imoveis WHERE id_imovel LIKE '%".$id."%'";
		$query = mysql_query($sqlEdit);
		while($imovel = mysql_fetch_array($query))
	{ 
?>

 <script>
 
 	function Confirmacao(){
 		
		var x = confirm('Deseja mesmo sair do modo edição?');
			if(x == true){
				window.location = 'inf_imovel.php?id=<?php echo $id; ?>';
			}
	}
	
 </script>	
<div class="minwidth">		
	<div id="corpo">
    	<h2>Edição de Imóveis</h2>
        <blockquote>
          <form id="cad_imovel" name="cad_imovel" method="post" enctype="multipart/form-data" action="cad_imovel.php">
		  <input type="hidden" name="id" value="<?php echo $id; ?>" />
          <table border="0" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td colspan="2">Ref: <span style="font-weight:normal">
                <?php
						
							if ($id < 10){ echo '000'.$id;}
							else if ($id < 100 AND $id > 10){ echo '00'.$id;}
							else if ($id < 1000 AND $id > 100){ echo '0'.$id;}
							else{ echo $id; }
						
					?>
					</span>
				</td>
				<td width="50">&nbsp;</td>
                <td width="30" align="right">Tipo: </td>
                <td width="104">
                	<select name="tipo_im">
                    	<?php 
						
							$_id = $imovel['id_tipo'];
							$dbanco = mysql_select_db('res',$conexao) or die ("Erro de conexão: ".mysql_error());
							$opcao = "SELECT * FROM res.tpimovel WHERE id_tipo =".$_id;
							$option_id = mysql_query($opcao);
							
							while($id_tipo = mysql_fetch_array($option_id)){
						?>
                        	<option value="<?php echo $id_tipo['id_tipo']; ?>" ><?php echo $id_tipo['tipo']; ?></option>
						<?php } 
							
							$query = "SELECT * FROM res.tpimovel";
							$option_tpimovel = mysql_query($query);
						
							while($tipo = mysql_fetch_array($option_tpimovel)){ 
						?>
                        	<option value="<?php echo $tipo['id_tipo']; ?>" ><?php echo $tipo['tipo']; ?></option>
						<?php } ?>	
                    </select>
                </td>
              </tr>
              <tr>
                <td width="80">Endereço: </td>
                <td width="300"><input type="text" size="50" name="end" value="<?php echo $imovel['endereco']; ?>"/></td>
                <td>&nbsp;</td>
                <td align="right">nº:</td>
                <td><input type="text" size="10" maxlength="5" name="n_casa" value="<?php echo $imovel['n_casa']; ?>" /></td>
              </tr>
              <tr>
                <td>Bairro:</td>
                <td><input type="text" name="bairro" maxlength="50" size="35" value="<?php echo $imovel['bairro']; ?>" /></td>
                <td>&nbsp;</td>
                <td align="right">CEP:</td>
                <td><input type="text" name="cep" maxlength="9" size="8" style="text-align:center" value="<?php echo $imovel['cep']; ?>" /></td>
              </tr>
              <tr>
                <td title="Residencial ou Edifício">Res/ED</td>
                <td><input type="text" name="ed_res" title="Residencial ou Edíficio" maxlength="50" size="35" value="<?php echo $imovel['residencial']; ?>"/></td>
                <td>&nbsp;</td>
                <td title="Complemento" align="right">Comp:</td>
                <td><input type="text" name="comp" title="Complemento" size="15" maxlength="50" value="<?php echo $imovel['complemento']; ?>"/></td>
              </tr>
              <tr>
                <td>Cidade:</td>
                <td><input type="text" name="cidade" maxlength="50" size="35" value="<?php echo $imovel['cidade']; ?>"/></td>
                <td>&nbsp;</td>
                <td align="right">Estado:</td>
                <td><input type="text" name="uf" maxlength="2" size="2" style="text-transform:uppercase; text-align:center" value="<?php echo $imovel['uf']; ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td title="Observações" align="right">Obs:</td>
                <td rowspan="2">
                	<textarea name="obs" cols="40" rows="5"><?php echo $imovel['obs']; ?></textarea>
                </td>
                <td>&nbsp;</td>
                <td align="right">Valor: </td>
                <td>R$ <input type="text" size="8" maxlength="10" name="valor" style="text-align:center" value="<?php echo $imovel['valor']; ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Proprietário</td>
                
                <td colspan="4">
				   	<select name="id_cliente">
                   		<?php 
						
							$_cliente = $imovel['id_cliente'];
							$db = mysql_select_db('res', $conexao) or die("Erro de conexão: ".mysql_error());
							$_sql ="SELECT * FROM res.cliente WHERE id=".$_cliente;
							$_optCliente = mysql_query($_sql);
							
							while($clt = mysql_fetch_array($_optCliente)){
							?>
							<option value="<?php echo $clt['id']; ?>"><?php echo $clt['nome']; ?></option>
							<?php }
							
							$sql = "SELECT * FROM res.cliente";
							$option_cliente = mysql_query($sql);
						
							while($cliente = mysql_fetch_array($option_cliente)){
						?>
						<option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nome']; ?></option>
						<?php }?>
                    </select>
                </td>
              </tr>
              <tr>
                <td>Fotos:</td>
                <td><input type="file" name="foto" /></td>
                <td><input type="text" name="fotos" value="<?php echo $imovel['img']; ?>"></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="button" value="Cancelar" onclick="Confirmacao()" /></td>
                <td><input type="submit" name="atualizar" value="Finalizar" /></td>
              </tr>
            </table>
            
           
          </form>
        </blockquote>
	 </div>	
  </div>  
  
  
<?php } }

	include('index.html');

?>  
 
</body>
 </html>           
