<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php require_once "blocks/header.php" ?>

    <div class="feedback">
        <div class="container">
            <h2>Dashboard</h2>
            <p>Hello: <strong><?= $_COOKIE['login']; ?>.</strong> </p>
        </div>

        <form method="POST" action="/lib/add-game.php">
            <label>Image</label>
            <input type="text" class="one-line" name="image">

            <label>Followers</label>
            <input type="text" class="one-line" name="followers">

            <button type="submit">Add</button>
        </form>
    </div>

    <?php require_once "blocks/footer.php" ?>
</body>

</html>