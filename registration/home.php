<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__ . '/components/head.php'?>

<body>

    <div class="card home">
        <img class="avatar" src="<?php echo $user['avatar'] ?>" alt="<?php echo $user['name'] ?>">
        <h1>Привет, <?php echo $user['name'] ?>!</h1>
        <form action="src/actions/logout.php" method="post">
            <button role="button">Выйти из аккаунта</button>
        </form>
    </div>


</body>

</html>