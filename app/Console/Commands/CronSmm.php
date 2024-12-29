<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\Serivce\SmmkingController;
use App\Models\Orders;
use App\Models\User;
use App\Http\Controllers\Custom\TelegramriengCustomController;
use App\Models\DataHistory;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CronSmm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:smm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
     
     
        $tts = new SmmkingController();
        $service = $tts->check();
        
            // file_put_contents(__DIR__ . '/smm.txt', $fileContent);
        $fileContent = file_get_contents(__DIR__ . '/smm.txt');
        $data = json_decode($fileContent, true);
        // echo $service;
        $sev= json_decode($service, true);
        foreach ($data as $item){
            $id=$item['service'];
       
            $rate= $item['rate'];
            foreach ($sev as $services1){
                if($id == $services1['service']){
                    if($rate > $services1['rate']){
                         $message = '
┣➤ Nguồn: SMMKING.VIP
┣➤ Hành động: Giảm giá
┣➤ ID máy chủ: '.$services1['service'].'
┣➤ Dịch vụ: '.$services1['name'].'
┣➤ Smmking giảm giá từ '.$rate.'  ->  '.$services1['rate'].'
';
                                                                      if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TelegramriengCustomController();
                                                                            $bot = $tele->bot1();
                                                                            $bot->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => $message,
                                                                            ]);
                                                                        }
                                                                        file_put_contents(__DIR__ . '/smm.txt', $service);
                                                                   
                    }
                    elseif($rate < $services1['rate']){
                         $message = '
┣➤ Nguồn: SMMKING.VIP
┣➤ Hành động: Tăng giá
┣➤ ID máy chủ: '.$services1['service'].'
┣➤ Dịch vụ: '.$services1['name'].'
┣➤ Smmking tăng giá từ '.$rate.'  ->  '.$services1['rate'].'
';
                                                                      if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TelegramriengCustomController();
                                                                            $bot = $tele->bot1();
                                                                            $bot->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => $message,
                                                                            ]);
                                                                        }
                                                                        file_put_contents(__DIR__ . '/smm.txt', $service);
                    }
                    else{
                        
                    }
                }
            }
        }
         
    }
}
