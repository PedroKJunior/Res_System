<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css"  href="arquivos/styles_corpo.css" />
<link rel="stylesheet" href="arquivos/styles.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ReS 1.0</title>
</head>

<script type="text/javascript">

function validaCampo(){

	if(document.getElementById('nome').value == ''){
		alert("Campo Nome obrigatório");
		return false;
	}
	
	if(document.getElementById('tel').value == '' && document.getElementById('cel').value ==''){
		alert("É preciso pelo menos um telefone para contato");
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


</script>	
<body>

<div class="minwidth">
	
    <?php include("index.html"); ?>
    
    <div class="center">
	<div id="NavAbas">
    	<ul>
        	<a href="#" ><li>Cadastro</li></a>
            <a href="pesquisa_cliente.php"><li class="inativo">Pesquisa</li></a>
		</ul>
	</div>
    
    <div id="corpo">
    
    	<form name="cad_cliente" id="cad_cliente" action="cad_cliente.php" method="post" onsubmit="return validaCampo(); return false;">
        <table width="200" border="0" cellpadding="5" cellspacing="1" align="center"><tbody>
	        <tr><td colspan="2" align="center"><h2>Cadastro Cliente</h2></td></tr>
        	<tr><td>Nome:</td><td><input type="text" name="nome" id="nome" size="50" /></td></tr>
        	<tr><td>Email:</td><td><input type="text" name="email" id="email" size="50" /></td></tr>
            <tr><td>Telefone:</td><td><input type="text" name="tel" id="tel" size="20" maxlength="13" onkeypress="mascara(this,'(##)######')" /><span style="font-size:10px; color:#777">(xx)xxxxxxxx</span></td></tr>
            <tr><td>Celular:</td><td><input type="text" name="cel" id="cel" size="20" maxlength="13" onkeypress="mascara(this,'(##)######')" /><span style="font-size:10px; color:#777">(xx)xxxxxxxx</span></td></tr>
            <tr><td>Observações:</td><td>&nbsp;</td></tr>
            <tr><td colspan="2"><textarea rows="3" cols="55" name="obs"></textarea></td></tr>
        	<tr><td colspan="2"><hr /></td></tr>
            <tr><td>&nbsp;</td><td align="right"><input type="submit" name="cadastrar" value="Enviar"/></td></tr>
        </tbody></table>
        </form>
    </div>
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
