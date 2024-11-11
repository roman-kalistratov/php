$(function () {
  // Обработчик открытия модального окна с корзиной товаров
  $("#card").click(function () {
    $("#modal").fadeIn();

    let cart = JSON.parse(localStorage.getItem("cart"));

    $(".modal-body").html("");

    if (cart.length === 0) {
      $(".modal-body").append("<p>В корзине нет товаров.</p>");
      return;
    }
    loadCart();
  });

  // закрытие модального окна
  $(".modal-close").click(function () {
    $(".modal").fadeOut();
  });

  // Закрытие модального окна при клике вне его
  $(window).click(function (event) {
    if ($(event.target).is("#modal")) {
      $("#modal").fadeOut();
    }
  });

  // функция добавления товара в корзину
  function addToCart(product) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Проверяем, есть ли товар в корзине, если да, увеличиваем количество
    const existingProduct = cart.find((item) => item.id === product.id);

    if (existingProduct) {
      existingProduct.quantity += 1;
    } else {
      product.quantity = 1;
      cart.push(product);
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    loadCart();
  }

  // Добавление товара в корзину
  $(".add-to-cart").click(function () {
    const product = JSON.parse($(this).attr("data-product"));
    addToCart(product);
  });

  //удаление товара с корзины
  $(".modal-body").on("click", ".block-trash", function () {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const productId = parseInt($(this).closest(".block-trash").attr("id"));

    const product = cart.find((item) => item.id === productId);
    const index = cart.indexOf(product);
    if (index !== -1) cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    $(this).closest(".block-card").hide();
    loadCart();
    if (cart.length === 0) {
      $(".modal-body").append("<p>В корзине нет товаров.</p>");
      return;
    }
  });

  // Обработчик для увеличения и уменьшения количества товара
  $(".modal-body").on("click", ".inc, .dec", function () {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const productId = parseInt($(this).closest(".block-card").attr("id"));

    const product = cart.find((item) => item.id === productId);

    if ($(this).hasClass("inc")) {
      product.quantity += 1;
    } else if ($(this).hasClass("dec")) {
      if (product.quantity > 1) {
        product.quantity -= 1;
      } else {
        const index = cart.indexOf(product);
        if (index !== -1) cart.splice(index, 1);
        localStorage.setItem("cart", JSON.stringify(cart));
        $(this).closest(".block-card").hide();
        loadCart();
        if (cart.length === 0) {
          $(".modal-body").append("<p>В корзине нет товаров.</p>");
          return;
        }
      }
    }

    $(this).closest(".block-card").find(".count").text(product.quantity);

    // Сохранить изменения в LocalStorage и обновить интерфейс
    localStorage.setItem("cart", JSON.stringify(cart));
    loadCart();
  });

  // Функция для загрузки корзины и обновления UI
  function loadCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let totalPrice = 0;
    let cartItemsHtml = "";

    $.each(cart, function (id, product) {
      totalPrice += product.price * product.quantity;
      cartItemsHtml += `
                       <div class="block-card sp-btw" id="${product.id}">
                        <img src="${product.img}" alt="${product.name}">
                        <div class="block-descr">
                            <p>${product.name}</p>
                            <p>Цвет: ${product.color}</p>
                        </div>
                        <div class="block-counter">
                            <button type="button" class="counter-left dec">-</button>
                            <div class="count">${product.quantity}</div>
                            <button type="button" class="counter-right inc">+</button>
                        </div>
                        <p class="block-price">$${product.price}</p>
                        <a href="#!" class="block-trash" id="${product.id}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </div>        
            `;
    });

    $(".modal-body").html(cartItemsHtml);

    if (cart.length == 0) {
      $("#card-qty").hide();
    } else {
      $("#card-qty").text(cart.length);
    }

    $("#total-price").text("Товаров: на сумму $" + totalPrice);
  }
});
