<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вхід на сайт</title>
    <style>
        .container{
            max-width: 400px;
            margin: 0 auto;
            padding: 200px 0 0 0;
            font-size: 22px;
            font-family: Arial;
        }
        .row{
            margin: 0 0 20px 0;
        }
        .right{
            text-align: right;
        }
        .errors{
            color: red;
        }
        a{
            text-decoration: none;
            font-size: 20px;
        }
        #password, #username{
            width: 100%;
            margin: 3px 0 0 0;
            font-size: inherit;
        }
        h1{
            font-size: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Вхід на сайт</h1>
        <?php if (!$isRegisteredUser): ?>
            <div class="errors">
                <ul>
                <?php foreach($errors as $error) {
                    echo "<li>$error</li>";
                } ?>
                </ul>
            </div>
            <form action="#" method="post">
                <div class="row">
                    <div>
                        <label for="username">Введіть Ваш логін</label>
                    </div>
                    <div>
                        <input type="text" name="username" id="username" placeholder="Ваш логін" tabindex="1" autofocus>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label for="password">Вкажіть пароль</label>
                    </div>
                    <div>
                        <input type="password" name="password" id="password" tabindex="2">
                    </div>
                </div>

                <div class="row right">
                    <input type="submit" name="login" value="Увійти">
                </div>
                <div class="row right">
                    <a href="/registration">Зареєствуватися</a>
                </div>
            </form>
        <?php else:
            echo "Вітаю, $login";
        endif; ?>
    </div>
</body>
</html>
