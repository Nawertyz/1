<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\Serivce\TrumController;
use App\Models\Orders;
use App\Models\User;
use App\Models\DataHistory;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class CronTrum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:trum';

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
        // return Command::SUCCESS;
        $this->info('Cron trum: ' . date('d-m-Y H:i:s'));
        $data = Orders::where('actual_service', 'trum')
            ->where('status', '!=', 'Suspended')
            ->where('status', '!=', 'Completed')
            ->where('status', '!=', 'Success')
            ->where('status', '!=', 'Refunded')
            ->where('status', '!=', 'Failed')
            ->where('status', '!=', 'Cancelled')->where('status', '!=', 'Hoan')->get();


        $order_code = '';
        $count = 0;
        foreach ($data as $item) {
            $mxh = new TrumController();
            $mxh->path = $item->actual_path;
          
            $order_code = $item->order_code;
            $data = $mxh->order($order_code);
            if ($data['success'] == true) {
                if (isset($data['data'])) {

                    $status = $data['data'][0]['status'];
 
                    $buff = $data['data'][0]['count_success'];
                    $order_history = json_decode($item->history, true);
                    if ($status == 'completed') {
                        $order_history[] = [
                            'time' => date('H:i d/m/Y'),
                            'status' => 'success',
                            'title' => "Đơn hàng hoàn thành",
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

                    if ($status == 'canceled') {
                        $order_history[] = [
                            'time' => date('H:i d/m/Y'),
                            'status' => 'danger',
                            'title' => "Đơn hàng đã bị huỷ",
                        ];
                        $item->history = json_encode($order_history);
                    }

                    if ($status == 'Refund') {
                        $order_history[] = [
                            'time' => date('H:i d/m/Y'),
                            'status' => 'danger',
                            'title' => "Đơn hàng đã được hoàn tiền",
                        ];
                        $item->history = json_encode($order_history);
                    }
                      if ($status == 'stop') {
                                            $order_history[] = [
                                                'time' => date('H:i d/m/Y'),
                                                'status' => 'warning',
                                                'title' => "Đơn hàng đang tạm bị hoãn",
                                            ];
                                            $item->history = json_encode($order_history);
                                        }
                    if ($status == 'pending') {
                        $order_history[] = [
                            'time' => date('H:i d/m/Y'),
                            'status' => 'warning',
                            'title' => "Đơn hàng đang được chuẩn bị",
                        ];
                        $item->history = json_encode($order_history);
                    }
                  

                    if($status == 'inprocessing'){
                        $status = 'Active';
                    }elseif($status == 'Waiting'){
                        $status = 'Pending';
                    }elseif($status == 'active'){
                        $status = 'Active';
                    }elseif($status == 'pending'){
                        $status = 'Pending';
                    }elseif($status == 'Paused'){
                        $status = 'Suspended';
                    }elseif($status == 'canceled'){
                        $status = 'Failed';
                    }elseif($status == 'completed'){
                        $status = 'Success';
                    }

                    $item->status = $status;
             
                    $item->buff = $buff;
                    $item->save();
                 
                    $count++;
                   
                }
            }
        }


        $this->info('Cron trum: ' . $count . ' orders');
    }
}
