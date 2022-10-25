<?php
/**
 * 
 *
 * @author - Komron Yusufjonovich
 */
header('Content-Type: text/html; charset=utf-8');
// подрубаем API
require_once("vendor/autoload.php");

// дебаг
if(true){
	error_reporting(E_ALL & ~(E_NOTICE | E_USER_NOTICE | E_DEPRECATED));
	ini_set('display_errors', 1);
}

// создаем переменную бота
$token = "1137264483:AAHlVFokiR8I2gqO-eEA8dffZu6UIdUq4ZI";
$bot = new \TelegramBot\Api\Client($token,null);




if($_GET["bname"] == "--Bot Name"){
	$bot->sendMessage("--User Name", "Выберите язык");
}

// если бот еще не зарегистрирован - регистируем
if(!file_exists("registered.trigger")){ 

	 
	// URl текущей страницы
	$page_url = "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	$result = $bot->setWebhook($page_url);
	if($result){
		file_put_contents("registered.trigger",time()); // создаем файл дабы прекратить повторные регистрации
	} else die("ошибка регистрации");
}

// Команды бота


$bot->command("start", function ($message) use ($bot) {
	$user = $message->getFrom()->getUsername();
	$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_test', 'text' => 'Русский'],
				['callback_data' => 'n', 'text' => 'English']
			]
		]
	);

	$bot->sendMessage($message->getChat()->getId(), "Выберите язык", false, null,null,$keyboard);
	//$bot->sendMessage("212439850", "Новый пользователь @$user");//toadminmessage
});

// помощ
$bot->command('help', function ($message) use ($bot) {
    $answer = 'Команды:
    /help - помощь
';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});


// Кнопки у сообщений


// Обработка кнопок у сообщений
$bot->on(function($update) use ($bot, $callback_loc, $find_command){
	$callback = $update->getCallbackQuery();
	$message = $callback->getMessage();
	$chatId = $message->getChat()->getId();
	$data = $callback->getData();
	
	if($data == "data_test"){
		$bot->answerCallbackQuery( $callback->getId(),true);
        $bot->sendMessage($chatId,"Вы выбрали русский язык!");
        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(
            [[["text" => "🛒 Категории"],["text" => "🏢 О Нас"]],
            [["text" => "👥 Наша команда"],["text" => "⚙️ Настройки"]],
            [["text" => "📞📨 Контакты"]]],true, true);
        $bot->sendMessage($message->getChat()->getId(), "Главное меню", false, null,null, $keyboard);
	}
	
	//catalog Oziq_ ovqat mahsulotlari
	if($data == "data_cat1"){
		$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_cat61', 'text' => 'Продукт1'],
			],
			[
				['callback_data' => 'data_cat62', 'text' => 'Продукт2'],
			],
		
		
		]
	);

	$bot->sendMessage($message->getChat()->getId(), "Продукты 🍅🍏🍐👠🍇🌯🍶", false, null,null,$keyboard);
	}
	//catalog Choy mahsulotlari
	if($data == "data_choy"){
		$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_cat23', 'text' => 'Чай'],
			],
			[
				['callback_data' => 'data_cat24', 'text' => 'Кофе'],
			],
		
		]
	);

	$bot->sendMessage($message->getChat()->getId(), "Чай и кофе 🍅🍏🍐👠🍇🌯🍶", false, null,null,$keyboard);
	}
	
	//catalog xojalik mahsulotlari
	if($data == "data_cat989"){
		$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_cat23', 'text' => 'Ягончи 1'],
			],
			[
				['callback_data' => 'data_cat24', 'text' => 'Ягончи 2'],
			],
		
		]
	);
	$bot->sendMessage($message->getChat()->getId(), "Хочагии дехкони 🍅🍏🍐👠🍇🌯🍶", false, null,null,$keyboard);
	}
	//catalog Choy mahsulotlari
	if($data == "data_kand"){
		$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_cat23', 'text' => 'Шоколад'],
			],
			[
				['callback_data' => 'data_cat24', 'text' => 'Торт'],
			],
			[
				['callback_data' => 'data_cat24', 'text' => 'Бо ягончи'],
			]
		]
	);
	$bot->sendMessage($message->getChat()->getId(), "Ширинихо 🍅🍏🍐👠🍇🌯🍶", false, null,null,$keyboard);
	}
	//catalog Go`sht mahsulotlari
	if($data == "data_gosht"){
		$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_pod44', 'text' => 'Гушти гов'],
			],
			[
				['callback_data' => 'data_pod44', 'text' => 'Гушти шер'],
			],
			[
				['callback_data' => 'data_pod44', 'text' => 'Гушти хом'],
			],
			[
				['callback_data' => 'data_pod44', 'text' => 'Гушти паланг'],
			]
		]
	);

	$bot->sendMessage($message->getChat()->getId(), "Махсулоти гушти 🍅🍏🍐👠🍇🌯🍶", false, null,null,$keyboard);
	}
	//catalog konserva mahsulotlari
	if($data == "data_kon"){
		$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_pod1', 'text' => 'Консерва 1'],
			],
			[
				['callback_data' => 'data_pod2', 'text' => 'Консерва 2'],
			]
		]
	);

	$bot->sendMessage($message->getChat()->getId(), "Консерва 🍅🍏🍐👠🍇🌯🍶", false, null,null,$keyboard);
	}
	//catalog konserva mahsulotlari
	if($data == "data_bola"){
		$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_pod1', 'text' => 'Молоко'],
			],
			[
				['callback_data' => 'data_pod2', 'text' => 'Соска'],
			],
			[
				['callback_data' => 'data_pod2', 'text' => 'Памперс'],
			]
		]
	);

	$bot->sendMessage($message->getChat()->getId(), "Бачачахоба🍅🍏🍐👠🍇🌯🍶", false, null,null,$keyboard);
	}
	//catalog konserva mahsulotlari
	if($data == "data_toz"){
		$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_pod1', 'text' => 'Мыло'],
			],
			[
				['callback_data' => 'data_pod2', 'text' => 'Шампунь'],
			]
		]
	);

	$bot->sendMessage($message->getChat()->getId(), "Парфюм 🍅🍏🍐👠🍇🌯🍶", false, null,null,$keyboard);
	}
	//napitok
	if($data == "data_cat4"){
	$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_cat_ru1', 'text' => 'Оби ширин'],
			],
				[
				['callback_data' => 'data_cat_ru1', 'text' => 'Pepsi'],
			],
			[
				['callback_data' => 'data_cat4', 'text' => 'RC Cola'],
			]
		]
	);


	$bot->sendMessage($message->getChat()->getId(), "Вода 🍅🍏🍐👠🍇🌯🍶", false, null,null,$keyboard);
	
	}
	
}, function($update){
	$callback = $update->getCallbackQuery();
	if (is_null($callback) || !strlen($callback->getData()))
		return false;
	return true;
});

// Отлов любых сообщений +обрабтка reply-кнопок
$bot->on(function($Update) use ($bot){
	
	$message = $Update->getMessage();
	$mtext = $message->getText();
	$cid = $message->getChat()->getId();
	
	
	
	if(mb_stripos($mtext, "🛒 Категории") !== false){
		
	$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_cat1', 'text' => '🧀 Продукты'],
			],
			[
				['callback_data' => 'data_choy', 'text' => '☕️ Чай, кофе'],
			],
			[
				['callback_data' => 'data_cat4', 'text' => '🍼 Вода'],
			],
			[
				['callback_data' => 'data_toz', 'text' => '👕 Парфюм'],
			],
			[
				['callback_data' => 'data_gosht', 'text' => '🍖 Махсулоти гушти'],
			],
			[
				['callback_data' => 'data_kand', 'text' => '🎂🍰 Ширинихо'],
			],
			[
				['callback_data' => 'data_bola', 'text' => '👧🏻👦Бачачахоба'],
			],
			[
				['callback_data' => 'data_kon', 'text' => '🏘 Консерва'],
			],
			[
				['callback_data' => 'data_cat989', 'text' => '🏘 Хочагии дехкони'],
			],
			[
				['callback_data' => 'data_cat9', 'text' => 'Другие'],
			]
		]
	);

	$bot->sendMessage($message->getChat()->getId(), "Все категории магазин 🍅🍏🍐👠🍇🌯🍶", false, null,null,$keyboard);

	}
	
		
	if(mb_stripos($mtext,"📞📨 Контакты") !== false){
        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(
            [[
			["text" => "📞 Телефон"],
			["text" => "📨 Email", "url"=> "info@shop.tj"]],
            [["text" => "🌍 Наш сайт"],
			["text" => "❓ Обратный звонок", "request_contact" => true]],
            [["text" => "🔙 Главное меню"]]],true, true);
        $bot->sendMessage($message->getChat()->getId(), "Контакты", false, null,null, $keyboard);
	
	}
	
	
	if(mb_stripos($mtext,"🔙 Главное меню") !== false){
		$keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(
            [[["text" => "🛒 Категории"],["text" => "🏢 О Нас"]],
            [["text" => "👥 Наша команда"],["text" => "⚙️ Настройки"]],
            [["text" => "📞📨 Контакты"]]],true, true);
        $bot->sendMessage($message->getChat()->getId(), "Меню", false, null,null, $keyboard);
		}
	
	if(mb_stripos($mtext,"📞 Телефон") !== false){
		$bot->sendMessage($message->getChat()->getId(), "Telegram: @OnlineShopTjBot");
		$bot->sendMessage($message->getChat()->getId(), "Phone: +992928837772");
	}
	if(mb_stripos($mtext,"📨 Email") !== false){
		$bot->sendMessage($message->getChat()->getId(), "info@shop.tj");
		$bot->sendMessage("318156487", "test@mail.ru");
		$bot->sendMessage("318156487", "$mtext, $cid");
		$bot->sendMessage("212439850", "test");
		$bot->sendMessage("212439850", "$qip, $cid");
	}
	if(mb_stripos($mtext,"❓ Обратный звонок") !== false){
		$bot->sendMessage("318156487", "$message->getChat()->getId()");
		$bot->sendMessage("212439850", "$message->getChat()->getId()");
	}
	if(mb_stripos($mtext,"👥 Наша команда") !== false){
		$bot->sendMessage($message->getChat()->getId(), "Приглашайте друзей https://t.me/OnlineShopTjBot?start=$cid");
	}
	if(mb_stripos($mtext,"🌍 Наш сайт") !== false){
		$bot->sendMessage($message->getChat()->getId(), "http://www.techstore.com");
	}
	if(mb_stripos($mtext,"⚙️ Настройки") !== false){
		
	$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_test', 'text' => 'Русский'],
				['callback_data' => 'data_test2', 'text' => 'English']
			]
		]
	);

	$bot->sendMessage($message->getChat()->getId(), "Выберите язык", false, null,null,$keyboard);

	}
	
	if(mb_stripos($mtext,"🏢 О Нас") !== false){
		$bot->sendMessage($message->getChat()->getId(), "Покупка товары, онлайн интернет магазин.");
	}
	
}, function($message) use ($name){
	return true; // когда тут true - команда проходит
});

// запускаем обработку
$bot->run();

echo "бот";