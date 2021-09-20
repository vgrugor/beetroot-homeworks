<?php

$userWithShortPassword = array_filter($fileContentInArray, 'getUserWithShortPassword');

function getUserWithShortPassword($user)
{
    if (strlen($user['password']) < 8) {
        return $user;
    }
}
