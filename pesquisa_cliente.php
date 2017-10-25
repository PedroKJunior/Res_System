<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css"  href="arquivos/styles_corpo.css" />
<link rel="stylesheet" href="arquivos/styles.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ReS 1.0</title>
</head>
	
<body>

<div class="minwidth">
	
    <?php include("index.html"); ?>
    
    <div class="center">
	<div id="NavAbas">
    	<ul>
        	<a href="cliente.php"><li class="inativo">Cadastro</li></a>
            <a href="#"><li>Pesquisa</li></a>
		</ul>
	</div>
    
    <div id="corpo">
    
		<h2>Pesquisa Cliente</h2>
       <form id="pesquisa_cliente" name="pesquisa_cliente" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    	<table width="500" border="0" cellpadding="2" cellspacing="3" align="center" >
          <tr>
            <td align="right"><input type="text" name="pesquisa" id="pesquisa" size="50" /></td>
            <td><input type="submit" name="submit"value="Buscar"/></td>
          </tr>
        </table>
        </form>
    </div>
	<div style="position:relative; top:300px; left:50%; width:600px; margin-left:-300px; font-size:14px;">
		<?php
				
			if(isset($_POST['submit'])){
				
				
				$conexao = mysql_connect('127.0.0.1','root');
				$db = mysql_select_db("res",$conexao);
				
				$pesquisa = $_POST['pesquisa'];
				
				$sql ="SELECT * FROM res.cliente WHERE nome LIKE '%".$pesquisa."%'";
				
				$result = mysql_query($sql);	
				
		?>
			<table cellspacing="5" cellpadding="3"  style="border:1px solid #003;" id="zebra">
				<tr style="font-weight:bold; color:#FFF; background:#900; text-shadow:1px 1px 1px #000;">
					<td width="200"> Nome </td><td width="200">Telefones</td>
				</tr>
		<?php while($cliente = mysql_fetch_array($result)) { ?>
				
			
				<tr style='font:bold 12px arial;'><td >
					<?php echo utf8_encode("<a style='text-decoration:none; color:#333;' href='inf_cliente.php?id=".$cliente['id']."'>".$cliente['nome']."</a>"); ?>
				</td><td>
					<?php echo $cliente["tel"]." - ".$cliente["cel"]; ?>
				</td></tr>
					<?php }	} ?>
			
			</table>
			
				
	</div>	
	</div>
</div>

<script src="arquivos/jQuery.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
	   $('#zebra tr:odd').addClass('impar');
	   $('#zebra tr:even').addClass('par');
	});
</script>
<style>

.impar{background:rgba(255, 255, 255, 0.3);}
.par{background:rgba(139, 26, 26, 0.3);}

</style>
</body>
</html>