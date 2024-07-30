<?php
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $url = "https://restcountries.com/v3.1/alpha/$code";

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    $pais = json_decode($response, true)[0];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do País</title>
</head>
<body>
    <?php if (isset($pais)): ?>
        <h1><?php echo $pais['name']['common']; ?></h1>
        <p><img src="<?php echo $pais['flags']['png']; ?>" alt="Bandeira de <?php echo $pais['name']['common']; ?>"></p>
        <p><strong>Continente:</strong> <?php echo $pais['region']; ?></p>
        <p><strong>População:</strong> <?php echo number_format($pais['population']); ?></p>
        <p><a href="index.php">Voltar para a lista de países</a></p>
    <?php else: ?>
        <p>País não encontrado.</p>
        <p><a href="index.php">Voltar para a lista de países</a></p>
    <?php endif; ?>
</body>
</html>
