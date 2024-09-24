<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player - Artists</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Adding some basic styles for the table */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .section-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .home-link {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .home-link:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="section-container">
        <header>
            <h1>Artists</h1>
            <a href="home.php" class="home-link">Home</a>
        </header>
        <table>
            <thead>
                <tr>
                    <th>Artist ID</th>
                    <th>Name</th>
                    <th>Genre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php'; // Include your database connection file

                // Query to fetch artists
                $sql = "SELECT artist_id, name, genre FROM artist";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Loop through each row and display data inside table rows
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['artist_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['genre'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No artists found</td></tr>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
