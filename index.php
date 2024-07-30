<?php
$url = "https://restcountries.com/v3.1/all";

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true
]);

$response = curl_exec($curl);
curl_close($curl);

$paises = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Países</title>
</head>
<body>
    <h1>Lista de Países</h1>
    <table border="1">
        <tr>
            <th>Nome do País</th>
            <th>Link</th>
        </tr>
        <?php foreach ($paises as $pais): ?>
            <tr>
                <td><?php echo $pais['name']['common']; ?></td>
                <td><a href="pais.php?code=<?php echo $pais['cca3']; ?>">Ver detalhes</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
