<?php

ini_set('display_errors',1); //Вывод ошибок на экран
error_reporting(E_ALL); //Вывод ВСЕХ ошибок

//Функция для вывода дебагинга
function debug($str){
    echo '<pre>';
    var_dump($str); //Вывод полной инфы(содержимое и структура переменной)
    echo '</pre>';
    exit;
}