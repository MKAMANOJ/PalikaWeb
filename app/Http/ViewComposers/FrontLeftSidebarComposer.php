<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

/**
 * Class FrontHeaderFooterComposer
 * @package App\Http\ViewComposers
 */
class FrontLeftSidebarComposer
{

    /**
     * @var mixed
     */
    protected $userRoleName;
    /**
     * @var bool
     */
    protected $isProfileCompleted;
    /**
     * @var \App\EBP\Entities\User
     */
    protected $user;

    /**
     * FrontLeftSidebarComposer constructor.
     */
    public function __construct()
    {
        $this->user                    = currentNonAdminUser();
        $this->userRoleName            = $this->user->role_name;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $roleName           = $this->userRoleName;
        $view->with(compact('roleName'));
    }
}
