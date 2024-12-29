<?php

namespace App\Http\Controllers\Api\Serivce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrumController extends Controller
{
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
        $this->apiToken = env('TOKEN_TRUM');
    }

    public function CreateOrder()
    {
        $url = "https://trum.vip/api/";
        $uri = $url . $this->path . '/create';
        $data = $this->data;
        $dataPost = [
        'key' => $this->apiToken,
            'object_id' => $data['order_link'] ?? '',
            'service_id' => $data['server_order'] ?? 'null',
            'reaction' => $data['reaction'] ?? 'like',
            'quantity' => $data['quantity'] ?? '0',
            'speed' => $data['speed'] == '1' ? 'fast' : 'slow',
            'list_comment' => $data['comment'] ?? '',
  
               'timevip' => $data['days'] ?? '0',
                           'posts' => $data['post'] ?? '0',
                           
        ];

        $result = $this->curl($uri, $dataPost);
        if ($result['success'] == true) {
            return $data = [
                'status' => true,
                'message' => 'Đặt đơn hàng thành công',
                'data' => $result['data'],
            ];
        } else {
            return $data = [
                'status' => false,
                'message' => $result['msg'],
            ];
        }
    }

    public function order($order_code)
    {
           $post_data = http_build_query([
            'key' => $this->apiToken,
            'order_id' => $order_code // nếu chỉ đinh order_id, response sẽ lọc theo order id 
        ]);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://trum.vip/api/server2/list');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }
     public function order1($order_code1)
    {
           $post_data = http_build_query([
            'key' => $this->apiToken,
            'order_id' => $order_code1 // nếu chỉ đinh order_id, response sẽ lọc theo order id 
        ]);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://trum.vip/api/server7/list');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }

  
        public function curl($path, $data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }

    public function curlOrder($path, $token, $data = [], $method = 'POST')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $token);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        curl_close($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $res = [];
        return json_decode($result, true);
    }
}
