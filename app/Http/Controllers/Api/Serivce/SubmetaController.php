<?php

namespace App\Http\Controllers\Api\Serivce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubmetaController extends Controller
{
    public $api_token = '';
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
        $this->api_token = env('TOKEN_SUBMETA');
    }

    public function createOrder()
    {
        $path = $this->path;
        $data = $this->data;

        $dataPost = [
            'objectId' => $data['order_link'] ?? '',
            'raw_link' => $data['order_link'] ?? '',
            'nameServer' => $data['server_order'],
            'amount' => $data['quantity'] ?? '0',
            'reaction' => $data['reaction'] ?? 'like',
            'comment' => $data['comment'] ?? '',
            'minutes' => $data['minutes'],
            'slbv' => $data['post'] ?? '0',
            'month' => $data['days'] ?? '0',
        ];
        $dataPost = http_build_query($dataPost);
        $data = $this->sendRequest($path, $dataPost);
        if ($data['status'] == true || $data['code'] == 200) {
            return $data = [
                'status' => true,
                'message' => $data['message'],
                'data' => $data
            ];
        } else {
            return $data = [
                'status' => false,
                'message' => $data['message']
            ];
        }
    }

    public function cancelOrder($order_code)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://submeta.vn/ajax.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'orderCode='.$order_code.'&action=cancelOrder',
            CURLOPT_HTTPHEADER => array(
                'authority: submeta.vn',
                'accept: application/json, text/javascript, */*; q=0.01',
                'accept-language: vi;q=0.9',
                'content-type: application/x-www-form-urlencoded; charset=UTF-8',
                'cookie: Authorization=' . $this->api_token,
                'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "Windows"',
                'sec-fetch-dest: empty',
                'sec-fetch-mode: cors',
                'sec-fetch-site: same-origin',
                'sec-gpc: 1',
                'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
                'x-requested-with: XMLHttpRequest'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        return $data;
    }

    public function status($order)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://submeta.vn/ajax.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'action=listOrders&objectType=like&package=facebook',
            CURLOPT_HTTPHEADER => array(
                'authority: submeta.vn',
                'accept: application/json, text/javascript, */*; q=0.01',
                'accept-language: vi;q=0.7',
                'content-type: application/x-www-form-urlencoded; charset=UTF-8',
                'cookie: Authorization=' . $this->api_token,
                'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "Windows"',
                'sec-fetch-dest: empty',
                'sec-fetch-mode: cors',
                'sec-fetch-site: same-origin',
                'sec-gpc: 1',
                'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
                'x-requested-with: XMLHttpRequest',
                'Authorization: Bearer your_token'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        if (isset($data['data'])) {
            foreach ($data['data'] as $item) {
                if ($item['orderCode'] == $order) {
                    return $data = [
                        'status' => true,
                        'message' => "GET STATUS SUCCESS",
                        'data' => $item
                    ];
                }
            }
        } else {
            return $data = [
                'status' => false,
                'message' => "GET STATUS FAIL",
            ];
        }
    }
    public function sendRequest($path, $data)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://submeta.vn/api/' . $path,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'authority: submeta.vn',
                'accept: application/json, text/javascript, */*; q=0.01',
                'accept-language: vi;q=0.5',
                'content-type: application/x-www-form-urlencoded; charset=UTF-8',
                'cookie: Authorization=' . $this->api_token,
                'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "Windows"',
                'sec-fetch-dest: empty',
                'sec-fetch-mode: cors',
                'sec-fetch-site: same-origin',
                'sec-gpc: 1',
                'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
                'x-requested-with: XMLHttpRequest'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }
}
