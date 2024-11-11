<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Website</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="wrapper">
        <?php require_once "blocks/header.php" ?>

        <div class="hero container">
            <div class="hero--info">
                <h2>3D game Dev</h2>
                <h1>Work that we produce for our clients</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard.</p>
                <button class="btn">Get more details</button>
            </div>
            <img src="img/joystick.svg" alt="">
        </div>

        <div class="container trending">
            <h3>Currently Trending Games</h3>

            <div class="games">
                <?php
                //db
                require_once "lib/db.php";

                //sql
                $sql = 'SELECT * FROM trending ORDER BY id DESC';
                $query = $pdo->prepare($sql);
                $query->execute();
                $games = $query->fetchAll(PDO::FETCH_OBJ);               
                foreach ($games as $el)
                    echo '<div class="block">
                    <img src="/img/'.$el->image.'" alt="">
                    <span><img src="/img/fire.svg" alt=""> '.$el->followers.' Followers</span>
                </div>';
                ?>

            </div>
        </div>




    </div>






    <?php require_once "blocks/footer.php" ?>

    <script>
    function checkEmail() {
        let email = document.querySelector('#emailField').value;
        if (!email.includes('@')) alert('Нет символа @');
        else if (!email.includes('.')) alert('Нет символа .');
        else alert('Все отлично!');
    }
    </script>
</body>

</html>