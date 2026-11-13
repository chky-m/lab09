<?php
    require_once("settings.php");
    $dbconn = mysqli_connect($host, $user, $pwd, $sql_db);
    if ($dbconn){
        $query = "SELECT * FROM cars";
        $result = mysqli_query($dbconn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<td>Car ID: " . $row["car_id"] . "</td>";
                echo "<td>make: " . $row["make"] . "</td>";
                echo "<td>model: " . $row["model"] . "</td>";
                echo "<td>price: " . $row["price"] . "</td>";
                echo "<td>YOM: " . $row["YOM"] . "</td>";
                echo "<hr>";
            }
        } else {
            echo "<p>Error executing query: " . mysqli_error($dbconn) . "</p>";
        }
        mysqli_close($dbconn);
        } else {
            echo "<p>Unable to connect to database</p>";
        }
    