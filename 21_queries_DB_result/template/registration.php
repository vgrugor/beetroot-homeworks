<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Реєстрація нового користувача</title>
    <style>
        .container{
            max-width: 400px;
            margin: 0 auto;
            padding: 100px 0 0 0;
            font-size: 22px;
            font-family: Arial;
        }
        .row{
            margin: 0 0 20px 0;
        }
        .submit{
            text-align: right;
        }
        input, select{
            width: 100%;
            margin: 3px 0 0 0;
            font-size: inherit;
        }
        .errors{
            color: red;
        }
        h1{
            font-size: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Реєстрація користувача</h1>
    <?php if (!$isAddedUser): ?>
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
                    <label for="login">Введіть Ваш логін</label>
                </div>
                <div>
                    <input type="text" name="login" value="<?=$_POST['login'] ?? ''?>" id="login" placeholder="Ваш логін" tabindex="1" autofocus>
                </div>
            </div>
            <div class="row">
                <div>
                    <label for="password">Вкажіть пароль</label>
                </div>
                <div>
                    <input type="password" name="password" value="<?=$_POST['password'] ?? ''?>" id="password" tabindex="2">
                </div>
            </div>
            <div class="row">
                <div>
                    <label for="password2">Повторіть пароль</label>
                </div>
                <div>
                    <input type="password" name="password2" value="<?=$_POST['password2'] ?? ''?>" id="password2" tabindex="3">
                </div>
            </div>
            <div class="row">
                <div>
                    <label for="email">Вкажіть email</label>
                </div>
                <div>
                    <input type="email" name="email" value="<?=$_POST['email'] ?? ''?>" id="email" tabindex="4">
                </div>
            </div>
            <div class="row">
                <div>
                    <label for="age">Вкажіть ваш вік</label>
                </div>
                <div>
                    <select name="age">
                        <option value="null">Не обрано</option>
                        <?php for ($i = 5; $i <= 70; $i++): ?>
                            <option <?=($i == ($_POST['age'] ?? 0)) ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <div class="row submit">
                <input type="submit" name="registration" value="Зареєструватися">
            </div>
        </form>
    <?php else:
        echo 'Вітаю, ' . $userData['login'] . ', Ви успішно зареєструвалися';
    endif; ?>
</div>
</body>
</html>
