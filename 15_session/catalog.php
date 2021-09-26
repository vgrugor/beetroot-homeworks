<!doctype html>
<html lang="en">
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
        }
        .card {
            flex-basis: 30%;
            flex-grow: 1;
            flex-shrink: 1;
            text-align: center;
        }
        .price{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <?php if (isset($productsInOrder)): ?>
                <div class="cart">
                    <h2>Products in Cart</h2>
                    <ul>
                        <?php foreach ($productsInOrder as $product): ?>
                            <li><?= $product['name'] ?> (<?= $product['price'] ?>$)</li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </header>
        <h1>Products</h1>
        <form action="#" method="POST">
            <div class="cards">
                <?php foreach ($products as $product): ?>
                    <div class="card">
                        <h2><?= $product['name'] ?></h2>
                        <h3 class="price"><?= $product['price'] ?>$</h3>
                        <p><?= $product['quantity'] ?></p>
                        <label for="add">Add to Order</label>
                        <input type="checkbox" id="add" name="order[]" value="<?= $product['id'] ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="confirm">
                <input type="submit" name="confirm" value="confirm the order">
            </div>
        </form>
    </div>
</body>
</html>
