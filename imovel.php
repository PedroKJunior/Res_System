<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css"  href="arquivos/styles_corpo.css" />
<link rel="stylesheet" href="arquivos/styles.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RES 1.0</title>
</head>
<script type="text/javascript">
function validaCampo(){

	if(document.getElementById('end').value == ''){
		alert("Campo Endereço obrigatório");
		return false;
	}
}

function mascara(src, mask){
		
		var i = src.value.length;
		var saida = mask.substring(1,2);
		var texto = mask.substring(i)
		
		if (texto.substring(0,1) != saida){
			src.value += texto.substring(0,1);
		}
}

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58) || (tecla == 45)) return true;
    else{
    	if (tecla==8 || tecla==0) return true; 
	else  return false;
	
	
    }
}
function Valor(valor){
	val = parseFloat(valor.value);
	val = val.toFixed(2);
	valor.value = val.replace(".", ",");
}	


</script>		
<body>
	<?php include('conexao.php'); ?>
<div class="minwidth">
	
   <?php include("index.html"); ?>

	<div id="NavAbas">
    	<ul>
        	<a href="#"><li>Cadastro</li></a>
            <a href="pesquisa_imovel.php"><li class="inativo">Pesquisa</li></a>
       	</ul>
	</div>
    
    <div id="corpo">
    	<h2>Cadastro de Imóveis</h2>
        <blockquote>
          <form id="cad_imovel" name="cad_imovel" method="post" enctype="multipart/form-data" action="cad_imovel.php"  onsubmit="return validaCampo(); return false;">
           
		   <table border="0" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td colspan="2">Ref: <span style="font-weight:normal">
                <?php
						
						$banco = mysql_select_db('res',$conexao) or die("Erro de conexão: ".mysql_error());
						$query_ref = "SELECT id_imovel FROM imoveis ORDER BY id_imovel DESC LIMIT  1 ";
						$referencia = mysql_query($query_ref);
						
						while($ref = mysql_fetch_array($referencia)){
							$id = ($ref['id_imovel']+1);
							
							if ($id < 10){ echo '000'.$id;}
							else if ($id < 100 AND $id >= 10){ echo '00'.$id;}
							else if ($id < 1000 AND $id >= 100){ echo '0'.$id;}
							else{ echo $id; }
						}
					?>
					</span>
				</td>
				<td width="50">&nbsp;</td>
                <td width="30" align="right">Tipo: </td>
                <td width="150">
                	<select name="tipo_im">
                    	<option>---</option>
						<?php
							
							$dbanco = mysql_select_db('res',$conexao) or die ("Erro de conexão: ".mysql_error());
							$query = "SELECT * FROM res.tpimovel";
							$option_tpimovel = mysql_query($query);
							
							while($tipo = mysql_fetch_array($option_tpimovel)){
							
						?>
						<option value="<?php echo $tipo['id_tipo']; ?>"><?php echo $tipo['tipo']; ?></option>
						<?php } ?>	
                    </select>
                </td>
              </tr>
              <tr>
                <td width="80">Endereço:</td>
                <td width="300"><input type="text" size="50" name="end" id="end" /></td>
                <td>&nbsp;</td>
                <td align="right">nº:</td>
                <td><input type="text" size="10" maxlength="5" name="n_casa" /></td>
              </tr>
              <tr>
                <td>Bairro:</td>
                <td><input type="text" name="bairro" maxlength="50" size="35" /></td>
                <td>&nbsp;</td>
                <td align="right">CEP:</td>
                <td><input type="text" name="cep" maxlength="9" size="8" style="text-align:center" onkeypress="mascara(this,'#####-###')" /><span style="font-size:10px; color:#777"> xxxxx-xxx</span></td>
              </tr>
              <tr>
                <td title="Residencial ou Edifício">Res/ED</td>
                <td><input type="text" name="ed_res" title="Residencial ou Edíficio" maxlength="50" size="35" /></td>
                <td>&nbsp;</td>
                <td title="Complemento" align="right">Comp:</td>
                <td><input type="text" name="comp" title="Complemento" size="15" maxlength="50" /></td>
              </tr>
              <tr>
                <td>Cidade:</td>
                <td><input type="text" name="cidade" maxlength="50" size="35" value="São Carlos" /></td>
                <td>&nbsp;</td>
                <td align="right">Estado:</td>
                <td><input type="text" name="uf" maxlength="2" size="2" value="SP" style="text-transform:uppercase; text-align:center"/></td>
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
                <td rowspan="2"><textarea name="obs" cols="40" rows="5" title="Observações" ></textarea></td>
                <td>&nbsp;</td>
                <td align="right">Valor: </td>
                <td>R$ <input type="text" size="8" maxlength="10" name="valor" style="text-align:center" onblur="Valor(this)"/></td>
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
                    	<option> --- </option>
						<?php 
						
							$db = mysql_select_db('res', $conexao) or die("Erro de conexão: ".mysql_error());
							$sql = "SELECT * FROM res.cliente";
							$option_cliente = mysql_query($sql);
						
							while($cliente = mysql_fetch_array($option_cliente)){
						?>
						<option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nome']; ?></option>
						<?php } ?>
                    </select>
                </td>
              </tr>
              <tr>
                <td>Fotos:</td>
                <td><input type="file" name="foto" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="cadastrar" value="Cadastrar" /></td>
              </tr>
            </table>
          </form>
        </blockquote>
    </div>

</div>
<?php 
	
		$dia = (int) date("d");
		$mes = (int) date("m");
		$ano = (int) date("Y");
		
		if($dia >= 19 && $mes >= 07 && $ano >= 2013){ 
			echo '<div id="block">';
			echo '<img src="img/exp.png" alt="Sistema Expirado">';
			echo '</div>';
		}

?>
</body>
</html>