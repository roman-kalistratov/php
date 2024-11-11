<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js" defer></script>
</head>

<body>
    <!-- header     -->
    <?php require_once "components/header.php" ?>

    <?php 
    $arrCart = [
        1 => [
            "id" => 174,
            'name' => 'Iphone 11 Pro', 
            "price" => 255,
            'color' => 'Серый', 
            'img' => './assets/img/iphone11.png'
        ],
        2 => [
            "id" => 181, 
            'name' => 'Samsung Galaxy A52', 
            "price" => 235, 
            'color' => 'Белый', 
            'img' => './assets/img/samsung_galaxy_a52.png'
        ],
        3 => [
            "id" => 166, 
            'name' => 'Iphone 13 Pro', 
            "price" => 365, 
            'color' => 'Серый', 
            'img' => './assets/img/iphone_13_pro.png'
        ],
        4 => [
            "id" => 134, 
            'name' => 'Xiaomi Mi 9', 
            "price" => 210, 
            'color' => 'Черный', 
            'img' => './assets/img/Xiaomi_Mi_9.png'
        ]
    ];
    ?>

    <div class="container">
        <h1 class="title center">Корзина товаров для сайта на LocalStorage</h1>
        <ul class="list">
            <?php
                foreach ($arrCart as $product) {
                    echo '
                        <li class="list-item center">
                            <a href="">
                                <h2 class="list-item__title">'.$product["name"].'</h2>
                                <img src="'.$product["img"].'" alt="item-img">
                                <p class="text">Цвет: '.$product["color"].'</p>
                                <h2 class="price">$'.$product["price"].'</h2>
                            </a>
                            <button class="btn add-to-cart" type="button" data-product="' . htmlspecialchars(json_encode($product, JSON_UNESCAPED_UNICODE)) . '">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                В Корзину
                            </button>
                        </li>';
                }
            ?>
        </ul>
    </div>

    <div class="modal" id="modal">
        <div class="modal-content center">
            <div class="modal-header sp-btw">
                <h2>Корзина покупок</h2>
                <button type="button" class="btn modal-close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>

            <div class="modal-body"></div>
            <div class="block-total" id="total-price"></div>
            <div class="modal-footer">
                <button type="button" class="btn success">
                    Оформить заказ
                </button>
                <button type="button" class="btn modal-close">
                    Продолжить покупки
                </button>
            </div>
        </div>
    </div>
</body>

</html>