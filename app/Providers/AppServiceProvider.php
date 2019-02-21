<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $min = 720;
        view()->composer(['admin.partial.navbar'], function ($view) {
//            $unreadMessage = unreadMessage();
//            $unreadNewsletter = unreadNewsletter();
//            $unConfirmComment = unConfirmComment();

            $min = 120; # 2 hours

            $data['instagram'] = cache()->remember('instagramCache', $min, function () {
                return mainSetting('instagram');
            });
            $data['twitter'] = cache()->remember('twitterCache', $min, function () {
                return mainSetting('twitter');
            });
            $data['telegram'] = cache()->remember('telegramCache', $min, function () {
                return mainSetting('telegram');
            });
            $data['date'] = persianToday();
            $data['time'] = persianNow();


            $view->with(compact('unreadNewsletter', 'unreadMessage', 'data', 'unConfirmComment'));
        });
        view()->composer(['admin.master'], function ($view) {
            if (auth()->guard('admin')->check()) {
                $user = auth()->guard('admin')->user();
                $view->with(compact('user'));
            }
        });
        view()->composer(['front.master'], function ($view) {
            $min = 720;

            $data['instagram'] = cache()->remember('instagramCache', $min, function () {
                return mainSetting('instagram');
            });

            $data['instagram_member'] = cache()->remember('instagramMemberCache', $min, function () {
                return mainSetting('instagram_member');
            });

            $data['telegram'] = cache()->remember('telegramCache', $min, function () {
                return mainSetting('telegram');
            });
            $data['telegram_member'] = cache()->remember('telegramMemberCache', $min, function () {
                return mainSetting('telegram_member');
            });
            $view->with(compact('data'));
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
