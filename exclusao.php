<!DOCTYPE html>
<html>
<head>
	<title>exclusão</title>
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
//recebendo a variavel de nome_user

$nome = $_GET['nome_user'];
//tirar espaçamentos em branco
$nome = trim($nome);


//exigir o preenchimento da barra de pesquisa

if (empty($nome)) {
	$html = file("excluir.html");
	$html = implode(" ", $html);
	$erro = '<center>Preencha o campo</center>';
	$html = str_replace('<!mensagem>', $erro, $html);
	echo ($html);
}else{
	//Criando conexao com o banco de dados
	$conexao = mysqli_connect("localhost", "root", "", "usuarios");
	//Declaração de qual locar será exluido o usuario
	$local = "SELECT id_user, nome_user, email_user, cidade_user, telefone_user, funcao_user FROM users WHERE nome_user = '{$nome}'";

	//rodando a query e verificando se o usuario é cadastrado
	$query = mysqli_query($conexao, $local) or die ("Erro no acesso ao bando de dadso");
	$encontrou = mysqli_num_rows($query);
	//Se encontrou, exlui. Caso contrário mostra mensage.
	if ($encontrou > 0) {
		//Exclui o registro na tabela
		$local = "DELETE FROM users WHERE nome_user = '{$nome}'";
		if (mysqli_query($conexao, $local)) {
			$ok = 1;
			echo '<br>';
			echo '<center><label>Usuario excluido</label></center>';
			echo '<center><a href="excluir.html" class="ui button">Voltar</a></center>';
		}else {
			$ok = 2;
			echo '<br>';
			echo '<center><label>ERRO - Usuario não exluido...</label></center>';
			echo '<center><a href="excluir.html" class="ui button">Voltar</a></center>';
		}
	}else{
		$ok = 3;
			echo '<br>';
			echo '<center><label>ERRO - Usuario não cadastrado...</label></center>';
			echo '<center><a href="excluir.html" class="ui button">Voltar</a></center>';
	}
	mysqli_close($conexao);
}


?>
</body>
</html>
