<?php
require_once __DIR__ . '/src/helpers.php';
checkGuest();
?>


<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/components/head.php'?>

<body>
    <form class="card" action="src/actions/login.php" method="post">
        <h2>Вход</h2>
        <?php if(hasMessage('error')): ?>
        <div class="notice error"><?php echo getMessage('error') ?></div>
        <?php endif; ?>

        <label for="email">
            Имя
            <input type="text" id="email" name="email" placeholder="ivan@areaweb.su" value="<?php echo old('email') ?>"
                <?php echo validationErrorAttr('email'); ?>>
            <?php if(hasValidationError('email')): ?>
            <small><?php echo validationErrorMessage('email'); ?></small>
            <?php endif; ?>
        </label>
        <label for="password">
            Пароль
            <input type="password" id="password" name="password" placeholder="******">
        </label>

        <button type="submit" id="submit">Продолжить</button>


        <p>У меня еще нет <a href="/registration/register.php">аккаунта</a></p>
    </form>

</body>

</html>