<?php

$address = '/birthdays.txt';

$name = readline("Введите имя: ");
$date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");

if(validate($date)){
    $data = $name . ", " . $date . "\r\n";

    $fileHandler = fopen($address, 'a');

    if ($fileHandler === false) {
        echo "Не удалось открыть файл для записи.";
        exit();
    }
    
    if(fwrite($fileHandler, $data)){
        echo "Запись $data добавлена в файл $address";
    }
    else {
        echo "Произошла ошибка записи. Данные не сохранены";
    }
    
    fclose($fileHandler);
}
else{
    echo "Введена некорректная информация";
}

function validate(string $date): bool {
    $dateBlocks = explode("-", $date);

    if(count($dateBlocks) !== 3){
        echo "Ошибка: Дата должна содержать 3 компонента (ДД-ММ-ГГГГ).\n";
        return false;
    }

    list($day, $month, $year) = $dateBlocks;

    if(!is_numeric($day) || !is_numeric($month) || !is_numeric($year)) {
        echo "Ошибка: Все компоненты даты должны быть числами.\n";
        return false;
    }
    $day = (int)$day;
    $month = (int)$month;
    $year = (int)$year;

    if ($month < 1 || $month > 12) {
        echo " Ошибка: Месяц должен быть в диапазоне от 01 дл 12.\n";
        return false;
    }
    if ($day < 1 || $day > 31) {
        echo " Ошибка: День должен быть в диапазоне от 01 дл 31.\n";
        return false;
    }

    if(in_array($month, [4,6,9,11]) && $day > 30){
        echo"Ошибка: В этом месяце только 30 дней.\n";
        return false;
    }

    if ($month == 2) {
        if(($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
            if ($day > 29) {
                echo "Ошибка: в феврале в високосный год 29 дней.\n";
                return false;
            }
        } else {
            if($day > 28){
                echo "Ошибка: в феврале в невисокосный год 28 дней.\n";
                return false;
            }
        }
    }

    if ($year < 1900 || $year > date('Y')) {
        echo"Ошибка: Год должен быть в диапазоне от 1900 до текущего.\n";
        return false;
    }

    return true;
}


