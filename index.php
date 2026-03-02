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
            $resultado = ($a >= 0) ? sqrt($a) : "Erro: Raiz de número negativo";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculadora 4 Operações</title>
</head>
<body>
    <h1>Calculas como eu calculo?</h1>

    <form method="POST" action="trabalho.php">
        Valor A: <input type="number" name="a" required><br><br>
        
        Operação: 
        <select name="operacao">
            <option value="soma">Somar (+)</option>
            <option value="sub">Subtrair (-)</option>
            <option value="mult">Multiplicar (*)</option>
            <option value="div">Dividir (/)</option>
            <option value="pot">Potência (A elevado a B)</option>
            <option value="raiz">Raiz Quadrada (de A)</option>
        </select><br><br>

        Valor B: <input type="number" name="b" required><br><br>
        
        <input type="submit" value="Calcular">
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h3>Resultado: " . $resultado . "</h3>";
    }
    ?>
</body>
</html>
