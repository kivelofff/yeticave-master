<?php
/**
 * @var $items
 * */
require_once "util.php";
require_once("data.php");
require_once "functions.php";

$is_auth = (bool) rand(0, 1);


$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$page_content =  renderTemplate('templates/index.php', ['items' => $items]);

$layout_content = renderTemplate('templates/layout.php', ['title' => 'Главная', 'content' => $page_content]);

print($layout_content);
?>

