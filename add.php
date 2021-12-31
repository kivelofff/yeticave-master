<?php
require_once 'functions.php';

const EMPTY_ERR = 'Value is empty';
const LEN_ERR = 'Field length should be more than 3 symbols';
const NUM_ERR = 'Value should be numeric';
const NO_FILE_ERR = 'Please attach file';
const FILE_SIZE_ERR = 'File is too big. please upload file less than 2MB';
const FILE_EXT_ERR = 'File should be an image with extension like .jpg, .gif etc';

$method =$_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $layout_content = renderTemplate('templates/layout.php',['title'=>$_SERVER['REQUEST_METHOD'],'mainclass'=>'', 'content'=>renderTemplate('templates/add-lot.php', null)]);
    print($layout_content);

} elseif ($method == 'POST') {
    $errors = [];
    $title = checkTextField($_POST['lot-name'], 'title', $errors);
    $category = checkNotEmptyAndSafe($_POST['category'], 'category', $errors);
    $description = checkTextField($_POST['message'], 'description', $errors);
    $URL = checkFile('URL', $errors);
    $price = checkNumField($_POST['lot-rate'], 'price', $errors);
    $price_step = checkNumField($_POST['lot-step'], 'price_step', $errors);

    if (empty($errors)) {
        $data = compact('title', 'category', 'description', 'URL', 'price', 'price_step');
        $page_content = renderTemplate('templates/lot.php', $data);

        $layout_content = renderTemplate('templates/layout.php',['title'=>'Lotinfo', 'mainclass'=>'', 'content'=>$page_content]);
        print($layout_content);
    } else {
        $data = compact('title', 'category', 'description', 'URL', 'price', 'price_step', 'errors');
        $page_content = renderTemplate('templates/add-lot.php', $data);

        $layout_content = renderTemplate('templates/layout.php',['title'=>'Lotinfo', 'mainclass'=>'', 'content'=>$page_content]);
        print($layout_content);
    }

} else {
    http_response_code(400);
}

function checkNotEmptyAndSafe($string, $type, &$errors) {
    if ($string == '') {
        $errors[$type] = EMPTY_ERR;
    }
    return htmlspecialchars($string);
}

function checkTextField($str, $type, &$errors) {
    $string = checkNotEmptyAndSafe($str, $type, $errors);
    if (strlen($string)<3) {
        if (!isset($errors[$type])) {
            $errors[$type] = LEN_ERR;
        }
    }
    return $string;
}

function checkNumField($number, $type, &$errors) {
    if (!is_numeric($number)) {
        $errors[$type] = NUM_ERR;
    }
    return $number;
}

function checkFile($type, &$errors) {
    $filename = 'photo2';
    $files = $_FILES;
    if(isset($_FILES[$filename])) {
     if (is_array(getimagesize($_FILES[$filename]['tmp_name']))) {
         if ($_FILES[$filename]['size'] < 2*1024*1024) {
             $fname = "img/".$_FILES[$filename]['name'];
            move_uploaded_file($_FILES[$filename]['tmp_name'],$fname);
            return $fname;
         } else {
             $errors[$type] = FILE_SIZE_ERR;
         }
     } else {
         $errors[$type] = FILE_EXT_ERR;
     }
     return $_FILES['file']['tmp_name'];
 } else {
     $errors[$type] = NO_FILE_ERR;
     return '';
 }
}
