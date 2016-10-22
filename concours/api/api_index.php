<?php

$messagesDeLaBdd = Message::order_by_desc('id')->find_many();
$messages = [];
foreach ($messagesDeLaBdd as $messageDeLaBdd) {
  $messages[] = $messageDeLaBdd->asArray();
}
echo json_encode($messages);
