<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\Serivce\TrumvipController;
use App\Models\Orders;
use Illuminate\Console\Command;

class CronTrumvip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:trumvip';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron service trumvip';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        $this->info('Cron Trumvip: ' . date('d-m-Y H:i:s'));
        $data = Orders::where('actual_service', 'trumvip')
            ->where('status', '!=', 'PendingOrder')
            ->where('status', '!=', 'Suspended')
            ->where('status', '!=', 'Completed')
            ->where('status', '!=', 'Success')
            ->where('status', '!=', 'Refunded')
            ->where('status', '!=', 'Failed')
            ->where('status', '!=', 'Cancelled')->get();

        /* add trong code */ 
        $order_code = '';
        $count = 0;
        foreach ($data as $item) { 
            $trumvip = new TrumvipController();
           
            $order_code = $item->order_code;
            $data = $trumvip->checkproxy($order_code);
            if ($data['success'] == true) {
               
                // var_dump($data['data']['items'][0]['status']);
                // $status = $data['data']['items'][0]['status'];
                $port = $data['data']['port'];
                $host = $data['data']['host'];
                $ipv6 = $data['data']['ip'];
                $proxy_id = $data['data']['proxy_id'];
                $user = $data['data']['user'];
                $pass = $data['data']['pass'];
                $status = "Success";
                // $start = $data['data'][0]['start'];
                // $buff = $data['data'][0]['buff'];
                $order_history = json_decode($item->history, true);
                if ($data['success'] == true) {
                    $order_history[] = [
                        'time' => date('H:i d/m/Y'),
                        'status' => 'success',
                        'title' => "Đơn hàng đã hoàn thành",
                    ];
                    $item->history = json_encode($order_history);
                }

                // if ($status == 'Failed') {
                //     $order_history[] = [
                //         'time' => date('H:i d/m/Y'),
                //         'status' => 'danger',
                //         'title' => "Đơn hàng thất bại",
                //     ];
                //     $item->history = json_encode($order_history);
                // }

                // if ($status == 'Cancelled') {
                //     $order_history[] = [
                //         'time' => date('H:i d/m/Y'),
                //         'status' => 'danger',
                //         'title' => "Đơn hàng đã bị huỷ",
                //     ];
                //     $item->history = json_encode($order_history);
                // }

                // if ($status == 'Refunded') {
                //     $order_history[] = [
                //         'time' => date('H:i d/m/Y'),
                //         'status' => 'danger',
                //         'title' => "Đơn hàng đã được hoàn tiền",
                //     ];
                //     $item->history = json_encode($order_history);
                // }
                $item->pass = $pass;
                $item->user = $user;
                $item->ipv6 =  $ipv6;
                $item->host =$host;
                $item->proxy_id =$proxy_id;
                $item->port =  $port;
                $item->status = $status;
                // $item->start = $start;
                // $item->buff = $buff;
                $item->save();
            }
            $count++;
        }


        $this->info('Cron Trumvip: ' . $count . ' orders');
        
    }
}
