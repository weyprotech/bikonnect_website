<?php

namespace App\Http\Middleware;

use Closure;

class DetectLanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //取得cookie語言設定
        $language = $request->cookie('shop_laravel_language');
        switch($language){
            //語系為英文
            case 'en':
                app()->setLocale('en');
                break;
            case 'zh-TW':
                app()->setLocale('zh-TW');
                break;
            case '':
                app()->setLocale('en');
                break;
        }

        return $next($request);
    }
}
