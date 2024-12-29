<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Custom\CloudflareCustomController;
use App\Models\AccountRecharge;
use App\Models\Activities;
use App\Models\DataHistory;
use App\Models\HistoryCard;
use App\Models\HistoryRecharge;
use App\Models\Notification;
use App\Models\Orders;
use App\Models\ServerService;
use App\Models\Service;
use App\Models\ServiceSocial;
use App\Models\Category;
use App\Models\SiteData;
use App\Models\Tainguyen;
use App\Models\Actives;
use App\Models\User;
use App\Models\Support;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Custom\TeleCustomController;
use App\Models\SiteCon;
use App\Http\Controllers\Custom\CpanelCustomController;

class DataAdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('xss')->only(['']);
    }

    public function supportEdit($id, Request $request)
    {
        $valid = Validator::make($request->all(), [
            'reply' => 'string',
        ]);

        if ($valid->fails()) {
            // return resApi('error', $valid->errors()->first());
            return redirect()->back()->with('error',$valid->errors()->first());
        } else {
               $check = Support::where('domain', getDomain())->where('id', $id)->first();
               if($check){
                     $check->reply = $request->reply;
                $check->status = "Success";
                $check->save();
                //   return resApi('success', 'phản hồi thành công');
                
            return redirect()->route('admin.support')->with('success',"Phản hồi thành công!");
               } else {
                    // return resApi('error', 'Không tìm thấy');
                    
            return redirect()->back()->with('error',"Không tìm thấy");
               }
               
             
            }
        }
     public function supportDelete($id)
{
    $check = Support::where('domain', getDomain())->where('id', $id)->first();
    if ($check) {
        $check->delete(); // Sử dụng delete() để xóa
        return redirect()->back()->with('success', 'Xóa thành công');
    } else {
        return redirect()->back()->with('error', 'Không tìm thấy');
    }
}
public function active(Request $request)
{
    $valid = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'link' => 'required',
    ]);

    if ($valid->fails()) {
        return redirect()->back()->with('error', $valid->errors()->first());
    } else {
        
        Actives::create([
            'name' => $request->name,
            'link' => $request->link,
       
            'domain' => getDomain(),
        ]);
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }
}
    public function websiteConfig(Request $request)
    {
            $DataSite = SiteData::where('domain', getDomain())->first();
            foreach ($request->all() as $key => $value) {
                if ($key != '_token') {
                    $DataSite->$key = $value;
                }
                if (isset($request->notice_order)) {
                    $DataSite->notice_order = 'on';
                } else {
                    $DataSite->notice_order = 'off';
                }
                if (isset($request->notice_login)) {
                    $DataSite->notice_login = 'on';
                } else {
                    $DataSite->notice_login = 'off';
                }
            }
            $DataSite->save();
            return redirect()->back()->with('success', 'Cập nhật thành công');
    }
    public function rechargeadd(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'namebank' => 'required|string',
            'nametk' => 'required|string',
            'sotaikhoan' => 'required|string',
            'logo' => 'required|string',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first());
        } else {
            $randClass = ['primary', 'success', 'warning', 'danger', 'info'];
            $randClass = $randClass[rand(0, 4)];
            AccountRecharge::create([
                'type' => $request->namebank,
                'account_name' => $request->nametk,
                'account' => $request->nametk,
                'account_number' => $request->sotaikhoan,
                'password' => 'no',
                'api_token' => 'no',
                'logo' => $request->logo,
                'qr_code' => "https://apiqr.web2m.com/api/generate/".$request->namebank."/". $request->sotaikhoan ."/". $request->nametk."?amount=10000&memo=",
                'domain' => getDomain(),
            ]);
            return redirect()->back()->with('success', 'Thêm tài khoản thành công');
        }
    }

    public function websiteTheme(Request $request)
    {
        $DataSite = SiteData::where('domain', request()->getHost())->first();
        foreach ($request->only(['logo', 'logo_mini', 'favicon', 'image_seo', 'theme']) as $key => $value) {
            if ($key != '_token') {
                $DataSite->$key = $value;
            }
        }
        $DataSite->save();
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }
 

    public function userEdit($id, Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255',
            'username' => 'string|max:255',
            'balance' => 'numeric',
            'level' => 'numeric',
            'status' => 'string|in:active,banner',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first());
        } else {
            $user = User::where('domain', getDomain())->where('id', $id)->first();
            if ($user) {
                foreach ($request->only(['name', 'email', 'username', 'balance', 'level', 'status']) as $key => $value) {
                    if ($key != '_token') {
                        $user->$key = $value;
                    }
                }
                $user->save();
                return redirect()->back()->with('success', 'Cập nhật thành công');
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy người dùn1g');
            }
        }
    }

    public function userChangePassword($id, Request $request)
    {
        $valid = Validator::make($request->all(), [
            'password' => 'required|string|min:6',
            'password_confirm' => 'required|string|min:6|same:password',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first());
        } else {
            $user = User::where('domain', getDomain())->where('id', $id)->first();
            if ($user) {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->back()->with('success', 'Cập nhật thành công');
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy người dùng1');
            }
        }
    }

      public function userEditBalance(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'action' => 'required|string|in:plus,minus',
            'balance' => 'required|numeric',
            'description' => 'required',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first());
        } else {
            $action = $request->action === 'plus' ? '+' : '-';
            // $user = User::where('domain', getDomain())->where('id', $request->username)->orWhere('username', $request->username)->first();
            $user = User::where('domain', getDomain())
            ->where(function($query) use ($request) {
                $query->where('id', $request->username)
                    ->orWhere('username', $request->username);
            })
            ->first();

            if ($user) {
                $balance = $user->balance;
                $user->balance = $request->action === 'plus' ? $user->balance + $request->balance : $user->balance - $request->balance;
                $user->total_recharge = $request->action === 'plus' ? $user->total_recharge + $request->balance : $user->total_recharge - $request->balance;
                $user->save();
                DataHistory::create([
                    'username' => $user->username,
                    'action' => $action,
                    'data' => $request->balance,
                    'old_data' => $balance,
                    'new_data' => $user->balance,
                    'ip' => $request->ip(),
                    'data_json' => json_encode([
                        'username' => $user->username,
                        'action' => $action,
                        'data' => $request->balance,
                        'old_data' => $balance,
                        'new_data' => $user->balance,
                        'ip' => $request->ip(),
                    ]),
                    'description' => $request->description,
                    'domain' => getDomain(),
                ]);
              
                return redirect()->back()->with('success', 'Cập nhật thành công');
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy người dùng');
            }
        }
    }



    public function userDelete($id)
    {
        $user = User::where('domain', getDomain())->where('id', $id)->first();
        if ($user) {
            $user->delete();
            return resApi('success', 'Xóa thành công');
        } else {
            return resApi('error', 'Không tìm thấy người dùng2');
        }
    }

    public function notificationModal(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'notice-modal' => 'required',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first());
        } else {
            $DataSite = SiteData::where('domain', getDomain())->first();
            $DataSite->notice = $request->input('notice-modal');
             $DataSite->image_modal = $request->input('image_modal');
            $DataSite->save();
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
    }

    public function notification(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'notice' => 'required|string',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first());
        } else {

            // class random primary, success, warning, danger, info
            $class = ['primary', 'success', 'warning', 'danger', 'info'];
            $class = $class[rand(0, 4)];

            Notification::create([
                'name' => $request->name,
                'content' => $request->notice,
                'domain' => getDomain(),
                'class' => $class,
            ]);

            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
    }

    public function websiteCaptcha(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'secret_key' => 'required',
            'site_key' => 'required',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first());
        } else {

            // class random primary, success, warning, danger, info
            $class = ['primary', 'success', 'warning', 'danger', 'info'];
            $class = $class[rand(0, 4)];
            $DataSite = SiteData::where('domain', getDomain())->first();
            foreach ($request->only(['secret_key','site_key']) as $key => $value) {
                if ($key != '_token') {
                    $DataSite->$key = $value;
                }
            }
            $DataSite->save();
            return redirect()->back()->with('success', 'Cập nhật thành công');
         
        }
    }

    public function notificationDelete($id)
    {
        $notification = Notification::where('domain', getDomain())->where('id', $id)->first();
        if ($notification) {
            $notification->delete();
            return resApi('success', 'Xóa thành công');
        } else {
            return resApi('error', 'Không tìm thấy thông báo');
        }
    }

    public function activity(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first());
        } else {
            $randClass = ['primary', 'success', 'warning', 'danger', 'info'];
            $randClass = $randClass[rand(0, 4)];
            Activities::create([
                'name' => $request->name,
                'content' => $request->content,
                'status' => $randClass,
                'domain' => getDomain(),
            ]);
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
    }

    public function activityDelete($id)
    {
        $activity = Activities::where('domain', getDomain())->where('id', $id)->first();
        if ($activity) {
            $activity->delete();
            return resApi('success', 'Xóa thành công');
        } else {
            return resApi('error', 'Không tìm thấy hoạt động');
        }
    }
    public function activeDelete($id)
    {
        $activity = Actives::where('domain', getDomain())->where('id', $id)->first();
        if ($activity) {
            $activity->delete();
            return resApi('success', 'Xóa thành công');
        } else {
            return resApi('error', 'Không tìm thấy hoạt động');
        }
    }
public function rechargeCard(Request $request)
    {
         $valid = Validator::make($request->all(), [
            'partner_key' => 'required|string',
            'partner_id' => 'required|string',
          
            'card_discount' => 'required|numeric'
        ]);if ($valid->fails()) {
             return redirect()->back()->with('error', $valid->errors()->first());
        }  else {

            $DataSite = SiteData::where('domain', getDomain())->first();
        foreach ($request->only(['partner_id','partner_key','card_discount']) as $key => $value) {
            if ($key != '_token') {
                $DataSite->$key = $value;
            }
        }
        $DataSite->save();
        return redirect()->back()->with('success', 'Cập nhật thành công');
        
         
        }
    }
    public function rechargeConfig(Request $request)
    {
        
        
        $valid = Validator::make($request->all(), [
          'type' => 'required|string|in:mbbank,vietcombank,momo,acb',
           
        ]);

        if ($valid->fails()) {
            return resApi('error', $valid->errors()->first());
        } else {
            $account_recharge = AccountRecharge::where('domain', getDomain())->where('type', $request->type)->first();
            if ($account_recharge) {
            
            
                $account_recharge ->account_name =  $request->name;
                $account_recharge ->api_token =  $request->api_token;
                $account_recharge ->account_number =  $request->stk;
                $account_recharge->save();
               return resApi('success', 'Cập nhật thành công');
            } else {
                switch ($request->type) {
                    case 'mbbank':
                        $logo = '/assets/images/bank/mbb.png';
                        $qr = "https://img.vietqr.io/image/" . 'mbbank-' . $request->stk . '-compact.jpg?amount=0&accountName=' . $request->name;
                        break;
                    case 'vietcombank':
                        $bank = 'Vietcombank';
                        $logo = '/assets/images/bank/vcb.png';
                        $qr = 'https://img.vietqr.io/image/vietcombank-' . $request->stk . '-compact.jpg?amount=0&accountName=' . $request->name;
                        break;
                    case 'acb':
                        $bank = 'acb';
                        $logo = 'https://nganhangviet.org/wp-content/uploads/2020/12/logo-acb-1.png';
                        $qr = 'https://img.vietqr.io/image/acb-' . $request->stk . '-compact.jpg?amount=0&accountName=' . $request->name;
                        break;
                    case 'momo':
                        $bank = 'Momo';
                        $logo = '/assets/images/bank/momo.png';
                        $qr = "https://chart.googleapis.com/chart?chs=480x480&cht=qr&choe=UTF-8&chl=2|99|" . $request->stk . "|%3C?=" . $request->name . "?%3E|lamtilo1710@gmail.com|0|0|0|";
                        break;
                }

                    AccountRecharge::create([
                        'type' => $request->type,
                        'account_name' => $request->name,
                        'account' => $request->account,
                        'account_number' => $request->stk,
                        'password' => $request->password,
                        'api_token' => $request->api_token,
                        'logo' => $logo,
                        'qr_code' => $qr,
                        'domain' => getDomain(),
                    ]);
                    return resApi('success', 'Cập nhật thành công');
            }
        }
    }

    public function rechargeDelete($id)
    {
        $account_recharge = AccountRecharge::where('domain', getDomain())->where('id', $id)->first();
        if ($account_recharge) {
            $account_recharge->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } else {
            return resApi('error', 'Không tìm thấy tài khoản');
        }
    }

    public function rechargePromotion(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'action' => 'required|string|in:show,hide',
            'promotion' => 'required|numeric',
            'start_promotion' => 'required',
            'end_promotion' => 'required',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first());
        } else {
            $dataSite = SiteData::where('domain', getDomain())->first();
            if ($dataSite) {
                $dataSite->update([
                    'recharge_promotion' => $request->promotion,
                    'start_promotion' => $request->start_promotion,
                    'end_promotion' => $request->end_promotion,
                    'show_promotion' => $request->action,
                ]);
                return redirect()->back()->with('success', 'Cập nhật thành công');
            } else {
                return redirect()->back()->with('error', 'Lỗi mong muốn không sảy ra');
            }
        }
    }

    public function configTelegram(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'telegram_bot' => 'required|string|url',
            'telegram_token' => 'required|string',
            'telegram_chat_id' => 'required|numeric',
            'telegram_token_tb' => 'required|string',
            
            'balance_telegram' => 'required|numeric',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first());
        } else {
            $dataSite = SiteData::where('domain', getDomain())->first();
            if ($dataSite) {

                $dataSite->update([
                    'telegram_bot' => $request->telegram_bot,
                    'telegram_token' => $request->telegram_token,
                    'telegram_token_tb' => $request->telegram_token_tb,
                    'telegram_chat_id' => $request->telegram_chat_id,
                    'balance_telegram' => $request->balance_telegram,
                    'telegram_token_tb_smm' => $request->telegram_token_tb_smm,
                ]);

                if (empty($dataSite->telegram_callback)) {
                    $tele = new TeleCustomController();
                    $dta = $tele->setWebhook();
                    // get id bot
                    // $bot = $tele->getMe();
                    // $bot_id = $bot['result']['id'];

                    if ($dta) {
                        $dataSite->update([
                            'telegram_callback' => route('callback.telegram.v1'),
                            // 'telegram_chat_id' => $bot_id,
                        ]);
                    }
                }
                return redirect()->back()->with('success', 'Cập nhật thành công');
            } else {
                return redirect()->back()->with('error', 'Lỗi mong muốn không sảy ra');
            }
        }
    }
public function serverAutoEdit(Request $request)
    {
        

            $valid = Validator::make($request->all(), [
               
                'type' => 'required|string',
                'price' => 'required|numeric',
                
            ]);

            if ($valid->fails()) {
                return resApi('error', $valid->errors()->first());
                
                
            } else {
            
                $server_parent = ServerService::where('domain', getDomain())->get();
                $count = 0;
                foreach ($server_parent as $server) {
                    $price = $server->price;
                    $price_collaborator = $server->price_collaborator;
                    $price_agency = $server->price_agency;
                    $price_distributor = $server->price_distributor;
                    
                    switch ($request->type) {
               
                        case 'percent':
                            $price = $price + ($price * $request->price / 100);
                            $price_collaborator = $price_collaborator + ($price_collaborator * $request->price / 100);
                            $price_agency = $price_agency + ($price_agency * $request->price / 100);
                            $price_distributor = $price_distributor + ($price_distributor * $request->price / 100);
                            break;
                        case 'add':
                            $price = $price + $request->price;
                            $price_collaborator = $price_collaborator + $request->price;
                            $price_agency = $price_agency + $request->price;
                            $price_distributor = $price_distributor + $request->price;
                            break;
                        default:
                            $price = $price;
                            $price_collaborator = $price_collaborator;
                            $price_agency = $price_agency;
                            $price_distributor = $price_distributor;
                            break;
                    }
                    
                    
                        $check_server = ServerService::where('domain', getDomain())->where('social_id', $server->social_id)->where('service_id', $server->service_id)->where('server', $server->server)->first();
                        if ($check_server) {
                            $check_server->update([
                                'price' => $price,
                                'price_collaborator' => $price_collaborator,
                                'price_agency' => $price_agency,
                                'price_distributor' => $price_distributor,
                            ]);
                        }
                        $count++;
                     
                }

                
                return resApi('success', 'Cập nhật thành công ' . $count . ' dịch vụ');
                
            }
        } 
    
        public function serverAutoPrice(Request $request)
    {
        if (getDomain() != env('PARENT_SITE')) {

            $valid = Validator::make($request->all(), [
                'price' => 'required|numeric',
                  'price_distributor' => 'required|numeric',
                    'price_agency' => 'required|numeric',
                      'price_collaborator' => 'required|numeric',

            ]);

            if ($valid->fails()) {
                return resApi('error', $valid->errors()->first());


            } else {
            $userdomain = SiteCon::where('domain_name', getDomain())->first();
                $server_parent = ServerService::where('domain', $userdomain['domain'])->get();
                $count = 0;
                foreach ($server_parent as $server) {
                    $price = $server->price;
                    $price_collaborator = $server->price_collaborator;
                    $price_agency = $server->price_agency;
                    $price_distributor = $server->price_distributor;
                    $admin = User::where('username', DataSite('username_web'))->where('domain',$userdomain['domain'])->first();
                    switch ($admin->level) {
                        case 1:
                            $price = $price;
                            $price_collaborator = $price;
                            $price_agency = $price;
                            $price_distributor = $price;
                            break;
                        case 2:
                            $price = $price_collaborator;
                            $price_collaborator = $price_collaborator;
                            $price_agency = $price_collaborator;
                            $price_distributor = $price_collaborator;
                            break;
                        case 3:
                               $price = $price_agency;
                            $price_collaborator = $price_agency;
                            $price_agency = $price_agency;
                            $price_distributor = $price_agency;
                            break;
                        case 4:
                              $price = $price_distributor;
                            $price_collaborator = $price_distributor;
                            $price_agency = $price_distributor;
                            $price_distributor = $price_distributor;
                            break;
                        default:
                            $price = 0;
                            break;
                    }

                    $check_server = ServerService::where('domain', getDomain())->where('social_id', $server->social_id)->where('service_id', $server->service_id)->where('server', $server->server)->first();
                     
                        if ($check_server) {
                            $price = $price + ($price * $request->price / 100);
                            $price_collaborator = $price_collaborator + ($price_collaborator * $request->price_collaborator / 100);
                            $price_agency = $price_agency + ($price_agency * $request->price_agency / 100);
                            $price_distributor = $price_distributor + ($price_distributor * $request->price_distributor / 100);
                            $check_server->update([
                                'price' => $price,
                                'price_collaborator' => $price_collaborator,
                                'price_agency' => $price_agency,
                                'price_distributor' => $price_distributor,
                            ]);
                        }
                        $count++;
                    
                }
 
                    return resApi('success', 'Chỉnh giá thành công');
                
            }
        } else {
            return abort(404);
        }
    }

    public function serverAutoCreate(Request $request)
    {
        if (getDomain() != env('PARENT_SITE')) {

            $valid = Validator::make($request->all(), [
                'action' => 'required|string|in:update,add',
                'type' => 'required|string',
                'price' => 'required|numeric',
                
            ]);

            if ($valid->fails()) {
                return resApi('error', $valid->errors()->first());
                
                
            } else {
            $userdomain = SiteCon::where('domain_name', getDomain())->first();
                $server_parent = ServerService::where('domain', $userdomain['domain'])->get();
                $count = 0;
                foreach ($server_parent as $server) {
                    $price = $server->price;
                    $price_collaborator = $server->price_collaborator;
                    $price_agency = $server->price_agency;
                    $price_distributor = $server->price_distributor;
                    $admin = User::where('username', DataSite('username_web'))->where('domain',$userdomain['domain'])->first();
                    switch ($admin->level) {
                        case 1:
                            $price = $price;
                            break;
                        case 2:
                            $price = $price_collaborator;
                            break;
                        case 3:
                            $price = $price_agency;
                            break;
                        case 4:
                            $price = $price_distributor;
                            break;
                        default:
                            $price = 0;
                            break;
                    }

                    $check_server = ServerService::where('domain', getDomain())->where('social_id', $server->social_id)->where('service_id', $server->service_id)->where('server', $server->server)->first();
                    if ($request->action == 'update') {
                        $check_server = ServerService::where('domain', getDomain())->where('social_id', $server->social_id)->where('service_id', $server->service_id)->where('server', $server->server)->first();
                        if ($check_server) {
                            $check_server->update([
                                'actual_price' => $price,
                                'status' => $server->status,
                                'server' => $server->server,
                                'socialll' => $server->socialll,
                                'actual_service' => $server->actual_service,
                                'actual_server' => $server->actual_server,
                                'actual_path' => $server->actual_path,
                                'order_type' => $server->order_type,
                                  'title' => $server->title,
                                    'description' => $server->description,
                                    'reaction' => $server->reaction,
                                'warranty' => $server->warranty,
                            ]);
                        }
                        $count++;
                    } elseif ($request->action == 'add') {
                        switch ($request->type) {
                            case 'default':
                                $price = $price;
                                break;
                            case 'percent':
                                $price = $price + ($price * $request->price / 100);
                                break;
                            case 'add':
                                $price = $price + $request->price;
                                break;
                            default:
                                $price = $price;
                                break;
                        }
                        $check_server = ServerService::where('domain', getDomain())->where('social_id', $server->social_id)->where('service_id', $server->service_id)->where('server', $server->server)->first();
                        if ($check_server) {

                        } else {
                            ServerService::create([
                                'name' => $server->name,
                                'social_id' => $server->social_id,
                                'service_id' => $server->service_id,
                                'socialll' => $server->socialll,
                                'server' => $server->server,
                                'price' => $price,
                                'price_collaborator' => $price,
                                'price_agency' => $price,
                                'price_distributor' => $price,
                                'min' => $server->min,
                                'max' => $server->max,
                                'title' => $server->title,
                                'description' => $server->description,
                                'status' => $server->status,
                                'actual_price' => $server->price,
                                'actual_service' => $server->actual_service,
                                'actual_server' => $server->actual_server,
                                'actual_path' => $server->actual_path,
                                'order_type' => $server->order_type,
                                'warranty' => $server->warranty,
                                'action' => $server->action,
                                'reaction' => $server->reaction,
                                'domain' => getDomain(),
                            ]);
                        }
                        $count++;
                    }
                }

                if ($request->action == 'update') {
                    return resApi('success', 'Cập nhật thành công ' . $count . ' dịch vụ');
                } elseif ($request->action == 'add') {
                    return resApi('success', 'Thêm thành công ' . $count . ' dịch vụ');
                } else {
                    return resApi('error', 'Dữ liệu không hợp lệ');
                }
            }
        } else {
            return abort(404);
        }
    }

   public function websiteChildActive(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'domain' => 'required|string',
        ]);

        if ($valid->fails()) {
            return resApi('error', $valid->errors()->first());
        } else {
            $data = SiteCon::where('domain_name', $request->domain)->first();
            if ($data) {
                $clf = new CloudflareCustomController();
                if ($data->status == 'Pending_Cloudflare') {
                    if ($data->status_cloudflare == 'pending') {
                        $rs = $clf->recordDomain($data->zone_id);
                        // $rs = $clf->createDns($data->zone_id);
                        // $id = $rs['result'][0]['id'];
                        // die();
                        if ($rs['success'] == true) {
                            // if ($rs['result'][0]['type'] == 'A') {
                            //     $rs = $clf->updateDns($data->zone_id, $rs['result'][0]['id']);
                            //     var_dump($rs);
                            //     die();
                            //     if ($rs['success'] == true) {
                            //         $data->update([
                            //             'status_cloudflare' => 'active',
                            //         ]);
                            //         return resApi('success', 'Cập nhật record thành công');
                            //     } else {
                            //         return resApi('error', 'Cập nhật record thất bại');
                            //     }
                            // } else {
                            // }
                            $rs = $clf->createDns($data->zone_id);
                            if ($rs['success'] == true) {
                                $data->update([
                                    'status_cloudflare' => 'active',
                                ]);
                                $cpanel = new CpanelCustomController();
                                $cpanel->createDomain($data->domain_name);
                                return resApi('success', 'Tạo record thành công');
                            } else {
                                if ($rs['errors'][0]['code'] == 81057) {
                                    $data->update([
                                        'status_cloudflare' => 'active',
                                    ]);
                                    $cpanel = new CpanelCustomController();
                                    $cpanel->createDomain($data->domain_name);
                                    return resApi('success', 'Tạo record thành công');
                                } else {
                                    return resApi('error', $rs['errors'][0]['message']);
                                }
                            }
                        }
                    } else {
                        
                       
                                    $data->update([
                                        'status' => 'Active',
                                    ]);
                                  
                                
                        return resApi('success', 'Duyệt cloudflare thành công');
                    }
                } else {
                    $site = SiteData::where('domain', $request->domain)->first();
                    $rs = $clf->addDomain($request->domain);
                    // var_dump($rs);
                    if ($rs['success'] == true) {
                        $zone_id = $rs['result']['id'];
                        $status = $rs['result']['status'];
                        $data->update([
                            'zone_id' => $zone_id,
                            'status_cloudflare' => $status,
                        ]);
                        if ($site) {
                            $site->update([
                                'status' => 'Pending',
                            ]);
                        } else {
                            $user = User::where('username', $data->username)->first();
                            if ($user) {
                                SiteData::create([
                                    'namesite' => getDomain(),
                                    'is_admin' => json_encode($user->only(['id', 'name', 'username', 'email', 'position', 'api_token', 'domain'])),
                                    'token_web' => $user->api_token,
                                    'username_web' => 'null',
                                    'status' => 'Pending',
                                    'domain' => $request->domain,
                                ]);
                            }
                            $data->update([
                                'status' => 'Pending_Cloudflare',
                            ]);
                        }
                        return resApi('success', 'Kích hoạt thành công');
                    } else {
                        if ($rs['errors'][0]['code'] == 1061){
                             $site = SiteData::where('domain', $request->domain)->first();
                            $data1 = $clf->findDomain($request->domain);
                                $zone_id =  $data1['id'];
                                $data1 = $clf->recordDomain($zone_id);
                                // var_dump($data1);
                                // die(); 
                                if (isset($data1['result'])) {
                                   
                                   
                                        
                                         $data->update([
                            'zone_id' => $zone_id,
                            'status_cloudflare' => 'pending',
                        ]);
                        if ($site) {
                            $site->update([
                                'status' => 'Pending',
                            ]);
                        } else {
                            $user = User::where('username', $data->username)->first();
                            if ($user) {
                                SiteData::create([
                                    'namesite' => getDomain(),
                                    'is_admin' => json_encode($user->only(['id', 'name', 'username', 'email', 'position', 'api_token', 'domain'])),
                                    'token_web' => $user->api_token,
                                    'username_web' => 'null',
                                    'status' => 'Pending',
                                    'domain' => $request->domain,
                                ]);
                            }
                            $data->update([
                                'status' => 'Pending_Cloudflare',
                            ]);
                        }
                        return resApi('success', 'Kích hoạt thành công');
                        
                        
                                        
                                    
                                }
                       
                        // if ($site) {
                        //     $site->update([
                        //         'status' => 'Pending',
                        //     ]);
                        // } else {
                        //     $user = User::where('username', $data->username)->first();
                        //     if ($user) {
                        //         SiteData::create([
                        //             'namesite' => getDomain(),
                        //             'is_admin' => json_encode($user->only(['id', 'name', 'username', 'email', 'position', 'api_token', 'domain'])),
                        //             'token_web' => $user->api_token,
                        //             'username_web' => 'null',
                        //             'status' => 'Pending',
                        //             'domain' => $request->domain,
                        //         ]);
                        //     }
                        //     $data->update([
                        //         'status' => 'Pending_Cloudflare',
                        //     ]);
                        // }
                        // return resApi('success', 'Kích hoạt thành công');
                        
                        
                        }
                    }
                }
            } else {
                return resApi('error', 'Không tìm thấy website');
            }
        }
    }

    public function listAction($action, Request $request)
    {
        $start = $request->start ?? 0;
        $length = $request->length ?? 10;
        $search = $request->search['value'] ?? '';
        $order = $request->order[0] ?? [];
        $dir = $request->order[0]['dir'] ?? 'DESC';

        if ($action == 'list-user') {
            if (!empty($search)) {
                //search sử dụng function match trong mysql
                $data = User::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%')
                        ->orWhere('balance', 'like', '%' . $search . '%')
                        ->orWhere('total_recharge', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = $data->count();
            } else {
                $data = User::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = User::where('domain', getDomain())->count();
            }

            $data = $data->map(function ($item) {
                $item->level = level($item->level);
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }
        if ($action == 'history-active') {
            if (!empty($search)) {
                //search sử dụng function match trong mysql
                $data = Actives::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('link', 'like', "%$search%")
                        ->orWhere('created_at', 'like', "%$search%");
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = $data->count();
            } else {
                $data = Actives::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = Actives::where('domain', getDomain())->count();
            }

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }
     if ($action == 'history-support') {
            if (!empty($search)) {
                $data = Support::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('id', 'like', "%$search%")
             
                        ->orWhere('comment', 'like', "%$search%");
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = $data->count();
            } else {
                $data = Support::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = Support::where('domain', getDomain())->count();
            }
            $data = $data->map(function ($item) {
                $item->status = statusSupport($item->status);
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }
        if ($action == 'history-notification') {
            if (!empty($search)) {
                //search sử dụng function match trong mysql
                $data = Notification::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = $data->count();
            } else {
                $data = Notification::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = Notification::where('domain', getDomain())->count();
            }

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }

        if ($action == 'history-activity') {
            if (!empty($search)) {
                //search sử dụng function match trong mysql
                $data = Activities::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = $data->count();
            } else {
                $data = Activities::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = Activities::where('domain', getDomain())->count();
            }

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }

        if ($action == 'list-social') {
            if (!empty($search)) {
                //search sử dụng function match trong mysql
                $data = ServiceSocial::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('slug', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = $data->count();
            } else {
                $data = ServiceSocial::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = ServiceSocial::where('domain', getDomain())->count();
            }

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }
        if ($action == 'list-chuyenmuc') {
            if (!empty($search)) {
                //search sử dụng function match trong mysql
                $data = Category::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('slug', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = $data->count();
            } else {
                $data = Category::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = Category::where('domain', getDomain())->count();
            }

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }

        if ($action == 'list-service') {
            if (!empty($search)) {
                //search sử dụng function match trong mysql
                $data = Service::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('slug', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = $data->count();
            } else {
                $data = Service::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = Service::where('domain', getDomain())->count();
            }

            $data = $data->map(function ($item) {
                $social = ServiceSocial::where('domain', getDomain())->where('slug', $item->service_social)->first();
                $item->social = $social->name ?? '';
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }

        if ($action == 'list-server') {
            if (!empty($search)) {
                $data = ServerService::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('server', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%')
                        ->orWhere('price_collaborator', 'like', '%' . $search . '%')
                        ->orWhere('price_agency', 'like', '%' . $search . '%')
                        ->orWhere('price_distributor', 'like', '%' . $search . '%')
                        ->orWhere('min', 'like', '%' . $search . '%')
                        ->orWhere('max', 'like', '%' . $search . '%')
                        ->orWhere('title', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                        
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                  $total = $data->count();
            } else {
                $data = ServerService::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = ServerService::where('domain', getDomain())->count();
            }

            $data = $data->map(function ($item) {
                $item->service = Service::where('domain', env('PARENT_SITE'))->where('id', $item->service_id)->first()->name ?? '';
                if (getDomain() != env('PARENT_SITE')) {
                    unset($item->actual_path);
                    // unset($item->actual_price);
                    unset($item->actual_server);
                    unset($item->actual_service);
                }
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }
        if ($action == 'list-tainguyen') {
            if (!empty($search)) {
                $data = Tainguyen::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%')
                        ->orWhere('price_collaborator', 'like', '%' . $search . '%')
                        ->orWhere('price_agency', 'like', '%' . $search . '%')
                        ->orWhere('price_distributor', 'like', '%' . $search . '%')
               
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                        
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                  $total = $data->count();
            } else {
                $data = Tainguyen::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = Tainguyen::where('domain', getDomain())->count();
            }

            $data = $data->map(function ($item) {
               
            
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }
if ($action == 'history-user-today') {
            if (!empty($search)) {
                $data = DataHistory::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('username', 'like', "%$search%")->whereDate('created_at', Carbon::today())
                        ->orWhere('action', 'like', "%$search%")
                        ->orWhere('data', 'like', "%$search%")
                        ->orWhere('old_data', 'like', "%$search%")
                        ->orWhere('new_data', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%");
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = $data->count();
            } else {
                $data = DataHistory::where('domain', getDomain())->whereDate('created_at', Carbon::today())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = DataHistory::where('domain', getDomain())->whereDate('created_at', Carbon::today())->count();
            }
            $data = $data->map(function ($item) {
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }
        if ($action == 'history-user') {
            if (!empty($search)) {
                $data = DataHistory::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('username', 'like', "%$search%")
                        ->orWhere('action', 'like', "%$search%")
                        ->orWhere('data', 'like', "%$search%")
                        ->orWhere('old_data', 'like', "%$search%")
                        ->orWhere('new_data', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%");
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = $data->count();
            } else {
                $data = DataHistory::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = DataHistory::where('domain', getDomain())->count();
            }
            $data = $data->map(function ($item) {
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }

        if ($action == 'list-order') {
            if (!empty($search)) {
                $data = Orders::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('username', 'like', '%' . $search . '%')
                        ->orWhere('server_service', 'like', '%' . $search . '%')
                    
                        ->orWhere('total_payment', 'like', '%' . $search . '%')
                        ->orWhere('order_link', 'like', '%' . $search . '%')
     
                          ->orWhere('id', 'like', '%' . $search . '%')
                               ->orWhere('order_codes', 'like', '%' . $search . '%')
                    
      
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                 $total = $data->count();
            } else {
                $data = Orders::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = Orders::where('domain', getDomain())->count();
            }

            $data = $data->map(function ($item) {
                $item->status_order = statusOrder($item->status);
                if (getDomain() != env('PARENT_SITE')) {
                    unset($item->actual_service);
                    unset($item->actual_path);
                    unset($item->actual_server);
                }
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }
        if ($action == 'order-tay') {
            if (!empty($search)) {
                $data = Orders::where('domain', getDomain())->where('status', 'Pending')->where(function ($query) use ($search) {
                    $query->where('username', 'like', '%' . $search . '%')
                        ->orWhere('server_service', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%')
                      ->orWhere('id', 'like', '%' . $search . '%')
                             
                        ->orWhere('order_link', 'like', '%' . $search . '%')
                    ->orWhere('order_codes', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                 $total = $data->count();
            } else {
                $data = Orders::where('domain', getDomain())->where('status', 'Pending')->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = Orders::where('domain', getDomain())->where('status', 'Pending')->count();
            }

            $data = $data->map(function ($item) {
                $item->status_order = statusOrder($item->status);
                if (getDomain() != env('PARENT_SITE')) {
                    unset($item->actual_service);
                    unset($item->actual_path);
                    unset($item->actual_server);
                }
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }
         if ($action == 'order-loi') {
            if (!empty($search)) {
                $data = Orders::where('status', 'Cancelled')->orWhere('status', 'Failed')->orWhere('status', 'Canceled')->orWhere('status', 'Canceled')->orWhere('status', 'Refunded')->orWhere('status', 'Refund')->where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('username', 'like', '%' . $search . '%')
                        ->orWhere('server_service', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%')
                      ->orWhere('id', 'like', '%' . $search . '%')
                             
                        ->orWhere('order_link', 'like', '%' . $search . '%')
                     ->orWhere('order_codes', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                 $total = $data->count();
            } else {
                $data = Orders::where('status', 'Cancelled')->orWhere('status', 'Failed')->orWhere('status', 'Canceled')->orWhere('status', 'Canceled')->orWhere('status', 'Refunded')->orWhere('status', 'Refund')->where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = Orders::where('status', 'Cancelled')->orWhere('status', 'Failed')->orWhere('status', 'Canceled')->orWhere('status', 'Canceled')->orWhere('status', 'Refunded')->orWhere('status', 'Refund')->where('domain', getDomain())->count();
            }

            $data = $data->map(function ($item) {
                $item->status_order = statusOrder($item->status);
                      if (getDomain() != env('PARENT_SITE')) {
                    unset($item->actual_service);
                    unset($item->actual_path);
                    unset($item->actual_server);
                      }
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }


        if ($action == 'list-recharge') {
            if (!empty($search)) {
                $data = AccountRecharge::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('type', 'like', '%' . $search . '%')
                        ->orWhere('account_name', 'like', '%' . $search . '%')
                        ->orWhere('account', 'like', '%' . $search . '%')
                        ->orWhere('account_number', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                 $total = $data->count();
            } else {
                $data = AccountRecharge::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = AccountRecharge::where('domain', getDomain())->count();
                
            }

            $data = $data->map(function ($item) {
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }

        if ($action == 'history-recharge') {
            if (!empty($search)) {
                $data = HistoryRecharge::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('username', 'like', '%' . $search . '%')
                        ->orWhere('name_bank', 'like', '%' . $search . '%')
                        ->orWhere('type_bank', 'like', '%' . $search . '%')
                        ->orWhere('tranid', 'like', '%' . $search . '%')
                        ->orWhere('amount', 'like', '%' . $search . '%')
                        ->orWhere('promotion', 'like', '%' . $search . '%')
                        ->orWhere('real_amount', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
                 $total = $data->count();
            } else {
                $data = HistoryRecharge::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = HistoryRecharge::where('domain', getDomain())->count();
            }

            $data = $data->map(function ($item) {
              
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }

        if ($action == 'history-card') {
            if (!empty($search)) {
                $data = HistoryCard::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('username', 'like', '%' . $search . '%')
                        ->orWhere('card_type', 'like', '%' . $search . '%')
                        ->orWhere('card_amount', 'like', '%' . $search . '%')
                        ->orWhere('card_serial', 'like', '%' . $search . '%')
                        ->orWhere('card_code', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
            } else {
                $data = HistoryCard::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = HistoryCard::where('domain', getDomain())->count();
            }

            $data = $data->map(function ($item) {
                $item->status = statusCard($item->status);
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }

        if ($action == 'list-site') {
            if (!empty($search)) {
                $data = SiteCon::where('domain', getDomain())->where(function ($query) use ($search) {
                    $query->where('username', 'like', '%' . $search . '%')
                        ->orWhere('domain_name', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })->orderBy('id', $dir)->offset($start)->limit($length)->get();
            } else {
                $data = SiteCon::where('domain', getDomain())->orderBy('id', $dir)->offset($start)->limit($length)->get();
                $total = SiteCon::where('domain', getDomain())->count();
            }

            $data = $data->map(function ($item) {
                $item->status = $item->status;
                return $item;
            });

            return response()->json([
                'data' => $data,
                'recordsTotal' => $total,
                'recordsFiltered' => $total
            ]);
        }
    }

    public function deleteData($type, Request $request)
    {
        if ($type == 'delete-site') {
            $valid = Validator::make($request->all(), [
                'domain' => 'required'
            ]);

            if ($valid->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $valid->errors()->first()
                ]);
            } else {
                $check = SiteCon::where('domain_name', $request->domain)->first();
                if ($check) {
                    $site = SiteData::where('domain', '!=', env('PARENT_SITE'))->where('domain', $request->domain)->first();
                    if ($site) {
                        $site->delete();
                    }
                    if ($check->status_cloudflare == 'active') {
                        $clf = new CloudflareCustomController();
                        $clf->deleteDomain($request->domain);
                        $cpanel = new CpanelCustomController();
                        $cpanel->deleteDomain($request->domain);
                    }

                    $check->delete();
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Xóa thành công'
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Không tìm thấy tên miền này'
                    ]);
                }
            }
        }
    }

    public function serverDeleteAll(){
        $server = ServerService::where('domain', getDomain())->get();
        foreach ($server as $item) {
            $item->delete();
        }
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
