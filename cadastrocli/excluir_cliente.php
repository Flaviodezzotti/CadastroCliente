<?php
      session_start();
      include('conexao.php');

      if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());} 

    $id = $_GET['id'];


    // Executar a query para excluir o cliente
    $query = "DELETE FROM clientes WHERE id = $id";
    $resultado = mysqli_query($conn, $query);

    // Verificar se a exclusão foi realizada com sucesso
    if ($resultado) {
        header('Location: lista_cliente.php');
        exit();
    } else {
        echo "Erro ao excluir o cliente!";
    }
?>

