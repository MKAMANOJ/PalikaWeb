<?php

namespace App\Providers;

use App\EBP\Entities\AboutApp;
use App\EBP\Entities\BudgetProgram;
use App\EBP\Entities\CitizenCharter;
use App\EBP\Entities\ContactUsInfo;
use App\EBP\Entities\Download;
use App\EBP\Entities\GalleryCategory;
use App\EBP\Entities\GalleryImage;
use App\EBP\Entities\ImportantContact\ImportantContact;
use App\EBP\Entities\ImportantContact\ImportantContactCategory;
use App\EBP\Entities\Introduction;
use App\EBP\Entities\LawRegulation;
use App\EBP\Entities\News;
use App\EBP\Entities\PlanningProject;
use App\EBP\Entities\PublicProcurement;
use App\EBP\Entities\PushNotification;
use App\EBP\Entities\Staff;
use App\EBP\Entities\TaxFee;
use App\EBP\Entities\WardProfile;
use App\Observers\AboutAppObserver;
use App\Observers\BudgetProgramObserver;
use App\Observers\CitizenCharterObserver;
use App\Observers\ContactUsInfoObserver;
use App\Observers\DownloadObserver;
use App\Observers\GalleryCategoryObserver;
use App\Observers\GalleryImageObserver;
use App\Observers\ImportantContactCategoryObserver;
use App\Observers\ImportantContactObserver;
use App\Observers\IntroductionObserver;
use App\Observers\LawRegulationObserver;
use App\Observers\NewsObserver;
use App\Observers\PlanningProjectObserver;
use App\Observers\PublicProcurementObserver;
use App\Observers\PushNotificationObserver;
use App\Observers\StaffObserver;
use App\Observers\TaxFeeObserver;
use App\Observers\WardProfileObserver;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, current($parameters));
        });
        News::observe(NewsObserver::class);
        AboutApp::observe(AboutAppObserver::class);
        ImportantContact::observe(ImportantContactObserver::class);
        ImportantContactCategory::observe(ImportantContactCategoryObserver::class);
        BudgetProgram::observe(BudgetProgramObserver::class);
        CitizenCharter::observe(CitizenCharterObserver::class);
        ContactUsInfo::observe(ContactUsInfoObserver::class);
        Download::observe(DownloadObserver::class);
        GalleryCategory::observe(GalleryCategoryObserver::class);
        GalleryImage::observe(GalleryImageObserver::class);
        Introduction::observe(IntroductionObserver::class);
        LawRegulation::observe(LawRegulationObserver::class);
        PlanningProject::observe(PlanningProjectObserver::class);
        PublicProcurement::observe(PublicProcurementObserver::class);
        PushNotification::observe(PushNotificationObserver::class);
        Staff::observe(StaffObserver::class);
        TaxFee::observe(TaxFeeObserver::class);
        WardProfile::observe(WardProfileObserver::class);
        Schema::defaultStringLength(191);
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
