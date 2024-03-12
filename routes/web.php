<?php

use App\Http\Controllers\DagListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\KhatianListController;
use App\Http\Controllers\KhatianTypeController;
use App\Http\Controllers\MouzaController;
use App\Http\Controllers\ProfileController;
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
Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['prefix' => 'admin'], function () {

    Route::middleware('auth')->group(function () {

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
        });
        Route::group(['prefix' => 'setting'], function () {
            Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
            Route::post('/', [SettingController::class, 'update'])->name('admin.setting.update');
        });


        Route::group(['prefix' => 'political-party'], function () {
            Route::get('/', [PoliticalPartyController::class, 'index'])->name('admin.political-party.index');
            Route::get('/create', [PoliticalPartyController::class, 'create'])->name('admin.political-party.create');
            Route::post('/create', [PoliticalPartyController::class, 'store'])->name('admin.political-party.store');
            Route::get('/edit/{id}', [PoliticalPartyController::class, 'edit'])->name('admin.political-party.edit');
            Route::post('/edit/{id}', [PoliticalPartyController::class, 'update'])->name('admin.political-party.update');
        });

        Route::group(['prefix' => 'people'], function () {
            Route::get('/', [PeopleController::class, 'index'])->name('admin.people.index');
            Route::get('/create', [PeopleController::class, 'create'])->name('admin.people.create');
            Route::post('/create', [PeopleController::class, 'store'])->name('admin.people.store');
            Route::get('/edit/{id}', [PeopleController::class, 'edit'])->name('admin.people.edit');
            Route::post('/edit/{id}', [PeopleController::class, 'update'])->name('admin.people.update');
        });

        Route::get('/kendro/report', [KendroController::class, 'report'])->name('admin.report.kendro');

        Route::get('get-district', [DistrictController::class, 'getDistrictByDivision'])->name('get.district');
        Route::get('get-sub-district', [UpazilaController::class, 'getSubDistrictByDistrict'])->name('get.sub_district');
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
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    return 'success';
});

require __DIR__ . '/auth.php';
