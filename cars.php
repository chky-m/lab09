<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car catalogue</title>
</head>
<body>
    <h1>Cars</h1>
    <p><a href="search_form.php">Search cars</a></p>
    <?php
    require_once "settings.php";
    mysqli_report(MYSQLI_REPORT_OFF);
    $dbconn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$dbconn) {
        die("<p>Unable to connect to database.</p>");
    }
    mysqli_set_charset($dbconn, "utf8mb4");
    $result = mysqli_query($dbconn, "SELECT * FROM cars ORDER BY car_id");

    if (!$result) {
        echo "<p>Unable to load cars.</p>";
    } elseif (mysqli_num_rows($result) === 0) {
        echo "<p>No cars found.</p>";
    } else {
        echo "<table>";
        echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . (int) $row['car_id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['make']) . "</td>";
            echo "<td>" . htmlspecialchars($row['model']) . "</td>";
            echo "<td>" . htmlspecialchars($row['price']) . "</td>";
            echo "<td>" . (int) $row['yom'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    mysqli_close($dbconn);
    ?>
</body>
</html>
