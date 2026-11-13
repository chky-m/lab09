<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search results</title>
</head>
<body>
    <p><a href="search_form.php">Search again</a> &middot; <a href="cars.php">All cars</a></p>
    <h1>Search results</h1>
    <?php
    require_once "settings.php";
    mysqli_report(MYSQLI_REPORT_OFF);
    $dbconn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$dbconn) {
        die("<p>Unable to connect to database.</p>");
    }
    mysqli_set_charset($dbconn, "utf8mb4");

    if (isset($_GET['model']) && is_string($_GET['model']) && trim($_GET['model']) !== '') {
        $model = mysqli_real_escape_string($dbconn, trim($_GET['model']));
        $sql = "SELECT * FROM cars WHERE model LIKE '%$model%' ORDER BY car_id";
        $result = mysqli_query($dbconn, $sql);

        if (!$result) {
            echo "<p>Unable to search cars.</p>";
        } elseif (mysqli_num_rows($result) > 0) {
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
        } else {
            echo "<p>No matching cars found.</p>";
        }
    } else {
        echo "<p>Please enter a model to search.</p>";
    }
    mysqli_close($dbconn);
    ?>
</body>
</html>
