<?php

namespace App\Http\Controllers\Api\Serivce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrumsubreController extends Controller
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
        $this->apiToken = env('TOKEN_TRUMSUBRE');
    }

    public function CreateOrder()
    {
        
        $url = "https://trumsubre.com/api/service/";
        $headers[] = 'Api-token: ' . $this->apiToken;
        $headers[] = 'Content-Type: application/json';
        
            // Add additional headers
    $headers[] = 'Alt-Svc: h3=":443"; ma=86400';
    $headers[] = 'Cache-Control: no-cache, private';
    $headers[] = 'Cf-Cache-Status: DYNAMIC';
    $headers[] = 'Cf-Ray: 82f215380ffd104f-HKG';
    $headers[] = 'Content-Encoding: br';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'Date: Sat, 02 Dec 2023 08:08:36 GMT';
    $headers[] = 'Nel: {"success_fraction":0,"report_to":"cf-nel","max_age":604800}';
    $headers[] = 'Report-To:
{"endpoints":[{"url":"https:\/\/a.nel.cloudflare.com\/report\/v3?s=%2BpCZuFgirPNBOPEFVAee5l%2FYgSbQz3FUzc1eYcdhfCQ7%2F6GwO1ehfcl69yTdNiwGRazdMy%2FimvKnwBiGGCtzLKYsgsIfA6AVWUq2%2BDii8oLznGpouHSzNxtfliuetmpetLcFwcz9TlhM0F%2Fk"}],"group":"cf-nel","max_age":604800}';
    $headers[] = 'Server: cloudflare';

    $headers[] = 'Referer: https://trumsubre.com/home';

    // Include cookies in the request
    $cookies = 'cf_clearance=rw5KjxBG5kP2FY5_qvWkk5_Eo3tgnNXLTRBbZcdl5zI-1702181047-0-1-433df5b6.394fe447.5593691c-0.2.1702181047; ';
    $headers[] = 'Cookie: ' . $cookies;

    // Additional security headers
    $headers[] = 'Sec-Ch-Ua: "Google Chrome";v="119", "Chromium";v="119", "Not?A_Brand";v="24"';
    $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
    $headers[] = 'Sec-Ch-Ua-Platform: "Windows"';
    $headers[] = 'Sec-Fetch-Dest: document';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-Site: same-origin';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36';

        
        
        $uri = $url . $this->path . '/order';
        $data = $this->data;
        $dataPost = [
            'link_post' => $data['order_link'] ?? '',
            'idpost' => $data['order_link'] ?? '',
            'idfb' => $data['order_link'] ?? '',
            'idpage' => $data['order_link'] ?? '',
            'idcomment' => $data['order_link'] ?? '',
                        'idgroup' => $data['order_link'] ?? '',
            'link_story' => $data['order_link'] ?? '',
            'link_video' => $data['order_link'] ?? '',
            'username' => $data['order_link'] ?? '',
            'server_order' => $data['server_order'] ?? 'null',
            'reaction' => $data['reaction'] ?? 'like',
            'amount' => $data['quantity'] ?? '0',
            'speed' => $data['speed'] == '1' ? 'fast' : 'slow',
            'comment' => $data['comment'] ?? '',
            'minutes' => $data['minutes'] ?? '0',
            'time' => $data['time'] ?? '0',
            'days' => $data['days'] ?? '0',
            'post' => $data['post'] ?? '0',
        ];

        $result = $this->curl($uri, $headers, $dataPost);
        if ($result['status'] == true) {
            return $data = [
                'status' => true,
                'message' => $result['message'],
                'data' => $result['data'],
            ];
        } else {
            return $data = [
                'status' => false,
                'message' => $result['message'],
            ];
        }
    }

    public function order($order_code)
    {
        $url = "https://trumsubre.com/api/service/";
        $headers[] = 'Api-token: ' . $this->apiToken;
        $headers[] = 'Content-Type: application/json';
  // Add additional headers
           // Add additional headers
    $headers[] = 'Alt-Svc: h3=":443"; ma=86400';
    $headers[] = 'Cache-Control: no-cache, private';
    $headers[] = 'Cf-Cache-Status: DYNAMIC';
    $headers[] = 'Cf-Ray: 82f215380ffd104f-HKG';
    $headers[] = 'Content-Encoding: br';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'Date: Sat, 02 Dec 2023 08:08:36 GMT';
    $headers[] = 'Nel: {"success_fraction":0,"report_to":"cf-nel","max_age":604800}';
    $headers[] = 'Report-To: {"endpoints":[{"url":"https:\/\/a.nel.cloudflare.com\/report\/v3?s=eCAQpw%2FrkucHhgUyHBEywwwYXVsWY4snmDhzet76jWEBx2ESNkyObIZOx1aeyZvd6ezbzKrC%2FMpi%2FKuiMsb2sPlhbhwQbKUIG82zkCb1xYwX1y9rME69gqE1uyZcqM6J"}],"group":"cf-nel","max_age":604800}';
    $headers[] = 'Server: cloudflare';

    $headers[] = 'Referer: https://trumsubre.com/home';

    // Include cookies in the request
    $cookies = 'cf_clearance=rw5KjxBG5kP2FY5_qvWkk5_Eo3tgnNXLTRBbZcdl5zI-1702181047-0-1-433df5b6.394fe447.5593691c-0.2.1702181047; ';
    $headers[] = 'Cookie: ' . $cookies;

    // Additional security headers
    $headers[] = 'Sec-Ch-Ua: "Google Chrome";v="119", "Chromium";v="119", "Not?A_Brand";v="24"';
    $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
    $headers[] = 'Sec-Ch-Ua-Platform: "Windows"';
    $headers[] = 'Sec-Fetch-Dest: document';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-Site: same-origin';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36';

 
        $uri = $url . $this->path . '/list';
        $data = [
           
            
            'code_orders' => $order_code,
        ];
        $result = $this->curlOrder($uri, $headers, $data);
        return $result;
    }

public function speed($order_code)
    {
         $url = "https://trumsubre.com/api/service/";
        $headers[] = 'Api-token: ' . $this->apiToken;
        $headers[] = 'Content-Type: application/json';
  // Add additional headers
           // Add additional headers
    $headers[] = 'Alt-Svc: h3=":443"; ma=86400';
    $headers[] = 'Cache-Control: no-cache, private';
    $headers[] = 'Cf-Cache-Status: DYNAMIC';
    $headers[] = 'Cf-Ray: 82f215380ffd104f-HKG';
    $headers[] = 'Content-Encoding: br';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'Date: Sat, 02 Dec 2023 08:08:36 GMT';
    $headers[] = 'Nel: {"success_fraction":0,"report_to":"cf-nel","max_age":604800}';
    $headers[] = 'Report-To: {"endpoints":[{"url":"https:\/\/a.nel.cloudflare.com\/report\/v3?s=eCAQpw%2FrkucHhgUyHBEywwwYXVsWY4snmDhzet76jWEBx2ESNkyObIZOx1aeyZvd6ezbzKrC%2FMpi%2FKuiMsb2sPlhbhwQbKUIG82zkCb1xYwX1y9rME69gqE1uyZcqM6J"}],"group":"cf-nel","max_age":604800}';
    $headers[] = 'Server: cloudflare';

    $headers[] = 'Referer: https://trumsubre.com/home';

    // Include cookies in the request
    $cookies = 'cf_clearance=rw5KjxBG5kP2FY5_qvWkk5_Eo3tgnNXLTRBbZcdl5zI-1702181047-0-1-433df5b6.394fe447.5593691c-0.2.1702181047; ';
    $headers[] = 'Cookie: ' . $cookies;

    // Additional security headers
    $headers[] = 'Sec-Ch-Ua: "Google Chrome";v="119", "Chromium";v="119", "Not?A_Brand";v="24"';
    $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
    $headers[] = 'Sec-Ch-Ua-Platform: "Windows"';
    $headers[] = 'Sec-Fetch-Dest: document';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-Site: same-origin';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36';

 
        $uri = $url . $this->path . '/confirm';
        $data = [
           'action' => 'speed_up',
            
            'code_orders' => $order_code,
        ];
        $result = $this->curlOrder($uri, $headers, $data);
        if (isset($result['status'])) {
        if ($result['status'] == true) {
            return $data = [
                'status' => true,
                'message' => $result['message'],
                'data' => $result['data'] ?? ''
            ];
        } else {
            return $data = [
                'status' => 'error',
                'message' => $result['message'],
            ];
        }
        }
    
    }
 
    public function curl($path, $token, $data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $token);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        curl_close($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $res = [];
        return json_decode($result, true);
    }

    public function curlOrder($path, $token, $data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $token);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        curl_close($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $res = [];
        return json_decode($result, true);
    }
}
