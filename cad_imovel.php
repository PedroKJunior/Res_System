<link rel="stylesheet" href="arquivos/cadastro.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	
		include('conexao.php');
		$db = mysql_select_db('res', $conexao) or die( "Problemas com o Banco de Dados ".mysql_error());
	
		if(isset($_POST['id'])){  $_imovel = $_POST['id']; }
		$valor = $_POST['valor']; 
		$endereco = $_POST['end'];
		$nCasa = $_POST['n_casa'];
		$comp = $_POST['comp'];
		$residencial = $_POST['ed_res'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$uf = $_POST['uf'];
		$cep = $_POST['cep'];
		$tipoImovel = $_POST['tipo_im'];
		$obs = $_POST['obs'];
		$id_cliente = $_POST['id_cliente'];	
		$foto = $_FILES["foto"];
		if(isset($_POST["fotos"])){ $fotos = $_POST["fotos"]; }
		
		if(isset($_POST['cadastrar'])){
			// Se a foto estiver sido selecionada
			if(!empty($foto["name"])){
	 
				/// Largura máxima em pixels
				$largura = 1024;
				// Altura máxima em pixels
				$altura =764;
				// Tamanho máximo do arquivo em bytes
				$tamanho = 800000;
	 
				// Verifica se o arquivo é uma imagem
				if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
					$error[1] = "Erro: Verfique o tipo do arquivo.";
				} 
	 
				// Pega as dimensões da imagem
				$dimensoes = getimagesize($foto["tmp_name"]);
	 
				// Verifica se a largura da imagem é maior que a largura permitida
				if($dimensoes[0] > $largura) {
					$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
				}
	 
				// Verifica se a altura da imagem é maior que a altura permitida
				if($dimensoes[1] > $altura) {
					$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
				}
	 
				// Verifica se o tamanho da imagem é maior que o tamanho permitido
				if($foto["size"] > $tamanho) {
					$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
				}
			
			
				// Se não houver nenhum erro
				if (count($error) == 0) {
	 
					// Pega extensão da imagem
					preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
	 
					// Gera um nome único para a imagem
					$nome_imagem = md5(uniqid(time())).".".$ext[1];
	 
					// Caminho de onde ficará a imagem
					$caminho_imagem = "fotos/".$nome_imagem;
	 
					// Faz o upload da imagem para seu respectivo caminho
					move_uploaded_file($foto["tmp_name"], $caminho_imagem);
				
					// Insere os dados no banco
					$sql = mysql_query("INSERT INTO res.imoveis VALUES(NULL,'$valor','$endereco','$nCasa','$comp','$residencial','$bairro','$cidade','$uf','$cep','$tipoImovel','$obs','$id_cliente','$nome_imagem')");
	 
					// Se os dados forem inseridos com sucesso
					if($sql){
						echo '<div id="end">CADASTRO EFETUADO COM SUCESSO!!!</div>';
					}else{ echo '<div id="end">'.mysql_error().'</div>'; }
			
				}
	 	
		
				// Se houver mensagens de erro, exibe-as
				if (count($error) != 0) {
					foreach ($error as $erro) {
						echo utf8_encode("<div id='end'>".$erro . "</div><br />");
					}
				}	
			
			} else {
			
				$sql = mysql_query("INSERT INTO res.imoveis VALUES(NULL,'$valor','$endereco','$nCasa','$comp','$residencial','$bairro','$cidade','$uf','$cep','$tipoImovel','$obs','$id_cliente', 'notfoto.png')");
				// Se os dados forem inseridos com sucesso
				if($sql){
					echo '<div id="end">CADASTRO EFETUADO COM SUCESSO!!!</div>';
				}else{ echo '<div id="end">'.mysql_error().'</div>'; }
			}
		}
	
		if(isset($_POST['atualizar'])){
				
			if(!empty($foto["name"])){
	 
				// Largura máxima em pixels
				$largura = 1024;
				// Altura máxima em pixels
				$altura =764;
				// Tamanho máximo do arquivo em bytes
				$tamanho = 800000;
		 
				// Verifica se o arquivo é uma imagem
				if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
					$error[1] = "Erro, verfique o tipo do arquivo";
				} 
		 
				// Pega as dimensões da imagem
				$dimensoes = getimagesize($foto["tmp_name"]);
		 
				// Verifica se a largura da imagem é maior que a largura permitida
				if($dimensoes[0] > $largura) {
					$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
				}
		 
				// Verifica se a altura da imagem é maior que a altura permitida
				if($dimensoes[1] > $altura) {
					$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
				}
		 
				// Verifica se o tamanho da imagem é maior que o tamanho permitido
				if($foto["size"] > $tamanho) {
					$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
				}
				
				
				// Se não houver nenhum erro
				if(count($error) == 0){
		 			// Pega extensão da imagem
					preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
		 
					// Gera um nome único para a imagem
					$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
		 
					// Caminho de onde ficará a imagem
					$caminho_imagem = "fotos/" . $nome_imagem;
		 
					// Faz o upload da imagem para seu respectivo caminho
					move_uploaded_file($foto["tmp_name"], $caminho_imagem);
			
					
		
					$sql_update = mysql_query("UPDATE imoveis SET 
						valor ='$valor', 
						endereco = '$endereco', 
						n_casa = '$nCasa',
						complemento = '$comp',
						residencial = '$residencial', 
						bairro = '$bairro', 
						cidade = '$cidade', 
						uf = '$uf', 
						cep = '$cep',
						id_tipo = '$tipoImovel', 
						obs = '$obs',
						id_cliente = '$id_cliente' ,
						img = '$foto',
					WHERE imoveis.id_imovel=".$_imovel) or die ("Problemas: ".mysql_error());
					
					// Se os dados forem inseridos com sucesso
					if ($sql_update){
						echo '<div id="end">CADASTRO EDITADO COM SUCESSO!!!</div>';
					}
				}
			}/*else{	
				
				$sql_update = mysql_query("UPDATE imoveis SET 
					valor ='$valor', 
					endereco = '$endereco', 
					n_casa = '$nCasa',
					complemento = '$comp',
					residencial = '$residencial', 
					bairro = '$bairro', 
					cidade = '$cidade', 
					uf = '$uf', 
					cep = '$cep',
					id_tipo = '$tipoImovel', 
					obs = '$obs',
					id_cliente = '$id_cliente',
					img = '$fotos',
				WHERE imoveis.id_imovel=$_imovel") or die ("Problemas: ".mysql_error());
					
					// Se os dados forem inseridos com sucesso
				if ($sql_update){
					echo '<div id="end">CADASTRO EDITADO COM SUCESSO!!!</div>';
				}
			}*/
			
			
		}
		
		include('index.html');
	?>