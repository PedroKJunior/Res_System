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
        	<a href="imovel.php"><li class="inativo">Cadastro</li></a>
            <a href="#"><li>Pesquisa</li></a>
		</ul>
	</div>

    <div id="corpo">


       <h2>Pesquisa de Imóveis</h2>
       <form id="imovel" name="imovel" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    	<table width="500" border="0" cellpadding="2" cellspacing="3" align="center">
          <tr>
            <td align="right"><input type="text" name="pesquisa" id="pesquisa" size="50" /></td>
            <td><input type="submit" name="submit" value="Buscar"/></td>
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

				//$sql ="SELECT * FROM res.imoveis WHERE nome LIKE '%".$pesquisa."%'";
				$sql = "SELECT * FROM `res`.`imoveis` WHERE `endereco` LIKE '%".$pesquisa."%' ";

				$result = mysql_query($sql);

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
					<?php echo utf8_encode("<a style='text-decoration:none; color:#333;' href='inf_imovel.php?id=".$imovel['id_imovel']."'>".$imovel['endereco']."</a>  - ".$imovel['n_casa']." - ".$imovel['bairro']);?>
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