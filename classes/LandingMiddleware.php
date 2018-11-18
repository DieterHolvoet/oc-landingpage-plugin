<?php namespace DieterHolvoet\LandingPage\Classes;

use Backend\Facades\BackendAuth;
use Backend\Models\User;
use Closure;
use DieterHolvoet\LandingPage\Models\Settings;
use Illuminate\Support\Facades\App;

class LandingMiddleware
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $settings = Settings::instance();

        if (
            $settings->enabled
            && $settings->page
            && $request->getPathInfo() !== $settings->page
            && !App::runningInBackend()
            && !(BackendAuth::check() && BackendAuth::getUser()->hasAccess('dieterholvoet.landingpage.circumvent'))
        ) {
            return redirect($settings->page);
        }

        return $response;
    }
}
