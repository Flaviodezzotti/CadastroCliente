<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="css/lista.css">
</head>
<body>
        <h2>Lista de Cadastrados</h2>
    <?php
    session_start();
    include('conexao.php');
    
        if (!$conn) {
             die("Conexão falhou: " . mysqli_connect_error()); }

   
    // Verifica se o formulário foi submetido
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recupera os valores dos campos do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $endereco = $_POST["endereco"];

    // Prepara a query SQL para inserir o novo cliente na tabela "clientes"
        $sql = "INSERT INTO clientes (nome, email, telefone, endereco)
        VALUES ('$nome', '$email', '$telefone', '$endereco')";

    // Executa a query SQL
        if (mysqli_query($conn, $sql)) 
            {echo "<strong><div style='text-align: center;'>Cadastro de novo cliente feito com sucesso!</div></strong>";}            
         else 
            {echo "<strong>Erro ao cadastrar o cliente:</strong> " . mysqli_error($conn);}          
       
     }
    // Prepara a query SQL para selecionar todos os clientes cadastrados na tabela "clientes"
        $sql = "SELECT * FROM clientes";

    // Executa a query SQL
        $result = mysqli_query($conn, $sql);

    // Verifica se existem registros de clientes na tabela "clientes"
        if (mysqli_num_rows($result) > 0) {
            
    // Exibe os dados dos clientes em uma tabela
        echo "<table>";
        echo "<tr><th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Ações</tr></th>";
                
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["nome"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["telefone"]."</td>
                    <td>".$row["endereco"]."</td>
                    <td><a href='editar_cliente.php?id=".$row["id"]."'>Editar</a><td></a><a href='excluir_cliente.php?id=".$row['id']."'>Excluir</a></tr></td>";
                                     

                  }     
                    
                                                                                  
        echo "</table>";        
      } 

        else {
            echo "<div style='text-align: center;'>Nenhum cliente cadastrado.</div>";
            }
     
    // Fecha a conexão com o banco de dados
     mysqli_close($conn);
    ?> 

        <form action="index.php" method="get">
            <center><input type="submit" value="Cadastrar novo"></center>
        </form>
   
</body>
</html>
