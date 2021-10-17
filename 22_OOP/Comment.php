<?php

class Comment
{
    /**
     * @var int
     */
    private int $commentId;

    /**
     * @var string
     */
    private string $date;

    /**
     * @var string
     */
    private string $text;

    /**
     * @var int
     */
    private int $author;


    //для кожної властивості прописуємо getter setter. В getter повертаємо значення властивості, а в setter задаємо її значення
    // і можливо проводимо якісь перевірки

    /**
     * @return string
     */
    public function getText(): string
    {
        /*
         * повертаємо текст коментаря
         */
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        /*
         * Присвоюємо значення для властивості $login
         */
    }

    /**
     * @return bool
     */
    public function addNewComment(): bool
    {
        /*
         * Підключаємося до БД
         * Додаємо запис, заповнений із властивостей класу
         * Повертаємо результат виконання запиту
         */
    }

    /**
     * @param int $commentId
     * @return array
     */
    public function getComment(int $commentId): array
    {
        /*
         * Підключаємося до БД
         * Шукаємо запис по його id
         * Повертаємо запис
         */
    }

    /**
     * @return bool
     */
    public function saveEditedComment(): bool
    {
        /*
         * Підключаємося до БД
         * Редагуємо запис, заповнений із властивостей класу
         * Повертаємо результат виконання запиту
         */
    }

    /**
     * @param int $commentId
     * @return bool
     */
    public function delete(int $commentId): bool
    {
        /*
         * Підключаємося до БД
         * Видаляємо запис по його id
         * Повертаємо результат виконання запиту
         */
    }
}