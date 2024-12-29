<?php

namespace App\Http\Controllers\Api\Serivce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TuongtacsaleController extends Controller
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
        $this->apiToken = env('TOKEN_TTS');
    }
     
    

    public function order($order_code)
    {
        $apiToken = $this->apiToken;
        $url = "https://smm.tuongtacsale.com/api/v2";
      
         
        $dataPost = [
            'key' => $apiToken,
            'action' => 'status', // Hoạt động cần thực hiện (ở đây là 'add')
           'orders' => $order_code,

 
        ];

        $result = $this->curl($url, $dataPost);
        return $result;
        
    }
    public function CreateOrder()
    {
        $apiToken = $this->apiToken;
        $url = "https://smm.tuongtacsale.com/api/v2";
      
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
        if (isset($result['orders'])) {
            return $data = [
                'status' => true,
                'message' => "Đặt đơn hàng thành công",
                'data' => $result['orders'],
            ];
        } elseif (isset($result['order'])){
            return $data = [
                'status' => true,
                'message' => "Đặt đơn hàng thành công",
                'data' => $result['order'],
            ];
        }elseif (isset($result['error'])){
            return $data = [
                'status' => false,
                'message' => $result['error'],
                'data' => '',
            ];
        }
        
        
        else {
            return $data = [
                'status' => false,
                'message' => $result,
                'data' => '',
            ];
        }
    }
    public function curl($path, $data = [])
    {
        $data_string = http_build_query($data);
        
        
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $path,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $data_string,
));

$result = curl_exec($curl);

curl_close($curl);
        
      
      
        return  json_decode($result, true);
    }

 
}

