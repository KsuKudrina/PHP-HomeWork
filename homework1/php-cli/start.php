<?php
/**
 * 
 * Основы PHP. Урок 1. Введение в PHP
 * Выполните код в контейнере PHP CLI и объясните, что выведет данный код и почему:
 * <?php
 *   $a = 5;
 *   $b = '05';
 *   var_dump($a == $b);
 *   var_dump((int)'012345');
 *   var_dump((float)123.0 === (int)123.0);
 *   var_dump(0 == 'hello, world');
 *   ?>
*
*
*
*/
// Задание 2
$a = 5;
$b = '05';


var_dump($a == $b); // true - неявное преобразование типов
var_dump((int)'012345'); // 12345 - int
var_dump((float)123.0 === (int)123.0); // false - после явного преобразования типов (int)123.0 станет целочисленным
var_dump(0 == 'hello, world'); // false - число 0 не равно строке
/**
* В контейнере с PHP CLI поменяйте версию PHP с 8.2 на 7.4.
* Изменится ли вывод?
*/

// Если поменять версию PHP с 8.2 на 7.4. вывод измениться в последнем выражении var_dump(0 == 'hello, world')
// В версии php:7.4 выведет true т.к. приводит строку к 0

/**
* Используя только две числовые переменные, поменяйте их значение местами.
* Например, если a = 1, b = 2, надо, чтобы получилось: b = 1, a = 2.
* Дополнительные переменные, функции и конструкции типа list() использовать нельзя.
*/
$a = 1;
$b = 2;
echo "a = {$a}, b = {$b } <br />";

// $a = $a + $b;
// $b = $a - $b;
// $a = $a - $b;

// XOR
$a = $a ^ $b;
$b = $b ^ $a;
$a = $a ^ $b;

echo "b = {$b }, a = {$a}";