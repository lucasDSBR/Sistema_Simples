<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Consulta</title>
	  <link rel="stylesheet" type="text/css" href="css/components/container.css">
  <link rel="stylesheet" type="text/css" href="css/components/grid.css">
  <link rel="stylesheet" type="text/css" href="css/components/header.css">
  <link rel="stylesheet" type="text/css" href="css/components/image.css">
  <link rel="stylesheet" type="text/css" href="css/components/divider.css">
  <link rel="stylesheet" type="text/css" href="css/components/form.css">
  <link rel="stylesheet" type="text/css" href="css/components/segment.css">
  <link rel="stylesheet" type="text/css" href="css/components/form.js">
  <link rel="stylesheet" type="text/css" href="css/components/icon.css">
  <link rel="stylesheet" type="text/css" href="css/components/button.css">
  <link rel="stylesheet" type="text/css" href="css/components/input.css">
  <link rel="stylesheet" type="text/css" href="css/components/label.css">
  <link rel="stylesheet" type="text/css" href="css/components/table.css">
</head>
<body>
<!--
Desenvolvido por Lucas Silva

E-mail: lucasmaciel6690@gmail.com

linkedin(Lucas Silva): https://www.linkedin.com/in/lucas-silva-a9582b188/

Lattes: http://lattes.cnpq.br/6136104141544990

-->
<?php  

//recebe a variável do formulario
$nome = $_POST['nome_user'];


//tira os espaços em branco

$nome = trim($nome);

//Consiste o nome

if (empty($nome)) {
	$html = file("consulta.html");
	$html = implode("", $html);
	$erro = '<center><p style="font-color: #FF0000;"> Preencha o campo</center>';
	$html = str_replace('<!mensagem>', $erro, $html);
	echo ($html);
}else {
	echo '<p><center><img src="#" width="640" height="44"></center><p>';
	
	//Criando uma conexao com o MySQL
	$conexao = mysqli_connect("localhost", "root", "", "usuarios");

	/*Declaração para realizar a pesquisa no banco de dados*/
	$result_pesquisa = "SELECT id_user, nome_user, email_user, cidade_user, telefone_user, funcao_user FROM users WHERE nome_user = '{$nome}'";

	$result_pesquisa = mysqli_query($conexao, $result_pesquisa);
	while ($rows_pesquisa = mysqli_fetch_array($result_pesquisa)) {

		echo '<br>';
		echo '<center><table class="ui celled table">';
		echo '<tr><p>Resultado da consulta</center></p></tr>';
		echo '<br><tbody>
			 <thead>
    		 <tr><th>ID:</th>
     		 <th>Nome:</th>
      		 <th>E-mail:</th>
      		 <th>Cidade:</th>
      		 <th>Telefone:</th>
      		 <th>Finção:</th>
  			 </tr></thead><tr>
			 ';
		echo '<td>'.$rows_pesquisa['id_user'].'</td>';
		echo '<td>'.$rows_pesquisa['nome_user'].'</td>';
		echo '<td>'.$rows_pesquisa['email_user'].'</td>';
		echo '<td>'.$rows_pesquisa['cidade_user'].'</td>';
		echo '<td>'.$rows_pesquisa['telefone_user'].'</td>';
		echo '<td>'.$rows_pesquisa['funcao_user'].'</td>';
		echo '</tbody></table></center>';
		echo '<center><a href="consulta.html" class="ui button">Voltar</a></center>';
		
	}

	/*
	//Ativa a query e verifica se encontrou
	$query = mysqli_query($conexao, $declara) or die ("Erro ao acessar o banco");

	$encontrou = mysqli_fetch_row($query);
	//Se encontrou, guarda as variaveis

	if ($encontrou > 0) {
		$row = mysqli_fetch_row($query);
		$id_user = $row[0];
		$nome_user = $row[1];
		$email_user = $row[2];
		$cidade_user = $row[3];
		$telefone_user = $row[4];
		$funcao_user = $row[5];
		echo '<br>';
		echo '<center><table width="640" border="1" cellspacing="0">';
		echo '<tr><p>Resultado da consulta</center></p></tr>';
		echo '<br>';
		echo '<td><p>Id: </p>'.$id_user.'</td>';
		echo '<td><p>Nome: </p>'.$nome_user.'</td>';
		echo '<td><p>E-mail: </p>'.$email_user.'</td>';
		echo '<td><p>Cidade: </p>'.$cidade_user.'</td>';
		echo '<td><p>Telefone: </p>'.$telefone_user.'</td>';
		echo '<td><p>Função: </p>'.$funcao_user.'</td>';
		echo '</table></center>';
		echo '<center><a href="consulta.html">Voltar</a></center>';
	}else {
		echo '<br>';
		echo '<center> Objeto de pesquisa não encontrado</center>';
		echo '<br>';
		echo '<center><a href="consulta.html">Voltar</a></center>';
	}*/
	mysqli_close($conexao);
}

?>
</body>
</html>