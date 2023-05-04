<?php
	session_start();
    include('conexao.php');

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());} 
        
	$id = $_GET["id"];

	$sql = "SELECT * FROM clientes WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
?>
 
<form action="atualizar_cliente.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $row["nome"]; ?>">
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $row["email"]; ?>">
    <label>Telefone:</label>
    <input type="text" name="telefone" value="<?php echo $row["telefone"]; ?>">
    <label>Endereço:</label>
    <input type="text" name="endereco" value="<?php echo $row["endereco"]; ?>">
    <input type="submit" value="Atualizar">    
</form>

