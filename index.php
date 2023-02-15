<?php
	/*	Código criado por André Luis Filus.
		Auxílio fornecido por ChatGPT.
		Site: https://www.chatgpt.com.br 	*/
	
	/*	Criar a tabela no mySQL
		CREATE TABLE `users_teste` (
		 `id` int(11) NOT NULL AUTO_INCREMENT,
		 `username` varchar(50) NOT NULL,
		 `password` varchar(64) NOT NULL,
		 PRIMARY KEY (`id`)
		) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci	*/
	
	// Conecta ao banco de dados
	$db_host = "localhost"; // endereço do banco de dados
	$db_name = "xxx"; // nome do banco de dados
	$db_user = "xxx"; // nome do usuário
	$db_pass = "xxx"; // senha do usuário
	$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass); // cria conexão com o banco de dados usando PDO

	if (isset($_POST['cadastrar']) AND !isset($_POST['login'])){ // verifica se o botão "cadastrar" foi pressionado e se o botão "login" não foi pressionado
		$username = $_POST['username']; // recebe o valor digitado no campo "username" do formulário
		$password = $_POST['password']; // recebe o valor digitado no campo "password" do formulário

		// Define a consulta SQL
		$sql = "INSERT INTO users_teste (username, password) VALUES (:username, SHA2(:password, 256))"; // define a consulta SQL para inserir os dados do novo usuário na tabela

		// Prepara a consulta
		$stmt = $conn->prepare($sql); // prepara a consulta SQL

		// Preenche os placeholders com as variáveis
		$stmt->bindParam(':username', $username); // vincula o valor da variável $username ao placeholder :username na consulta SQL
		$stmt->bindParam(':password', $password); // vincula o valor da variável $password ao placeholder :password na consulta SQL

		// Executa a consulta
		if ($stmt->execute()) { // se a consulta foi executada com sucesso
			echo "<div class='message created'>Usuário cadastrado com sucesso!</div>"; // exibe mensagem informando que o usuário foi cadastrado com sucesso
		} else {
			echo "<div class='message error'>Erro ao cadastrar usuário!</div>"; // exibe mensagem informando que houve um erro ao cadastrar o usuário
		}
	}

	// Define a consulta SQL
	$sql = "SELECT * FROM users_teste WHERE username = :username AND password = SHA2(:password, 256)"; // define a consulta SQL para selecionar o usuário com o nome de usuário e senha informados

	// Prepara a consulta
	$stmt = $conn->prepare($sql); // prepara a consulta SQL

	// Preenche os placeholders com as variáveis do formulário
	$stmt->bindParam(':username', $_POST['username']); // vincula o valor do campo "username" do formulário ao placeholder :username na consulta SQL
	$stmt->bindParam(':password', $_POST['password']); // vincula o valor do campo "password" do formulário ao placeholder :password na consulta SQL

	// Executa a consulta
	$stmt->execute(); // executa a consulta SQL

	// Verifica se o usuário foi autenticado
	if ( isset($_POST['login']) ) { // verifica se o botão "login" foi pressionado
		if ($stmt->rowCount() == 1) { // se a consulta SQL retornou um resultado
			echo "<div class='message success'>Usuário autenticado com sucesso!</div>"; // Se o usuário foi autenticado com sucesso, exibe mensagem de sucesso
		} else { 
			echo "<div class='message invalid'>Usuário ou senha inválidos!</div>"; // Se o usuário não foi autenticado, exibe mensagem de erro
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<!-- container para os formulários de login e cadastro -->
		<div class="div-container">
			
			<!-- formulário de login -->
			<div class="form-container">
				
				<!-- cabeçalho do formulário -->
				<h2>Login Usuário</h2>
				
				<!-- formulário de login -->
				<form method="post" action="">
					
					<!-- campo para inserir o nome de usuário -->
					<label for="username">Usuário:</label>
					<input type="text" id="username" name="username" required>
					<br><br> <!-- espaço entre o input o botão -->
					
					<!-- campo para inserir a senha -->
					<label for="password">Senha:</label>
					<input type="password" id="password" name="password" required>
					<br><br> <!-- espaço entre o input o botão -->
					
					<!-- botão de login -->
					<input type="submit" name="login" value="Entrar">
				</form>
			</div>
			
			<!-- formulário de cadastro -->
			<div class="form-container">
				
			  <!-- cabeçalho do formulário -->
			  <h2>Cadastrar Usuário</h2>
				
			  <!-- formulário de cadastro -->
			  <form action="" method="post">
				  
				<!-- campo para inserir o nome de usuário -->
				<label for="username">Nome de usuário:</label>
				<input type="text" id="username" name="username" required>

				<!-- campo para inserir a senha -->
				<label for="password">Senha:</label>
				<input type="password" id="password" name="password" required>

				<!-- botão de cadastro -->
				<input type="submit" name="cadastrar" value="CADASTAR">
			  </form>
			</div>
		</div>
	</body>
					
					
