<?php

// SOURCE: https://phpenthusiast.com/blog/develop-angular-php-app-getting-the-list-of-items
// SOURCE: https://www.techiediaries.com/angular/angular-9-php-mysql-database/

// header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

include_once('config.php');

$post_data = file_get_contents("php://input");

if (isset($post_data) && !empty($post_data)) {
    $request = json_decode($post_data);

    $name_input = $request->name;
    $email_input = $request->email;
    $option_input = $request->option;
    $message_input = $request->message;

    $sql = "INSERT INTO Report (name, email, reason, message) VALUES (?,?,?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ssss', $name_input, $email_input, $option_input, $message_input);
    
    $entry = array(
        "name" => $name_input,
        "email" => $email_input,
        "reason" => $option_input,
        "message" => $message_input
    );
    if ($stmt->execute()) {
        echo json_encode($entry);
    } 
}


