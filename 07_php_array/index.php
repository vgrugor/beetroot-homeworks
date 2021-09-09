<?php

$name = 'Vlad';
$pass = 123456;
$age = 25;
$gender = 'male';
$phoneNumber = '099-111-11-11';
$hobbies = ['football' => true, 'chess' => true, 'swimming' => false];
$language = [
    ['id' => 'UA', 'name' => 'Українська'],
    ['id' => 'RU', 'name' => 'Русский'],
    ['id' => 'EN', 'name' => 'English']
];
$aboutMe = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP variables</title>
</head>
<body>
<div class="container">
    <form action="#" method="POST">
        <div>
            <label for="username">Ім'я користувача</label>
            <input type="text" id="username" name="username" value="<?= $name ?>" placeholder="Ім'я та прізвище"
                   tabindex="1" autofocus>
        </div>
        <hr>
        <div>
            <label for="pass">Пароль</label>
            <input type="password" id="pass" name="pass" value="<?= $pass ?>" tabindex="2">
        </div>
        <hr>
        <div>
            <label for="phoneNumber">Номер телефону</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" value="<?= $phoneNumber ?>"
                   placeholder="Мобільний телефон" tabindex="3">
        </div>
        <hr>
        <div>
            <label for="age">Вкажіть ваш вік</label>
            <select name="age" id="age" tabindex="4">
                <?php for ($i = 5; $i <= 80; $i++): ?>
                    <option <?= $i === $age ? 'selected' : '' ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <hr>
        <div>
            <div>Вкажіть стать</div>
            <label for="gender_male">Чоловік</label>
            <input type="radio" name="gender" id="gender_male" tabindex="5" <?= $gender === 'male' ? 'checked' : '' ?>>
            <label for="gender_female">Жінка</label>
            <input type="radio" name="gender" id="gender_female"
                   tabindex="5" <?= $gender === 'female' ? 'checked' : '' ?>>
        </div>
        <hr>
        <!-- *****************ДЛЯ ДОМАШКИ ПО МАСИВАМ 07***************** -->
        <div>
            <label for="language">Яку з цих мов ви обираєте</label>
            <div>
                <select name="language" id="language" tabindex="5">
                    <option value="<?= $language[0]['id'] ?>"><?= $language[0]['name'] ?></option>
                    <option value="<?= $language[1]['id'] ?>"><?= $language[1]['name'] ?></option>
                    <option value="<?= $language[2]['id'] ?>"><?= $language[2]['name'] ?></option>
                </select>
            </div>
        </div>
        <!--*****************************************************************-->
        <hr>
        <div>
            <div>Вкажіть ваше хобі</div>
            <div>
                <input type="checkbox" id="football" name="football"
                       value="<?= $hobbies['football'] ?>" <?= $hobbies['football'] === true ? 'checked' : '' ?>
                       tabindex="6">
                <label for="football">Футбол</label>
                <input type="checkbox" id="chess" name="chess"
                       value="<?= $hobbies['chess'] ?>" <?= $hobbies['chess'] === true ? 'checked' : '' ?> tabindex="7">
                <label for="chess">Шахи</label>
                <input type="checkbox" id="swimming" name="swimming"
                       value="<?= $hobbies['swimming'] ?>" <?= $hobbies['swimming'] === true ? 'checked' : '' ?>
                       tabindex="8">
                <label for="swimming">Плавання</label>
            </div>
        </div>
        <hr>
        <div>
            <label for="aboutMe">Коротка інформація про себе</label>
            <div>
                <textarea name="aboutMe" id="aboutMe" rows="3" cols="35" tabindex="9"
                          placeholder="Коротко про себе"><?= $aboutMe ?></textarea>
            </div>
        </div>
        <hr>
        <div>
            <button type="reset">Відмінити ввід</button>
            <button type="submit">Підтвердити</button>
        </div>
    </form>
</div>
</body>
</html>