<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\Serivce\TrumsubreController;
use App\Models\Orders;
use Illuminate\Console\Command;

class CronTrumsubre extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:trumsubre';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron service trumsubre';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        $this->info('Cron Trumsubre: ' . date('d-m-Y H:i:s'));
        $data = Orders::where('actual_service', 'trumsubre')
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
            $tsr = new TrumsubreController();
            $tsr->path = $item->actual_path;
            $order_code = $item->order_code;
            $data = $tsr->order($order_code);
            if (isset($data['status'])) {
            if ($data['status'] == true) {
               
                // var_dump($data['data']['items'][0]['status']);
                // $status = $data['data']['items'][0]['status'];
                // $start = $data['data']['items'][0]['start'];
                // $buff = $data['data']['items'][0]['buff'];
                $status = $data['data'][0]['status'];
                $start = $data['data'][0]['start'];
                $buff = $data['data'][0]['buff'];
                $order_history = json_decode($item->history, true);
                if ($status == 'Success') {
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


        $this->info('Cron Trumsubre: ' . $count . ' orders');
        }
    }
}
