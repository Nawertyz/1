<?php
namespace App\Http\Controllers\CronJobs\Service;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Serivce\MBBankController;
class TestController extends Controller
{
    public function run()
    {
        $mbbank = new MBBankController();
        $keyCaptcha = 'v4uvn'; // Thay đổi giá trị này bằng key_captcha của bạn
        $captcha = $mbbank->bypassCaptchaWeb2m($keyCaptcha);

        $phonembbank = '4CR-snjduLBRfA-cdgjhg_'; // Thay đổi giá trị này bằng tài khoản đăng nhập của bạn
        $passmbbank = 'Lamtilo2006'; // Thay đổi giá trị này bằng mật khẩu của bạn
        $stkmbbank = '6912349999999'; // Thay đổi giá trị này bằng số tài khoản của bạn

        $loginResult = $mbbank->login($captcha, $phonembbank, $passmbbank);

        $kqcheck = $mbbank->getLsgd($phonembbank, $loginResult['sessionId'], $loginResult['cust']['deviceId'], $stkmbbank, 1);

        $deviceId1 = $loginResult['cust']['softTokenList'][3]['deviceId'];

        dd("Kết quả kiểm tra lịch sử giao dịch:", $kqcheck);
    }

}