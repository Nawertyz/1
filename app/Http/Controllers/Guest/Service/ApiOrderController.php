<?php

namespace App\Http\Controllers\Guest\Service;

use App\Http\Controllers\Api\Serivce\Hacklike17Controller;
use App\Http\Controllers\Api\Serivce\MuaflController;
use App\Http\Controllers\Api\Serivce\OneDgController;
use App\Http\Controllers\Api\Serivce\BoosterviewsController;
use App\Http\Controllers\APi\Serivce\SainpanelController;
use App\Http\Controllers\Api\Serivce\SubgiareController;
use App\Http\Controllers\Api\Serivce\TrumsubreController;
use App\Http\Controllers\Api\Serivce\SubmetaController;
use App\Http\Controllers\Api\Serivce\TraodoisubController;
use App\Http\Controllers\Api\Serivce\TwoMxhController;
use App\Http\Controllers\Api\Serivce\TrumvipController;
use App\Http\Controllers\Api\Serivce\TuongtacsaleController;
use App\Http\Controllers\Api\Serivce\AlosmmController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Custom\TeleCustomController;
use App\Http\Controllers\Custom\TeleconCustomController;
use App\Models\DataHistory;
use App\Models\Orders;
use App\Models\ServerService;
use App\Models\Service;
use App\Models\ServiceSocial;
use App\Models\SiteCon;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\PHP;


class ApiOrderController extends Controller
{
    /*  public function __construct()
    {
        $this->middleware('xss');
    } */

    public function createOrder(Request $request)
    {
        $api_token = $request->input('key');
        $serviceid = $request->input('service');
        $action = $request->input('action');
        $link = $request->input('link');
        $quantity = $request->input('quantity');
       
        if (empty($api_token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid API key'
            ]);
        } 
        elseif (empty($action)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid action'
            ]);
        } 
      
       
        else {
            if (getDomain() == env('PARENT_SITE')) {
                if ($action == 'add'){
                if (empty($serviceid)) {
                            return response()->json([
                                'status' => 'error',
                                'message' => 'Invalid Service ID'
                            ]);
                        } 

              elseif (empty($link)) {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Invalid link'
                        ]);
                    } 
                    elseif (empty($quantity)) {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Invalid quantity'
                        ]);
                    } 
                    else{
                $user = User::where('domain', getDomain())->where('api_token', $api_token)->first();
                if ($user) {
                  
                         $orders = Orders::where('domain', getDomain())->where('host', '!=','')->first();
                         $server1 = ServerService::where('domain', getDomain())->where('id',  $serviceid)->first();
                      if ($server1){
                        $social_service = ServiceSocial::where('domain', getDomain())->where('id', $server1->social_id)->first();
                        if ($social_service) {
                            $service_ = Service::where('domain', getDomain())->where('id', $server1->service_id)->where('service_social', $social_service->slug)->first();
                            if ($service_) {
                               
                                $server = ServerService::where('domain', getDomain())->where('social_id', $social_service->id)->where('service_id', $service_->id)->where('server', $server1->server)->first();

                                if ($server) {
                                    if ($server->status != 'Active') {
                                        return response()->json([
                                            'status' => 'error',
                                            'message' => 'Sever is busy !'
                                        ]);
                                        die();
                                    } else {
                                        

                                        
                                            if ($service_->category == 'comment') {
                                                $quantity = count(explode("\n", $request->comment));
                                                $request->merge(['quantity' => $quantity]);
                                            }

                                            if ($server->min > $quantity) {
                                                return response()->json([
                                                    'status' => 'error',
                                                    'message' => 'Min is ' . $server->min
                                                ]);
                                            } elseif ($server->max < $quantity) {
                                                return response()->json([
                                                    'status' => 'error',
                                                    'message' => 'Max is ' . $server->max
                                                ]);
                                            } else {
                                                $price = priceServer($server->id, $user->level);
                                                $total_payment = 0;
                                                if ($service_->category == 'minutes') {
                                                    $total_payment = $price * $quantity * $request->minutes;
                                                } elseif ($service_->category == 'viplike') {
                                                    $total_payment = $price * $quantity * $request->days * $request->post;
                                                }
                                                 elseif ($service_->category == 'viplike-kcx') {
                                                    $total_payment = $price * $quantity * $request->days * $request->post;
                                                } else {
                                                    $total_payment = $price * $quantity;
                                                }

                                                if ($user->balance < $total_payment) {
                                                    return response()->json([
                                                        'status' => 'error',
                                                        'message' => 'Balance not enough !'
                                                    ]);
                                                } else {

                                                    if (env('IS_ORDER') == true) {
                                                        $data_send = false;
                                                        $actual_path = $server->actual_path;
                                                        $actual_server = $server->actual_server;
                                                        $quantity = $request->quantity;
                                                        $order_link = $request->link;
                                                        if ($server->actual_service == 'subgiare') {

                                                            $subgiare = new SubgiareController();
                                                            $actual_path = $server->actual_path;
                                                            $actual_server = $server->actual_server;
                                                            $quantity = $request->quantity;
                                                            $order_link = $request->link;
                                                            $subgiare = new SubgiareController();
                                                            $subgiare->path = $actual_path;
                                                            $subgiare->data = [
                                                                'order_link' => $order_link,
                                                                'quantity' => $quantity,
                                                                'speed' => $request->speed ?? '0',
                                                                'comment' => $request->comment ?? '',
                                                                'minutes' => $request->minutes ?? '',
                                                                'time' => $request->time ?? '',
                                                                'reaction' => $request->reaction ?? '',
                                                                'server_order' => $actual_server,
                                                            ];

                                                            $result = $subgiare->CreateOrder();
                                                            if ($result['status'] == true) {
                                                                $order_history = [
                                                                    'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                    'status' => 'info',
                                                                    'title' => "Đơn hàng đang hoạt động",
                                                                ];
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' => $total_payment,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'Active',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ]
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if ($order) {
                                                                    $order->order_code = $result['data']['code_order'];
                                                                    $order->start = $result['data']['start'] ?? 0;
                                                                    $order->buff = $result['data']['buff'] ?? 0;
                                                                    $order->status = 'Active';
                                                                    $order->dataJson = json_encode($result['data']);
                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();
                                                                    if (DataSite('notice_order') == 'on') {
                                                                        if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TeleCustomController();
                                                                            $bot = $tele->bot1();
                                                                            $bot->sendMessage([
                                                                                'chat_id' => -4095949972,
                                                                                'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ: " . $service_->name . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                            ]);
                                                                        }
                                                                    }
                                                                    $balance = $user->balance;
                                                                    $user->balance = $user->balance - $total_payment;
                                                                    $user->total_deduct = $user->total_deduct + $total_payment;
                                                                    $user->save();
                                                                    DataHistory::create([
                                                                        'username' => $user->username,
                                                                        'action' => 'Tạo đơn',
                                                                        'data' => $total_payment,
                                                                        'old_data' => $balance,
                                                                        'new_data' => $user->balance,
                                                                        'ip' => $request->ip(),
                                                                        'description' => "Tạo đơn hàng " . $service_->name . " với số lượng " . $request->quantity . " với giá " . number_format($total_payment) . "đ",
                                                                        'data_json' => '',
                                                                        'domain' => getDomain(),
                                                                    ]);
                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['message'],
                                                                ]);
                                                            }
                                                        } elseif ($server->actual_service  == 'hacklike17') {
                                                            $hacklike17 = new Hacklike17Controller();
                                                            $hacklike17->path = $actual_path;
                                                            $hacklike17->data = [
                                                                'order_link' => $order_link,
                                                                'quantity' => $quantity,
                                                                'speed' => $request->speed ?? '0',
                                                                'comment' => $request->comment ?? '',
                                                                'minutes' => $request->minutes ?? '',
                                                                'time' => $request->time ?? '',
                                                                'reaction' => $request->reaction ?? '',
                                                                'server_order' => $actual_server,
                                                            ];
                                                            $result = $hacklike17->CreateOrder();
                                                            if ($result['status'] == true) {
                                                                // thêm array vào history
                                                                $order_history = [
                                                                    'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                    'status' => 'info',
                                                                    'title' => "Đơn hàng đã hoạt động",
                                                                ];
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' => $total_payment,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'Active',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ]
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if (DataSite('notice_order') == 'on') {
                                                                    if (DataSite('telegram_chat_id')) {
                                                                        $tele = new TeleCustomController();
                                                                        $bot = $tele->bot1();
                                                                        $bot->sendMessage([
                                                                            'chat_id' => DataSite('telegram_chat_id'),
                                                                            'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ: " . $service_->name . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                        ]);
                                                                    }
                                                                }
                                                                $balance = $user->balance;
                                                                $user->balance = $user->balance - $total_payment;
                                                                $user->total_deduct = $user->total_deduct + $total_payment;
                                                                $user->save();
                                                                DataHistory::create([
                                                                    'username' => $user->username,
                                                                    'action' => 'Tạo đơn',
                                                                    'data' => $total_payment,
                                                                    'old_data' => $balance,
                                                                    'new_data' => $user->balance,
                                                                    'ip' => $request->ip(),
                                                                    'description' => "Tạo đơn hàng " . $service_->name . " với số lượng " . $request->quantity . " với giá " . number_format($total_payment) . "đ",
                                                                    'data_json' => '',
                                                                    'domain' => getDomain(),
                                                                ]);
                                                                if ($order) {
                                                                    $order->order_code = $result['data']['code_order'];
                                                                    $order->start = $result['data']['start'] ?? 0;
                                                                    $order->buff = $result['data']['buff'] ?? 0;
                                                                    $order->status = 'Active';
                                                                    $order->dataJson = json_encode($result['data']);
                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();
                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['message'],
                                                                ]);
                                                            }
                                                        }elseif ($server->actual_service == 'tuongtacsale') {
                                                            $tuongtacsale = new TuongtacsaleController();
                                                          
                                                            $tuongtacsale->data = [
                                                                'order_link' => $order_link,
                                                                'quantity' => $quantity,
                                                                'speed' => $request->speed ?? '0',
                                                                'comment' => $request->comment ?? '',
                                                                'minutes' => $request->minutes ?? '',
                                                                'time' => $request->time ?? '',
                                                                'reaction' => $request->reaction ?? '',
                                                                'server_order' => $actual_server,
                                                               
                                                            ];
                                                          
                                                            $result = $tuongtacsale->CreateOrder();
                                                            if ($result['status'] == true) {
                                                                $order_history[] = [
                                                                    'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                    'status' => 'info',
                                                                    'title' => "Đơn hàng đã hoạt động",
                                                                ];
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' => $total_payment,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'Active',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ]
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if ($order) {
                                                                    $order_history = json_decode($order->history, true);
                                                                    $order_history[] = [
                                                                        'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        'status' => 'info',
                                                                        'title' => "Đơn hàng đang hoạt động",
                                                                    ];
                                                                    $order->order_code = $result['data'];
                                                                   
                                                                    $order->buff = 0;
                                                                    $order->status = 'Active';
                                                                    $order->dataJson = json_encode($result['data']);
                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();

                                                                    if (DataSite('notice_order') == 'on') {
                                                                        if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TeleCustomController();
                                                                            $bot1 = $tele->bot1();
                                                                            $bot1->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ MXH: " . $social_service->name . "\nDịch vụ: " . $service_->name ."\nServer: " . $request->server_service . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                            ]);
                                                                        }
                                                                    }
                                                                    $balance = $user->balance;
                                                                    $user->balance = $user->balance - $total_payment;
                                                                    $user->total_deduct = $user->total_deduct + $total_payment;
                                                                    $user->save();
                                                                    DataHistory::create([
                                                                        'username' => $user->username,
                                                                        'action' => 'Tạo đơn',
                                                                        'data' => $total_payment,
                                                                        'old_data' => $balance,
                                                                        'new_data' => $user->balance,
                                                                        'ip' => $request->ip(),
                                                                        
                                                                        'description' => "".$order->order_code." | ".$service_->service_social." | Tăng " . $request->quantity . " ".$service_->slug." ở máy chủ [".$request->server_service."] cho ID ".$service_->service_social.": ".$request->link.", trừ " . number_format($total_payment) . " vnd trong tài khoản",
                                                                        'data_json' => '',
                                                                        'domain' => getDomain(),
                                                                    ]);
                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['message'],
                                                                ]);
                                                            }
                                                        }
 elseif ($server->actual_service == 'trumsubre') {

                                                            $trumsubre = new TrumsubreController();
                                                            $actual_path = $server->actual_path;
                                                            $actual_server = $server->actual_server;
                                                            $quantity = $request->quantity;
                                                            $order_link = $request->link;
                                                            $trumsubre = new TrumsubreController();
                                                            $trumsubre->path = $actual_path;
                                                            $trumsubre->data = [
                                                                'order_link' => $order_link,
                                                                'quantity' => $quantity,
                                                                'speed' => $request->speed ?? '0',
                                                                'comment' => $request->comment ?? '',
                                                                'minutes' => $request->minutes ?? '',
                                                                'time' => $request->time ?? '',
                                                                'reaction' => $request->reaction ?? '',
                                                                'server_order' => $actual_server,
                                                            ];
                                                           
                                                            $result = $trumsubre->CreateOrder();
                                                            if ($result['status'] == true) {
                                                                
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' => $total_payment,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'Active',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ] 
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if ($order) {
                                                                    $order_history = json_decode($order->history, true);
                                                                    $order_history[] = [
                                                                        'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        'status' => 'info',
                                                                        'title' => "Đơn hàng đang hoạt động",
                                                                    ];
                                                                    $order->order_code = $result['data']['code_order'];
                                                                    $order->start = $result['data']['start'] ?? 0;
                                                                    $order->buff = $result['data']['buff'] ?? 0;
                                                                    $order->status = 'Active';
                                                                    $order->dataJson = json_encode($result['data']);

                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();
                                                                    if (DataSite('notice_order') == 'on') {
                                                                        if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TeleCustomController();
                                                                            $bot1 = $tele->bot1();
                                                                            $bot1->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ MXH: " . $social_service->name . "\nDịch vụ: " . $service_->name ."\nServer: " . $request->server_service . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                            ]);
                                                                        }
                                                                    }
                                                                    $balance = $user->balance;
                                                                    $user->balance = $user->balance - $total_payment;
                                                                    $user->total_deduct = $user->total_deduct + $total_payment;
                                                                    $user->save();
                                                                    DataHistory::create([
                                                                        'username' => $user->username,
                                                                        'action' => 'Tạo đơn',
                                                                        'data' => $total_payment,
                                                                        'old_data' => $balance,
                                                                        'new_data' => $user->balance,
                                                                        'ip' => $request->ip(),
                                                                        'description' => "".$order->order_code." | ".$service_->service_social." | Tăng " . $request->quantity . " ".$service_->slug." ở máy chủ [".$request->server_service."] cho ID ".$service_->service_social.": ".$request->link.", trừ " . number_format($total_payment) . " vnd trong tài khoản",
                                                                        'data_json' => '',
                                                                        'domain' => getDomain(),
                                                                    ]);
                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['message'],
                                                                ]);
                                                            }
                                                        }elseif ($server->actual_service == 'trumvip') {

                                                            $trumvip = new TrumvipController();
                                                            $actual_path = $server->actual_path;
                                                            $actual_server = $server->actual_server;
                                                            $quantity = $request->quantity;
                                                            $order_link = $request->link;
                                                            $trumvip = new TrumvipController();
                                                            $trumvip->path = $actual_path;
                                                            $trumvip->data = [
                                                                
 
                                                            'token' => $request->token ?? '',
                                                            'proxy' => $request->proxy ?? '',
                                                            'cookie' => $request->cookie ?? '',
                                                            'speed_to' => $request->speed_to ?? '',
                                                            'period' => $request->period ?? '',
                                                            'limit_per_day' => $request->limit_per_day ?? '',
                                                            'user_id' => $request->user_id ?? '',
                                                            'country' => $request->country ?? '',
                                                            'server_order' =>$actual_server,
                                                            'reaction' => $request->reaction ?? '',
                                                            'quantity' => $request->quantity ?? '',
                                                            'target' => $request->target ?? '',
                                                            'time_end' => $request->time_end ?? '',
                                                            'time_start' => $request->time_start ?? '',
                                                            
                                                            'timebuy' => $request->timebuy ?? '',
                                                            'limit_post' => $request->limit_post ?? '',
                                                            'speed_from' => $request->speed_from ?? '',
                                                            'uids'   =>$request->uids ?? '',
                                                            'black_list'   => $request->black_list ?? '',
                                                            'reaction_type'   => $request->reaction_type ?? '',
                                                            'stories_enable'   => $request->stories_enable ?? '',
                                                            'story_reaction_type'   => $request->story_reaction_type ?? '',
                                                            'comment_enable'   => $request->comment_enable ?? '',
                                                            'content'   => $request->content ?? '',
                                                            'sticker'   => $request->sticker ?? '',
                                                            'images'   => $request->images ?? '',
                                                            'image_link'   => $request->image_link ?? '',
                                                            'image_auto_custom_text'   => $request->image_auto_custom_text ?? '',
                                                            'notes'   => $request->notes ?? '',
                                                                'order_link' => $order_link,
                                                                'quantity' => $quantity,
                                                               
                                                            ];
                                                            $trumvip->apiToken = DataSite1('trumvip');
                                                            $result = $trumvip->CreateOrder();
                                                            if ($result['status'] == true) {
                                                                $start_date=getdate1();
                                                                $days_to_add = $request->timebuy;
    
     
                                                                $start_date_obj = Carbon::parse($start_date);
    
                                                                // Thêm số ngày cần thêm
                                                                $result_date = $start_date_obj->addDays($days_to_add);
                                                                
                                                                // Lấy ngày kết quả dưới định dạng Y-m-d
                                                                $result_date_formatted = $result_date->format('Y-m-d');
                                                                $sv1=  $request->server_service;
                                                                if ($sv1 == 6 ){
                                                                    $rate = 487.5;
                                                                    
                                                                }elseif($sv1==4){
                                                                    $rate = 1917.5;
                                                                }
                                                                $total_payment1= $request->timebuy * $rate;
                                                                $soluong = $total_payment1 * $request->quantity;
                                                                $tongtien = $soluong + 1000;
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' =>$tongtien,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'host' =>'Đang duyệt',
                                                                    'pass' =>'Đang duyệt',
                                                                    'port' =>'Đang duyệt',
                                                                    'ipv6' =>'Chờ',
                                                                    'loai' =>'IPV'.$request->server_service,
                                                                    'quocgia' => $request->country,
                                                                    'timebuy' => $request->timebuy,
                                                                    'timeend' =>$result_date_formatted,
                                                                    'timestart' =>$start_date,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'Active',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ]
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if ($order) {
                                                                    $order_history = json_decode($order->history, true);
                                                                    $order_history[] = [
                                                                        'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        'status' => 'info',
                                                                        'title' => "Đơn hàng đang hoạt động",
                                                                    ];
                                                                    $order->order_code = $result['data']['order_id'];
                                                                    
                                                                    $order->status = 'Active';
                                                                    $order->dataJson = json_encode($result['data']);
                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();
                                                                    if (DataSite('notice_order') == 'on') {
                                                                        if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TeleCustomController();
                                                                            $bot1 = $tele->bot1();
                                                                            $bot1->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ MXH: " . $social_service->name . "\nDịch vụ: " . $service_->name ."\nServer: " . $request->server_service . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                            ]);
                                                                        }
                                                                    }
                                                                    $balance = $user->balance;
                                                                    $user->balance = $user->balance - $tongtien;
                                                                    $user->total_deduct = $user->total_deduct + $tongtien;
                                                                    $user->save();
                                                                    DataHistory::create([
                                                                        'username' => $user->username,
                                                                        'action' => 'Tạo đơn',
                                                                        'data' => $tongtien,
                                                                        'old_data' => $balance,
                                                                        'new_data' => $user->balance,
                                                                        'ip' => $request->ip(),
                                                                        'description' => "".$order->order_code." | ".$service_->service_social." | Tăng " . $request->quantity . " ".$service_->slug." ở máy chủ [".$request->server_service."] cho ID ".$service_->service_social.": ".$request->link.", trừ " . number_format($total_payment) . " vnd trong tài khoản",
                                                                        'data_json' => '',
                                                                        'domain' => getDomain(),
                                                                    ]);
                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['message'],
                                                                ]);
                                                            }
                                                        } elseif ($server->actual_service == 'alosmm') {
                                                            $alosmm = new AlosmmController();
                                                          
                                                            $alosmm->data = [
                                                                'order_link' => $order_link,
                                                                'quantity' => $quantity,
                                                                'speed' => $request->speed ?? '0',
                                                                'comment' => $request->comment ?? '',
                                                                'minutes' => $request->minutes ?? '',
                                                                'time' => $request->time ?? '',
                                                                'reaction' => $request->reaction ?? '',
                                                                'server_order' => $actual_server,
                                                               
                                                            ];
                                                            $alosmm->apiToken = DataSite1('alosmm');
                                                            $result = $alosmm->CreateOrder();
                                                            if ($result['status'] == true) {
                                                                $order_history[] = [
                                                                    'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                    'status' => 'info',
                                                                    'title' => "Đơn hàng đã hoạt động",
                                                                ];
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' => $total_payment,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'Active',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ]
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if ($order) {
                                                                    $order_history = json_decode($order->history, true);
                                                                    $order_history[] = [
                                                                        'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        'status' => 'info',
                                                                        'title' => "Đơn hàng đang hoạt động",
                                                                    ];
                                                                    $order->order_code = $result['data'];
                                                                   
                                                                    $order->buff = 0;
                                                                    $order->status = 'Active';
                                                                    $order->dataJson = json_encode($result['data']);
                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();

                                                                    if (DataSite('notice_order') == 'on') {
                                                                        if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TeleCustomController();
                                                                            $bot1 = $tele->bot1();
                                                                            $bot1->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ MXH: " . $social_service->name . "\nDịch vụ: " . $service_->name ."\nServer: " . $request->server_service . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                            ]);
                                                                        }
                                                                    }
                                                                    $balance = $user->balance;
                                                                    $user->balance = $user->balance - $total_payment;
                                                                    $user->total_deduct = $user->total_deduct + $total_payment;
                                                                    $user->save();
                                                                    DataHistory::create([
                                                                        'username' => $user->username,
                                                                        'action' => 'Tạo đơn',
                                                                        'data' => $total_payment,
                                                                        'old_data' => $balance,
                                                                        'new_data' => $user->balance,
                                                                        'ip' => $request->ip(),
                                                                        
                                                                        'description' => "".$order->order_code." | ".$service_->service_social." | Tăng " . $request->quantity . " ".$service_->slug." ở máy chủ [".$request->server_service."] cho ID ".$service_->service_social.": ".$request->link.", trừ " . number_format($total_payment) . " vnd trong tài khoản",
                                                                        'data_json' => '',
                                                                        'domain' => getDomain(),
                                                                    ]);
                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['message'],
                                                                ]);
                                                            }
                                                        } elseif ($server->actual_service == '2mxh') {
                                                            $twomxh = new TwoMxhController();
                                                            $twomxh->path = $actual_path;
                                                            $twomxh->data = [
                                                                'order_link' => $order_link,
                                                                'quantity' => $quantity,
                                                                'speed' => $request->speed ?? '0',
                                                                'comment' => $request->comment ?? '',
                                                                'minutes' => $request->minutes ?? '',
                                                                'time' => $request->time ?? '',
                                                                'reaction' => $request->reaction ?? '',
                                                                'server_order' => $actual_server,
                                                            ];
                                                           
                                                            $result = $twomxh->CreateOrder();
                                                            if ($result['status'] == true) {
                                                                $order_history[] = [
                                                                    'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                    'status' => 'info',
                                                                    'title' => "Đơn hàng đã hoạt động",
                                                                ];
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' => $total_payment,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'PendingOrder',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ]
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if ($order) {
                                                                    $order_history = json_decode($order->history, true);
                                                                    $order_history[] = [
                                                                        'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        'status' => 'info',
                                                                        'title' => "Đơn hàng đang hoạt động",
                                                                    ];
                                                                    $order->order_code = $result['data']['order']['order_id'];
                                                                    $order->start = $result['data']['order']['start_num'] ?? 0;
                                                                    $order->buff = 0;
                                                                    $order->status = 'PendingOrder';
                                                                    $order->dataJson = json_encode($result['data']);
                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();

                                                                    if (DataSite('notice_order') == 'on') {
                                                                        if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TeleCustomController();
                                                                            $bot1 = $tele->bot1();
                                                                            $bot1->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ MXH: " . $social_service->name . "\nDịch vụ: " . $service_->name ."\nServer: " . $request->server_service . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                            ]);
                                                                        }
                                                                    }
                                                                    $balance = $user->balance;
                                                                    $user->balance = $user->balance - $total_payment;
                                                                    $user->total_deduct = $user->total_deduct + $total_payment;
                                                                    $user->save();
                                                                    DataHistory::create([
                                                                        'username' => $user->username,
                                                                        'action' => 'Tạo đơn',
                                                                        'data' => $total_payment,
                                                                        'old_data' => $balance,
                                                                        'new_data' => $user->balance,
                                                                        'ip' => $request->ip(),
                                                                        
                                                                        'description' => "".$order->order_code." | ".$service_->service_social." | Tăng " . $request->quantity . " ".$service_->slug." ở máy chủ [".$request->server_service."] cho ID ".$service_->service_social.": ".$request->link.", trừ " . number_format($total_payment) . " vnd trong tài khoản",
                                                                        'data_json' => '',
                                                                        'domain' => getDomain(),
                                                                    ]);
                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['message'],
                                                                ]);
                                                            }
                                                        } elseif ($server->actual_service == '1dg') {
                                                            $onedg = new OneDgController();
                                                            $data = [
                                                                'service' => $actual_server,
                                                                'link' => $order_link,
                                                                'quantity' => $quantity,
                                                                'comments' => $request->comment ?? '',
                                                            ];
                                                            $onedg->apiToken = DataSite1('onedg');
                                                            $result = $onedg->order($data);
                                                            if (isset($result['order'])) {

                                                                $order_history[] = [
                                                                    'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                    'status' => 'info',
                                                                    'title' => "Đơn hàng đã hoạt động",
                                                                ];
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' => $total_payment,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'Active',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ]
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if ($order) {
                                                                    $order_history = json_decode($order->history, true);
                                                                    $order_history[] = [
                                                                        'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        'status' => 'info',
                                                                        'title' => "Đơn hàng đang hoạt động",
                                                                    ];
                                                                    $order->order_code = $result['order'];
                                                                    $order->start = 0;
                                                                    $order->buff = 0;
                                                                    $order->status = 'Active';
                                                                    $order->dataJson = json_encode($result);
                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();

                                                                    if (DataSite('notice_order') == 'on') {
                                                                        if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TeleCustomController();
                                                                            $bot1 = $tele->bot1();
                                                                            $bot1->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ MXH: " . $social_service->name . "\nDịch vụ: " . $service_->name ."\nServer: " . $request->server_service . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                            ]);
                                                                        }
                                                                    }
                                                                    $balance = $user->balance;
                                                                    $user->balance = $user->balance - $total_payment;
                                                                    $user->total_deduct = $user->total_deduct + $total_payment;
                                                                    $user->save();
                                                                    DataHistory::create([
                                                                        'username' => $user->username,
                                                                        'action' => 'Tạo đơn',
                                                                        'data' => $total_payment,
                                                                        'old_data' => $balance,
                                                                        'new_data' => $user->balance,
                                                                        'ip' => $request->ip(),
                                                                        'description' => "".$order->order_code." | ".$service_->service_social." | Tăng " . $request->quantity . " ".$service_->slug." ở máy chủ [".$request->server_service."] cho ID ".$service_->service_social.": ".$request->link.", trừ " . number_format($total_payment) . " vnd trong tài khoản",
                                                                        'data_json' => '',
                                                                        'domain' => getDomain(),
                                                                    ]);
                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['error'],
                                                                ]);
                                                            }
                                                        } elseif ($server->actual_service == 'submeta') {
                                                            $submeta = new SubmetaController();
                                                            $submeta->path = $actual_path;

                                                            $submeta->data = [
                                                                'order_link' => $order_link,
                                                                'quantity' => $quantity,
                                                                'speed' => $request->speed ?? '0',
                                                                'comment' => $request->comment ?? '',
                                                                'minutes' => $request->minutes ?? '',
                                                                'time' => $request->time ?? '',
                                                                'reaction' => $request->reaction ?? '',
                                                                'server_order' => $actual_server,
                                                            ];
                                                            $submeta->apiToken = DataSite1('submeta');
                                                            $result = $submeta->createOrder();
                                                            if ($result['status'] == true) {
                                                                $order_history[] = [
                                                                    'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                    'status' => 'info',
                                                                    'title' => "Đơn hàng đã hoạt động",
                                                                ];
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' => $total_payment,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'Active',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ]
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if ($order) {
                                                                    $order_history = json_decode($order->history, true);
                                                                    $order_history[] = [
                                                                        'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        'status' => 'info',
                                                                        'title' => "Đơn hàng đang hoạt động",
                                                                    ];
                                                                    $order->order_code = $result['data']['orderCode'];
                                                                    $order->start = 0;
                                                                    $order->buff = 0;
                                                                    $order->status = 'Active';
                                                                    $order->dataJson = json_encode($result['data']);
                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();

                                                                    if (DataSite('notice_order') == 'on') {
                                                                        if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TeleCustomController();
                                                                            $bot1 = $tele->bot1();
                                                                            $bot1->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ MXH: " . $social_service->name . "\nDịch vụ: " . $service_->name ."\nServer: " . $request->server_service . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                            ]);
                                                                        }
                                                                    }
                                                                    $balance = $user->balance;
                                                                    $user->balance = $user->balance - $total_payment;
                                                                    $user->total_deduct = $user->total_deduct + $total_payment;
                                                                    $user->save();
                                                                    DataHistory::create([
                                                                        'username' => $user->username,
                                                                        'action' => 'Tạo đơn',
                                                                        'data' => $total_payment,
                                                                        'old_data' => $balance,
                                                                        'new_data' => $user->balance,
                                                                        'ip' => $request->ip(),
                                                                        'description' => "".$order->order_code." | ".$service_->service_social." | Tăng " . $request->quantity . " ".$service_->slug." ở máy chủ [".$request->server_service."] cho ID ".$service_->service_social.": ".$request->link.", trừ " . number_format($total_payment) . " vnd trong tài khoản",
                                                                        'data_json' => '',
                                                                        'domain' => getDomain(),
                                                                    ]);
                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['message'],
                                                                ]);
                                                            }
                                                        } 
                                                        elseif ($server->actual_service == 'boosterview') {
                                                            $boosterview = new BoosterviewsController();
                                                          
                                                            $boosterview->data = [
                                                                'order_link' => $order_link,
                                                                'quantity' => $quantity,
                                                                'speed' => $request->speed ?? '0',
                                                                'comment' => $request->comment ?? '',
                                                                'minutes' => $request->minutes ?? '',
                                                                'time' => $request->time ?? '',
                                                                'reaction' => $request->reaction ?? '',
                                                                'server_order' => $actual_server,
                                                               
                                                            ];
                                                           
                                                            $result = $boosterview->CreateOrder();
                                                            if ($result['status'] == true) {
                                                                $order_history[] = [
                                                                    'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                    'status' => 'info',
                                                                    'title' => "Đơn hàng đã hoạt động",
                                                                ];
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' => $total_payment,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'Active',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ]
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if ($order) {
                                                                    $order_history = json_decode($order->history, true);
                                                                    $order_history[] = [
                                                                        'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        'status' => 'info',
                                                                        'title' => "Đơn hàng đang hoạt động",
                                                                    ];
                                                                    $order->order_code = $result['data'];
                                                                   
                                                                    $order->buff = 0;
                                                                    $order->status = 'Active';
                                                                    $order->dataJson = json_encode($result['data']);
                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();

                                                                    if (DataSite('notice_order') == 'on') {
                                                                        if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TeleCustomController();
                                                                            $bot = $tele->bot1();
                                                                            $bot->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ MXH: " . $social_service->name . "\nDịch vụ: " . $service_->name ."\nServer: " . $request->server_service . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                            ]);
                                                                        }
                                                                    }
                                                                    $balance = $user->balance;
                                                                    $user->balance = $user->balance - $total_payment;
                                                                    $user->total_deduct = $user->total_deduct + $total_payment;
                                                                    $user->save();
                                                                    DataHistory::create([
                                                                        'username' => $user->username,
                                                                        'action' => 'Tạo đơn',
                                                                        'data' => $total_payment,
                                                                        'old_data' => $balance,
                                                                        'new_data' => $user->balance,
                                                                        'ip' => $request->ip(),
                                                                        
                                                                        'description' => "".$order->order_code." | ".$service_->service_social." | Tăng " . $request->quantity . " ".$service_->slug." ở máy chủ [".$request->server_service."] cho ID ".$service_->service_social.": ".$request->link.", trừ " . number_format($total_payment) . " vnd trong tài khoản",
                                                                        'data_json' => '',
                                                                        'domain' => getDomain(),
                                                                    ]);
                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['message'],
                                                                ]);
                                                            }
                                                        }
                                                        
                                                        elseif ($server->actual_service == 'muafl') {
                                                            $muafl = new MuaflController();
                                                            $muafl->path = $actual_path;

                                                            $muafl->data = [
                                                                'order_link' => $order_link,
                                                                'quantity' => $quantity,
                                                                'speed' => $request->speed ?? '0',
                                                                'comment' => $request->comment ?? '',
                                                                'minutes' => $request->minutes ?? '',
                                                                'time' => $request->time ?? '',
                                                                'reaction' => $request->reaction ?? '',
                                                                'server_order' => $actual_server,
                                                            ];
                                                            $muafl->apiToken = DataSite1('muafl');
                                                            $result = $muafl->createOrder();
                                                            if ($result['status'] == true) {
                                                                $order_history[] = [
                                                                    'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                    'status' => 'info',
                                                                    'title' => "Đơn hàng đã hoạt động",
                                                                ];
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' => $total_payment,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'Active',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ]
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if ($order) {
                                                                    $order_history = json_decode($order->history, true);
                                                                    $order_history[] = [
                                                                        'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        'status' => 'info',
                                                                        'title' => "Đơn hàng đang hoạt động",
                                                                    ];
                                                                    $order->order_code = $result['data']['order_id'] ?? '';
                                                                    $order->start = 0;
                                                                    $order->buff = 0;
                                                                    $order->status = 'Active';
                                                                    $order->dataJson = json_encode($result);
                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();

                                                                    if (DataSite('notice_order') == 'on') {
                                                                        if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TeleCustomController();
                                                                            $bot1 = $tele->bot1();
                                                                            $bot1->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ MXH: " . $social_service->name . "\nDịch vụ: " . $service_->name ."\nServer: " . $request->server_service . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                            ]);
                                                                        }
                                                                    }
                                                                    $balance = $user->balance;
                                                                    $user->balance = $user->balance - $total_payment;
                                                                    $user->total_deduct = $user->total_deduct + $total_payment;
                                                                    $user->save();
                                                                    DataHistory::create([
                                                                        'username' => $user->username,
                                                                        'action' => 'Tạo đơn',
                                                                        'data' => $total_payment,
                                                                        'old_data' => $balance,
                                                                        'new_data' => $user->balance,
                                                                        'ip' => $request->ip(),
                                                                        'description' => "".$order->order_code." | ".$service_->service_social." | Tăng " . $request->quantity . " ".$service_->slug." ở máy chủ [".$request->server_service."] cho ID ".$service_->service_social.": ".$request->link.", trừ " . number_format($total_payment) . " vnd trong tài khoản",
                                                                        'data_json' => '',
                                                                        'domain' => getDomain(),
                                                                    ]);
                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['message'],
                                                                ]);
                                                            }
                                                        } elseif ($server->actual_service == 'traodoisub') {
                                                            $tds = new TraodoisubController();

                                                            $tds->path = $actual_path;

                                                            $tds->data = [
                                                                'order_link' => $order_link,
                                                                'quantity' => $quantity,
                                                                'speed' => $request->speed ?? '0',
                                                                'comment' => $request->comment ?? '',
                                                                'minutes' => $request->minutes ?? '',
                                                                'time' => $request->time ?? '',
                                                                'reaction' => $request->reaction ?? '',
                                                                'server_order' => $actual_server,
                                                            ];

                                                            $result = $tds->createOrder();
                                                            if ($result['status'] == true) {
                                                                $order_history = [
                                                                    'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                    'status' => 'info',
                                                                    'title' => "Đơn hàng đã hoạt động",
                                                                ];
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' => $total_payment,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'Active',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ]
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if ($order) {
                                                                    $order->start = 0;
                                                                    $order->buff = 0;
                                                                    $order->status = 'Active';
                                                                    $order->dataJson = json_encode($result);
                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();

                                                                    if (DataSite('notice_order') == 'on') {
                                                                        if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TeleCustomController();
                                                                            $bot = $tele->bot1();
                                                                            $bot->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ: " . $service_->name . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                            ]);
                                                                        }
                                                                    }
                                                                    $balance = $user->balance;
                                                                    $user->balance = $user->balance - $total_payment;
                                                                    $user->total_deduct = $user->total_deduct + $total_payment;
                                                                    $user->save();
                                                                    DataHistory::create([
                                                                        'username' => $user->username,
                                                                        'action' => 'Tạo đơn',
                                                                        'data' => $total_payment,
                                                                        'old_data' => $balance,
                                                                        'new_data' => $user->balance,
                                                                        'ip' => $request->ip(),
                                                                        'description' => "Tạo đơn hàng " . $service_->name . " với số lượng " . $request->quantity . " với giá " . number_format($total_payment) . "đ",
                                                                        'data_json' => '',
                                                                        'domain' => getDomain(),
                                                                    ]);

                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['message'],
                                                                ]);
                                                            }
                                                        }elseif ($server->actual_service == 'sainpanel') {
                                                            $sain = new SainpanelController();
                                                            $data = [
                                                                'service' => $actual_server,
                                                                'link' => $order_link,
                                                                'quantity' => $quantity,
                                                                'comments' => $request->comment ?? '',
                                                            ];
                                                            $sain->apiToken = DataSite1('sain');
                                                            $result = $sain->order($data);
                                                            if (isset($result['order'])) {
                                                                $order_history[] = [
                                                                    'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                    'status' => 'info',
                                                                    'title' => "Đơn hàng đã hoạt động",
                                                                ];
                                                                $order = Orders::create([
                                                                    'username' => $user->username,
                                                                    'service_id' => $service_->id,
                                                                    'service_name' => $service_->name,
                                                                    'server_service' => $request->server_service,
                                                                    'price' => $price,
                                                                    'quantity' => $request->quantity,
                                                                    'total_payment' => $total_payment,
                                                                    'order_code' => '',
                                                                    'order_link' => $request->link,
                                                                    'start' => 0,
                                                                    'buff' => 0,
                                                                    'actual_service' => $server->actual_service,
                                                                    'actual_path' => $server->actual_path,
                                                                    'actual_server' => $server->actual_server,
                                                                    'status' => 'Active',
                                                                    'action' => json_encode([
                                                                        'link' => $request->link,
                                                                        'server_service' => $request->server_service,
                                                                        'quantity' => $request->quantity,
                                                                        'reaction' => $request->reaction ?? '',
                                                                        'speed' => $request->speed ?? '',
                                                                        'comment' => $request->comment ?? '',
                                                                        'minutes' => $request->minutes ?? '',
                                                                        'time' => $request->time ?? '',
                                                                    ]),
                                                                    'dataJson' => '',
                                                                    'isShow' => 1,
                                                                    'history' => json_encode([
                                                                        [
                                                                            'status' => 'primary',
                                                                            'title' => "Đơn hàng đã được tạo",
                                                                            'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        ]
                                                                    ]),
                                                                    'note' => $request->note ?? '',
                                                                    'domain' => getDomain(),
                                                                ]);

                                                                if ($order) {
                                                                    $order_history = json_decode($order->history, true);
                                                                    $order_history[] = [
                                                                        'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        'status' => 'info',
                                                                        'title' => "Đơn hàng đang hoạt động",
                                                                    ];
                                                                    $order->order_code = $result['order'];
                                                                    $order->start = 0;
                                                                    $order->buff = 0;
                                                                    $order->status = 'Active';
                                                                    $order->dataJson = json_encode($result);
                                                                    $order->history = json_encode($order_history);
                                                                    $order->save();
                                                                    if (DataSite('notice_order') == 'on') {
                                                                        if (DataSite('telegram_chat_id')) {
                                                                            $tele = new TeleCustomController();
                                                                            $bot1 = $tele->bot1();
                                                                            $bot1->sendMessage([
                                                                                'chat_id' => DataSite('telegram_chat_id'),
                                                                                'text' => "🔔 Đơn hàng mới \n Từ " . $user->username . "\nDịch vụ MXH: " . $social_service->name . "\nDịch vụ: " . $service_->name ."\nServer: " . $request->server_service . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                            ]);
                                                                        }
                                                                    }
                                                                    $balance = $user->balance;
                                                                    $user->balance = $user->balance - $total_payment;
                                                                    $user->total_deduct = $user->total_deduct + $total_payment;
                                                                    $user->save();
                                                                    DataHistory::create([
                                                                        'username' => $user->username,
                                                                        'action' => 'Tạo đơn',
                                                                        'data' => $total_payment,
                                                                        'old_data' => $balance,
                                                                        'new_data' => $user->balance,
                                                                        'ip' => $request->ip(),
                                                                        'description' => "".$order->order_code." | ".$service_->service_social." | Tăng " . $request->quantity . " ".$service_->slug." ở máy chủ [".$request->server_service."] cho ID ".$service_->service_social.": ".$request->link.", trừ " . number_format($total_payment) . " vnd trong tài khoản",
                                                                        'data_json' => '',
                                                                        'domain' => getDomain(),
                                                                    ]);
                                                                    return response()->json([
                                                                        'order' => $order->id,
                                                                    ]);
                                                                } else {
                                                                    return response()->json([
                                                                        'status' => 'error',
                                                                        'message' => 'Đặt hàng thất bại',
                                                                    ]);
                                                                }
                                                            } else {
                                                                return response()->json([
                                                                    'status' => 'error',
                                                                    'message' => $result['error'],
                                                                ]);
                                                            }
                                                        }
                                                         elseif ($server->actual_service == 'dontay') {
                                                            $start_date=getdate1();
                                                            $days_to_add = $request->timebuy;

 
                                                            $start_date_obj = Carbon::parse($start_date);

                                                            // Thêm số ngày cần thêm
                                                            $result_date = $start_date_obj->addDays($days_to_add);
                                                            
                                                            // Lấy ngày kết quả dưới định dạng Y-m-d
                                                            $result_date_formatted = $result_date->format('Y-m-d');
                                                            $order = Orders::create([
                                                                'username' => $user->username,
                                                                'service_id' => $service_->id,
                                                                'service_name' => $service_->name,
                                                                'server_service' => $request->server_service,
                                                                'price' => $price,
                                                                'quantity' => $request->quantity,
                                                                'total_payment' => $total_payment,
                                                                'order_code' => '',
                                                                'order_link' => $request->link,
                                                                'start' => 0,
                                                                'buff' => 0,
                                                                'host' =>'Đang duyệt',
                                                                    'pass' =>'Đang duyệt',
                                                                    'port' =>'Đang duyệt',
                                                                    'ipv6' =>'Chờ',
                                                                    'loai' =>'IPV'.$request->server_service,
                                                                    'quocgia' => $request->country,
                                                                'timebuy' => $request->timebuy,
                                                                    'timeend' =>$result_date_formatted,
                                                                    
                                                                    'timestart' =>$start_date,
                                                                'actual_service' => $server->actual_service,
                                                                'actual_path' => $server->actual_path,
                                                                'actual_server' => $server->actual_server,
                                                                'status' => 'Pending',
                                                                'action' => json_encode([
                                                                    'link' => $request->link,
                                                                    'server_service' => $request->server_service,
                                                                    'quantity' => $request->quantity,
                                                                    'reaction' => $request->reaction ?? '',
                                                                    'speed' => $request->speed ?? '',
                                                                    'comment' => $request->comment ?? '',
                                                                    'minutes' => $request->minutes ?? '',
                                                                    'time' => $request->time ?? '',
                                                                ]),
                                                                'dataJson' => '',
                                                                'isShow' => 1,
                                                                'history' => json_encode([
                                                                    [
                                                                        'status' => 'primary',
                                                                        'title' => "Đơn hàng đã được tạo",
                                                                        'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                    ]
                                                                ]),
                                                                'note' => $request->note ?? '',
                                                                'domain' => getDomain(),
                                                            ]);

                                                            if ($order) {
                                                                $order_history = json_decode($order->history, true);
                                                                    $order_history[] = [
                                                                        'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                        'status' => 'info',
                                                                        'title' => "Đơn hàng đang hoạt động",
                                                                    ];
                                                                // send telegram
                                                                if (DataSite('telegram_chat_id')) {
                                                                    $tele = new TeleCustomController();
                                                                    $bot = $tele->bot1();
                                                                    $bot->sendMessage([
                                                                        'chat_id' => -4064616334,
                                                                                'text' => "🔔 Đơn hàng thủ công mới \n Từ " . $user->username . "\nDịch vụ Nguồn: " . $server->actual_path . "\nDịch vụ MXH: " . $social_service->name . "\nDịch vụ: " . $service_->name ."\nServer: " . $request->server_service ."\nBluan: " . $request->comment . "\nSố lượng: " . $request->quantity . "\nGiá: " . number_format($total_payment) . "đ\nLink: " . $request->link,
                                                                    ]);
                                                                }
                                                                $balance = $user->balance;
                                                                $user->balance = $user->balance - $total_payment;
                                                                $user->total_deduct = $user->total_deduct + $total_payment;
                                                                $user->save();
                                                                $order->history = json_encode($order_history);
                                                                $order->save();
                                                                DataHistory::create([
                                                                    'username' => $user->username,
                                                                    'action' => 'Tạo đơn',
                                                                    'data' => $total_payment,
                                                                    'old_data' => $balance,
                                                                    'new_data' => $user->balance,
                                                                    'ip' => $request->ip(),
                                                                    'description' => "".$order->order_code." | ".$service_->service_social." | Tăng " . $request->quantity . " ".$service_->slug." ở máy chủ [".$request->server_service."] cho ID ".$service_->service_social.": ".$request->link.", trừ " . number_format($total_payment) . " vnd trong tài khoản",
                                                                    'data_json' => '',
                                                                    'domain' => getDomain(),
                                                                ]);
                                                                return response()->json([
                                                                    'order' => $order->id,
                                                                ]);
                                                            }
                                                        } else {
                                                            return response()->json([
                                                                'status' => 'error',
                                                                'message' => 'Dữ liệu không hợp lệ vui lòng thử lại sau'
                                                            ]);
                                                        }
                                                    }else {
                                                        $order = Orders::create([
                                                            'username' => $user->username,
                                                            'service_id' => $service_->id,
                                                            'service_name' => $service_->name,
                                                            'service' => $request->service,
                                                            'price' => $price,
                                                            'quantity' => $quantity,
                                                            'total_payment' => $total_payment,
                                                            'order_code' => '',
                                                            'order_link' => $link,
                                                            'start' => 0,
                                                            'buff' => 0,
                                                            'actual_service' => $server->actual_service,
                                                            'actual_path' => $server->actual_path,
                                                            'actual_server' => $server->actual_server,
                                                            'status' => 'Active',
                                                            'action' => json_encode([
                                                                'link' => $link,
                                                                'service' => $request->service,
                                                                'quantity' => $quantity,
                                                                'reaction' => $request->reaction ?? '',
                                                                'speed' => $request->speed ?? '',
                                                                'comment' => $request->comment ?? '',
                                                                'minutes' => $request->minutes ?? '',
                                                                'time' => $request->time ?? '',
                                                            ]),
                                                            'dataJson' => '',
                                                            'isShow' => 1,
                                                            'history' => json_encode([
                                                                [
                                                                    'status' => 'primary',
                                                                    'title' => "Đơn hàng đã được tạo",
                                                                    'time' => Carbon::now()->format('H:i d/m/Y'),
                                                                ]
                                                            ]),
                                                            'note' => $request->note ?? '',
                                                            'domain' => getDomain(),
                                                        ]);

                                                        if ($order) {
                                                            return response()->json([
                                                                
                                                                'order' => $order->id,
                                                            ]);
                                                        }
                                                    }
                                                }
                                            }
                                        
                                    }
                                } else {
                                    return response()->json([
                                        'status' => 'error',
                                        'message' => 'Server không tồn tại'
                                    ]);
                                    die();
                                }
                           

                            
                           
                            } else {
                                return response()->json([
                                    'status' => 'error',
                                    'message' => 'Dịch vụ không tồn tại'
                                ]);
                                die();
                            }
                        } else {
                            return response()->json([
                                'status' => 'error',
                                'message' => 'Dịch vụ Social không tồn tại'
                            ]);
                            die();
                        }} else {
                                return response()->json([
                                    'status' => 'error',
                                    'message' => 'Invalid Service'
                                ]);
                                die();
                            }
                    
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Người dùng không tồn tại'
                    ]);
                }
            }  
            
            
            
                }
            
            #status
            
            
            
            
            
            
            
            
            elseif ($action == 'status'){


                $idorder = $request->input('order');
               
                if (empty($idorder)) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Invalid Order ID'
                    ]);
                } else {
                   
      
                    $user = User::where('domain', getDomain())->where('api_token', $api_token)->first();
                    if ($user) {
                    $order = Orders::where('username', $user->username)->where('id', $idorder)->first();
                    if ($order) {
                        return response()->json([
                            'charge' => $order->price,
                            'start_count' => $order->start,
                            'status' => $order->status,
                            'remains' => $order->quantity - $order->buff
                        ]);
                    } else {
                        return response()->json([
                            'status' => 'error',
                            'message' => "Không tìm thấy đơn hàng!",
                        ]);
                    }
                }

                else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Người dùng không tồn tại'
                    ]);
                }

            } 


            }
        
        
        
        
        #end status
        
        
        #balance

        elseif($action == 'balance'){

        $user = User::where('domain', getDomain())->where('api_token', $api_token)->first();
        if ($user) {
            return response()->json([
                'balance' => $user->balance,
                'currency' => 'VND'
               
            ]);
        }

        else {
            return response()->json([
                'status' => 'error',
                'message' => 'Người dùng không tồn tại'
            ]);
        }

        }
        #end balance
        
        #get service

        elseif ($action == 'services'){
        $user = User::where('domain', getDomain())->where('api_token', $api_token)->first();
       
        $server_service = ServerService::where('domain', getDomain())->get();
        $arr = [];
        foreach ($server_service as $sv) {
            $arr[] = [


                "service" => $sv->id,
                "name" => Service::find($sv->service_id)->name,
                "type" => 'Default',
                "category" => ucfirst($sv->socialll),
                "rate" => priceServer($sv->id, $user->level),
                "min" => $sv->min,
                "max" => $sv->max,




 
            ];
        }
        return response()->json(
           
           $arr
        );

        }
        

        #end get service

        }
            
           
            
        }
    }
}