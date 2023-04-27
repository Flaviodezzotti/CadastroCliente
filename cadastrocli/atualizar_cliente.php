<?php
    session_start();
    include('conexao.php');

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());} 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Recupera o ID do cliente e os valores dos campos do formulário
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $endereco = $_POST["endereco"];
        
        $sql = "UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone', endereco='$endereco' WHERE id='$id'";
        
        if (mysqli_query($conn, $sql)) {
            header('Location: lista_cliente.php');
            exit();}
         else {
            echo "<strong>Erro ao atualizar o cliente:</strong> " . mysqli_error($conn);}        
    }    
    mysqli_close($conn);
?>
