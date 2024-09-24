<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player - History</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="history-page section-container">
        <header>
            <h1>History</h1>
            <a href="home.php" class="home-link">Home</a>
        </header>
        <ul id="historyList"></ul>
    </div>
    


    <?php
    include 'db.php';

    $sql = "SELECT p.playlist_id, p.title, p.creation_date, u.ID AS user_id
            FROM playlist p
            LEFT JOIN userinfo u ON p.user_id = u.user_id";
    $result = $conn->query($sql);

    $playlists = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $playlists[] = [
                'title' => $row['title'],
                'creation_date' => $row['creation_date'],
                'user_id' => $row['user_id']
            ];
        }
    }

    echo json_encode($playlists);
    ?>
</body>
</html>
