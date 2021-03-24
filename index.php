<?php 
    const token = '1602790385:AAHphMQW8Oa-QaLLwfm_0qxWfUJ-vf9Cvfk';
    $link = 'https://api.telegram.org/bot'.token;

    $updates = file_get_contents('php://input');
    $updates = json_decode($updates, true);

    $msg_id = $updates['message']['from']['id'];
    $text = $updates['message']['text'];

    function sendMsg ($text, $msg_id) {
        global $link;

        $url = $link.'/sendMessage?chat_id='.$msg_id.'&text='.urlencode($text);
        file_get_contents($url);
    }

    if ($text == 'hi') {
        sendMsg('hello', $msg_id);
        echo $text;
    }
?>