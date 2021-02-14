<!DOCTYPE html>
<html>
<head>
	<title>cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/components/api.js">

  <link rel="stylesheet" type="text/css" href="css/components/container.css">
  <link rel="stylesheet" type="text/css" href="css/components/grid.css">
  <link rel="stylesheet" type="text/css" href="css/components/header.css">
  <link rel="stylesheet" type="text/css" href="css/components/image.css">
  <link rel="stylesheet" type="text/css" href="css/components/menu.css">

  <link rel="stylesheet" type="text/css" href="css/components/divider.css">
  <link rel="stylesheet" type="text/css" href="css/components/form.css">
  <link rel="stylesheet" type="text/css" href="css/components/segment.css">
  <link rel="stylesheet" type="text/css" href="css/components/form.js">
  <link rel="stylesheet" type="text/css" href="css/components/icon.css">
  <link rel="stylesheet" type="text/css" href="css/components/button.css">
  <link rel="stylesheet" type="text/css" href="css/components/input.css">
  <link rel="stylesheet" type="text/css" href="css/components/input.min.css">
</head>
<body>
<!--
Desenvolvido por Lucas Silva

E-mail: lucasmaciel6690@gmail.com

linkedin(Lucas Silva): https://www.linkedin.com/in/lucas-silva-a9582b188/

Lattes: http://lattes.cnpq.br/6136104141544990

-->
<?php  
//Atribuindo valores
$nome_user = $_POST['nome_user'];
$email_user = $_POST['email_user'];
$cidade_user = $_POST['cidade_user'];
$telefone_user = $_POST['telefone_user'];
$funcao_user = $_POST['funcao_user'];


/*comandos para tirar os espaços em branco das variaveis recebidas do formulario

$nome_user = trim ($nome_user);
$email_user = trim ($email_user);
$cidade_user = trim ($cidade_user);
$telefone_user = trim ($telefone_user);
$funcao_user = trim ($funcao_user);
*/
//consiste nas variaveis recebidas
if (empty($nome_user) || empty($email_user) || empty($cidade_user) || empty($telefone_user) || empty($funcao_user)) {
	/*caso os campos obrigatórios não sejam preenchiods, será recriado um novo formulário*/
	echo '
	<!DOCTYPE html>
	<html>
	<head>
	<title>Cadastro</title>
	<meta charset="utf-8">
	</head>
	<link rel="stylesheet" type="text/css" href="">
	<body>';
	echo '<center><p><img src="#topo" width="805" height="44"></p></center>';
	echo '
	<table width="640" border="0" cellspacing="0" align="center">
	<tr>
		<td>
		<div class="ui raised very padded text container segment">
		<b><center>Campo(s) obrigatórios não preenchidos!</center></br>
			<p><b>Formulário de Cadastro:<br></b></p>

			<form method="POST" action="cadastro.php">
			<div class="ui small form">
			  <div class="two fields">
				<div class="field">
				<label>Nome completo:</label>
				<div class="ui corner labeled input">
					<input type="text" name="nome_user" size="25" maxlength="50">
					<div class="ui corner label">
					</div>
				</div>
			</div>
			<div class="field">
				<label>E-mail:</label>
				<div class="ui corner labeled input">
					<input type="text" name="email_user" size="25" maxlength="50">
					<div class="ui corner label">
					</div>
				</div>
			</div>
		</div>
		<div class="ui small form">
			  <div class="two fields">
				<div class="field">
				<label>Cidade</label>
				<div class="ui corner labeled input">
					<input type="text" name="cidade_user" size="25" maxlength="50">
					<div class="ui corner label">
					</div>
				</div>
			</div>
			<div class="field">
				<label>Telefone:</label>
				<div class="ui corner labeled input">
				<input type="text" name="telefone_user" size="25" maxlength="50">
				<div class="ui corner label">
					</div>
				</div>
			</div>
		</div>
		<div class="ui small form">
			  <div class="two fields">
				<div class="field">
				<label>Função</label>
				<div class="ui corner labeled input">
					<input type="text" name="funcao_user" size="25" maxlength="50">
					<div class="ui corner label">
					</div>
				</div>
				<p>
					<input type="submit" name="submit" value="Cadastrar" class="ui primary button">
					<b><a href="index.html" class="ui button">Início</a></b>
				</p>
			</form>
			</div>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
</tr>
</table>';
	}else {
		/*Caso sejam preenchidos, incui os dados na tabela users*/
		//Criando conexao com o servidor MySQL
		$conexao = mysqli_connect("localhost", "root", "", "usuarios") or die("Falha ao conectar ao servidor");
		
		/*Declaração para inserir os dados na tabela*/
		$query = "insert into users (nome_user, email_user, cidade_user, telefone_user, funcao_user) values ('{$nome_user}', '{$email_user}', '{$cidade_user}', '{$telefone_user}', '{$funcao_user}')";
		

		//rodando query e tratando os resultados
		if (mysqli_query($conexao, $query)) {
			$ok = 1;
			echo '<br><br>';
			echo '<center><b style="fontsize: 4;">Cadastro efetuado com sucesso!</b></center>';
			echo '<br>';
			echo '<center><b><a href="cadastro.html" class="ui button">Voltar</a></b></center>';
		}else{
			$ok = 2;
			echo '<br><br>';
			echo '<center><b style="fontsize: 4;">Ops!... Ocorreu algum erro no momento do cadastro.</b></center>';
			echo '<br>';
			echo '<center><b><a href="cadastro.html"class="ui button">Voltar</a></b></center>';
		}
		//Fechando conexao com MySQL(se quiser)
		//msqli_close($conexao);
		mysqli_close($conexao);
	}

?>

</body>
</html>
