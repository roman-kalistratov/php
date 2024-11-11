<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SigIn</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php require_once "blocks/header.php" ?>

    <div class="feedback">
        <div class="container">
            <h2>SigIn</h2>
            <p>Lorem Ipsum is simply dummy text of the printing .</p>

            <form method="POST" action="/lib/auth.php">
                <label>Login</label>
                <input type="text" name="login" class="one-line">


                <label>Password</label>
                <input type="password" name="password" class="one-line">

                <button type="submit">SignIn</button>
            </form>
        </div>
    </div>

    <?php require_once "blocks/footer.php" ?>
</body>

</html>