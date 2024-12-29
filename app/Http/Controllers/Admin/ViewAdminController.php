<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataHistory;
use App\Models\AccountRecharge;
use App\Models\HistoryCard;
use App\Models\HistoryRecharge;
use App\Models\Orders;
use App\Models\ServerService;
use App\Models\Service;
use App\Models\Support;
use App\Models\ServiceSocial;
use App\Models\Category;
use App\Models\User;
use App\Models\Tainguyen;
use App\Models\SiteData;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ViewAdminController extends Controller
{
    public function dashboard()
    {
        $currentMonth = Carbon::now()->month;

        $totalUserThisMonth = User::where('domain', getDomain())
            ->whereMonth('created_at', $currentMonth)
            ->count();
        $total_user = User::where('domain', getDomain())->count();
        $total_balance = User::where('domain', getDomain())->sum('balance');
        $total_recharge = User::where('domain', getDomain())->sum('total_recharge');
        $total_order = Orders::where('domain', getDomain())->count();
        $total_user_today = User::where('domain', getDomain())->whereDate('created_at', Carbon::today())->count();
        $total_deduct_today = DataHistory::where('domain', getDomain())->whereDate('created_at', Carbon::today())->where('action', 'Tạo đơn')->sum('data');
        $total_deduct_month = DataHistory::where('domain', getDomain())->whereMonth('created_at', $currentMonth)->where('action', 'Tạo đơn')->sum('data');
        $total_recharge_today = HistoryRecharge::where('domain', getDomain())->whereDate('created_at', Carbon::today())->sum('real_amount') + HistoryCard::where('domain', getDomain())->whereDate('created_at', Carbon::today())->sum('card_real_amount');
        $total_recharge_month = HistoryRecharge::where('domain', getDomain())->whereMonth('created_at', $currentMonth)->sum('real_amount') + HistoryCard::where('domain', getDomain())->whereMonth('created_at', $currentMonth)->sum('card_real_amount');
        $total_order_today = Orders::where('domain', getDomain())->whereDate('created_at', Carbon::today())->count();
        $total_order_month = Orders::where('domain', getDomain())->whereMonth('created_at', $currentMonth)->count();
        // làm thống kê đơn
        $order = Orders::where('domain', getDomain())->get();
        $order_pending_order = Orders::where('domain', getDomain())->where('status', 'PendingOrder')->count();
        $order_processing = Orders::where('domain', getDomain())->where('status', 'Processing')->count();
        $order_active = Orders::where('domain', getDomain())->where('status', 'Active')->count() + $order_processing;
        $order_suspended = Orders::where('domain', getDomain())->where('status', 'Suspended')->count();
        $order_completed = Orders::where('domain', getDomain())->where('status', 'Completed')->count() + Orders::where('domain', getDomain())->where('status', 'Success')->count();
        $order_success = Orders::where('domain', getDomain())->where('status', 'Success')->count();
        $order_failed = Orders::where('domain', getDomain())->where('status', 'Failed')->count();
        $order_cancelled = Orders::where('domain', getDomain())->where('status', 'Cancelled')->count();
        $lai = $total_recharge_month- $total_deduct_month;
        $lainay = $total_recharge_today- $total_deduct_today;

        return view('Admin.dashboard', compact('total_user','lainay', 'lai','total_balance', 'total_deduct_month','total_recharge','total_recharge_month','currentMonth','total_order_month', 'total_order', 'total_user_today', 'total_deduct_today','totalUserThisMonth' ,'total_recharge_today', 'total_order_today', 'order', 'order_pending_order', 'order_processing', 'order_active', 'order_suspended', 'order_completed', 'order_success', 'order_failed', 'order_cancelled'));
    }

    public function websiteConfig()
    {
        return view('Admin.Website.websiteConfig');
    }
     
    public function websiteTheme()
    {
        $site = SiteData::where('domain', getDomain())->first();
        return view('Admin.Website.websiteTheme', compact('site'));
    }

    public function websiteCaptcha()
    {
        return view('Admin.Website.websiteCaptcha');
    }

    public function userList()
    {
        $total_user = User::where('domain', getDomain())->count();
        $total_ctv = User::where('domain', getDomain())->where('level', '2')->count();
        $total_daily = User::where('domain', getDomain())->where('level','3')->count();
        $total_npp = User::where('domain', getDomain())->where('level', '4')->count();
        $total_qtv = User::where('domain', getDomain())->where('position', 'admin')->count();
        return view('Admin.User.userList',compact('total_user','total_ctv','total_daily','total_npp','total_qtv'));
    }
     public function rechargeadd()
    {
      
        return view('Admin.Recharge.add');
    }
    public function active()
    {
        return view('Admin.Active.active');
    }
 public function orderEdit($id)
    {
        $order = Orders::where('id', $id)->where('domain', getDomain())->first();
        if ($order) {
            return view('Admin.History.orderEdit', compact('order'));
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy dịch vụ');
        }
    }
     public function supportEdit($id)
    {
        $support = Support::where('id', $id)->where('domain', getDomain())->first();
        if ($support) {
            return view('Admin.Support.supportEdit', compact('support'));
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy đơn hỗ trợ');
        }
    }
    public function userEdit($id)
    {
        $user = User::where('domain', getDomain())->where('id', $id)->first();
        if ($user) {
            return view('Admin.User.userEdit', compact('user'));
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy người dùng1');
        }
    }

    public function userEditBalance()
    {
        return view('Admin.User.userEditBalance');
    }

    public function notification()
    {
        return view('Admin.Notification.notification');
    }

    public function activity()
    {
        return view('Admin.Activity.activity');
    }

    /* SERVICE */
    public function serviceNewSocial()
    {
        if (getDomain() == env('PARENT_SITE')) {
            return view('Admin.Service.serviceNewSocial');
        } else {
            return abort(404);
        }
    }
    public function tainguyenNewChuyenmuc()
    {
        if (getDomain() == env('PARENT_SITE')) {
            return view('Admin.Tainguyen.category');
        } else {
            return abort(404);
        }
    }
    public function tainguyenNewTainguyen()
    {
        if (getDomain() == env('PARENT_SITE')) {
            $category = Category::where('domain', getDomain())->get();
            return view('Admin.Tainguyen.tainguyen', compact('category'));
        } else {
            return abort(404);
        }
    }

    public function serviceSocialEdit($id)
    {
        if (getDomain() == env('PARENT_SITE')) {
            $social = ServiceSocial::where('domain', getDomain())->where('id', $id)->first();
            if ($social) {
                return view('Admin.Service.serviceSocialEdit', compact('social'));
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy dịch vụ');
            }
        } else {
            return abort(404);
        }
    }
    public function tainguyenNewChuyenmucEdit($id)
    {
        if (getDomain() == env('PARENT_SITE')) {
            $social = Category::where('domain', getDomain())->where('id', $id)->first();
            if ($social) {
                return view('Admin.Tainguyen.categoryEdit', compact('social'));
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy dịch vụ');
            }
        } else {
            return abort(404);
        }
    }

    public function tainguyenNewTainguyenEdit($id)
    {
        if (getDomain() == env('PARENT_SITE')) {
            $social = Tainguyen::where('domain', getDomain())->where('id', $id)->first();
            if ($social) {
                return view('Admin.Tainguyen.tainguyenEdit', compact('social'));
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy dịch vụ');
            }
        } else {
            return abort(404);
        }
    }

    public function serviceNew()
    {
        if (getDomain() == env('PARENT_SITE')) {
            $social = ServiceSocial::where('domain', getDomain())->get();
            return view('Admin.Service.serviceNew', compact('social'));
        } else {
            return abort(404);
        }
    }

    public function serviceEdit($id)
    {
        if (getDomain() == env('PARENT_SITE')) {
            $service = Service::where('id', $id)->where('domain', getDomain())->first();
            if ($service) {
                return view('Admin.Service.serviceEdit', compact('service'));
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy dịch vụ');
            }
        } else {
            return abort(404);
        }
    }

    public function serverList()
    {
        if (getDomain() == env('PARENT_SITE')) {
            $social = ServiceSocial::where('domain', getDomain())->get();
            return view('Admin.Server.serverList', compact('social'));
        } else {
            $social = ServiceSocial::where('domain', env('PARENT_SITE'))->get();
            return view('Admin.Server.serverSiteList', compact('social'));
        }
    }
    
    public function serverNew()
    {
        if (getDomain() == env('PARENT_SITE')) {
            $social = ServiceSocial::where('domain', getDomain())->get();
            return view('Admin.Server.serverNew', compact('social'));
        } else {
            return abort(404);
        }
    }
//     public function updateAllServerPrices()
// {
//     $server = ServerService::where('domain', getDomain())->get();
    
//     return view('Admin.Server.serverPrice', compact('server'));
// }


public function updateAllServerPrices()
{
    
    $social = ServiceSocial::where('domain', env('PARENT_SITE'))->get();
    $socialSlugs = $social->pluck('slug')->all();
    $socialid = $social->pluck('id')->all();
// Use the $socialSlugs array to filter the $service query
    $service = Service::where('domain', env('PARENT_SITE'))->whereIn('service_social', $socialSlugs)->get();
    $service_Id= $service->pluck('id')->all();
    $server = ServerService::where('domain', getDomain())->whereIn('social_id', $socialid)->whereIn('service_id', $service_Id)->get();
    return view('Admin.Server.serverPrice', compact('server', 'social', 'service'));
}


    public function serverEdit($id)
    {
        $server = ServerService::where('id', $id)->where('domain', getDomain())->first();
        if ($server) {
            return view('Admin.Server.serverEdit', compact('server'));
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy dịch vụ');
        }
    }

    public function HistoryOrder()
    {
        return view('Admin.History.historyOrder');
    }
 public function Support()
    {
        return view('Admin.Support.support');
    }
    public function HistoryUser()
    {
        return view('Admin.History.historyUser');
    }

    public function rechargeConfig()
    {
         $momo = AccountRecharge::where('domain', getDomain())->where('type', 'momo')->first();
          $mbbank = AccountRecharge::where('domain', getDomain())->where('type', 'mbbank')->first();
           $vietcombank = AccountRecharge::where('domain', getDomain())->where('type', 'vietcombank')->first();
           $acb = AccountRecharge::where('domain', getDomain())->where('type', 'acb')->first();
          
        return view('Admin.Recharge.config', compact('momo','mbbank','vietcombank', 'acb'));
    }

    public function HistoryRecharge()
    {
        return view('Admin.History.historyRecharge');
    }

    public function HistoryCard()
    {
        return view('Admin.History.historyCard');
    }

    public function configTelegram()
    {
        return view('Admin.Config.configTelegram');
    }

    public function websiteChildList(){
        return view('Admin.Website.websiteChildList');
    }
}
