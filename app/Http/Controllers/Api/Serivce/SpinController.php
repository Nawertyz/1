<?php

namespace App\Http\Controllers\Api\Serivce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpinController extends Controller
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
        $this->apiToken = env('TOKEN_MUASPIN');
    }
    
    public function CreateOrder()
    {
        $url = 'https://muaspin.com/ajaxs/client/create.php';
        $data = $this->data;
      
                
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://muaspin.com/ajaxs/client/create.php',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array( 'action' => 'order_spin',
            'invite_code' => $data['order_link'],
            'amount' => $data['quantity'],
            'type' => $data['server_order'],
         'token' => $this->apiToken,),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $response = json_decode($response, true);

        if ($response['status'] == 'success') {
            return $data = [
                'status' => true,
                'message' => 'Đặt hàng thành công',
                'data' => $response['msg']
            ];
        } else {
            return $data = [
                'status' => false,
                'message' => $response['msg'],
            ];
        }
    }


    public function order($id)
    {
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://muaspin.com/api/history.php?token='.$this->apiToken.'&limit=30',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $response = json_decode($response, true);
         if (isset($response['data'])) {
            foreach ($response['data'] as $item) {
                if ($item['invite_code'] == $id) {
                    return $data = [
                        'status' => true,
                        'message' => "GET STATUS SUCCESS",
                        'data' => $item
                    ];
                }
                 else {
            return $data = [
                'status' => false,
                'message' => "GET STATUS FAIL",
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

    public function sendRequest($url, $data = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode($data),
        ));

$response = curl_exec($curl);

curl_close($curl);
        return json_decode($response, true);
    }
}
