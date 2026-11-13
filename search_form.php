<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search cars</title>
</head>
<body>
    <p><a href="cars.php">Back to all cars</a></p>
    <h1>Search cars</h1>
    <form action="search_result.php" method="get">
        <label for="model">Car model</label>
        <input type="text" id="model" name="model" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>
