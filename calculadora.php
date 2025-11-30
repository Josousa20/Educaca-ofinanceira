<?php
require "db.php";

$resultado = null;

if ($_POST) {
    $renda = $_POST['renda'];

    $necessidades = $renda * 0.50;
    $desejos = $renda * 0.30;
    $poupanca = $renda * 0.20;

    $resultado = [
        'renda' => $renda,
        'necessidades' => $necessidades,
        'desejos' => $desejos,
        'poupanca' => $poupanca
    ];

    
    $stmt = $pdo->prepare("INSERT INTO calculadora (renda, necessidades, desejos, poupanca) VALUES (?, ?, ?, ?)");
    $stmt->execute([$renda, $necessidades, $desejos, $poupanca]);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora 50/30/20</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Calculadora Regra 50/30/20</h1>

<form method="POST">
    <label>Renda Mensal:</label>
    <input type="number" step="0.01" name="renda" required>
    <button type="submit">Calcular</button>
</form>

<?php if ($resultado): ?>
<div class="result">
    <div class="card necessidades">
        <h3>🏠 Necessidades (50%)</h3>
        <p>R$ <?= number_format($resultado['necessidades'], 2, ',', '.') ?></p>
    </div>
    <div class="card desejos">
        <h3>🎉 Desejos (30%)</h3>
        <p>R$ <?= number_format($resultado['desejos'], 2, ',', '.') ?></p>
    </div>
    <div class="card poupanca">
        <h3>💰 Poupança (20%)</h3>
        <p>R$ <?= number_format($resultado['poupanca'], 2, ',', '.') ?></p>
    </div>
</div>
<?php endif; ?>

<br>
<a href="index.html">Voltar ao início</a> |
<a href="historico/read.php">Ver histórico</a>

</body>
</html>
