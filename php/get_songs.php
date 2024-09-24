<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player - Songs</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* ... (keep existing styles) ... */
    </style>
</head>
<body>
    
    <div class="song-page">
        <header>
            <h1>Songs</title>
            <a href="home.php" class="home-link">Home</a>
        </header>
        
        <?php
        include 'db.php';
        
        $sql = "SELECT song_id, title, source FROM songs";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $songId = $row['song_id'];
                $songTitle = htmlspecialchars($row['title']);
                $googleDriveLink = htmlspecialchars($row['source']);

                echo "
                <div class='song-item'>
                    <h2>$songTitle</h2>
                    <a href='$googleDriveLink' target='_blank'>Download</a>
                    <a href='music_player.php?song_id=$songId'>Play</a>
                </div>
                ";
            }
        } else {
            echo '<p>No songs found.</p>';
        }

        $conn->close();
        ?>
    </div>
</body>
</html>