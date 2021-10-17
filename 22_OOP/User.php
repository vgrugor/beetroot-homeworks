<?php

class User
{

    /**
     * @var int
     */
    private int $userId;

    /**
     * @var string
     */
    private string $login;

    /**
     * @var string
     */
    private string $password;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var string
     */
    private string $gender;

    /**
     * @var int
     */
    private int $age;

    //для кожної властивості прописуємо getter setter. В getter повертаємо значення властивості, а в setter задаємо її значення
    // і можливо проводимо якісь перевірки

    /**
     * @return string
     */
    public function getLogin(): string
    {
        /*
         * повертаємо значення логіну
         */
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        /*
         * Присвоюємо значення для властивості $login
         */
    }

    //... так для всіх приватних властивостей


    /**
     * @param array $userInfo
     * @return bool
     */
    public function register(array $userInfo): bool
    {
        /*
         * присвоюємо значення для властивостей об'єкта
         *викликаємо функцію валідації validate($userData)
         *якщо вона повернула порожній массив
         *записуємо дані нового користувача в БД, викликавши ф-ію addNewUser()
         *якщо дані записалися - повертаємо true
         */
    }

    /**
     * @param string $userLogin
     * @param string $userPassword
     * @return bool результат пошуку в БД
     */
    public function login(string $userLogin, string $userPassword): bool
    {
        /*
         * Викликаємо метод getUser()
         * Якщо знаходимо користувача, то присвоюємо властивостям об'єкта значення з БД
         * Записуємо id та login в сесію
         * Повертаємо результат пошуку користувача в БД
         */
    }

    /**
     * @param int $userId
     * @param string $text
     * @return bool
     */
    public function addComment(int $userId, string $text): bool
    {
        /*
         * Отримуємо id користувача з сесії
         * Створюємо об'єкт Comment
         * Заповнюємо його властивості
         * Викликаємо метод addNewComment() об'єкта Comment
         * Повертаємо результат роботи addNewComment()
         */
    }

    /**
     * @param int $commentId
     * @return bool
     */
    public function editComment(int $commentId): bool
    {
        /*
         * Створюємо об'єкт Comment
         * Викликаємо його метод getComment()
         */
    }

    /**
     * @param string $text
     * @param int $commentId
     * @return bool
     */
    public function saveEditedComment(string $text, int $commentId): bool
    {
        /*
         * Створюємо об'єкт Comment
         * Заповнюємо його властивості
         * Виконуємо метод saveEditedComment() об'єкта Comment
         * Повертаємо результат його роботи
         */
    }

    /**
     * @param $commentId
     * @return bool
     */
    public function deleteComment($commentId): bool
    {
        /*
         * Створюємо об'єкт Comment
         * Викликаємо його метод delete()
         * Повертаємо результат його роботи
         */
    }

    public function logout(): void
    {
        //закриваємо сесію
    }

    /**
     * @param array $userData
     * @return array список помилок при реєстрації або порожній масив
     */
    private function validate(): array
    {
        //перевіряємо правильність властивостей об'єкта
        //формуємо список помилок
    }

    /**
     * @return bool результат додавання нового користувача
     */
    private function addNewUser(): bool
    {
        /*
         * Підключаємося до БД
         * Додаємо запис про нового користувача
         */
    }

    /**
     * @param int $userId
     * @return array
     */
    private function getUser(string $login, string $password): array
    {
        /*
         * Підключаємося до БД
         * Шукаємо в ній користувача з вказаним логіном та паролем
         * Якщо знаходимо - повертаємо інформацію про нього
         * Якщо не знаходимо - повертаємо порожній масив
         */
    }
}