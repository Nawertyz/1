<?php

namespace App\Http\Controllers\Api\Serivce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PFBController extends Controller
{
    // private $api_token;
   private $apiToken;
    public $path = "";
    public $server = "";
    public $data = [
        'order_link' => '',
        'quantity' => '',
        'speed' => '',
        'comment' => '',
        'minutes' => '',
        'time' => '',
        'days' => '',
        'post' => '',
        'reaction' => '',
        'server_order' => '',
        'social' => '',
    ];

    public function __construct()
    {
        $this->apiToken = env('TOKEN_PFB');
    }
     
    public function CreateOrder()
    {
        $apiToken = $this->apiToken;
        $url = "https://perfectboostbd.pro/api/v2";
      
        $data = $this->data;
        $dataPost = [
            'key' => $apiToken,
            'action' => 'add', // Hoạt động cần thực hiện (ở đây là 'add')
            'service' => $data['server_order'] ?? '', // Thay thế bằng ID dịch vụ mong muốn
            'link' => $data['order_link'] ?? '', // Thay thế bằng đường dẫn (link) bạn muốn thực hiện
            'quantity' => $data['quantity'] ?? '0', // Thay thế bằng số lượng cần
            'reaction' => $data['reaction'] ?? 'like', // Phản ứng mong muốn (tùy chọn), mặc định là 'like'
            'minutes' => $data['minutes'] ?? '0', // Số phút (tùy chọn), mặc định là '30'
            'dayvip' => $data['days'] ?? '0' ,

 
        ];

        $result = $this->curl($url, $dataPost);
        if (isset($result['order'])) {
            return $data = [
                'status' => true,
                'message' => "Đặt đơn hàng thành công",
                'data' => $result['order'],
            ];
        } else {
            return $data = [
                'status' => false,
                'message' => $result['error'],
                'data' => '',
            ];
        }
    }

    public function order($order_code)
    {
        $apiToken = $this->apiToken;
        $url = "https://perfectboostbd.pro/api/v2";
      
         
        $dataPost = [
            'key' => $apiToken,
            'action' => 'status', // Hoạt động cần thực hiện (ở đây là 'add')
           'order' => $order_code,

 
        ];

        $result = $this->curl($url, $dataPost);
        return $result;
        
    }

    public function curl($path, $data = [])
    {
        $data_string = http_build_query($data);
        
        // Cấu hình yêu cầu API
        $ch = curl_init($path);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded'
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        
      
      
        return  json_decode($result, true);
    }

 
}

