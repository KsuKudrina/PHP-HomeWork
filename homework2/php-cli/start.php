<?php

//1. 
/**
 * 1. Реализовать основные 4 арифметические операции 
 * в виде функции с тремя параметрами  
 * два параметра – это числа, третий – операция. 
 * Обязательно использовать оператор return.
 */

function arithmeticOperations(int $arg1, int $arg2, string $operation): float | string
{
    if ($operation == 'sum') {
        return $arg1 + $arg2;
    }
    if ($operation == 'diff') {
        return $arg1 - $arg2;
    }
    if ($operation == 'multiply') {
        return $arg1 * $arg2;
    }
    if ($operation == 'divide') {
        if ($arg2 === 0) {
            return "Division by 0!";
        }else{
            return $arg1 / $arg2;
        }
    } else {
        return "error";
    }
}

echo "---------- Задание 2 ----------";
echo PHP_EOL;
/**
 * 2. Реализовать функцию с тремя параметрами: 
 * function mathOperation($arg1, $arg2, $operation), 
 * где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. 
 * В зависимости от переданного значения операции выполнить одну из арифметических операций 
 * (использовать функции из пункта 1) и вернуть полученное значение (использовать switch).
 */

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case 'sum':
            echo arithmeticOperations($arg1, $arg2, 'sum');
            break;
        case 'diff':
            echo arithmeticOperations($arg1, $arg2, 'diff');
            break;
        case 'multiply':
            echo arithmeticOperations($arg1, $arg2, 'multiply');
            break;
        case 'divide':
            echo arithmeticOperations($arg1, $arg2, 'divide');
            break;
        default:
            echo "Error! Unknown operation";
    }
}

mathOperation(2, 0, 'divide');
echo PHP_EOL;
echo "---------- Задание 3 ----------";
echo PHP_EOL;

//3.
/**
 * 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, 
 * а в качестве значений – массивы с названиями городов из соответствующей области. 
 * Вывести в цикле значения массива, чтобы результат был таким: 
 * Московская область: Москва, Зеленоград, Клин 
 * Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт 
 * Рязанская область … (названия городов можно найти на maps.yandex.ru).
 *  
 */ 

$regions = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин',
        'Сергиев Посад'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург',   
        'Всеволожск',
        'Павловск',
        'Кронштадт'
    ],
    'Рязанская область' => [
        'Рязань',
        'Касимов',
        'Рыбное',
        'Ряжск'
    ]
];

foreach ($regions as $region => $cities) {
    echo "{$region}:" . PHP_EOL;
    foreach ($cities as $city) {
        echo "      {$city }". PHP_EOL;
    }
}
echo PHP_EOL;
echo "---------- Задание 4 ----------";
echo PHP_EOL;

/**
 * Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’). Написать функцию транслитерации строк.
 */

$alfabet = [
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
    ' ' => ' ',   ',' => ',',   '.' => '.',
];

$str = 'Жизнь меняется, когда меняемся мы.';

function transliterationOfStrings($str, $alfabet){
    $arrayCharacters = mb_str_split($str);
    // print_r( $arrayCharacters);
    $newString = '';
    for ($i=0; $i < count($arrayCharacters); $i++) { 
        foreach ($alfabet as $key => $value) {
            if (mb_strtolower($arrayCharacters[$i]) === $key && mb_strtolower($arrayCharacters[$i]) !== $arrayCharacters[$i]) {
                $newString .= strtoupper($value);
            }else if (mb_strtolower($arrayCharacters[$i]) === $key && mb_strtolower($arrayCharacters[$i]) === $arrayCharacters[$i]) {
                $newString .= $value;
            }
            // else if (mb_strtolower($arrayCharacters[$i]) !== $key ){
            //     $newString .= $arrayCharacters[$i];
            // }
            // не получилось написать условие для добавления знаков и пробелов
            // Все вроде логично. Буду рада если поясните в чем ошибка. 
        }
    }
    return $newString;
}
echo transliterationOfStrings($str, $alfabet);
echo PHP_EOL;
echo "-------------------------------";