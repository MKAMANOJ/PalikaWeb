<?php

namespace App\Http\ViewComposers;

use App\Domain\Admin\Services\FrontEndMenu\FrontEndMenuService;
use Illuminate\Contracts\View\View;

/**
 * Class FrontHeaderFooterComposer
 * @package App\Http\ViewComposers
 */
class FrontHeaderFooterComposer
{
    /**
     * @var mixed
     */
    protected $menus;
    /**
     * @var FrontEndMenuService
     */
    private $frontEndMenuService;

    /**
     * FrontHeaderFooterComposer constructor.
     * @param FrontEndMenuService $frontEndMenuService
     */
    public function __construct(FrontEndMenuService $frontEndMenuService)
    {
        $this->frontEndMenuService = $frontEndMenuService;
        $slugs                     = [
            'main-navigation-left',
            'main-navigation-right',
            'footer-left',
            'footer-copyright-notice',
            'footer-legal-notice',
        ];
        $this->menus               = $this->frontEndMenuService->getAllMenusOfATypeBySlugs($slugs);
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $footerLeftMenu            = $this->menus->where('slug', 'footer-left')->first() ?? [];
        $footerCopyRightNoticeMenu = $this->menus->where('slug', 'footer-copyright-notice')->first() ?? [];
        $footerLegalNoticeMenu     = $this->menus->where('slug', 'footer-legal-notice')->first() ?? [];
        $leftNavigationMenu        = $this->menus->where('slug', 'main-navigation-left')->first() ?? [];
        $rightNavigationMenu       = $this->menus->where('slug', 'main-navigation-right')->first() ?? [];
        $view->with(compact('footerLeftMenu', 'footerCopyRightNoticeMenu', 'footerLegalNoticeMenu',
            'footerLegalNoticeMenu', 'leftNavigationMenu', 'rightNavigationMenu'));
    }
}
