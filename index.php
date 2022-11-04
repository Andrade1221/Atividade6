<!DOCTYPE html>

<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="description" content="banco de dados com php ?!">
        <meta name="keywords" content="Classroom, Teacher, Activity">
        <meta name="author" content="Gabriel Andrade">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario ( Com banco de Dados )</title>
        <link rel="icon" type="image/x-icon" href="Icon.png"> 
        <link rel="stylesheet" href="styles.css">

    </head>

    <body>
    

        <h1>Deixe sua mensagem</h1>

        <form action="" method="post">
            Nome: <input type="text" name="nome"><br>
            E-mail: <input type="text" name="email"><br>
            Mensagem: <input type="text" name="mensagem"><br>
            <input type="submit">
        </form>



        <?php

    
            $nome=$_POST["nome"];
            $email=$_POST["email"];
            $mensagem=$_POST["mensagem"];


            echo "Bem vindo: " . $nome . "<br>"; 
            echo "Seu E-mail é: " . $email . "<br>";
            echo "Sua Mensagem: " . $mensagem . "<br>";


            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "form";


            $conn = new mysqli($servername, $username, $password, $dbname);


            if ($conn->connect_error) {
                die("Conexao ao banco de dados Falhou: " . $conn->connect_error . "<br>");
            }
            echo "Conectado ao banco de dados com Sucesso <br>";


            $sql = "INSERT INTO contatos (nome, email, mensagem)
            VALUES ('$nome', '$email', '$mensagem')";

            if ($conn->query($sql) === TRUE) {
            echo "Sua mensagem foi registrada com Sucesso <br>";
            } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();   
        
        ?>   
    
    </body>
</html>