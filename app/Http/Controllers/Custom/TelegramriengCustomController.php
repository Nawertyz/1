<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\BotCommand;


class TelegramriengCustomController extends Controller
{

    private $bot1;
   

    public function __construct()
    {
        $this->bot1 = new TeleBot(DataSite('telegram_token_tb_smm'));
        
    }

    public function bot1()
    {
        return $this->bot1;
    }
   


    public function sendMessage($text, $reply_markup = null)
    {
        return $this->bot1->sendMessage([
            'chat_id' => DataSite('telegram_chat_id'),
            'text' => $text,
            'reply_markup' => $reply_markup,
        ]);
    }
    



    public function deleteMyCommands()
    {
        $this->bot1->deleteMyCommands();
        return response()->json([
            'status' => 'success',
            'message' => 'delete commands success'
        ]);
    }
}
