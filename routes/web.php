<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DagListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\EjaraRateController;
use App\Http\Controllers\frontend\CommonController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\GlobalConfigController;
use App\Http\Controllers\KhatianListController;
use App\Http\Controllers\KhatianTypeController;
use App\Http\Controllers\LandLeaseApplicationController;
use App\Http\Controllers\LandLeaseOrderController;
use App\Http\Controllers\LandLeaseSessionController;
use App\Http\Controllers\MouzaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UnionPourashavaController;
use App\Http\Controllers\UpazilaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login_form', [AuthenticatedSessionController::class, 'userLoginCreate'])->name('user.login');
Route::post('/login_form', [AuthenticatedSessionController::class, 'userLoginPost']);
Route::get('/user_logout', [AuthenticatedSessionController::class, 'userLogout'])->name('user.logout');
Route::get('/register_form', [AuthenticatedSessionController::class, 'userRegisterCreate'])->name('user.registration');
Route::post('/register_form', [AuthenticatedSessionController::class, 'userRegisterPost']);

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'isAdmin'])->name('dashboard');
Route::group(['prefix' => 'admin'], function () {
    Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.admin.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.admin.create');
            Route::post('/create', [UserController::class, 'store'])->name('admin.admin.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.admin.edit');
            Route::post('/edit/{id}', [UserController::class, 'update'])->name('admin.admin.update');
            // Route::get('/export', [UserController::class, 'export'])->name('admin.admin.export');
            // Route::get('/change-status', [UserController::class, 'changeStatus'])->name('admin.admin.change-status');
        });
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'userIndex'])->name('admin.user.index');
            Route::get('/create', [UserController::class, 'userCreate'])->name('admin.user.create');
            Route::post('/create', [UserController::class, 'userStore'])->name('admin.user.store');
            Route::get('/edit/{id}', [UserController::class, 'userEdit'])->name('admin.user.edit');
            Route::post('/edit/{id}', [UserController::class, 'userUpdate'])->name('admin.user.update');
        });
        Route::group(['prefix' => 'khatian-type'], function () {
            Route::get('/', [KhatianTypeController::class, 'index'])->name('admin.khatian-type.index');
            Route::get('/create', [KhatianTypeController::class, 'create'])->name('admin.khatian-type.create');
            Route::post('/create', [KhatianTypeController::class, 'store'])->name('admin.khatian-type.store');
            Route::get('/edit/{id}', [KhatianTypeController::class, 'edit'])->name('admin.khatian-type.edit');
            Route::post('/edit/{id}', [KhatianTypeController::class, 'update'])->name('admin.khatian-type.update');
        });
        Route::group(['prefix' => 'mouza'], function () {
            Route::get('/', [MouzaController::class, 'index'])->name('admin.mouza.index');
            Route::get('/create', [MouzaController::class, 'create'])->name('admin.mouza.create');
            Route::post('/create', [MouzaController::class, 'store'])->name('admin.mouza.store');
            Route::get('/edit/{id}', [MouzaController::class, 'edit'])->name('admin.mouza.edit');
            Route::post('/edit/{id}', [MouzaController::class, 'update'])->name('admin.mouza.update');
        });
        Route::group(['prefix' => 'upazila'], function () {
            Route::get('/', [UpazilaController::class, 'index'])->name('admin.upazila.index');
            Route::get('/create', [UpazilaController::class, 'create'])->name('admin.upazila.create');
            Route::post('/create', [UpazilaController::class, 'store'])->name('admin.upazila.store');
            Route::get('/edit/{id}', [UpazilaController::class, 'edit'])->name('admin.upazila.edit');
            Route::post('/edit/{id}', [UpazilaController::class, 'update'])->name('admin.upazila.update');
        });
        Route::group(['prefix' => 'union-pourashava'], function () {
            Route::get('/', [UnionPourashavaController::class, 'index'])->name('admin.union-pourashava.index');
            Route::get('/create', [UnionPourashavaController::class, 'create'])->name('admin.union-pourashava.create');
            Route::post('/create', [UnionPourashavaController::class, 'store'])->name('admin.union-pourashava.store');
            Route::get('/edit/{id}', [UnionPourashavaController::class, 'edit'])->name('admin.union-pourashava.edit');
            Route::post('/edit/{id}', [UnionPourashavaController::class, 'update'])->name('admin.union-pourashava.update');
        });
        Route::group(['prefix' => 'khatian-list'], function () {
            Route::get('/', [KhatianListController::class, 'index'])->name('admin.khatian-list.index');
            Route::get('/create', [KhatianListController::class, 'create'])->name('admin.khatian-list.create');
            Route::post('/create', [KhatianListController::class, 'store'])->name('admin.khatian-list.store');
            Route::get('/edit/{id}', [KhatianListController::class, 'edit'])->name('admin.khatian-list.edit');
            Route::post('/edit/{id}', [KhatianListController::class, 'update'])->name('admin.khatian-list.update');
        });
        Route::group(['prefix' => 'dag-list'], function () {
            Route::get('/', [DagListController::class, 'index'])->name('admin.dag-list.index');
            Route::get('/create', [DagListController::class, 'create'])->name('admin.dag-list.create');
            Route::post('/create', [DagListController::class, 'store'])->name('admin.dag-list.store');
            Route::get('/edit/{id}', [DagListController::class, 'edit'])->name('admin.dag-list.edit');
            Route::post('/edit/{id}', [DagListController::class, 'update'])->name('admin.dag-list.update');
            Route::get('/view/{id}', [DagListController::class, 'view'])->name('admin.dag-list.view');
            Route::get('{id}/add-user', [DagListController::class, 'addUser'])->name('admin.dag-list.add-user');
            Route::post('{id}/add-user', [DagListController::class, 'addUserPost']);
        });
        Route::group(['prefix' => 'setting'], function () {
            Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
            Route::post('/', [SettingController::class, 'update'])->name('admin.setting.update');
        });
        Route::group(['prefix' => 'home-setting'], function () {
            Route::get('/', [SettingController::class, 'homeSettingPersonIndex'])->name('admin.home-setting.person.index');
            Route::get('/create', [SettingController::class, 'homeSettingPersonCreate'])->name('admin.home-setting.person.create');
            Route::post('/create', [SettingController::class, 'homeSettingPersonStore']);
            Route::get('/edit/{id}', [SettingController::class, 'homeSettingPersonEdit'])->name('admin.home-setting.person.edit');
            Route::post('/edit/{id}', [SettingController::class, 'homeSettingPersonUpdate']);
        });

        Route::group(['prefix' => 'ejara-rate'], function () {
            Route::get('/', [EjaraRateController::class, 'index'])->name('admin.ejara-rate.index');
            Route::get('/create', [EjaraRateController::class, 'create'])->name('admin.ejara-rate.create');
            Route::post('/create', [EjaraRateController::class, 'store'])->name('admin.ejara-rate.store');
            Route::get('/edit/{id}', [EjaraRateController::class, 'edit'])->name('admin.ejara-rate.edit');
            Route::post('/edit/{id}', [EjaraRateController::class, 'update'])->name('admin.ejara-rate.update');
        });
        Route::group(['prefix' => 'land-lease'], function () {
            Route::get('/', [LandLeaseOrderController::class, 'index'])->name('admin.land-lease.index');
            Route::get('/create', [LandLeaseOrderController::class, 'create'])->name('admin.land-lease.create');
            Route::post('/create', [LandLeaseOrderController::class, 'store'])->name('admin.land-lease.store');
            Route::get('/edit/{id}', [LandLeaseOrderController::class, 'edit'])->name('admin.land-lease.edit');
            Route::post('/edit/{id}', [LandLeaseOrderController::class, 'update'])->name('admin.land-lease.update');
        });
        Route::group(['prefix' => 'land-lease-application'], function () {
            Route::get('/', [LandLeaseApplicationController::class, 'index'])->name('admin.land-lease-application.index');
        });
        Route::group(['prefix' => 'lease-session'], function () {
            Route::get('/', [LandLeaseSessionController::class, 'index'])->name('admin.lease-session.index');
            Route::get('/{land_lease_session}/payment', [LandLeaseSessionController::class, 'leaseSessionPayment'])->name('admin.lease_session_payment');
            Route::post('/{land_lease_session}/payment', [LandLeaseSessionController::class, 'leaseSessionPaymentStore']);
            Route::get('/{land_lease_session}/payment_details', [LandLeaseSessionController::class, 'leaseSessionPaymentDetails'])->name('admin.lease_session_payment_details');
            Route::get('/{transaction_log}/payment_detail_print', [LandLeaseSessionController::class, 'leasePaymentDetailPrint'])->name('admin.lease_payment_detail_print');
        });
        Route::group(['prefix' => 'payments'], function () {
            Route::get('/application-payments', [LandLeaseApplicationController::class, 'allApplicationPayment'])->name('admin.payments.lease-application');
            Route::get('/lease-payments', [LandLeaseSessionController::class, 'allLeasePayment'])->name('admin.payments.lease-payments');
            //For All Accept
            Route::get('/application-payment/accept', [LandLeaseApplicationController::class, 'applicationPaymentAccept'])->name('admin.payments.lease-application.accept');
        });
        Route::group(['prefix' => 'reports'], function () {
            Route::get('/lease-session-payments', [ReportController::class, 'leasePayment'])->name('admin.reports.lease-payment');
            // Route::get('/lease-session-payments', [ReportController::class, 'leasePayment'])->name('admin.reports.lease-payment');
        });

        Route::get('/lease_application_accept', [LandLeaseApplicationController::class, 'leaseApplicationAccept'])->name('admin.lease_application_accept');
        Route::get('/lease_session_create', [LandLeaseSessionController::class, 'leaseSessionCreate'])->name('admin.lease_session_create');

        Route::get('/global-config', [GlobalConfigController::class, 'index'])->name('admin.global-config.index');
        Route::post('/global-config', [GlobalConfigController::class, 'store'])->name('admin.global-config.store');

        Route::get('/kendro/report', [KendroController::class, 'report'])->name('admin.report.kendro');
        Route::get('get-unions', [UnionPourashavaController::class, 'getUnionBySubDistrict'])->name('get.unions');
        Route::get('get-mouza-by-khatiyan_type', [MouzaController::class, 'getMouzaByKhatianType'])->name('get.mouza.by.khatiyan_type');
        Route::get('get-khatian_no-by-mouza', [KhatianListController::class, 'getKhatiyanNoByMouza'])->name('get.khatian_no.by.mouza');
        // Route::get('get-wards', [WardController::class, 'getWardByUnion'])->name('get.wards');
        // Route::get('get-villages-by-ward', [VillageController::class, 'getVillageByWard'])->name('get.villages-by-ward');
        // Route::get('get-villages-by-union', [VillageController::class, 'getVillageByUnion'])->name('get.villages.by.union');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

Route::middleware(['auth'])->group(function () {

    Route::get('/my_account', [CommonController::class, 'my_account'])->name('user.my_account');
    Route::get('/land/{land_lease_id}/details', [CommonController::class, 'landDetails'])->name('user.land_details');
    Route::get('/profile_edit', [CommonController::class, 'profile_edit'])->name('user.profile_edit');
    Route::post('/profile_edit_update', [CommonController::class, 'profile_edit_update'])->name('user.profile_edit_update');
    Route::get('/land/{land_lease_session_id}/payment', [CommonController::class, 'landSessionPayment'])->name('user.land_session_payment');
    Route::post('/land/{land_lease_session_id}/payment', [CommonController::class, 'landSessionPaymentStore']);
    Route::get('/land/{land_lease_session_id}/payment_details', [CommonController::class, 'landSessionPaymentDetails'])->name('user.land_session_payment_details');

    Route::post('/land_lease_order_application/{land_lease_order_id}', [LandLeaseApplicationController::class, 'landLeaseApplicationStore'])->name('user.land_lease_order_application');




    //Common
    Route::get('get-district', [DistrictController::class, 'getDistrictByDivision'])->name('get.district');
    Route::get('get-sub-district', [UpazilaController::class, 'getSubDistrictByDistrict'])->name('get.sub_district');
});




Route::get('/link-storage', function () {
    Artisan::call('storage:link');
    return 'success';
});


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    return 'success';
});

require __DIR__ . '/auth.php';
