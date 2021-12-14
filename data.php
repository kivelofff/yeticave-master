<?php
// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
$items = [];
array_push($items, ["id" => 1,
    "title" => '2014 Rossignol District Snowboard',
    "category" => $categories[0],
    "price" => 10999,
    "URL" => "img/lot-1.jpg"]);
array_push($items, ["id" => 2,
    "title" => 'DC Ply Mens 2016/2017 Snowboard',
    "category" => $categories[0],
    "price" => 15999,
    "URL" => "img/lot-2.jpg"]);
array_push($items, ["id" => 3,
    "title" => 'Крепления Union Contact Рго 2015 года размер L/XL',
    "category" => $categories[1],
    "price" => 8000,
    "URL" => "img/lot-3.jpg"]);
array_push($items, ["id" => 4,
    "title" => 'Ботинки для сноуборда DC Mutiny Charocal',
    "category" => $categories[2],
    "price" => 10999,
    "URL" => "img/lot-4.jpg"]);
array_push($items, ["id" => 5,
    "title" => 'Куртка для сноуборда ОС Mutiny Charocal',
    "category" => $categories[3],
    "price" => 7500,
    "URL" => "img/lot-5.jpg"]);
array_push($items, ["id" => 6,
    "title" => 'Маска Oakley Сапору',
    "category" => $categories[5],
    "price" => 5400,
    "URL" => "img/lot-6.jpg"]);

?>
