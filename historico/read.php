<?php
require "../db.php";

$historico = $pdo->query("SELECT * FROM calculadora ORDER BY data DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Cálculos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Histórico de Cálculos</h1>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Renda</th>
    <th>Necessidades</th>
    <th>Desejos</th>
    <th>Poupança</th>
    <th>Data</th>
    <th>Ações</th>
</tr>

<?php foreach ($historico as $h): ?>
<tr>
    <td><?= $h['id'] ?></td>
    <td>R$ <?= number_format($h['renda'], 2, ',', '.') ?></td>
    <td>R$ <?= number_format($h['necessidades'], 2, ',', '.') ?></td>
    <td>R$ <?= number_format($h['desejos'], 2, ',', '.') ?></td>
    <td>R$ <?= number_format($h['poupanca'], 2, ',', '.') ?></td>
    <td><?= $h['data'] ?></td>
    <td><a href="delete.php?id=<?= $h['id'] ?>" onclick="return confirm('Apagar cálculo?')">Apagar</a></td>
</tr>
<?php endforeach; ?>

</table>

<br>
<a href="../calculadora.php">Voltar à Calculadora</a>

</body>
</html>
