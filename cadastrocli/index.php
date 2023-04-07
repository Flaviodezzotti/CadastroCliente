<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Cliente</title>
	<link rel="stylesheet" href="css/cadastrar.css">
</head>
<body>
	<h2>Cadastro de Cliente</h2>
	<form action="lista_cliente.php" method="POST">
		<label>Nome:</label>
		<input type="text" name="nome">
		<label>Email:</label>
		<input type="email" name="email">
		<label>Telefone:</label>
		<input type="text" name="telefone">
		<label>Endereço:</label>
		<input type="text" name="endereco">
		<input type="submit" value="Cadastrar">
		<a href="lista_cliente.php">Ver clientes cadastrados</a>
	</form>

</body>
</html>
