<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomePageController::class, 'index']);
Route::get('/about', [App\Http\Controllers\HomePageController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\HomePageController::class, 'contact']);
Route::post('/contact-us', [App\Http\Controllers\HomePageController::class, 'contactConfirm']);
Route::get('/membership', [App\Http\Controllers\HomePageController::class, 'membership']);
Route::get('/blog', [App\Http\Controllers\HomePageController::class, 'blog']);
Route::get('/blogPost/{id}', [App\Http\Controllers\HomePageController::class, 'blogPost'])->name('blogPost');
Route::get('/terms_conditions', [App\Http\Controllers\HomePageController::class, 'terms_conditions']);
Route::get('/privacy', [App\Http\Controllers\HomePageController::class, 'privacy']);

Auth::routes(['verify' => true]);
Route::post('/member/login', [App\Http\Controllers\HomePageController::class, 'post_member_login'])->name('member.login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/member/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/member/avatar/{id}', [App\Http\Controllers\HomeController::class, 'upload_avatar'])->name('upload-avatar');
Route::post('/member/update/password/{id}', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update.password');
Route::post('/member/profile/update/{id}', [App\Http\Controllers\HomeController::class, 'profile_update'])->name('profile.update');
Route::get('/member/donation_dues', [App\Http\Controllers\HomeController::class, 'donation_dues'])->name('donation_dues');
Route::get('/member/messages_notifications', [App\Http\Controllers\HomeController::class, 'messages_notifications'])->name('messages_notifications');
Route::post('/member/make/payment/{id}', [App\Http\Controllers\HomeController::class, 'make_payment'])->name('payment');
Route::get('/member/payment/callback', [App\Http\Controllers\HomeController::class, 'handleGatewayCallback'])->name('handleGatewayCallback');
Route::get('/member/payment/history', [App\Http\Controllers\HomeController::class, 'payment_history'])->name('payment.history');
Route::any('/message/message/read/{id}', [App\Http\Controllers\HomeController::class, 'read_message'])->name('read.message');


// Admin
Route::get('/admin/login', [App\Http\Controllers\HomePageController::class, 'admin_login']);
Route::post('/login', [App\Http\Controllers\HomePageController::class, 'post_admin_login'])->name('admin.login');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/members', [App\Http\Controllers\AdminController::class, 'members'])->name('admin.members');
    Route::post('/admin/add/member', [App\Http\Controllers\AdminController::class, 'add_member'])->name('admin.add.member');
    Route::get('/admin/view/members', [App\Http\Controllers\AdminController::class, 'view_members'])->name('admin.view.members');
    Route::post('/admin/update/member/{id}', [App\Http\Controllers\AdminController::class, 'update_member'])->name('admin.update.member');
    Route::get('/admin/delete/member/{id}', [App\Http\Controllers\AdminController::class, 'delete_member'])->name('admin.delete.member');
    Route::get('/admin/payment/request', [App\Http\Controllers\AdminController::class, 'payment_request'])->name('admin.payment.request');
    Route::post('/admin/payment/request/add', [App\Http\Controllers\AdminController::class, 'add_payment_request'])->name('admin.add.payment.request');
    Route::get('/admin/payment/request/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete_payment_request'])->name('admin.delete.payment.request');
    Route::get('/admin/payment/request/view', [App\Http\Controllers\AdminController::class, 'view_payments_request'])->name('admin.view.payments.request');
    Route::get('/admin/view/payments', [App\Http\Controllers\AdminController::class, 'view_payments'])->name('admin.view.payments');
    Route::get('/admin/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/avatar/{id}', [App\Http\Controllers\AdminController::class, 'upload_avatar'])->name('admin.upload-avatar');
    Route::post('/admin/update/password/{id}', [App\Http\Controllers\AdminController::class, 'update_password'])->name('admin.update.password');
    Route::post('/admin/profile/update/{id}', [App\Http\Controllers\AdminController::class, 'profile_update'])->name('admin.profile.update');
    Route::post('/admin/member/message/{member_id}', [App\Http\Controllers\AdminController::class, 'message_member'])->name('admin.message.member');
    Route::get('/admin/create/general/message', [App\Http\Controllers\AdminController::class, 'create_general_message'])->name('admin.create.general.message');
    Route::post('/admin/general/message', [App\Http\Controllers\AdminController::class, 'message_general'])->name('admin.message.general');
    Route::get('/admin/view/messages', [App\Http\Controllers\AdminController::class, 'view_messages'])->name('admin.view.messages');
    Route::get('/admin/view/membership/requests', [App\Http\Controllers\AdminController::class, 'view_membership_requests'])->name('admin.view.membership.requests');
    Route::post('/admin/confirm/membership/request/{id}', [App\Http\Controllers\AdminController::class, 'confirm_member'])->name('admin.confirm.member');
    Route::get('/admin/decline/membership/request/{id}', [App\Http\Controllers\AdminController::class, 'decline_member'])->name('admin.decline.member');
    Route::get('/admin/blog', [App\Http\Controllers\AdminController::class, 'blog'])->name('admin.blog');
    Route::post('/admin/post/blog', [App\Http\Controllers\AdminController::class, 'post_blog'])->name('admin.post.blog');
    Route::get('/admin/view/blogs', [App\Http\Controllers\AdminController::class, 'view_blogs'])->name('admin.view.blogs');
});