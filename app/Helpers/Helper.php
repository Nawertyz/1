<?php


function resApi($status = 'error', $message = 'Có lỗi xảy ra', $data = null)
{
    return response()->json([
        'status' => $status,
        'message' => $message,
        'data' => $data
    ]);
}

function DataSite($key)
{
    $data = \App\Models\SiteData::where('domain', request()->getHost())->first();
    if ($data) {
        return $data->$key;
    } else {
        return null;
    }
}
function formatNumber($number)
{
    $number = number_format($number, 0, ",", ".");
    return $number;
}
function formatNumber1($number)
{
    $number = number_format($number, 0, ",", ",");
    return $number;
}
function DataSite1($key)
{
    $data = \App\Models\SiteData::where('domain', env('PARENT_SITE'))->first();
    if ($data) {
        return $data->$key;
    } else {
        return null;
    }
}
function timeago($date)
{
  $timestamp = strtotime($date);

  $strTime = ["giây", "phút", "giờ", "ngày", "tháng", "năm"];
  $length = ["60", "60", "24", "30", "12", "10"];

  $currentTime = time();
  if ($currentTime >= $timestamp) :
    $diff     = time() - $timestamp;
    for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
      $diff = $diff / $length[$i];
    }

    $diff = round($diff);
    return $diff . " " . $strTime[$i] . " trước";
  endif;
}
function level($level, $html = true)
{
    if ($html) {
        switch ($level) {
            case 1:
                return '<span class="badge bg-primary badge-primary">Thành viên</span>';
                break;
            case 2:
                return '<span class="badge bg-success badge-success">Cộng tác viên</span>';
                break;
            case 3:
                return '<span class="badge bg-warning badge-warning">Đại lý</span>';
                break;
            case 4:
                return '<span class="badge bg-danger badge-danger">Nhà phân phối</span>';
                break;
            default:
                return '<span class="badge bg-secondary badge-secondary">Khách</span>';
                break;
        }
    } else {
        switch ($level) {
            case 1:
                return 'Thành viên';
                break;
            case 2:
                return 'Cộng tác viên';
                break;
            case 3:
                return 'Đại lý';
                break;
            case 4:
                return 'Nhà phân phối';
                break;
            default:
                return 'Khách';
                break;
        }
    }
}

function getadr(){

    $apiUrl = "https://freeipapi.com/api/json";
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $result= json_decode($response, true);
    $countryName=  $result['countryName'];
     
    return $countryName;

}
function statusService($status, $html = true)
{
    if ($html) {
        switch ($status) {
            case 'Active':
                return '<span class="badge bg-success badge-success">Hoạt động</span>';
                break;
            default:
                return '<span class="badge bg-secondary badge-secondary">Bảo trì</span>';
                break;
        }
    } else {
        switch ($status) {
            case 'Active':
                return 'Hoạt động';
                break;
            default:
                return 'Bảo trì';
                break;
        }
    }
}

function statusCard($status)
{
    switch ($status) {
        case 'Pending':
            return '<span class="badge bg-warning badge-warning">Chờ xử lý</span>';
            break;
        case 'Processing':
            return '<span class="badge bg-primary badge-primary">Đang xử lý</span>';
            break;
        case 'Success':
            return '<span class="badge bg-success badge-success">Thẻ đúng</span>';
            break;
        case 'Cancel':
            return '<span class="badge bg-danger badge-danger">Đã Hủy</span>';
            break;
        case 'Error':
            return '<span class="badge bg-danger badge-danger">Thẻ Lỗi</span>';
            break;
        default:
            return '<span class="badge bg-secondary badge-secondary">Không xác định</span>';
            break;
    }
}

function statusSupport($status)
{
    switch ($status) {
        case 'Pending':
            return '<span class="badge bg-warning badge-warning">Chờ xử lý</span>';
            break;
       
        case 'Success':
            return '<span class="badge bg-success badge-success">Đã phản hồi</span>';
            break;
         
        default:
            return '<span class="badge bg-secondary badge-secondary">Chờ xử lý</span>';
            break;
    }
}

function statusOrder($status, $html = true)
{
    if ($html) {
        switch ($status) {
            case 'PendingOrder':
                return '<span class="badge bg-warning badge-warning">Đang xử lí</span>';
                break;
                case 'Pending':
                    return '<span class="badge bg-warning badge-warning">Đang xử lí</span>';
                    break;
            case 'Processing':
                return '<span class="badge bg-primary badge-primary">Đang hoạt động</span>';
                break;
            case 'Active':
                return '<span class="badge bg-info badge-info">Đang chạy</span>';
                break;
            case 'Holding':
                return '<span class="badge bg-warning badge-warning">Tạm hoãn</span>';
                break;
            case 'Suspended':
                return '<span class="badge bg-secondary badge-secondary">Tạm dừng</span>';
                break;
            case 'Hoan':
                return '<span class="badge bg-dark badge-dark">Đã hoàn tiền</span>';
                break;
            case 'Warranty':
                return '<span class="badge bg-primary badge-secondary">Bảo hành</span>';
                break;
            case 'Completed':
                return '<span class="badge bg-success badge-success">Hoàn thành</span>';
                break;
            case 'Success':
                return '<span class="badge bg-success badge-success">Thành công</span>';
                break;
            case 'Refunded':
                return '<span class="badge bg-dark bg-sm bg-dim">Hoàn tiền</span>';
                break;
             case 'Refund':
                return '<span class="badge bg-dark bg-sm bg-dim">Hoàn tiền</span>';
                break;
            case 'Failed':
                return '<span class="badge bg-danger badge-danger">Thất bại</span>';
                break;
            case 'Cancelled':
                return '<span class="badge bg-danger badge-danger">Đã hủy</span>';
                break;
            case 'Canceled':
                return '<span class="badge bg-danger badge-danger">Đã hủy</span>';
                break;
            default:
                return '<span class="badge bg-info badge-info">Đang chạy</span>';
                break;
        }
    } else {
        switch ($status) {
            case 'PendingOrder':
                return 'Chuẩn bị';
                break;
                case 'Pending':
                    return 'Chờ xử lý';
                    break;
            case 'Processing':
                return 'Đang xử lý';
                break;
            case 'Active':
                return 'Đang hoạt động';
                break;
            case 'Suspended':
                return 'Tạm dừng';
                break;
            case 'Completed':
                return 'Hoàn thành';
                break;
            case 'Success':
                return 'Đã hoàn thành';
                break;
            case 'Refunded':
                return 'Hoàn tiền';
                break;
            case 'Failed':
                return 'Thất bại';
                break;
            case 'Cancelled':
                return 'Đã hủy';
                break;
            default:
                return 'Không xác định';
                break;
        }
    }
}
function getdate1()
{
    $time1 = date('Y-m-d');
    return $time1;
}
function thesieure($partner_id, $telco, $code, $serial, $amount, $request_id, $sign, $command = 'charging')
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://thesieure.com/chargingws/v2',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('telco' => $telco, 'code' => $code, 'serial' => $serial, 'amount' => $amount, 'request_id' => $request_id, 'partner_id' => $partner_id, 'sign' => $sign, 'command' => $command),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response, true);
}

function trumcard1s($partner_id, $telco, $code, $serial, $amount, $request_id, $sign, $command = 'charging'){
    $url = "https://trumthere.vn/chargingws/v2";
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://trumthere.vn/chargingws/v2',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('telco' => $telco, 'code' => $code, 'serial' => $serial, 'amount' => $amount, 'request_id' => $request_id, 'partner_id' => $partner_id, 'sign' => $sign, 'command' => $command),
    
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response, true); 
}
function change($before, $after, $change)
{
    if ($after>= $before){
        $data = "<span class='badge bg-danger'>" . formatNumber1($before) . "</span> + <span class='badge bg-success'>" . formatNumber1($change) . "</span> = <span class='badge bg-primary'>" . formatNumber1($after) . "</span>";


    }elseif($after < $before){
        $data = "<span class='badge bg-danger'>" . formatNumber1($before) . "</span> - <span class='badge bg-success'>" . formatNumber1($change) . "</span> = <span class='badge bg-primary'>" . formatNumber1($after) . "</span>";

    }
    return $data;
}
function priceServer($server, $level)
{
    $server_service = \App\Models\ServerService::where('id', $server)->first();
    if ($server_service) {
        switch ($level) {
            case 1:
                return $server_service->price;
                break;
            case 2:
                return $server_service->price_collaborator;
                break;
            case 3:
                return $server_service->price_agency;
                break;
            case 4:
                return $server_service->price_distributor;
                break;
            default:
                return 0;
                break;
        }
    } else {
        return 0;
    }
}
function priceServer1($server, $level)
{
    $server_service = \App\Models\Tainguyen::where('id', $server)->first();
    if ($server_service) {
        switch ($level) {
            case 1:
                return $server_service->price;
                break;
            case 2:
                return $server_service->price_collaborator;
                break;
            case 3:
                return $server_service->price_agency;
                break;
            case 4:
                return $server_service->price_distributor;
                break;
            default:
                return 0;
                break;
        }
    } else {
        return 0;
    }
}

function formatDomain($domain)
{
    $domain = str_replace('https://', '', $domain);
    $domain = str_replace('http://', '', $domain);
    $domain = str_replace('www.', '', $domain);

    return $domain;
}

function getDomain()
{
    return request()->getHost();
}
function getAuthenTwo($key)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://2fa.live/tok/' . $key);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = 'Authority: 2fa.live';
    $headers[] = 'Accept: */*';
    $headers[] = 'Accept-Language: vi,en;q=0.9,en-GB;q=0.8,en-US;q=0.7';
    $headers[] = 'Referer: https://2fa.live/';
    $headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"110\", \"Not A(Brand\";v=\"24\", \"Microsoft Edge\";v=\"110\"';
    $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
    $headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
    $headers[] = 'Sec-Fetch-Dest: empty';
    $headers[] = 'Sec-Fetch-Mode: cors';
    $headers[] = 'Sec-Fetch-Site: same-origin';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 Edg/110.0.0.0';
    $headers[] = 'X-Requested-With: XMLHttpRequest';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    $jsonData = json_decode($result, true);
    if (isset($jsonData['token'])) {
        return $data = [
            'status' => true,
            'token' => $jsonData['token']
        ];
    } else {
        return false;
    }
}
function whois($domain)
{
    $url = 'https://whois.inet.vn/api/whois/domainspecify/';
    $url .= $domain;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($output, true);
    // var_dump($data);
    
    $row = [];
    if (isset($data)) {
        if ($data['code'] == 0 && $data['message'] !="Tên miền đặc biệt chưa cấp phát đăng ký") {
            return $data = [
                'status' => true,
                'domain' => $data['domainName'],
                'registrar' => $data['registrar'],
                'statusdomain' => $data['status'][0],
                'creationDate' => $data['creationDate'],
                'expirationDate' => $data['expirationDate'],
                'nameServer1' => $data['nameServer'][0],
                'nameServer2' => $data['nameServer'][1],
                'message' => 'Tền miền đã được đăng kí'
            
            ];
        }
        elseif ($data['code']==0 && $data['message'] != "Đã được đăng ký") {
            return $data = [
                'status' => true,
                'domain' => $data['domainName'],
                'registrar' => 'Không xác định',
                'statusdomain' => 'Không xác định',
                'creationDate' => 'Không xác định',
                'expirationDate' => 'Không xác định',
                'nameServer1' => 'Không xác định',
                'nameServer2' => 'Không xác định',
                'message' =>$data['message']
            
            ];
        }
        
        else {
            return $data = [
                'status' => false,
                'domain' => false
            ];
        }
    }
}
function checktoken($token)
{


    $post_data = [
        'key' => '9d08c81a82e16787d8c8e1781cbd701b',
        'token' => $token
    ];
    
    
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://trum.vip/api/services/bot/checktoken');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
    $result = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($result, true);
    if ($data['success'] == true){
        return $data=[
            'status' => true,
            'user_id' => $data['data']['user_id'],
            'name' => $data['data']['name'],
        ];
    }else{
        return $data=[
            'status' =>false,

        ];
    }
}
function getUid($link)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.subvip.top/tools/facebook/get-uid?link='.$link,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $result = curl_exec($curl);
    
    curl_close($curl);
    $data = json_decode($result, true);

    if ($data['status'] == 200) {
        return $data = [
            'status' => true,
            'id' => $data['data']['id']
        ];
    } else {
        return $data = [
            'status' => false,
            'message' => $data['message']
        ];
    }
}
