<?php

namespace App\Http\ViewComposers;

use App\Domain\Admin\Settings\SettingsService;
use Illuminate\Contracts\View\View;

/**
 * Class FrontFooterComposer
 * @package App\Http\ViewComposers
 */
class FrontFooterComposer
{
    /**
     * @var mixed
     */
    protected $settings;
    /**
     * @var SettingsService
     */
    private $settingsService;

    /**
     * FrontFooterComposer constructor.
     * @param SettingsService $settingsService
     */
    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
        $this->settings        = $this->settingsService->getBySlugs(['facebook-link', 'google-link']);
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $facebookLink = $this->settings->where('slug', 'facebook-link')->first()->content ?? '';
        $googleLink   = $this->settings->where('slug', 'google-link')->first()->content ?? '';
        $view->with(compact('settings', 'facebookLink', 'googleLink'));
    }
}
