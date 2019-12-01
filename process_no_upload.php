<?php 

if ( !empty( $_POST ) ) {

     $name = $_POST['name'];
     $phone = $_POST['phone'];
    //$file = $_FILES['file']['name'];
    $captcha = $_POST['g-recaptcha-response'];

    if ( $name == '') {
        $errname = 'Name is required.';
    } else {
        $errname = '';
    }

    if ( $phone == '' ) {
        $errphone = 'Phone number is required.';
    } else {
        $errphone = '';
    }   

    if ( $captcha == '' ) {
        $errcaptcha = 'Please verify that you\'re a human.';
    } else {
        $secret_key = '6Ld0_8QUAAAAAEBh1ccUlnJ_EYKe-JT8qkqISXXs';
        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
        $response_data = json_decode($response);
        if (!$response_data->success) {
            $errcaptcha = "Please verify you are a human.";
        } else {
            $errcaptcha = '';
        }
    }
    
    $errors = array (
        'err_name' => $errname,
        'err_phone' => $errphone,
        'err_captcha' => $errcaptcha,
    );

    $result = json_encode( $errors ); 
    echo $result;
    
} 

