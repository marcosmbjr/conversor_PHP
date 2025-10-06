<?php
$mensagem = "";
$resultado = "";

$valor = filter_input(INPUT_POST, "valor", FILTER_VALIDATE_FLOAT);
$moeda = filter_input(INPUT_POST, "moeda", FILTER_SANITIZE_STRING);

if (!isset($valor) || !is_numeric($valor) || $valor <= 0) {
    $mensagem = "Por favor, insira um valor válido (maior que 0).";
} else {
    $cotacao_dolar = 5.30;
    $cotacao_euro = 6.00;
    $cotacao_libra = 6.50;
    if ($moeda == "dolar") {
        $resultado = number_format($valor / $cotacao_dolar, 2, ',', '.');
        $mensagem = "Valor em Dólar: US$ " . $resultado;
    } elseif ($moeda == "euro") {
        $resultado = number_format($valor / $cotacao_euro, 2, ',', '.');
        $mensagem = "Valor em Euro: € " . $resultado;
    } elseif ($moeda == "libra") {
        $resultado = number_format($valor / $cotacao_libra, 2, ',', '.');
        $mensagem = "Valor em Libra Esterlina: £ " . $resultado;
    } else {
        $mensagem = "Moeda não reconhecida.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversão de Moedas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h1>Conversão de Moedas</h1>
        <form method="POST" action="conversao.php">
            <label for="valor">Informe o valor em Real (R$):</label>
            <input type="number" id="valor" name="valor" required placeholder="Digite o valor em R$">

            <label for="moeda">Escolha a moeda para conversão:</label>
            <select id="moeda" name="moeda" required>
                <option value="dolar">Dólar</option>
                <option value="euro">Euro</option>
                <option value="libra">Libra Esterlina</option>
            </select>

            <button type="submit">Converter</button>
        </form>

        <div id="resultado">
            <p><?= $mensagem ?></p>
        </div>

    </div>
</body>

</html>