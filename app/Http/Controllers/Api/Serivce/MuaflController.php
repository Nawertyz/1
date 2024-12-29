<?php

namespace App\Http\Controllers\Api\Serivce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MuaflController extends Controller
{
    public $apiToken = "";
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
    

    public function login()
    {
    }

    public function createOrder()
    {
        $path = $this->path;
       
        $data = $this->data;

        $data = [
            'order_link' => $data['order_link'] ?? '',
            'quantity' => $data['quantity'] ?? '',
            'speed' => $data['speed'] ?? '',
            'comment' => $data['comment'] ?? '',
            'minutes' => $data['minutes'] ?? '',
            'time' => $data['time'] ?? '',
            'days' => $data['days'] ?? '',
            'post' => $data['post'] ?? '',
            'reaction' => $data['reaction'] ?? '',
            'service_id' => $data['server_order'] ?? '',
        ];

        $result = $this->sendRequest($data);
        if (isset($result)) {
            if ($result['status'] == 'success') {
                return $data = [
                    'status' => true,
                    'message' => 'Đặt hàng thành công',
                    'data' => $result['data']
                ];
            } else {
                return $data = [
                    'status' => false,
                    'message' => $result['message']
                ];
            }
        } else {
            return $data = [
                'status' => false,
                'message' => 'Lỗi không xác định'
            ];
        }
    }

    public function sendRequest($data)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://muafl.com/api/service/create-order',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => (array) $data,
            CURLOPT_HTTPHEADER => array(
                'Api-token: ' . $this->apiToken,
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }
}
