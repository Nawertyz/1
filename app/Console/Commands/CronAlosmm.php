<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\Serivce\AlosmmController;
use App\Models\Orders;
use Illuminate\Console\Command;

class CronAlosmm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:alosmm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron service alosmm';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        $this->info('Cron alosmm: ' . date('d-m-Y H:i:s'));
        $data = Orders::where('actual_service', 'alosmm')
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
            $tts = new AlosmmController();
           
            $order_code = $item->order_code;
            $data = $tts->order($order_code);
            if ($data['status']) {
               
                // var_dump($data['data']['items'][0]['status']);
                // $status = $data['data']['items'][0]['status'];
                // $start = $data['data']['items'][0]['start'];
                // $buff = $data['data']['items'][0]['buff'];
                $status = $data['status'];
                $quantity = $item->quantity;
                $start = $data['start_count'];
                $buff = $quantity-$data['remains'];
                $order_history = json_decode($item->history, true);
                if ($status == 'Success' || $status == 'Completed' ) {
                    $order_history[] = [
                        'time' => date('H:i d/m/Y'),
                        'status' => 'success',
                        'title' => "Đơn hàng đã hoàn thành",
                    ];
                    $item->history = json_encode($order_history);
                }

                if ($status == 'Failed') {
                    $order_history[] = [
                        'time' => date('H:i d/m/Y'),
                        'status' => 'danger',
                        'title' => "Đơn hàng thất bại",
                    ];
                    $item->history = json_encode($order_history);
                }

                if ($status == 'Cancelled') {
                    $order_history[] = [
                        'time' => date('H:i d/m/Y'),
                        'status' => 'danger',
                        'title' => "Đơn hàng đã bị huỷ",
                    ];
                    $item->history = json_encode($order_history);
                }
                if ($status == 'In progress') {
                    $order_history[] = [
                        'time' => date('H:i d/m/Y'),
                        'status' => 'primary',
                        'title' => "Đơn hàng đang chạy",
                    ];
                    $item->history = json_encode($order_history);
                }

                if ($status == 'Refunded') {
                    $order_history[] = [
                        'time' => date('H:i d/m/Y'),
                        'status' => 'danger',
                        'title' => "Đơn hàng đã được hoàn tiền",
                    ];
                    $item->history = json_encode($order_history);
                }

                $item->status = $status;
                $item->start = $start;
                $item->buff = $buff;
                $item->save();
            }
            $count++;
        }


        $this->info('Cron alosmm: ' . $count . ' orders');
        
    }
}
