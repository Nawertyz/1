<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\AccountRecharge;
use App\Models\Activities;
use App\Models\Notification;
use App\Models\ServerService;
use App\Models\Service;
use App\Models\Orders;
use App\Models\Support;
use App\Models\Category;
use App\Models\Tainguyen;
use App\Models\ServiceSocial; 
use Illuminate\Support\Facades\Auth;
use App\Models\SiteCon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\HistoryCard;
use App\Models\HistoryRecharge;
use App\Models\DataHistory;

class ViewClientController extends Controller
{

    public function LandingPage(){
        return view('landing');
    }
 
    public function HomePage()
    {
        $currentMonth = Carbon::now()->month;
        $social = ServiceSocial::where('domain', env('PARENT_SITE'))->get();
        $socialSlugs = $social->pluck('slug')->all();
        $socialid = $social->pluck('id')->all();
        $order= Orders::where('domain', getDomain())->where('username', Auth::user()->username)->count();
        $order_processing = Orders::where('domain', getDomain())->where('username', Auth::user()->username)->where('status', 'Processing')->count();
        $dangchay = Orders::where('domain', getDomain())->where('username', Auth::user()->username)->where('status', 'Active')->count() + $order_processing;
        $hoanthanh = Orders::where('domain', getDomain())->where('username', Auth::user()->username)->where('status', 'Completed')->count() + Orders::where('domain', getDomain())->where('username', Auth::user()->username)->where('status', 'Success')->count();
        $order_failed = Orders::where('domain', getDomain())->where('username', Auth::user()->username)->where('status', 'Suspended')->count();
        $service = Service::where('domain', env('PARENT_SITE'))->whereIn('service_social', $socialSlugs)->get();
        $order_cancelled = Orders::where('domain', getDomain())->where('username', Auth::user()->username)->where('status', 'Cancelled')->count();
        $notification = Notification::where('domain', getDomain())->orderBy('id', 'DESC')->get();
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();
        $hoantien = Orders::where('domain', getDomain())->where('username', Auth::user()->username)->where('status', 'Refunded')->count();
        $total_recharge_month = HistoryRecharge::where('domain', getDomain())->where('username', Auth::user()->username)->whereMonth('created_at', $currentMonth)->sum('real_amount') + HistoryCard::where('domain', getDomain())->where('status', 'Success')->whereMonth('created_at', $currentMonth)->sum('card_real_amount');
        $total_deduct_month = DataHistory::where('domain', getDomain())->where('username', Auth::user()->username)->whereMonth('created_at', $currentMonth)->where('action', '+')->sum('data');
        $nap_thang= $total_recharge_month + $total_deduct_month;
        return view('Client.home', compact('notification', 'nap_thang','activities', 'social', 'service', 'dangchay', 'hoanthanh', 'order', 'hoantien','order_failed','order_cancelled'));
    }

    public function ProfilePage()
    {
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();
        return view('Client.profile', compact('activities'));
    }

    public function TransferPage()
    {
        $account = AccountRecharge::where('domain', getDomain())->get();
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();
        return view('Client.Recharge.transfer', compact('account', 'activities'));
    }
    public function ViewChuyenmucPage($chuyenmuc)
    {
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();
        $category = Category::where('domain', env('PARENT_SITE'))->where('slug', $chuyenmuc)->first();
      
        if ($category) {
            $tainguyen1 = Tainguyen::where('domain', env('PARENT_SITE'))->where('category_id', $category->id)->first();
            if($tainguyen1){
                $tainguyen = Tainguyen::where('domain', env('PARENT_SITE'))->where('category_id', $category->id)->get();
                return view('Client.Tainguyen.tainguyen', compact('category', 'activities', 'tainguyen'));
            }
            else{
                abort(404);
            }
            
        }
        else{
            abort(404);
        }
       
    }

    public function CardPage()
    {
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();
        return view('Client.Recharge.card',compact('activities'));
    }
 
    public function HistoryPage()
    {
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();
        return view('Client.User.history',compact('activities'));
    }
    public function TientrinhPage()
    {
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();
        return view('Client.User.tientrinh',compact('activities'));
    }
    public function LevelPage()
    {
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();

        $service_socials = ServiceSocial::where('domain', env('PARENT_SITE'))->get();
        $socialSlugs = $service_socials->pluck('slug')->all();
        $services = Service::where('domain', env('PARENT_SITE'))->where('service_social', $socialSlugs)->get();
        return view('Client.User.level', compact('services', 'activities', 'service_socials'));
  
    }
 public function CreateSupport()
    {
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();
        return view('Client.support',compact('activities'));
    }

    public function CreateWebsite()
    {
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();
         
            $sitecon = SiteCon::where('domain', getDomain())->where('username', Auth::user()->username)->first();
            if(!$sitecon){
                // stdclass domain
                $sitecon = new \stdClass();
                $sitecon->domain_name = '';
            }
            return view('Client.Website.create', compact('sitecon','activities'));
        
    }

   

    public function ToolUid()
    {
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();
        return view('Client.Tool.getUid',compact('activities'));
    }
    public function ToolDomain()
    {
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();
        return view('Client.Tool.whiosDomain',compact('activities'));
    }
    public function Tool2fa()
    {
        $activities = Activities::where('domain', getDomain())->orderBy('id', 'DESC')->get();
        return view('Client.Tool.get2FA',compact('activities'));
    }
}
