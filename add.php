<?php
require_once 'functions.php';
$method =$_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $layout_content = renderTemplate('templates/layout.php',['title'=>'Add lot', 'content'=>file_get_contents('templates/add-lot.php')]);
    print($layout_content);

} elseif ($method == 'POST') {

} else {
    http_response_code(400);
}
