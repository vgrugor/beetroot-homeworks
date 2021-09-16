<?php

    $formSent = isset($_POST['submit']);

    if ($formSent) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $fileUsersListName = 'db.txt';
        $fileLogName = 'log.txt';

        if (!file_exists($fileUsersListName)) {
            die('Файлу ' . $fileUsersListName . ' з списком користувачів не існує!!!');
        }

        $stringsFromFile = file($fileUsersListName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($stringsFromFile === false) {
            die('Невдалося зчитати інформацію з файлу ' . $fileUsersListName . '!!!');
        }

        foreach ($stringsFromFile as $stringFromFile) {
            $user = explode(' ', $stringFromFile);
            if (count($user) >= 2) {
                $users[] = ['login' => $user[0], 'password' => $user[1]];
            }
        }

        $verifiedUser = ['login' => $login, 'password' => $password];
        $userIsRegistered = in_array($verifiedUser, $users, true);

        if ($userIsRegistered) {
            $log = date('H:i d.m.Y') . ' Користувач ' . $login . ' увійшов(ла) на сайт.' . PHP_EOL;
            file_put_contents($fileLogName, $log, FILE_APPEND | LOCK_EX);
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container{
            padding: 250px 0 0 0;
            max-width: 300px;
            margin: 0 auto;
        }
        .row{
            padding: 10px 0 0 0;
        }
        input{
            width: 100%;
        }
        button{
            width: 100%;
        }
        .greeting{
            font-size: 40px;
            text-align: center;
            color: green;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($userIsRegistered): ?>
            <div class="row">
                <p class="greeting">Вітаю, <?= $login ?></p>
            </div>
        <?php else: ?>
            <?php if ($formSent): ?>
                <div>
                    <p class="error">
                        Невірний логін або пароль!
                    </p>
                </div>
            <?php endif; ?>
            <form action="#" method="POST">
                <div class="row">
                    <div>
                        <label for="login">Логін</label>
                    </div>
                    <div>
                        <input type="text" name="login" id="login" value="" placeholder="Ваш логін" tabindex="1" autofocus>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label for="password">Пароль</label>
                    </div>
                    <div>
                        <input type="password" name="password" id="password" value="" tabindex="2">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="Увійти">
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>