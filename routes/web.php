<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\BulkSmsController;
use App\Http\Controllers\BulkSmsOrderController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainOrderController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GraphicOrderController;
use App\Http\Controllers\HomeContentController;
use App\Http\Controllers\MediaManagerController;
use App\Http\Controllers\HostingPackageController;
use App\Http\Controllers\HostingPackageOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorActivityController;
use App\Http\Controllers\WebDesignController;
use App\Http\Controllers\WebDesignOrderController;
use App\Http\Controllers\WebDesignPackageController;
use App\Http\Controllers\WebDesignPackageOrderController;
use App\Http\Controllers\WebsiteBannerController;
use App\Http\Controllers\WebsiteClientController;
use App\Http\Controllers\WebsiteGraphicController;
use App\Http\Controllers\WebsiteMessageController;
use App\Http\Controllers\WebsiteSubscribeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// api
Route::prefix('api/order')->group(function () {
    Route::get('/bulksms', [BulkSmsOrderController::class, 'order_bulksms_api']);
    Route::get('/domain', [DomainOrderController::class, 'order_domain_api']);
    Route::get('/graphic', [GraphicOrderController::class, 'order_graphic_api']);
    Route::get('/hosting', [HostingPackageOrderController::class, 'order_hosting_api']);
    Route::get('/web_desigh', [WebDesignOrderController::class, 'order_web_design_api']);
    Route::get('/web_desigh_package', [WebDesignPackageOrderController::class, 'order_web_design_package_api']);
});


Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');
Route::get('/project-gallery', [FrontendController::class, 'gallery'])->name('frontend.gallery');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/our-process', [FrontendController::class, 'ourProcess'])->name('frontend.ourProcess');
Route::redirect('/page/our-process', '/our-process', 301);
Route::get('/page/{slug}', [FrontendController::class, 'customPage'])->name('frontend.page.show');
Route::redirect('/web-design-package', '/')->name('frontend.webDesignPackage');
Route::get('/insights', [FrontendController::class, 'blogIndex'])->name('frontend.blog.index');
Route::get('/projects', [FrontendController::class, 'projects'])->name('frontend.projects');
Route::get('/testimonials', [FrontendController::class, 'testimonials'])->name('frontend.testimonials');
Route::get('/faqs', [FrontendController::class, 'faqs'])->name('frontend.faqs');
Route::get('/insights/{slug}', [FrontendController::class, 'blogShow'])->name('frontend.blog.show');
Route::get('/mobile-app-development', [FrontendController::class, 'mobileAppDevelopment'])->name('frontend.mobileAppDevelopment');
Route::get('/web-design', [FrontendController::class, 'webDesign'])->name('frontend.webDesign');
Route::get('/cloud-api-automation', [FrontendController::class, 'cloudAutomation'])->name('frontend.cloudAutomation');
Route::redirect('/hosting-package', '/')->name('frontend.hostingPackage');
Route::get('/domain-search', [FrontendController::class, 'domainSearch'])->name('frontend.domainSearch');
Route::post('/domain-search', [FrontendController::class, 'domainSearchPost'])->name('frontend.domainSearchPost');
Route::redirect('/bulk-sms-package', '/')->name('frontend.bulkSmsPackage');
Route::get('/graphic-design', [FrontendController::class, 'graphicDesign'])->name('frontend.graphicDesign');

Route::post('/contact/message', [FrontendController::class, 'contactMessageStore'])->name('frontend.contact.message');
Route::post('/graphic-design-order-store', [FrontendController::class, 'graphicDesignOrderStore'])->name('frontend.graphicDesignOrderStore');
Route::post('/domain-order-store', [FrontendController::class, 'domainOrderStore'])->name('frontend.domainOrderStore');
Route::post('/mobile-app-development/inquiry', [FrontendController::class, 'mobileAppInquiryStore'])->name('frontend.mobileApp.inquiry');
Route::post('/web-design-order-store', [FrontendController::class, 'webDesignOrderStore'])->name('frontend.webDesignOrderStore');
Route::post('/hosting-package-order-store', [FrontendController::class, 'hostingPackageOrderStore'])->name('frontend.hostingPackageOrderStore');
Route::post('/bulk-sms-package-order-store', [FrontendController::class, 'bulkSmsPackageOrderStore'])->name('frontend.bulkSmsPackageOrderStore');
Route::post('/web-design-package-order-store', [FrontendController::class, 'webDesignPackageOrderStore'])->name('frontend.webDesignPackageOrderStore');

Route::post('/subscribe/store', [FrontendController::class, 'subscribeStore'])->name('frontend.subscribeStore');

// Legacy public URLs kept for existing bookmarks and indexed links.
Route::redirect('/images', '/project-gallery', 301)->name('frontend.images');
Route::redirect('/contact-us', '/contact', 301)->name('frontend.contactUs');
Route::redirect('/blogs', '/insights', 301)->name('frontend.blogs');
Route::redirect('/demos', '/projects', 301)->name('frontend.demos');
Route::redirect('/blog-detail/{slug}', '/insights/{slug}', 301)->name('frontend.blogDetail');
Route::redirect('/domain-Search', '/domain-search', 301);
Route::redirect('/graphics-design', '/graphic-design', 301);
Route::post('/contact-us-message-store', [FrontendController::class, 'contactMessageStore'])->name('frontend.contactUsMessageStore');
Route::get('/backend' , function(){
    return redirect()->route('dashboard');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/backend/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/graphic-design-status-change', [DashboardController::class, 'graphicDesignStatusChange'])->name('graphicDesignStatusChange');
    Route::post('/hosting-order-status-change', [DashboardController::class, 'hostingOrderStatusChange'])->name('hostingOrderStatusChange');
    Route::post('/web-design-package-order-status-change', [DashboardController::class, 'webDesignPackageOrderStatusChange'])->name('webDesignPackageOrderStatusChange');
    Route::post('/domain-order-status-change', [DashboardController::class, 'domainOrderStatusChange'])->name('domainOrderStatusChange');
    Route::post('/bulk-sms-order-status-change', [DashboardController::class, 'bulkSmsOrderStatusChange'])->name('bulkSmsOrderStatusChange');
    Route::post('/web-design-order-status-change', [DashboardController::class, 'webDesignOrderStatusChange'])->name('webDesignOrderStatusChange');

    Route::post('/backend/general-static-option-update', [SettingController::class, 'generalStaticUpdate'])->name('backend.generalStaticUpdate');
    Route::post('/backend/logo-and-image-static-option-update', [SettingController::class, 'logoAndImageStaticUpdate'])->name('backend.logoAndImageStaticUpdate');
    Route::post('/backend/text-static-option-update', [SettingController::class, 'textStaticUpdate'])->name('backend.textStaticUpdate');
    Route::post('/backend/social-static-update', [SettingController::class, 'socialStaticUpdate'])->name('backend.socialStaticUpdate');
    Route::post('/backend/counter-static-update', [SettingController::class, 'counterStaticUpdate'])->name('backend.counterStaticUpdate');
    Route::post('/backend/app-static-update', [SettingController::class, 'appStaticOptionUpdate'])->name('backend.appStaticOptionUpdate');

    Route::get('/backend/app-static-form', [SettingController::class, 'appStaticForm'])->name('backend.appStaticForm');
    Route::get('/backend/get-general-static-option-form', [SettingController::class, 'getGeneralStaticForm'])->name('backend.getGeneralStaticForm');
    Route::get('/backend/text-static-option-form', [SettingController::class, 'textStaticForm'])->name('backend.textStaticForm');
    Route::get('/backend/logo-and-image-static-option-form', [SettingController::class, 'logoAndImageGeneralStaticForm'])->name('backend.logoAndImageGeneralStaticForm');
    Route::get('/backend/social-static-otion-form', [SettingController::class, 'socialStaticOptionForm'])->name('backend.socialStaticOptionForm');
    Route::get('/backend/counter-static-otion-form', [SettingController::class, 'counterStaticOptionForm'])->name('backend.counterStaticOptionForm');

    Route::resource('/webDesignPackage', WebDesignPackageController::class);
    Route::resource('/webDesign', WebDesignController::class);
    Route::resource('/websiteClient', WebsiteClientController::class);
    Route::get('/media-library', [MediaManagerController::class, 'index'])->name('media.index');
    Route::get('/media-library/files', [MediaManagerController::class, 'library'])->name('media.library');
    Route::post('/media-library/upload', [MediaManagerController::class, 'upload'])->name('media.upload');
    Route::delete('/media-library/delete', [MediaManagerController::class, 'destroy'])->name('media.destroy');
    Route::resource('/websiteGraphic', WebsiteGraphicController::class);
    Route::resource('/websiteMessage', WebsiteMessageController::class);
    Route::resource('/websiteSubscribe', WebsiteSubscribeController::class);
    Route::resource('/websiteBanner', WebsiteBannerController::class);
    Route::resource('/graphicOrder', GraphicOrderController::class);
    Route::resource('/webDesignOrder', WebDesignOrderController::class);
    Route::resource('/bulkSms', BulkSmsController::class);
    Route::resource('/hostingPackage', HostingPackageController::class);
    Route::resource('/hostingPackageOrder', HostingPackageOrderController::class);
    Route::resource('/webDesignPackageOrder', WebDesignPackageOrderController::class);
    Route::resource('/bulkSmsOrder', BulkSmsOrderController::class);
    Route::resource('/domainOrder', DomainOrderController::class);
    Route::resource('visitorActivity', VisitorActivityController::class);
    Route::resource('customPage', CustomPageController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('demo', DemoController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('homeContent', HomeContentController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('user', UserController::class);

    Route::post('/backend/sendEmailToSubscriber', [WebsiteSubscribeController::class, 'sendEmailToSubscriber'])->name('sendEmailToSubscriber');

    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('profile-password-update', [ProfileController::class, 'profilePasswordUpdate'])->name('profilePasswordUpdate');

    Route::get('visitors/today', [VisitorActivityController::class, 'today'])->name('visitor.today');
    Route::get('visitors/last_seven_day', [VisitorActivityController::class, 'last_seven_day'])->name('visitor.last_seven_day');
    Route::get('visitors/last_thirty_day', [VisitorActivityController::class, 'last_thirty_day'])->name('visitor.last_thirty_day');
});

//Clean function
Route::get('/cache-clean', function () {
    Artisan::call('cache:clear');
    Artisan::call('optimize');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return back()->withSuccess('Claned -cache-optimize-route-view-config !');
})->name('cache.clean');



require __DIR__ . '/auth.php';
