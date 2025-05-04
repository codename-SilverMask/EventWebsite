<?php


use App\Http\Controllers\Front\FrontController;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminHomeBannerController;
use App\Http\Controllers\Admin\AdminHomeWelcomeController;
use App\Http\Controllers\Admin\AdminHomeCounterController;
use App\Http\Controllers\Admin\AdminSpeakerController;
use App\Http\Controllers\Admin\AdminScheduleDayController;
use App\Http\Controllers\Admin\AdminScheduleController;
use App\Http\Controllers\Admin\AdminSpeakerScheduleController;
use App\Http\Controllers\Admin\AdminSponsorCategoryController;
use App\Http\Controllers\Admin\AdminSponsorController;
use App\Http\Controllers\Admin\AdminOrganiserController;
use App\Http\Controllers\Admin\AdminAccommodationController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPackageController;


//Front
Route::get('/',[FrontController::class,'home'])->name('home');
Route::get('/contact',[FrontController::class,'contact'])->name('contact');
Route::get('/speakers',[FrontController::class,'speakers'])->name('speakers');
Route::get('/schedule',[FrontController::class,'schedule'])->name('schedule');
Route::get('/sponsors',[FrontController::class,'sponsors'])->name('sponsors');
Route::get('/sponsor/{slug}',[FrontController::class,'sponsor'])->name('sponsor');
Route::get('/speaker/{slug}',[FrontController::class,'speaker'])->name('speaker');
Route::get('/registration',[FrontController::class,'registration'])->name('registration');
Route::get('/forget-password',[FrontController::class,'forget_password'])->name('forget_password');
Route::post('/forget-password',[FrontController::class,'forget_password_submit'])->name('forget_password_submit');
Route::post('/registration',[FrontController::class,'registration_submit'])->name('registration_submit');
Route::get('/registration-verify/{token}/{email}',[FrontController::class,'registration_verify'])->name('registration_verify');
Route::get('/reset-password/{token}/{email}',[FrontController::class,'reset_password'])->name('reset_password');
Route::post('/reset-password/{token}/{email}',[FrontController::class,'reset_password_submit'])->name('reset_password_submit');
Route::get('/login',[FrontController::class,'login'])->name('login');
Route::get('/logout',[FrontController::class,'logout'])->name('logout');
Route::post('/login',[FrontController::class,'login_submit'])->name('login_submit');
Route::get('/organisers',[FrontController::class,'organisers'])->name('organisers');
Route::get('/organiser/{slug}',[FrontController::class,'organiser'])->name('organiser');
Route::get('/accommodations',[FrontController::class,'accommodations'])->name('accommodations');
Route::get('/photo-gallery',[FrontController::class,'photo_gallery'])->name('photo_gallery');
Route::get('/video-gallery',[FrontController::class,'video_gallery'])->name('video_gallery');
Route::get('/faq',[FrontController::class,'faq'])->name('faq');
Route::get('/testimonial',[FrontController::class,'testimonial'])->name('testimonial');
Route::get('/blog',[FrontController::class,'blog'])->name('blog');
Route::get('/post/{slug}',[FrontController::class,'post'])->name('post');





//User or Ateendee
Route::middleware('auth')->prefix('attendee')->group(function () {
    
    Route::get('/dashboard',[FrontController::class,'dashboard'])->name('attendee_dashboard');
    Route::get('/profile',[FrontController::class,'profile'])->name('attendee_profile');
    Route::post('/profile',[FrontController::class,'profile_submit'])->name('attendee_profile_submit');


});

//Admin
Route::middleware('admin')->prefix('admin')->group(function () {
    
    Route::get('/dashboard',[AdminDashboardController::class,'dashboard'])->name('admin_dashboard');
    Route::get('/profile',[AdminAuthController::class,'profile'])->name('admin_profile');
    Route::post('/profile',[AdminAuthController::class,'profile_submit'])->name('admin_profile_submit');

    Route::get('/home-banner',[AdminHomeBannerController::class,'index'])->name('admin_home_banner');
    Route::post('/home-banner',[AdminHomeBannerController::class,'update'])->name('admin_home_banner_update');

    Route::get('/home-welcome',[AdminHomeWelcomeController::class,'index'])->name('admin_home_welcome');
    Route::post('/home-welcome',[AdminHomeWelcomeController::class,'update'])->name('admin_home_welcome_update');

    Route::get('/home-counter',[AdminHomeCounterController::class,'index'])->name('admin_home_counter');
    Route::post('/home-counter',[AdminHomeCounterController::class,'update'])->name('admin_home_counter_update');

    Route::get('/speaker/index',[AdminSpeakerController::class,'index'])->name('admin_speaker_index');
    Route::get('/speaker/create',[AdminSpeakerController::class,'create'])->name('admin_speaker_create');
    Route::post('/speaker/store',[AdminSpeakerController::class,'store'])->name('admin_speaker_store');
    Route::get('/speaker/edit/{id}',[AdminSpeakerController::class,'edit'])->name('admin_speaker_edit');
    Route::post('/speaker/update/{id}',[AdminSpeakerController::class,'update'])->name('admin_speaker_update');
    Route::get('/speaker/delete/{id}',[AdminSpeakerController::class,'delete'])->name('admin_speaker_delete');

    Route::get('/organiser/index',[AdminOrganiserController::class,'index'])->name('admin_organiser_index');
    Route::get('/organiser/create',[AdminOrganiserController::class,'create'])->name('admin_organiser_create');
    Route::post('/organiser/store',[AdminOrganiserController::class,'store'])->name('admin_organiser_store');
    Route::get('/organiser/edit/{id}',[AdminOrganiserController::class,'edit'])->name('admin_organiser_edit');
    Route::post('/organiser/update/{id}',[AdminOrganiserController::class,'update'])->name('admin_organiser_update');
    Route::get('/organiser/delete/{id}',[AdminOrganiserController::class,'delete'])->name('admin_organiser_delete');

    Route::get('/schedule-day/index',[AdminScheduleDayController::class,'index'])->name('admin_schedule_day_index');
    Route::get('/schedule-day/create',[AdminScheduleDayController::class,'create'])->name('admin_schedule_day_create');
    Route::post('/schedule-day/store',[AdminScheduleDayController::class,'store'])->name('admin_schedule_day_store');
    Route::get('/schedule-day/edit/{id}',[AdminScheduleDayController::class,'edit'])->name('admin_schedule_day_edit');
    Route::post('/schedule-day/update/{id}',[AdminScheduleDayController::class,'update'])->name('admin_schedule_day_update');
    Route::get('/schedule-day/delete/{id}',[AdminScheduleDayController::class,'delete'])->name('admin_schedule_day_delete');

    Route::get('/schedule/index',[AdminScheduleController::class,'index'])->name('admin_schedule_index');
    Route::get('/schedule/create',[AdminScheduleController::class,'create'])->name('admin_schedule_create');
    Route::post('/schedule/store',[AdminScheduleController::class,'store'])->name('admin_schedule_store');
    Route::get('/schedule/edit/{id}',[AdminScheduleController::class,'edit'])->name('admin_schedule_edit');
    Route::post('/schedule/update/{id}',[AdminScheduleController::class,'update'])->name('admin_schedule_update');
    Route::get('/schedule/delete/{id}',[AdminScheduleController::class,'delete'])->name('admin_schedule_delete');

    Route::get('/speaker-schedule/index',[AdminSpeakerScheduleController::class,'index'])->name('admin_speaker_schedule_index');
    Route::post('/speaker-schedule/store',[AdminSpeakerScheduleController::class,'store'])->name('admin_speaker_schedule_store');
    Route::get('/speaker-schedule/delete/{id}',[AdminSpeakerScheduleController::class,'delete'])->name('admin_speaker_schedule_delete');

    Route::get('/sponsor-category/index',[AdminSponsorCategoryController::class,'index'])->name('admin_sponsor_category_index');
    Route::get('/sponsor-category/create',[AdminSponsorCategoryController::class,'create'])->name('admin_sponsor_category_create');
    Route::post('/sponsor-category/store',[AdminSponsorCategoryController::class,'store'])->name('admin_sponsor_category_store');
    Route::get('/sponsor-category/edit/{id}',[AdminSponsorCategoryController::class,'edit'])->name('admin_sponsor_category_edit');
    Route::post('/sponsor-category/update/{id}',[AdminSponsorCategoryController::class,'update'])->name('admin_sponsor_category_update');
    Route::get('/sponsor-category/delete/{id}',[AdminSponsorCategoryController::class,'delete'])->name('admin_sponsor_category_delete');

    Route::get('/sponsor/index',[AdminSponsorController::class,'index'])->name('admin_sponsor_index');
    Route::get('/sponsor/create',[AdminSponsorController::class,'create'])->name('admin_sponsor_create');
    Route::post('/sponsor/store',[AdminSponsorController::class,'store'])->name('admin_sponsor_store');
    Route::get('/sponsor/edit/{id}',[AdminSponsorController::class,'edit'])->name('admin_sponsor_edit');
    Route::post('/sponsor/update/{id}',[AdminSponsorController::class,'update'])->name('admin_sponsor_update');
    Route::get('/sponsor/delete/{id}',[AdminSponsorController::class,'delete'])->name('admin_sponsor_delete');

    Route::get('/accommodation/index',[AdminAccommodationController::class,'index'])->name('admin_accommodation_index');
    Route::get('/accommodation/create',[AdminAccommodationController::class,'create'])->name('admin_accommodation_create');
    Route::post('/accommodation/store',[AdminAccommodationController::class,'store'])->name('admin_accommodation_store');
    Route::get('/accommodation/edit/{id}',[AdminAccommodationController::class,'edit'])->name('admin_accommodation_edit');
    Route::post('/accommodation/update/{id}',[AdminAccommodationController::class,'update'])->name('admin_accommodation_update');
    Route::get('/accommodation/delete/{id}',[AdminAccommodationController::class,'delete'])->name('admin_accommodation_delete');

    Route::get('/photo/index',[AdminPhotoController::class,'index'])->name('admin_photo_index');
    Route::get('/photo/create',[AdminPhotoController::class,'create'])->name('admin_photo_create');
    Route::post('/photo/store',[AdminPhotoController::class,'store'])->name('admin_photo_store');
    Route::get('/photo/edit/{id}',[AdminPhotoController::class,'edit'])->name('admin_photo_edit');
    Route::post('/photo/update/{id}',[AdminPhotoController::class,'update'])->name('admin_photo_update');
    Route::get('/photo/delete/{id}',[AdminPhotoController::class,'delete'])->name('admin_photo_delete');

    Route::get('/video/index',[AdminVideoController::class,'index'])->name('admin_video_index');
    Route::get('/video/create',[AdminVideoController::class,'create'])->name('admin_video_create');
    Route::post('/video/store',[AdminVideoController::class,'store'])->name('admin_video_store');
    Route::get('/video/edit/{id}',[AdminVideoController::class,'edit'])->name('admin_video_edit');
    Route::post('/video/update/{id}',[AdminVideoController::class,'update'])->name('admin_video_update');
    Route::get('/video/delete/{id}',[AdminVideoController::class,'delete'])->name('admin_video_delete');

    Route::get('/faq/index',[AdminFaqController::class,'index'])->name('admin_faq_index');
    Route::get('/faq/create',[AdminFaqController::class,'create'])->name('admin_faq_create');
    Route::post('/faq/store',[AdminFaqController::class,'store'])->name('admin_faq_store');
    Route::get('/faq/edit/{id}',[AdminFaqController::class,'edit'])->name('admin_faq_edit');
    Route::post('/faq/update/{id}',[AdminFaqController::class,'update'])->name('admin_faq_update');
    Route::get('/faq/delete/{id}',[AdminFaqController::class,'delete'])->name('admin_faq_delete');

    Route::get('/testimonial/index',[AdminTestimonialController::class,'index'])->name('admin_testimonial_index');
    Route::get('/testimonial/create',[AdminTestimonialController::class,'create'])->name('admin_testimonial_create');
    Route::post('/testimonial/store',[AdminTestimonialController::class,'store'])->name('admin_testimonial_store');
    Route::get('/testimonial/edit/{id}',[AdminTestimonialController::class,'edit'])->name('admin_testimonial_edit');
    Route::post('/testimonial/update/{id}',[AdminTestimonialController::class,'update'])->name('admin_testimonial_update');
    Route::get('/testimonial/delete/{id}',[AdminTestimonialController::class,'delete'])->name('admin_testimonial_delete');

    Route::get('/post/index',[AdminPostController::class,'index'])->name('admin_post_index');
    Route::get('/post/create',[AdminPostController::class,'create'])->name('admin_post_create');
    Route::post('/post/store',[AdminPostController::class,'store'])->name('admin_post_store');
    Route::get('/post/edit/{id}',[AdminPostController::class,'edit'])->name('admin_post_edit');
    Route::post('/post/update/{id}',[AdminPostController::class,'update'])->name('admin_post_update');
    Route::get('/post/delete/{id}',[AdminPostController::class,'delete'])->name('admin_post_delete');

    Route::get('/package/index',[AdminPackageController::class,'index'])->name('admin_package_index');
    Route::get('/package/create',[AdminPackageController::class,'create'])->name('admin_package_create');
    Route::post('/package/store',[AdminPackageController::class,'store'])->name('admin_package_store');
    Route::get('/package/edit/{id}',[AdminPackageController::class,'edit'])->name('admin_package_edit');
    Route::post('/package/update/{id}',[AdminPackageController::class,'update'])->name('admin_package_update');
    Route::get('/package/delete/{id}',[AdminPackageController::class,'delete'])->name('admin_package_delete');
    
    


});
Route::prefix('admin')->group(function () {
    Route::post('/login',[AdminAuthController::class,'login_submit'])->name('admin_login_submit');
    Route::get('/logout',[AdminAuthController::class,'logout'])->name('admin_logout');
    Route::get('/login',[AdminAuthController::class,'login'])->name('admin_login');
    Route::get('/forget-password',[AdminAuthController::class,'forget_password'])->name('admin_forget_password');
    Route::get('/reset-password/{token}/{email}',[AdminAuthController::class,'reset_password'])->name('admin_reset_password');
    Route::post('/forget-password',[AdminAuthController::class,'forget_password_submit'])->name('admin_forget_password_submit');
    Route::post('/reset-password/{token}/{email}',[AdminAuthController::class,'reset_password_submit'])->name('admin_reset_password_submit');
    
    
});