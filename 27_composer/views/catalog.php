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
            text-align: right;
        }
        .header{
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
        .cart-button-form{
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <?=$_SESSION['user']['login'] ?? ''?>
            <?php if(isset($_SESSION['user'])): ?>
                <a href="/logout">Logout</a>
            <?php endif; ?>
        </header>
        <div class="header">
            <?php if (!empty($goodsInCart)): ?>
                <div class="cart">
                    <h2>Корзина</h2>
                    <ul>
                        <?php foreach ($goodsInCart as $goodInCart): ?>
                            <li>
                                <?= $goodInCart['title'] ?> (<?= $goodInCart['total_sum'] ?> грн) - <?= $goodInCart['quantity'] ?> шт
                                <form class="cart-button-form" method="post" action="/addToCart">
                                    <input type="hidden" name="id" value="<?=$goodInCart['good_id']?>">
                                    <input type="submit" name="add" value="+" class="cart-button">
                                </form>
                                <form class="cart-button-form" method="post" action="/deleteFromCart">
                                    <input type="hidden" name="id" value="<?=$goodInCart['good_id']?>">
                                    <input type="submit" name="add" value="-" class="cart-button red">
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <h1>Товари</h1>
        <div class="cards">
            <?php foreach ($goods as $good): ?>
                <form class="card" method="post" action="/addToCart">
                    <input type="hidden" name="id" value="<?=$good['id']?>">
                    <h2><?= $good['title'] ?></h2>
                    <h3 class="price"><?= $good['price'] ?> грн</h3>
                    <input type="submit" name="add" value="В корзину" class="button">
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
