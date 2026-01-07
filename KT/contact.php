<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <title>Kontakt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        #map { width: 100%; height: 400px; margin-bottom: 20px; border:1px solid #ccc; }
    </style>
</head>
<body>
<div class="container py-5">
    <h1 class="mb-4">Võta meiega ühendust</h1>

<?php
$errors = [];
$success = '';
$messageFile = __DIR__ . '/messages.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '') $errors[] = "Nimi on kohustuslik";
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Kehtiv e-post on kohustuslik";
    if ($message === '') $errors[] = "Sõnum on kohustuslik";

    if (empty($errors)) {
        $line = date('Y-m-d H:i:s') . " | $name | $email | $message" . PHP_EOL;
        if (file_put_contents($messageFile, $line, FILE_APPEND | LOCK_EX) !== false) {
            $success = "Sõnum on saadetud, aitäh!";
            $name = $email = $message = '';
        } else {
            $errors[] = "Ei õnnestu salvestada sõnumit faili. Kontrolli õiguseid.";
        }
    }
}

if ($errors) {
    echo '<div class="alert alert-danger"><ul>';
    foreach ($errors as $e) echo '<li>'.htmlspecialchars($e).'</li>';
    echo '</ul></div>';
}

if ($success) {
    echo '<div class="alert alert-success">' . htmlspecialchars($success) . '</div>';
}
?>

<!-- Kaardi konteiner -->
<div class="mb-5"> <!-- lisab ruumi all vormi ja kaardi vahel -->
    <div id="map">
        <iframe width="100%" height="400" class="border" frameborder="0" scrolling="no"
        src="https://www.openstreetmap.org/export/embed.html?bbox=24.745%2C59.435%2C24.765%2C59.445&layer=mapnik&marker=59.44%2C24.755">
        </iframe>
    </div>

    <!-- Vaata suurem kaart eraldi plokis -->
    <div class="mt-2 mb-4">
        <small class="d-block">
            <a href="https://www.openstreetmap.org/?mlat=59.44&mlon=24.755#map=16/59.44/24.755" target="_blank">
                Vaata suurem kaart
            </a>
        </small>
    </div>
</div>


    <!-- Kontaktivorm -->
    <form method="post" novalidate>
        <div class="mb-3">
            <label for="name" class="form-label">Nimi</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-post</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Sõnum</label>
            <textarea class="form-control" id="message" name="message" rows="4" required><?php echo htmlspecialchars($message ?? ''); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Saada</button>
        <a href="index.php" class="btn btn-link">← Tagasi avalehele</a>
    </form>
</div>
</body>
</html>
