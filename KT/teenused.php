<?php
// Initialize an empty array for services
$services = [];

// Open the CSV file for reading
if (($handle = fopen("services.csv", "r")) !== FALSE) {
    // Get the header row and replace ';' with ',' for compatibility
    $header = fgetcsv($handle, 1000, ";");

    // Loop through each row of the CSV
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $services[] = array_combine($header, $data); // Combine header and row data
    }
    fclose($handle); // Close the file handle
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 10px;
            width: calc(25% - 20px); /* 4 cards in a row */
            padding: 15px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .card img {
            max-width: 100%; /* Responsive image */
            height: auto;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <?php foreach ($services as $service): ?>
        <div class="card">
            <h3><?php echo htmlspecialchars($service['Teenuse nimi']); ?></h3>
            <p><strong><?php echo htmlspecialchars($service['Hind']); ?> €</strong></p>
            <p><?php echo htmlspecialchars($service['Kirjeldus']); ?></p>
            <img src="<?php echo htmlspecialchars($service['Pilt']); ?>" alt="<?php echo htmlspecialchars($service['Teenuse nimi']); ?>">
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>