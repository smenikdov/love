<?php 
$text = "asds";
$token = "2146139707:AAGkbTjTkM33RA_9q7sKjEzBOq-519S9ReI";
$chat_id = "-1001731224960";

$data = [
  'text' => $text ,
  'chat_id' => $chat_id
];
file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
?>

