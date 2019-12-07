<?php 
define('TOKEN', getenv('token'));
define('API', 'https://api.telegram.org/bot'.TOKEN.'/');

$data = json_decode(file_get_contents('php://input'));

switch ($data->message->text) {
	case '/start':
		$result = file_get_contents(API.'sendMessage?'.http_build_query([
			'chat_id' => $data->message->chat->id,
			'text'=> 'Hello, I BOT!'
		]));
		break;
	
	default:
		$result = file_get_contents(API.'sendMessage?'.http_build_query([
			'chat_id' => $data->message->chat->id,
			'text'=> $data->message->text
		]));
		break;
}

print_r($result);