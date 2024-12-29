<?php

use App\Http\Controllers\Admin\DataAdminController;
use App\Http\Controllers\Admin\DataServiceController;
use App\Http\Controllers\Admin\ViewAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Custom\TelegramCustomController;
use Dflydev\DotAccessData\Data;

Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function(){
    Route::get('/dashboard', [ViewAdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/website/captcha', [ViewAdminController::class, 'websiteCaptcha'])->name('admin.website.captcha');
    Route::get('/website/config', [ViewAdminController::class, 'websiteConfig'])->name('admin.website.config');
    Route::get('/website/theme', [ViewAdminController::class, 'websiteTheme'])->name('admin.website.theme');
    Route::get('/website/okdf', [ViewAdminController::class, 'websiteAuto'])->name('admin.auto.theme');
    Route::get('/user/list', [ViewAdminController::class, 'userList'])->name('admin.user.list');
    Route::get('/user/edit/{id}', [ViewAdminController::class, 'userEdit'])->name('admin.user.edit');
    Route::get('/user/balance', [ViewAdminController::class, 'userEditBalance'])->name('admin.user.balance');
    Route::get('/notification', [ViewAdminController::class, 'notification'])->name('admin.notification');
    Route::get('/activity', [ViewAdminController::class, 'activity'])->name('admin.activity');
    Route::get('/active', [ViewAdminController::class, 'active'])->name('admin.active');

    /* SERVICE */
    Route::get('/service/new/social', [ViewAdminController::class, 'serviceNewSocial'])->name('admin.service.new.social');
    Route::get('/tainguyen/new/chuyenmuc', [ViewAdminController::class, 'tainguyenNewChuyenmuc'])->name('admin.tainguyen.new');
    Route::get('/tainguyen/chuyenmuc/edit/{id}', [ViewAdminController::class, 'tainguyenNewChuyenmucEdit'])->name('admin.tainguyen.edit');
    Route::get('/tainguyen/new/tainguyen', [ViewAdminController::class, 'tainguyenNewTainguyen'])->name('admin.taikhoan.tainguyen.new');
    Route::get('/tainguyen/tainguyen/edit/{id}', [ViewAdminController::class, 'tainguyenNewTainguyenEdit'])->name('admin.taikhoan.tainguyen.edit');
    Route::get('/service/social/edit/{id}', [ViewAdminController::class, 'serviceSocialEdit'])->name('admin.service.social.edit');
    Route::get('/service/new', [ViewAdminController::class, 'serviceNew'])->name('admin.service.new');
    Route::get('/service/edit/{id}', [ViewAdminController::class, 'serviceEdit'])->name('admin.service.edit');
 
    /* SERVER */
    Route::get('/server/list', [ViewAdminController::class, 'serverList'])->name('admin.server.list');
    Route::get('/server/new', [ViewAdminController::class, 'serverNew'])->name('admin.server.new');
    Route::get('/server/edit/{id}', [ViewAdminController::class, 'serverEdit'])->name('admin.server.edit');
  Route::get('/order/edit/{id}', [ViewAdminController::class, 'orderEdit'])->name('admin.order.edit');
    Route::get('/server/price', [ViewAdminController::class, 'updateAllServerPrices'])->name('admin.server.price');
    Route::get('/server/delete-all', [DataAdminController::class, 'serverDeleteAll'])->name('admin.server.delete-all');

    Route::prefix('/history')->group(function(){
        Route::get('/user', [ViewAdminController::class, 'HistoryUser'])->name('admin.history.user');
        Route::get('/order', [ViewAdminController::class, 'HistoryOrder'])->name('admin.history.order');
        Route::get('/recharge', [ViewAdminController::class, 'HistoryRecharge'])->name('admin.history.recharge');
        Route::get('/support', [ViewAdminController::class, 'Support'])->name('admin.history.support');
        Route::get('/card', [ViewAdminController::class, 'HistoryCard'])->name('admin.history.card');
    });

    Route::get('/recharge/config', [ViewAdminController::class, 'rechargeConfig'])->name('admin.recharge.config');
    
    Route::get('/recharge/add', [ViewAdminController::class, 'rechargeadd'])->name('admin.recharge.add');
    // Telegram
    Route::get('/config/telegram', [ViewAdminController::class, 'configTelegram'])->name('admin.config.telegram');

    //site con
    Route::get('/website-child/list', [ViewAdminController::class, 'websiteChildList'])->name('admin.website-child.list');

    Route::post('/website/config', [DataAdminController::class, 'websiteConfig'])->name('admin.website.config.post');
    Route::post('/website/captcha', [DataAdminController::class, 'websiteCaptcha'])->name('admin.website.captcha.post');
 
    Route::get('/support', [ViewAdminController::class, 'support'])->name('admin.support');
    Route::get('/support/edit/{id}', [ViewAdminController::class, 'supportEdit'])->name('admin.support.edit');
    Route::post('/support/{id}/feedback', [DataAdminController::class, 'support'])->name('admin.support.feedback');
    Route::get('/support/{id}/delete', [DataAdminController::class, 'supportDelete']);
    Route::post('/website/theme', [DataAdminController::class, 'websiteTheme'])->name('admin.website.theme.post');
    Route::post('/user/edit/{id}', [DataAdminController::class, 'userEdit'])->name('admin.user.edit.post');
    Route::post('/user/change-password/{id}', [DataAdminController::class, 'userChangePassword'])->name('admin.user.change-password.post');
    Route::post('/user/balance', [DataAdminController::class, 'userEditBalance'])->name('admin.user.balance.post');
    Route::post('/user/delete/{id}', [DataAdminController::class, 'userDelete'])->name('admin.user.delete');
    Route::post('/notification-modal', [DataAdminController::class, 'notificationModal'])->name('admin.notification.modal.post');
    Route::post('/notification', [DataAdminController::class, 'notification'])->name('admin.notification.post');
    Route::post('/notification/delete/{id}', [DataAdminController::class, 'notificationDelete'])->name('admin.notification.delete');
    Route::post('/activity', [DataAdminController::class, 'activity'])->name('admin.activity.post');
    Route::delete('/activity/delete/{id}', [DataAdminController::class, 'activityDelete'])->name('admin.activity.delete');


    Route::post('/active', [DataAdminController::class, 'active'])->name('admin.active.post');
    Route::delete('/active/delete/{id}', [DataAdminController::class, 'activeDelete'])->name('admin.active.delete');

    /* SERVICE POST */
    Route::post('/service/new/social', [DataServiceController::class, 'serviceNewSocial'])->name('admin.service.new.social.post');
    Route::post('/service/social/edit/{id}', [DataServiceController::class, 'serviceSocialEdit'])->name('admin.service.social.edit.post');
    Route::delete('/service/delete/{id}', [DataServiceController::class, 'serviceSocialDelete'])->name('admin.service.delete');
    Route::post('/tainguyen/new/chuyenmuc', [DataServiceController::class, 'tainguyenNewChuyenmuc'])->name('admin.tainguyen.new.post');
    Route::post('/tainguyen/chuyenmuc/edit/{id}', [DataServiceController::class, 'tainguyenNewChuyenmucEdit'])->name('admin.tainguyen.edit.post');
    Route::post('/tainguyen/new/tainguyen', [DataServiceController::class, 'tainguyenNewTainguyen'])->name('admin.taikhoan.tainguyen.new.post');
    Route::post('/tainguyen/tainguyen/edit/{id}', [DataServiceController::class, 'tainguyenNewTainguyenEdit'])->name('admin.taikhoan.tainguyen.edit.post');
    Route::delete('/tainguyen/delete/{id}', [DataServiceController::class, 'tainguyenNewChuyenmucDelete'])->name('admin.tainguyen.delete');
    Route::delete('/tainguyen/tainguyen/delete/{id}', [DataServiceController::class, 'tainguyenNewTainguyenDelete'])->name('admin.tainguyen.tainguyen.delete');

    Route::post('/service/new', [DataServiceController::class, 'serviceNew'])->name('admin.service.new.post');
    Route::post('/service/edit/{id}', [DataServiceController::class, 'serviceEdit'])->name('admin.service.edit.post');
 
    Route::get('/service/delete/{id}', [DataServiceController::class, 'serviceDelete'])->name('admin.service.delete');

    // order
    if(getDomain() == env('PARENT_SITE')){
        Route::post('order/active', [DataServiceController::class, 'orderActive'])->name('admin.order.active.post');
        Route::post('order/cancel', [DataServiceController::class, 'orderCancel'])->name('admin.order.cancel.post');
    }
    Route::post('order/refund', [DataServiceController::class, 'orderRefund'])->name('admin.order.refund.post');
    /* SERVER POST */
    Route::post('/server/new', [DataServiceController::class, 'serverNew'])->name('admin.server.new.post');
    Route::post('/server/edit/{id}', [DataServiceController::class, 'serverEdit'])->name('admin.server.edit.post');
    
    Route::post('/order/edit/{id}', [DataServiceController::class, 'orderEdit'])->name('admin.order.edit.post');
    Route::get('/order/delete/{id}', [DataServiceController::class, 'orderDelete'])->name('admin.order.delete');
    Route::post('/server/price', [DataServiceController::class, 'updateAllServerPrices'])->name('admin.server.price.post');
    Route::get('/server/delete/{id}', [DataServiceController::class, 'serverDelete'])->name('admin.server.delete');
    Route::post('/server/notification-telegram', [DataServiceController::class, 'serverNotificationTelegram'])->name('admin.server.notification-telegram.post');
    Route::post('/service/checking', [DataServiceController::class, 'serviceChecking'])->name('admin.service.checking.post');
    Route::post('/server/auto-create', [DataAdminController::class, 'serverAutoCreate'])->name('admin.server.auto-create');
    Route::post('/server/auto-edit', [DataAdminController::class, 'serverAutoEdit'])->name('admin.server.auto-edit');
    Route::post('/server/auto-price', [DataAdminController::class, 'serverAutoPrice'])->name('admin.server.auto-price');
    Route::post('/support/edit/{id}', [DataAdminController::class, 'supportEdit'])->name('admin.support.edit.post');
    Route::get('/support/delete/{id}', [DataAdminController::class, 'supportDelete'])->name('admin.support.delete');
    Route::post('/recharge/config', [DataAdminController::class, 'rechargeConfig'])->name('admin.recharge.config.post');
    Route::post('/recharge/add', [DataAdminController::class, 'rechargeadd'])->name('admin.recharge.add.post');
    Route::get('/recharge/delete/{id}', [DataAdminController::class, 'rechargeDelete'])->name('admin.recharge.delete');
    Route::post('/recharge/promotion', [DataAdminController::class, 'rechargePromotion'])->name('admin.recharge.promotion.post');
    Route::post('/recharge/card', [DataAdminController::class, 'rechargecard'])->name('admin.recharge.card.post');
    // telegram
    Route::post('/config/telegram', [DataAdminController::class, 'configTelegram'])->name('admin.config.telegram.post');

    Route::post('/website-child/active', [DataAdminController::class, 'websiteChildActive'])->name('admin.website-child.active.post');

    Route::post('/list/{action}', [DataAdminController::class, 'listAction'])->name('admin.list');
    Route::post('/delete-data/{type}', [DataAdminController::class, 'deleteData'])->name('admin.delete');
});

// Route::get('/tesst', [TelegramCustomController::class, 'getWebhookInfo']);
