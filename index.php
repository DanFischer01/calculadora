<?php
    $resultado = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $op = $_POST["operacao"];

        // Aqui o PHP decide qual conta fazer
        if ($op == "soma") $resultado = $a + $b;
        if ($op == "sub")  $resultado = $a - $b;
        if ($op == "mult") $resultado = $a * $b;
        
        if ($op == "div") {
            // Regra matemática: não existe divisão por zero!
            $resultado = ($b != 0) ? $a / $b : "Erro: Divisão por 0";
        }

        // Adicionando Potência e Raiz mantendo sua estrutura original:
        if ($op == "pot")  $resultado = pow($a, $b);
        
        if ($op == "raiz") {
            // Raiz de A em relação a B (Índice B)
            if ($b == 0) {
                $resultado = "Erro: Índice zero";
            } elseif ($a < 0 && $b % 2 == 0) {
                // Matemática: Raiz de índice par de número negativo resulta em número imaginário
                $resultado = "Erro: Raiz par de negativo";
            } else {
                // Cálculo da raiz: A elevado a (1/B)
                $resultado = pow($a, 1/$b);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora 4 Operações</title>
    <link rel= "stylesheet" href="calculadora.css">
</head>
<body>
    <h1>Calculas como eu calculo?</h1>

    <form method="POST" action="">
        Valor A: <input type="number" name="a" step="any" required><br><br>
        
        Operação: 
        <select name="operacao">
            <option value="soma">Somar (+)</option>
            <option value="sub">Subtrair (-)</option>
            <option value="mult">Multiplicar (*)</option>
            <option value="div">Dividir (/)</option>
            <option value="pot">Potência (A elevado a B)</option>
            <option value="raiz">Raiz (A com índice B)</option>
        </select><br><br>

        Valor B: <input type="number" name="b" step="any" required><br><br>
        
        <input type="submit" value="Calcular">
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Exibe o resultado na tela
        echo "<h3>Resultado: " . $resultado . "</h3>";
    }
    ?>
</body>
</html>
