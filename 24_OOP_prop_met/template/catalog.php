<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <style>
        header{
            display: flex;
            justify-content: end;
        }
        h1, .confirm{
            text-align: center;
            color: green;
            padding: 20px 0 0 0;
        }
        .container{
            max-width: 800px;
            margin: 0 auto;
            padding: 50px 0 0 0;
        }
        .cards{
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .card {
            flex-basis: 30%;
            flex-grow: 0;
            flex-shrink: 1;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .price{
            color: red;
        }
        .button{
            line-height: 25px;
            background-color: aquamarine;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover{
            background-color: bisque;
        }
        .cart-button{
            width: 18px;
            height: 18px;
            background-color: green;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            border-radius: 18px;
            color: white;
        }
        .red{
            background-color: red;
        }

    </style>
</head>
<body>
    <div class="container">
        <header>
            <?php if (!empty($goodsInCart)): ?>
                <div class="cart">
                    <h2>Корзина</h2>
                    <ul>
                        <?php foreach ($goodsInCart as $goodInCart): ?>
                            <li>
                                <?= $goodInCart['title'] ?> (<?= $goodInCart['total_sum'] ?> грн) - <?= $goodInCart['quantity'] ?> шт
                                <a href="/?addGoodId=<?=$goodInCart['id']?>" class="cart-button">+</a>
                                <a href="/?deleteGoodId=<?=$goodInCart['id']?>" class="cart-button red">-</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </header>
        <h1>Товари</h1>
        <div class="cards">
            <?php foreach ($goods as $good): ?>
                <div class="card">
                    <h2><?= $good['title'] ?></h2>
                    <h3 class="price"><?= $good['price'] ?> грн</h3>
                    <a href="/?addGoodId=<?=$good['id']?>" class="button">В корзину</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
