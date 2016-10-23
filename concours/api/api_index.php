<?php
// l'api avec l'action index nous permet d'afficher tous les messages au format json
$messagesDeLaBdd = Message::order_by_desc('id')->find_many();
$messages = [];
foreach ($messagesDeLaBdd as $messageDeLaBdd) {
  $messages[] = $messageDeLaBdd->asArray();
}
echo json_encode($messages);
