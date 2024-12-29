<?php

namespace App\Http\Controllers\Api\Serivce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmmkingController extends Controller
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
        $this->apiToken = env('TOKEN_SMMKING');
    }
     
    public function CreateOrder()
    {
        $apiToken = $this->apiToken;
        $url = "https://smmking.vip/api/v2";
      
        $data = $this->data;
        $dataPost = [
             'key' => $apiToken,
            'action' => 'add', // Hoạt động cần thực hiện (ở đây là 'add')
            'service' => $data['server_order'] ?? '', // Thay thế bằng ID dịch vụ mong muốn
            'link' => $data['order_link'] ?? '', // Thay thế bằng đường dẫn (link) bạn muốn thực hiện
            'quantity' => $data['quantity'] ?? '0', // Thay thế bằng số lượng cần
            'reaction' => $data['reaction'] ?? 'like', // Phản ứng mong muốn (tùy chọn), mặc định là 'like'
            'minutes' => $data['minutes'] ?? '0', // Số phút (tùy chọn), mặc định là '30'
            'comments' => $data['comment'] ?? '' ,
         

 
        ];

        $result = $this->curl($url, $dataPost);
        if (isset($result['order'])){
        if ($result['order']) {
            return $data = [
                'status' => true,
                'message' => "Đặt đơn hàng thành công",
                'data' => $result['order'],
            ];
        } else {
            return $data = [
                'status' => false,
                'message' => $result['error'],
            ];
        }
        }
        else{
         return $data = [
                'status' => false,
                'message' => $result['error'],
            ];
        }
    }

    public function order($order_code)
    {
        $apiToken = $this->apiToken;
        $url = "https://smmking.vip/api/v2";
      
        $data = $this->data;
        $dataPost = [
            'key' => $apiToken,
            'action' => 'status', // Hoạt động cần thực hiện (ở đây là 'add')
            'order' => $order_code,

 
        ];

        $result = $this->curl($url, $dataPost);
        return $result;
        
    }
    public function check()
    {
        $apiToken = $this->apiToken;
        $url = "https://smmking.vip/api/v2";
      
        $data = $this->data;
        $dataPost = [
            'key' => $apiToken,
            'action' => 'services', // Hoạt động cần thực hiện (ở đây là 'add')
       

 
        ];
  
         $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true); # USING POST METHOD, GET METHOD ALSO AVAILABLE
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dataPost));
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
        
    }

    public function curl($path, $data = [])
    {
        $data_string = http_build_query($data);
         $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true); # USING POST METHOD, GET METHOD ALSO AVAILABLE
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $result = curl_exec($ch);
        curl_close($ch);
      
      
        return  json_decode($result, true);
    }

 
}

