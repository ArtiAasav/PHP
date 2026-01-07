<?php
session_start();

// Kui tühjendada ostukorv
if (isset($_POST['empty_cart'])) {
    unset($_SESSION['cart']);
    $message = "Ostukorv on tühjendatud.";
}

// Arvuta koguhind
$total = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $price = floatval(str_replace(',', '.', $item['price'])); // teisenda arvuks
        $quantity = (int) $item['quantity'];
        $total += $price * $quantity;
    }
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Ostukorv</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

<div class="container">
    <h1>Ostukorv</h1>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <?php if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) : ?>
        <p>Ostukorv on tühi.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Toode</th>
                    <th>Hind (€)</th>
                    <th>Kogus</th>
                    <th>Vahekogu (€)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $name => $item): 
    $price = floatval(str_replace(',', '.', $item['price']));
    $quantity = (int) $item['quantity'];
?>
<tr>
    <td><?= htmlspecialchars($name) ?></td>
    <td><?= $price ?></td>
    <td><?= $quantity ?></td>
    <td><?= $price * $quantity ?></td>
</tr>
<?php endforeach; ?>
            </tbody>
        </table>
        <h4>Kogusumma: <?= $total ?> €</h4>

        <!-- Nupud -->
        <form method="post" style="display:inline;">
            <button type="submit" name="checkout" class="btn btn-success">Mine maksma</button>
        </form>

        <form method="post" style="display:inline;">
            <button type="submit" name="empty_cart" class="btn btn-danger">Tühjenda ostukorv</button>
        </form>
    <?php endif; ?>

    <a href="index.php" class="btn btn-link">← Tagasi avalehele</a>
</div>

</body>
</html>
