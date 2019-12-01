<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];

$recaptcha = $_POST['gcaptcha'];
$secret_key = '6Ld0_8QUAAAAAEBh1ccUlnJ_EYKe-JT8qkqISXXs';

$file = $_FILES['file']['name'];
    $test = explode('.', $file);
    $ext = end($test);
    $name = rand(100, 999).'.'.$ext; 
    $location = './uploads/'.$name;

if ($recaptcha == '') {
    echo 'fail';
} else {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
        echo 'success';
    } else {
        echo 'file';
    }
}
