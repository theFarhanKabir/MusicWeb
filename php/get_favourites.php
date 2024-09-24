<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player - Favourites</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="favourites-page section-container">
        <header>
            <h1>Favourites</h1>
            <a href="home.php" class="home-link">Home</a>
        </header>
        <ul id="favouritesList"></ul>
    </div>
   



    <?php
    include 'db.php';

    $sql = "SELECT f.playlist_id, s.title AS song_title, p.title AS playlist_title
            FROM favourites f
            JOIN contains c ON f.playlist_id = c.playlist_id
            JOIN songs s ON c.song_id = s.song_id
            JOIN playlist p ON p.playlist_id = f.playlist_id";
    $result = $conn->query($sql);

    $favourites = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $favourites[] = [
                'playlist_title' => $row['playlist_title'],
                'song_title' => $row['song_title']
            ];
        }
    }

    echo json_encode($favourites);
    ?>
</body>
</html>
