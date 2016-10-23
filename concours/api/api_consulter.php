<?php

$messagesDeLaBdd = Message::find_one($_GET['identifiant']);

$messages = [];
foreach ($messagesDeLaBdd as $messageDeLaBdd) {
  $messages[] = $messageDeLaBdd->asArray();
}

echo json_encode('detail');
echo json_encode($messages);
