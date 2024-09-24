<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* ... (keep existing styles) ... */
    </style>
</head>
<body>
    
    <div class="media-player-container">
        <header>
            <h1>Music Player</h1>
            <a href="home.php" class="home-link">Home</a>
            <a href="get_songs.php" class="home-link">Songs</a>
        </header>
        
        <?php
        include 'db.php';
        
        if (isset($_GET['song_id'])) {
            $song_id = intval($_GET['song_id']);
            
            // Fetch the song details from the database
            $sql = "SELECT title, source FROM songs WHERE song_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $song_id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $selectedSong = get_direct_link($row['source']);
                $songTitle = $row['title'];
                
                // Debug: Show the file path to check if it's correct
                echo "<p>Debug: File Path - " . htmlspecialchars($selectedSong) . "</p>";
                
                // Display the audio player
                echo '<h2>Now Playing: ' . htmlspecialchars($songTitle) . '</h2>';
                echo '<audio id="audioPlayer" controls preload="auto">';
                echo '<source src="' . htmlspecialchars($selectedSong) . '" type="audio/mp3">';
                echo 'Your browser does not support the audio element.';
                echo '</audio>';
            } else {
                echo '<p>Song not found.</p>';
            }
            
            $stmt->close();
        } else {
            echo '<p>No song selected.</p>';
        }
        
        // Close the database connection
        $conn->close();
        ?>
        
        <!-- Additional features -->
        <div id="playerControls">
            <button>Play/Pause</button>
            <input type="range" id="volumeControl" min="0" max="1" step="0.1" value="1">
            <span id="currentTime">0:00</span> / <span id="duration">0:00</span>
            <button>&lt;&lt;</button>
            <button>&gt;&gt;</button>
        </div>

        <!-- Link to external script -->
        <script src="script.js"></script>
    </div>
</body>
</html>