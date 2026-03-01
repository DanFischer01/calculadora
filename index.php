<?php
    // Definimos a variável como vazia para não dar erro ao abrir a página
    $resultado = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];
        
        // Faz a soma simples
        $resultado = $a + $b;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Simples</title>
</head>
<body>

    <h1>Minha Calculadora!</h1>

    <form method="POST" action="">
        Número A: <input type="number" name="a" required><br>
        Número B: <input type="number" name="b" required><br>
        <input type="submit" value="Somar">
    </form>

    <br>

    <?php
        // Só mostra o resultado se o formulário tiver sido enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<strong>Resultado: </strong>" . $resultado;
        }
    ?>

</body>
</html>
