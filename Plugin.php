<?php namespace DieterHolvoet\LandingPage;

use Cms\Classes\CmsController;
use DieterHolvoet\LandingPage\Classes\LandingMiddleware;
use DieterHolvoet\LandingPage\Models\Settings;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Lang;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;

/**
 * LandingPage Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => Lang::get('dieterholvoet.landingpage::app.name'),
            'description' => Lang::get('dieterholvoet.landingpage::app.description'),
            'author'      => 'DieterHolvoet',
            'icon'        => 'icon-hand-o-right',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'dieterholvoet.landingpage.access_settings' => [
                'label' => Lang::get('dieterholvoet.landingpage::app.permission.access_settings'),
                'tab' => Lang::get('dieterholvoet.landingpage::app.name'),
                'order' => 100,
            ],
            'dieterholvoet.landingpage.circumvent' => [
                'label' => Lang::get('dieterholvoet.landingpage::app.permission.circumvent'),
                'tab' => Lang::get('dieterholvoet.landingpage::app.name'),
                'order' => 200,
            ],
        ];
    }

    /**
     * Registers any back-end configuration links used by this plugin.
     *
     * @return array
     */
    public function registerSettings()
    {
        return [
            'location' => [
                'label'       => Lang::get('dieterholvoet.landingpage::app.name'),
                'description' => Lang::get('dieterholvoet.landingpage::app.settings'),
                'category'    => SettingsManager::CATEGORY_CMS,
                'icon'        => 'icon-hand-o-right',
                'class'       => Settings::class,
                'order'       => 500,
                'keywords'    => 'settings landing landingpage redirect',
                'permissions' => ['dieterholvoet.landingpage.access_settings'],
            ],
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        /** @var \October\Rain\Foundation\Http\Kernel $kernel */
        $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];

        $kernel->pushMiddleware(LandingMiddleware::class);
    }
}
