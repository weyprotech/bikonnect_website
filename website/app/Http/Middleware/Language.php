public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            $locale = Session::get('locale', Config::get('app.locale'));
        } else {
            $locale = strtolower(explode(',', request()->server('HTTP_ACCEPT_LANGUAGE'))[0]);

            if (!array_key_exists($locale, config('app.supported_locales'))) {
                $locale = config('app.fallback_locale');
            }

            Session::put('locale', $locale);
        }

        App::setLocale($locale);

        return $next($request);
    }