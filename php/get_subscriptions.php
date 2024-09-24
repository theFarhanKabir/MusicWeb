<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player - Subscriptions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="subscriptions-page section-container">
        <header>
            <h1>Subscriptions</h1>
            <a href="home.php" class="home-link">Home</a>
        </header>
        <ul id="subscriptionList"></ul>
    </div>

    <?php
    include 'db.php';

    $sql = "SELECT * FROM subscription";
    $result = $conn->query($sql);

    $subscriptions = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $subscriptions[] = [
                'name' => $row['name'],
                'price' => $row['price'],
                'description' => $row['description']
            ];
        }
    }

    echo json_encode($subscriptions);
    ?>
</body>
</html>