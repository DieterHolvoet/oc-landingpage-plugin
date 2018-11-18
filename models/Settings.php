<?php namespace DieterHolvoet\LandingPage\Models;

use Cms\Classes\Theme;
use Model;

/**
 * Settings Model
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'dieterholvoet_landingpage_settings';
    public $settingsFields = 'fields.yaml';

    public function getPageOptions()
    {
        return Theme::getActiveTheme()->listPages()->mapWithKeys(function ($page) {
            return [$page->url => $page->url . ($page->title ? " - $page->title" : '')];
        });
    }
}
