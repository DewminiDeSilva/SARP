<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DSDivisionController;
use App\Http\Controllers\GNDivisionController;
use App\Http\Controllers\TankRehabilitationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ASCController;
use App\Http\Controllers\AscRegistrationController;
use App\Http\Controllers\CascadesController;
use App\Http\Controllers\CDFController;
use App\Http\Controllers\CDFMemberController;
use App\Http\Controllers\FarmerOrganizationController;
use App\Http\Controllers\FarmerMemberController;
use App\Http\Controllers\GrievanceController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\VegitableController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\OtherCropController;
use App\Http\Controllers\HomeGardenController;
use App\Http\Controllers\DairyController;
use App\Http\Controllers\PoultaryController;
use App\Http\Controllers\GoatController;
use App\Http\Controllers\AquaCultureController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\AgroController;
use App\Http\Controllers\ShareholderController;
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\AgriController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\NutritionTraineeController;
use App\Http\Controllers\FFSTrainingController;
use App\Http\Controllers\FFSParticipantController;
use App\Http\Controllers\BeneFormController;
use App\Http\Controllers\NrmController;
use App\Http\Controllers\NrmParticipantController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\StaffProfileController;
use App\Http\Controllers\FingerlingController;
use App\Http\Controllers\TankController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LogframeIndicatorController;
use App\Models\Beneficiary;
use App\Models\FarmerOrganization;
use App\Models\Nutrition;
use App\Http\Controllers\AgricultureDataController;
use App\Http\Controllers\LivestockDataController;
use App\Http\Controllers\AWPBController;
use App\Http\Controllers\CostTabController;
use App\Http\Controllers\ProjectDesignReportController;
use App\Http\Controllers\EOIController;
use App\Http\Controllers\Admin\UserPermissionController;
use App\Http\Controllers\YouthController;
use App\Http\Controllers\YouthProposalController;
use App\Http\Controllers\EOIBeneficiaryController;
use App\Http\Controllers\NutrientRichHomeGardenController;

use App\Http\Controllers\ProgressReportController;

use App\Http\Controllers\AgroForestController;
use App\Http\Controllers\LogframeController;
use App\Http\Controllers\ProjectGoalController;


// -----------------------------------------
// Public Routes
// -----------------------------------------

// Default Route
Route::get('/', function () {
    return redirect('/login');
});
// Route::get('/', function () {
//     return redirect('/welcome');
// });

// Welcome Page
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Authentication Routes
require __DIR__ . '/auth.php';

// Registration Routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

// -----------------------------------------
// Protected Routes (Authenticated Users Only)
// -----------------------------------------

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Beneficiary Routes
    // Route::resource('beneficiary', BeneficiaryController::class);
    Route::get('/search', [BeneficiaryController::class, 'search'])->name('search');
    // Route::get('/generateCsv', [BeneficiaryController::class, 'generateCsv'])->name('download.csv');
    Route::get('generateCsv', [BeneficiaryController::class, 'generateCsv'])->name('download.csv');
    // Route::get('search', [BeneficiaryController::class, 'search'])->name('search');
    // Route::get('/beneficiaries/list', [BeneficiaryController::class, 'list'])->name('beneficiary.list');
    // Route::get('/beneficiaries', [BeneficiaryController::class, 'list'])->name('beneficiary.list');
    // Route::prefix('beneficiary')->name('beneficiary.')->group(function () {
    //     Route::get('/', [BeneficiaryController::class, 'index'])->name('index');
    //     Route::get('/create', [BeneficiaryController::class, 'create'])->name('create');
    //     Route::post('/', [BeneficiaryController::class, 'store'])->name('store');
    //     Route::get('/{beneficiary}', [BeneficiaryController::class, 'show'])->name('show');
    //     Route::get('/{beneficiary}/edit', [BeneficiaryController::class, 'edit'])->name('edit');
    //     Route::put('/{beneficiary}', [BeneficiaryController::class, 'update'])->name('update');
    //     Route::delete('/{beneficiary}', [BeneficiaryController::class, 'destroy'])->name('destroy');
    //     Route::get('/search', [BeneficiaryController::class, 'search'])->name('search');
    // Route::post('/upload-csv', [BeneficiaryController::class, 'uploadCsv'])->name('uploadCsv');
    //     Route::get('/generate-csv', [BeneficiaryController::class, 'generateCsv'])->name('generateCsv');
    //     Route::get('/report-csv', [BeneficiaryController::class, 'reportCsv'])->name('reportCsv');
    //     Route::get('/list', [BeneficiaryController::class, 'list'])->name('list');
    // });
    Route::prefix('beneficiary')->name('beneficiary.')->middleware('auth')->group(function () {
        Route::get('/', [BeneficiaryController::class, 'index'])
            ->name('index')
            ->middleware('check.permission:beneficiary,view');

        Route::get('/create', [BeneficiaryController::class, 'create'])
            ->name('create')
            ->middleware('check.permission:beneficiary,add');

        Route::post('/', [BeneficiaryController::class, 'store'])
            ->name('store')
            ->middleware('check.permission:beneficiary,add');

        Route::get('/{beneficiary}', [BeneficiaryController::class, 'show'])
            ->name('show')
            ->middleware('check.permission:beneficiary,view');

        Route::get('/{beneficiary}/edit', [BeneficiaryController::class, 'edit'])
            ->name('edit')
            ->middleware('check.permission:beneficiary,edit');

        Route::put('/{beneficiary}', [BeneficiaryController::class, 'update'])
            ->name('update')
            ->middleware('check.permission:beneficiary,edit');

        Route::delete('/{beneficiary}', [BeneficiaryController::class, 'destroy'])
            ->name('destroy')
            ->middleware('check.permission:beneficiary,delete');

        // Route::get('/search', [BeneficiaryController::class, 'search'])
        //     ->name('search')
        //     ->middleware('check.permission:beneficiary,view');

        // Route::post('/upload-csv', [BeneficiaryController::class, 'uploadCsv'])
        //     ->name('uploadCsv')
        //     ->middleware('check.permission:beneficiary,upload_csv');

        Route::get('/generate-csv', [BeneficiaryController::class, 'generateCsv'])
            ->name('generateCsv')
            ->middleware('check.permission:beneficiary,upload_csv');

        Route::get('/report-csv', [BeneficiaryController::class, 'reportCsv'])
            ->name('reportCsv')
            ->middleware('check.permission:beneficiary,upload_csv');

        Route::get('/list', [BeneficiaryController::class, 'list'])
            ->name('list')
            ->middleware('check.permission:beneficiary,view');
    });

    Route::prefix('beneficiary')
    ->name('beneficiary.')
    ->middleware('auth', 'check.permission:beneficiary,upload_csv')
    ->group(function () {
        Route::post('/upload-csv', [BeneficiaryController::class, 'uploadCsv'])->name('uploadCsv');

    });



    // Route::resource('family', FamilyController::class);
    // Route::get('family/create/{beneficiaryId}', [FamilyController::class, 'create'])->name('family/create');
    // Route::get('family/create/{beneficiaryId}', [FamilyController::class, 'create'])->name('family/create');
    // Route::resource('family', FamilyController::class);

    Route::middleware(['auth', 'check.permission:family,view'])->group(function () {

        // Family resource routes (with index, show, store, update, destroy)
        Route::resource('family', FamilyController::class);

        // Custom create route with beneficiary ID — can be considered 'update' permission
        Route::get('family/create/{beneficiaryId}', [FamilyController::class, 'create'])
        ->name('family.create.by.beneficiary')
        ->middleware(['auth', 'check.permission:family,add']);


    });

    Route::middleware(['auth'])->prefix('family')->name('family.')->group(function () {

        // Edit route for family member
        Route::get('/{family}/edit', [FamilyController::class, 'edit'])
            ->name('edit')
            ->middleware('check.permission:family,edit');

        // Delete route for family member
        Route::delete('/{family}', [FamilyController::class, 'destroy'])
            ->name('destroy')
            ->middleware('check.permission:family,delete');

    });




    // Province, District, and Division Routes
    Route::get('/provinces', [ProvinceController::class, 'index']);
    Route::get('/tanks', [TankController::class, 'index']);
    Route::get('/asc', [ASCController::class, 'index']);
    Route::get('/cascades', [CascadesController::class, 'index']);
    Route::get('/provinces/{province}/districts', [DistrictController::class, 'indexByProvince']);
    Route::get('/districts/{district}/ds-divisions', [DSDivisionController::class, 'getDSByDistrict']);
    Route::get('/ds-divisions', [DSDivisionController::class, 'getDSByDistrict']);
    Route::get('/ds-divisions/{dsDivision}/gn-divisions', [GNDivisionController::class, 'getGNByDS']);
    Route::get('/gn-divisions', [GNDivisionController::class, 'getGNByDS']);
    Route::resource('tank_rehabilitation', TankRehabilitationController::class);

    // // Tank Rehabilitation Routes
    // Route::resource('tank_rehabilitation', TankRehabilitationController::class);
    // Route::get('/tank_rehabilitation/search', [TankRehabilitationController::class, 'search'])->name('searchTank');
    // Route::get('searchTank', [TankRehabilitationController::class, 'search'])->name('searchTank');
    // Route::get('/tank_rehabilitation', [TankRehabilitationController::class, 'index'])->name('tank_rehabilitation.index');
    Route::get('/searchTank', [TankRehabilitationController::class, 'search'])->name('searchTank');
    Route::get('reportCsv', [TankRehabilitationController::class, 'reportCsv'])->name('downloadtank.csv');
    // Route::post('/tank_rehabilitation/upload-csv', [TankRehabilitationController::class, 'uploadCsv'])->name('tank_rehabilitation.upload_csv');
    // Route::post('/tank_rehabilitation/bulk-delete', [TankRehabilitationController::class, 'bulkDelete'])
    // ->name('tank_rehabilitation.bulk_delete');

    Route::middleware(['auth'])->prefix('tank_rehabilitation')->name('tank_rehabilitation.')->group(function () {

        // View all tank rehabilitation entries
        Route::get('/', [TankRehabilitationController::class, 'index'])
            ->name('index')
            ->middleware('check.permission:tank_rehabilitation,view');

        // Create new entry
        Route::get('/create', [TankRehabilitationController::class, 'create'])
            ->name('create')
            ->middleware('check.permission:tank_rehabilitation,add');

        // Store new entry
        Route::post('/', [TankRehabilitationController::class, 'store'])
            ->name('store')
            ->middleware('check.permission:tank_rehabilitation,add');

        // Show a single tank record
        Route::get('/{tank_rehabilitation}', [TankRehabilitationController::class, 'show'])
            ->name('show')
            ->middleware('check.permission:tank_rehabilitation,view');

        // Edit form
        Route::get('/{tank_rehabilitation}/edit', [TankRehabilitationController::class, 'edit'])
            ->name('edit')
            ->middleware('check.permission:tank_rehabilitation,edit');

        // Update record
        Route::put('/{tank_rehabilitation}', [TankRehabilitationController::class, 'update'])
            ->name('update')
            ->middleware('check.permission:tank_rehabilitation,edit');

        // Delete record
        Route::delete('/{tank_rehabilitation}', [TankRehabilitationController::class, 'destroy'])
            ->name('destroy')
            ->middleware('check.permission:tank_rehabilitation,delete');

        // Upload CSV
        Route::post('/upload-csv', [TankRehabilitationController::class, 'uploadCsv'])
            ->name('upload_csv')
            ->middleware('check.permission:tank_rehabilitation,upload_csv');

        // Bulk delete
        Route::post('/bulk-delete', [TankRehabilitationController::class, 'bulkDelete'])
            ->name('bulk_delete')
            ->middleware('check.permission:tank_rehabilitation,delete');

        // Report CSV
        Route::get('/report-csv', [TankRehabilitationController::class, 'reportCsv'])
            ->name('reportCsv')
            ->middleware('check.permission:tank_rehabilitation,view');

        // Search functionality
        Route::get('/search', [TankRehabilitationController::class, 'search'])
            ->name('search')
            ->middleware('check.permission:tank_rehabilitation,view');
    });


    // Training and Participants
    // Route::resource('training', TrainingController::class);
    // Route::resource('training', TrainingController::class);
    Route::get('/downloadtraining.csv', [TrainingController::class, 'downloadCsv'])->name('downloadtraining.csv');
    // Route::post('/training/upload_csv', [TrainingController::class, 'uploadCsv'])->name('training.upload_csv');
    Route::get('/searchTraining', [TrainingController::class, 'search'])->name('searchTraining');

    // Route::get('/training/{trainingId}/participants', [ParticipantController::class, 'listParticipants'])->name('participants.list');
    // Route::post('/training/{trainingId}/participants', [ParticipantController::class, 'store'])->name('participants.store');
    // Route::get('/training/{trainingId}/participants', [ParticipantController::class, 'listParticipants'])->name('participants.list');
    // Route::get('/training/{trainingId}/participants/create', [ParticipantController::class, 'create'])->name('participants.create');
    // Route::post('/training/{trainingId}/participants', [ParticipantController::class, 'store'])->name('participants.store');
    // Route::delete('training/{trainingId}/participants/{participantId}', [ParticipantController::class, 'destroy'])->name('participants.destroy');
    // Route::post('training/{trainingId}/participants/upload_csv', [ParticipantController::class, 'uploadCsv'])->name('participants.upload_csv');
    // Route::get('training/{trainingId}/participants/download_csv', [ParticipantController::class, 'downloadCsv'])->name('participants.download_csv');
    // Route::get('training/{trainingId}/participants/search', [ParticipantController::class, 'listParticipants'])->name('participants.search');

    Route::middleware(['auth'])->prefix('training')->name('training.')->group(function () {
        Route::get('/', [TrainingController::class, 'index'])
            ->name('index')
            ->middleware('check.permission:training,view');

        Route::get('/create', [TrainingController::class, 'create'])
            ->name('create')
            ->middleware('check.permission:training,add');

        Route::post('/', [TrainingController::class, 'store'])
            ->name('store')
            ->middleware('check.permission:training,add');

        Route::get('/{training}', [TrainingController::class, 'show'])
            ->name('show')
            ->middleware('check.permission:training,view');

        Route::get('/{training}/edit', [TrainingController::class, 'edit'])
            ->name('edit')
            ->middleware('check.permission:training,edit');

        Route::put('/{training}', [TrainingController::class, 'update'])
            ->name('update')
            ->middleware('check.permission:training,edit');

        Route::delete('/{training}', [TrainingController::class, 'destroy'])
            ->name('destroy')
            ->middleware('check.permission:training,delete');

        // Route::get('/download-csv', [TrainingController::class, 'downloadCsv'])
        //     ->name('download_csv')
        //     ->middleware('check.permission:training,view');

        Route::post('/upload-csv', [TrainingController::class, 'uploadCsv'])
            ->name('upload_csv')
            ->middleware('check.permission:training,upload_csv');

        Route::get('/search', [TrainingController::class, 'search'])
            ->name('search')
            ->middleware('check.permission:training,view');
    });

    Route::middleware(['auth'])->prefix('training/{trainingId}/participants')->name('participants.')->group(function () {
        Route::get('/', [ParticipantController::class, 'listParticipants'])
            ->name('list')
            ->middleware('check.permission:training,view');

        Route::get('/create', [ParticipantController::class, 'create'])
            ->name('create')
            ->middleware('check.permission:training,add');

        Route::post('/', [ParticipantController::class, 'store'])
            ->name('store')
            ->middleware('check.permission:training,add');

        Route::delete('/{participantId}', [ParticipantController::class, 'destroy'])
            ->name('destroy')
            ->middleware('check.permission:training,delete');

        Route::post('/upload-csv', [ParticipantController::class, 'uploadCsv'])
            ->name('upload_csv')
            ->middleware('check.permission:training,upload_csv');

        Route::get('/download-csv', [ParticipantController::class, 'downloadCsv'])
            ->name('download_csv')
            ->middleware('check.permission:training,view');

        Route::get('/search', [ParticipantController::class, 'listParticipants'])
            ->name('search')
            ->middleware('check.permission:training,view');
    });


    // // CDF and Members
    // Route::resource('cdf', CDFController::class);
    // Route::post('/cdf/upload-csv', [CdfController::class, 'uploadCsv'])->name('cdf.upload_csv');
    // Route::get('/download-cdf-csv', [CdfController::class, 'reportCsv'])->name('downloadcdf.csv');
    Route::get('searchCDF', [CdfController::class, 'search'])->name('searchCDF');
    // Route::get('cdfs/{cdf}', [CDFController::class, 'show'])->name('cdfs.show');
    // Route::get('/cdf/{cdf_name}/{cdf_address}/members', [CDFController::class, 'showMembers'])->name('cdf.showMembers');
    // Route::get('/cdf-members/{cdf_name}/{cdf_address}', [CDFController::class, 'showMembers']);

    // Route::resource('cdfmembers', CDFMemberController::class);
    // Route::get('/cdfmembers', [CdfMemberController::class, 'index'])->name('cdfmembers.index');
    // Route::get('/cdfmembers/{id}', [CdfMemberController::class, 'show']);
    // Route::get('/cdfmembers/{id}/samearea', [CdfMemberController::class, 'showMembersInSameArea'])->name('cdfmembers.samearea');
    // Route::get('/cdfmembers/name/{name}/samearea', [CdfMemberController::class, 'showMembersInSameAreaByName'])->name('cdfmembers.samearea.name');

    // CDF Module with Permissions
Route::prefix('cdf')->middleware('auth')->group(function () {
    Route::get('/', [CDFController::class, 'index'])
        ->name('cdf.index')
        ->middleware('check.permission:cdf,view');

    Route::get('/create', [CDFController::class, 'create'])
        ->name('cdf.create')
        ->middleware('check.permission:cdf,add');

    Route::post('/', [CDFController::class, 'store'])
        ->name('cdf.store')
        ->middleware('check.permission:cdf,add');

    Route::get('/{cdf}', [CDFController::class, 'show'])
        ->name('cdf.show')
        ->middleware('check.permission:cdf,view');

    Route::get('/{cdf}/edit', [CDFController::class, 'edit'])
        ->name('cdf.edit')
        ->middleware('check.permission:cdf,edit');

    Route::put('/{cdf}', [CDFController::class, 'update'])
        ->name('cdf.update')
        ->middleware('check.permission:cdf,edit');

    Route::delete('/{cdf}', [CDFController::class, 'destroy'])
        ->name('cdf.destroy')
        ->middleware('check.permission:cdf,delete');

    Route::post('/upload-csv', [CDFController::class, 'uploadCsv'])
        ->name('cdf.upload_csv')
        ->middleware('check.permission:cdf,upload_csv');

    Route::get('/csv/download', [CDFController::class, 'reportCsv'])
        ->name('downloadcdf.csv')
        ->middleware('check.permission:cdf,view');

    // Route::get('/search', [CDFController::class, 'search'])
    //     ->name('searchCDF')
    //     ->middleware('check.permission:cdf,view');

    Route::get('/{cdf_name}/{cdf_address}/members', [CDFController::class, 'showMembers'])
        ->name('cdf.showMembers')
        ->middleware('check.permission:cdf,view');
});

// CDF Members Module with Permissions
Route::prefix('cdfmembers')->middleware('auth')->group(function () {
    Route::get('/', [CDFMemberController::class, 'index'])
        ->name('cdfmembers.index')
        ->middleware('check.permission:cdfmembers,view');

    Route::get('/create', [CDFMemberController::class, 'create'])
        ->name('cdfmembers.create')
        ->middleware('check.permission:cdfmembers,add');

    Route::post('/', [CDFMemberController::class, 'store'])
        ->name('cdfmembers.store')
        ->middleware('check.permission:cdfmembers,add');

    Route::get('/{id}', [CDFMemberController::class, 'show'])
        ->name('cdfmembers.show')
        ->middleware('check.permission:cdfmembers,view');

    Route::get('/{id}/edit', [CDFMemberController::class, 'edit'])
        ->name('cdfmembers.edit')
        ->middleware('check.permission:cdfmembers,edit');

    Route::put('/{id}', [CDFMemberController::class, 'update'])
        ->name('cdfmembers.update')
        ->middleware('check.permission:cdfmembers,edit');

    Route::delete('/{id}', [CDFMemberController::class, 'destroy'])
        ->name('cdfmembers.destroy')
        ->middleware('check.permission:cdfmembers,delete');

    Route::get('/{id}/samearea', [CDFMemberController::class, 'showMembersInSameArea'])
        ->name('cdfmembers.samearea')
        ->middleware('check.permission:cdfmembers,view');

    Route::get('/name/{name}/samearea', [CDFMemberController::class, 'showMembersInSameAreaByName'])
        ->name('cdfmembers.samearea.name')
        ->middleware('check.permission:cdfmembers,view');
});


    // // Farmer Organization and Members
    // Route::resource('farmerorganization', FarmerOrganizationController::class);
    Route::get('/download-farmer-organization-csv', [FarmerOrganizationController::class, 'reportCsv'])->name('downloadfarmerorganization.csv');
    // Route::post('/farmerorganization/upload-csv', [FarmerOrganizationController::class, 'uploadCsv'])->name('farmerorganization.upload_csv');
    Route::get('/farmerorganization/search', [FarmerOrganizationController::class, 'search'])->name('searchFarmerOrganization');
    // Route::resource('farmerorganization', FarmerOrganizationController::class);
    // Route::get('/farmerorganization/{id}', [FarmerOrganizationController::class, 'show'])->name('farmerorganization.show');

    // Route::resource('farmermember', FarmerMemberController::class);
    // Route::get('farmermember/create/{farmerorganization_id}', [FarmerMemberController::class, 'create']);
    // Route::get('farmermember/create/{farmermember_id}', [FarmerMemberController::class, 'create'])->name('farmermember.create');
    // Route::get('farmer_member/{id}', [FarmerMemberController::class, 'show'])->name('farmer_member.show');
    // Route::resource('farmer_member', FarmerMemberController::class);

    Route::prefix('farmerorganization')->middleware('auth')->group(function () {
        Route::get('/', [FarmerOrganizationController::class, 'index'])
            ->name('farmerorganization.index')
            ->middleware('check.permission:farmerorganization,view');

        Route::get('/create', [FarmerOrganizationController::class, 'create'])
            ->name('farmerorganization.create')
            ->middleware('check.permission:farmerorganization,add');

        Route::post('/', [FarmerOrganizationController::class, 'store'])
            ->name('farmerorganization.store')
            ->middleware('check.permission:farmerorganization,add');

        Route::get('/{id}', [FarmerOrganizationController::class, 'show'])
            ->name('farmerorganization.show')
            ->middleware('check.permission:farmermember,view');

        // Route::get('/{id}/edit', [FarmerOrganizationController::class, 'edit'])
        //     ->name('farmerorganization.edit')
        //     ->middleware('check.permission:farmerorganization,edit');

        // Route::put('/{id}', [FarmerOrganizationController::class, 'update'])
        //     ->name('farmerorganization.update')
        //     ->middleware('check.permission:farmerorganization,edit');

        Route::delete('/{id}', [FarmerOrganizationController::class, 'destroy'])
            ->name('farmerorganization.destroy')
            ->middleware('check.permission:farmerorganization,delete');

        Route::post('/upload-csv', [FarmerOrganizationController::class, 'uploadCsv'])
            ->name('farmerorganization.upload_csv')
            ->middleware('check.permission:farmerorganization,upload_csv');

        // Route::get('/download-csv', [FarmerOrganizationController::class, 'reportCsv'])
        //     ->name('downloadfarmerorganization.csv')
        //     ->middleware('check.permission:farmerorganization,view');

        // Route::get('/search', [FarmerOrganizationController::class, 'search'])
        //     ->name('searchFarmerOrganization')
        //     ->middleware('check.permission:farmerorganization,view');
    });

    Route::prefix('farmerorganization')->middleware('auth')->group(function () {

        Route::get('/{farmerorganization}/edit', [FarmerOrganizationController::class, 'edit'])
            ->name('farmerorganization.edit')
            ->middleware('check.permission:farmerorganization,edit');

        Route::put('/{farmerorganization}', [FarmerOrganizationController::class, 'update'])
            ->name('farmerorganization.update')
            ->middleware('check.permission:farmerorganization,edit');

    });


    Route::prefix('farmermember')->middleware('auth')->group(function () {
        Route::get('/', [FarmerMemberController::class, 'index'])
            ->name('farmermember.index')
            ->middleware('check.permission:farmermember,view');

        Route::get('/create/{farmerorganization_id}', [FarmerMemberController::class, 'create'])
        ->name('farmermember.create')
        ->middleware('check.permission:farmermember,add');

        Route::post('/', [FarmerMemberController::class, 'store'])
            ->name('farmermember.store')
            ->middleware('check.permission:farmermember,add');

        Route::get('/{id}', [FarmerMemberController::class, 'show'])
            ->name('farmermember.show')
            ->middleware('check.permission:farmermember,view');

        Route::get('/{id}/edit', [FarmerMemberController::class, 'edit'])
            ->name('farmermember.edit')
            ->middleware('check.permission:farmermember,edit');

            Route::put('/{id}', [FarmerMemberController::class, 'update'])
            ->name('farmer_member.update') // ✅ Match blade file
            ->middleware('check.permission:farmermember,edit');


        Route::delete('/{id}', [FarmerMemberController::class, 'destroy'])
            ->name('farmermember.destroy')
            ->middleware('check.permission:farmermember,delete');
    });


    // Nutrition Routes
    // Route::resource('nutrition', NutritionController::class);
    // Route::get('/nutrition/download-csv', [NutritionController::class, 'downloadCsv'])->name('nutrition.download_csv');
    // Route::post('/nutrition/upload-csv', [NutritionController::class, 'uploadCsv'])->name('nutrition.upload_csv');
    // Route::get('/searchNutrition', [NutritionController::class, 'search'])->name('nutrition.search');
    // Route::get('/nutrition/create', [NutritionController::class, 'create'])->name('nutrition.create');
    Route::get('reportCsv1', [NutritionController::class, 'reportCsv1'])->name('downloadnutrition.csv');

    // Route::resource('nutrition_trainee', NutritionTraineeController::class);
    // Route::get('nutrition/{nutrition_id}/trainees', [NutritionTraineeController::class, 'index'])->name('nutrition_trainees.index');
    // Route::get('nutrition/{nutrition}/trainees', [NutritionTraineeController::class, 'index'])->name('nutrition_trainee.index');
    // Route::get('nutrition/{nutrition}/trainees/create', [NutritionTraineeController::class, 'create'])->name('nutrition_trainee.create');
    // Route::post('nutrition/trainees', [NutritionTraineeController::class, 'store'])->name('nutrition_trainee.store');
    // Route::get('nutrition/trainees/{trainee}/edit', [NutritionTraineeController::class, 'edit'])->name('nutrition_trainee.edit');
    // Route::put('nutrition/trainees/{trainee}', [NutritionTraineeController::class, 'update'])->name('nutrition_trainee.update');
    // Route::delete('nutrition/trainees/{trainee}', [NutritionTraineeController::class, 'destroy'])->name('nutrition_trainee.destroy');
    // Route::get('/nutrition/{nutrition_id}/trainees', [NutritionTraineeController::class, 'index'])->name('nutrition_trainee.index');
    // Route::get('/nutrition/{nutrition_id}/trainees/create', [NutritionTraineeController::class, 'create'])->name('nutrition_trainee.create');
    // Route::get('/nutrition/{nutrition_id}/trainees', [NutritionTraineeController::class, 'index'])->name('nutrition_trainee.trainee_index');
    // Route::put('/nutrition_trainee/{id}', [NutritionTraineeController::class, 'update'])->name('nutrition_trainee.update');
    // Route::get('/nutrition/{nutrition_id}/trainees/search', [NutritionTraineeController::class, 'search'])->name('nutrition_trainee.search');
    // Route::get('/nutrition/{nutrition_id}/trainees/download-csv', [NutritionTraineeController::class, 'download_csv'])->name('nutrition_trainee.download_csv');
    // Route::post('/nutrition/{nutrition_id}/trainees/upload-csv', [NutritionTraineeController::class, 'uploadCsv'])->name('nutrition_trainee.upload_csv');

    //Nutrition Routes
    Route::prefix('nutrition')->middleware('auth')->group(function () {
        Route::get('/', [NutritionController::class, 'index'])
            ->name('nutrition.index')
            ->middleware('check.permission:nutrition,view');

        Route::get('/create', [NutritionController::class, 'create'])
            ->name('nutrition.create')
            ->middleware('check.permission:nutrition,add');

        Route::post('/', [NutritionController::class, 'store'])
            ->name('nutrition.store')
            ->middleware('check.permission:nutrition,add');

        Route::get('/{id}', [NutritionController::class, 'show'])
            ->name('nutrition.show')
            ->middleware('check.permission:nutrition_trainee,view');

        Route::get('/{id}/edit', [NutritionController::class, 'edit'])
            ->name('nutrition.edit')
            ->middleware('check.permission:nutrition,edit');

        Route::put('/{id}', [NutritionController::class, 'update'])
            ->name('nutrition.update')
            ->middleware('check.permission:nutrition,edit');

        Route::delete('/{id}', [NutritionController::class, 'destroy'])
            ->name('nutrition.destroy')
            ->middleware('check.permission:nutrition,delete');

        Route::post('/upload-csv', [NutritionController::class, 'uploadCsv'])
            ->name('nutrition.upload_csv')
            ->middleware('check.permission:nutrition,upload_csv');

        // Route::get('/download-csv', [NutritionController::class, 'downloadCsv'])
        //     ->name('nutrition.download_csv')
        //     ->middleware('check.permission:nutrition,view');

        Route::get('/search', [NutritionController::class, 'search'])
            ->name('nutrition.search')
            ->middleware('check.permission:nutrition,view');

        // Route::get('/reportCsv1', [NutritionController::class, 'reportCsv1'])
        //     ->name('downloadnutrition.csv')
        //     ->middleware('check.permission:nutrition,view');
    });

    //Nutrition trainee routes

    Route::prefix('nutrition/{nutrition_id}/trainees')->middleware('auth')->group(function () {
        Route::get('/', [NutritionTraineeController::class, 'index'])
            ->name('nutrition_trainee.index')
            ->middleware('check.permission:nutrition_trainee,view');

        Route::get('/create', [NutritionTraineeController::class, 'create'])
            ->name('nutrition_trainee.create')
            ->middleware('check.permission:nutrition_trainee,add');

        Route::post('/', [NutritionTraineeController::class, 'store'])
            ->name('nutrition_trainee.store')
            ->middleware('check.permission:nutrition_trainee,add');

        Route::get('/search', [NutritionTraineeController::class, 'search'])
            ->name('nutrition_trainee.search')
            ->middleware('check.permission:nutrition_trainee,view');

        Route::get('/download-csv', [NutritionTraineeController::class, 'download_csv'])
            ->name('nutrition_trainee.download_csv')
            ->middleware('check.permission:nutrition_trainee,view');

        Route::post('/upload-csv', [NutritionTraineeController::class, 'uploadCsv'])
            ->name('nutrition_trainee.upload_csv')
            ->middleware('check.permission:nutrition_trainee,upload_csv');
    });

    // Trainee ID-specific routes outside prefix
    Route::middleware(['auth'])->group(function () {
        Route::get('nutrition/trainees/{trainee}/edit', [NutritionTraineeController::class, 'edit'])
            ->name('nutrition_trainee.edit')
            ->middleware('check.permission:nutrition_trainee,edit');

        Route::put('nutrition/trainees/{trainee}', [NutritionTraineeController::class, 'update'])
            ->name('nutrition_trainee.update')
            ->middleware('check.permission:nutrition_trainee,edit');

        Route::delete('nutrition/trainees/{trainee}', [NutritionTraineeController::class, 'destroy'])
            ->name('nutrition_trainee.destroy')
            ->middleware('check.permission:nutrition_trainee,delete');
    });



    // FFS Training and Participants
    // Route::resource('ffs-training', FFSTrainingController::class);
    // Route::resource('ffs-training', FFSTrainingController::class);
    // Route::get('/searchffs-training', [FFSTrainingController::class, 'search'])->name('searchFFSTraining');
    // Route::get('/ffs-trainingdownload.csv', [FFSTrainingController::class, 'downloadCsv'])->name('downloadffs-training.csv');
    // Route::post('/ffs-training/upload_csv', [FFSTrainingController::class, 'uploadCsv'])->name('ffs-training.upload_csv');
    // Route::get('ffs-training/{ffsTraining}/participants', [FFSTrainingController::class, 'showParticipants'])->name('ffs-participants.list');
    // Route::get('ffs-training/{ffsTraining}/participants/create', [FFSTrainingController::class, 'createParticipant'])->name('ffs-participants.create');


    // Route::prefix('ffs-training/{ffs_training_id}/ffs-participants')->group(function () {
    //     Route::get('/', [FFSParticipantController::class, 'listParticipants'])->name('ffs-participants.list');
    //     Route::get('/create', [FFSParticipantController::class, 'create'])->name('ffs-participants.create');
    //     Route::post('/', [FFSParticipantController::class, 'store'])->name('ffs-participants.store');
    //     Route::delete('/{ffs_participant_id}', [FFSParticipantController::class, 'destroy'])->name('ffs-participants.destroy');
    //     Route::get('/download-csv', [FFSParticipantController::class, 'downloadCsv'])->name('ffs-participants.download_csv');
    //     Route::post('/upload-csv', [FFSParticipantController::class, 'uploadCsv'])->name('ffs-participants.upload_csv');
    //     Route::get('/search', [FFSParticipantController::class, 'listParticipants'])->name('ffs-participants.search');


    // });

    // FFS Training and Participants
    Route::prefix('ffs-training')->middleware('auth')->group(function () {
        Route::get('/', [FFSTrainingController::class, 'index'])
            ->name('ffs-training.index')
            ->middleware('check.permission:ffs-training,view');

        Route::get('/create', [FFSTrainingController::class, 'create'])
            ->name('ffs-training.create')
            ->middleware('check.permission:ffs-training,add');

        Route::post('/', [FFSTrainingController::class, 'store'])
            ->name('ffs-training.store')
            ->middleware('check.permission:ffs-training,add');

        Route::get('/searchffs-training', [FFSTrainingController::class, 'search'])
            ->name('searchFFSTraining')
            ->middleware('check.permission:ffs-training,view');

        Route::get('/ffs-trainingdownload.csv', [FFSTrainingController::class, 'downloadCsv'])
            ->name('downloadffs-training.csv')
            ->middleware('check.permission:ffs-training,view');

        Route::post('/upload_csv', [FFSTrainingController::class, 'uploadCsv'])
            ->name('ffs-training.upload_csv')
            ->middleware('check.permission:ffs-training,upload_csv');

        Route::get('/{id}', [FFSTrainingController::class, 'show'])
            ->name('ffs-training.show')
            ->middleware('check.permission:ffs-training,view');

        Route::get('/{ffsTraining}/edit', [FFSTrainingController::class, 'edit'])
            ->name('ffs-training.edit')
            ->middleware('check.permission:ffs-training,edit');


        Route::put('/{ffsTraining}', [FFSTrainingController::class, 'update'])
            ->name('ffs-training.update')
            ->middleware('check.permission:ffs-training,edit');


        Route::delete('/{ffsTraining}', [FFSTrainingController::class, 'destroy'])
            ->name('ffs-training.destroy')
            ->middleware('check.permission:ffs-training,delete');

    });

    Route::prefix('ffs-training/{ffs_training_id}/ffs-participants')->middleware('auth')->group(function () {
        Route::get('/', [FFSParticipantController::class, 'listParticipants'])
            ->name('ffs-participants.list')
            ->middleware('check.permission:ffs-participants,view');

        Route::get('/create', [FFSParticipantController::class, 'create'])
            ->name('ffs-participants.create')
            ->middleware('check.permission:ffs-participants,add');

        Route::post('/', [FFSParticipantController::class, 'store'])
            ->name('ffs-participants.store')
            ->middleware('check.permission:ffs-participants,add');

        Route::get('/download-csv', [FFSParticipantController::class, 'downloadCsv'])
            ->name('ffs-participants.download_csv')
            ->middleware('check.permission:ffs-participants,view');

        Route::post('/upload-csv', [FFSParticipantController::class, 'uploadCsv'])
            ->name('ffs-participants.upload_csv')
            ->middleware('check.permission:ffs-participants,upload_csv');

        Route::get('/search', [FFSParticipantController::class, 'listParticipants'])
            ->name('ffs-participants.search')
            ->middleware('check.permission:ffs-participants,view');

    });

    // Individual Participant Actions
    Route::middleware(['auth'])->group(function () {
        Route::delete('ffs-training/{ffsTraining}/ffs-participants/{ffsParticipant}', [FFSParticipantController::class, 'destroy'])
            ->name('ffs-participants.destroy')
            ->middleware('check.permission:ffs-participants,delete');

    });


    // Agriculture and Livestock
    // Route::resource('agriculture', AgriController::class);
    // Route::get('/agriculture', [AgriController::class, 'index'])->name('agriculture.index');
    // Route::post('/agriculture', [AgriController::class, 'store'])->name('agriculture.store');
    // //Route::get('agriculture/{agricultureData}', [AgriController::class, 'show'])->name('agriculture.show');
    // Route::get('agriculture/beneficiary/{beneficiaryId}', [AgriController::class, 'showByBeneficiary'])->name('agriculture.showByBeneficiary');
    // Route::get('/agriculture/create/{beneficiaryId?}', [AgriController::class, 'create'])->name('agriculture.create');
    // Route::get('/crops-by-gn-division/{gnDivision}', [AgriController::class, 'cropsByGnDivision'])->name('crops.by.gn.division');
    // Route::get('/crops-by-gn-division/{gn_division_id}', [AgriController::class, 'cropsByGnDivision'])->name('crops.by.gn.division');
    // Route::get('/get-gn-division-name/{beneficiaryId}', [AgriController::class, 'getGnDivisionName']);
    // Route::get('/agriculture/{id}/edit', [AgriController::class, 'edit'])->name('agriculture.edit');
    // Route::delete('/agriculture/{id}', [AgriController::class, 'destroy'])->name('agriculture.destroy');
    // Route::put('/agriculture/{id}', [AgriController::class, 'update'])->name('agriculture.update');
    // // Route::get('/agriculture/search', [AgriController::class, 'search'])->name('agriculture.search');
    // Route::get('/get-crops/{category}', [AgriController::class, 'getCropsByCategory']);
    // Route::get('/agriculture', [AgriController::class, 'index'])->name('agriculture.index');

    Route::prefix('agriculture')->middleware('auth')->group(function () {

    // View all agriculture records
    Route::get('/', [AgriController::class, 'index'])
        ->name('agriculture.index')
        ->middleware('check.permission:agriculture,view');

    // Create form (optionally with beneficiary ID)
    Route::get('/create/{beneficiaryId?}', [AgriController::class, 'create'])
        ->name('agriculture.create')
        ->middleware('check.permission:agriculture,add');

    // Store new agriculture record
    Route::post('/', [AgriController::class, 'store'])
        ->name('agriculture.store')
        ->middleware('check.permission:agriculture,add');

    // Show by beneficiary
    Route::get('/beneficiary/{beneficiaryId}', [AgriController::class, 'showByBeneficiary'])
        ->name('agriculture.showByBeneficiary')
        ->middleware('check.permission:agriculture,view');

    // Edit form
    Route::get('/{id}/edit', [AgriController::class, 'edit'])
        ->name('agriculture.edit')
        ->middleware('check.permission:agriculture,edit');

    // Update record
    Route::put('/{id}', [AgriController::class, 'update'])
        ->name('agriculture.update')
        ->middleware('check.permission:agriculture,edit');

    // Delete record
    Route::delete('/{id}', [AgriController::class, 'destroy'])
        ->name('agriculture.destroy')
        ->middleware('check.permission:agriculture,delete');
});

Route::middleware('auth')->group(function () {

    // Get GN Division name from beneficiary
    Route::get('/get-gn-division-name/{beneficiaryId}', [AgriController::class, 'getGnDivisionName']);

    // Get crops by category
    Route::get('/get-crops/{category}', [AgriController::class, 'getCropsByCategory']);

    // Get crops by GN Division (avoid duplicate route definitions)
    Route::get('/crops-by-gn-division/{gn_division_id}', [AgriController::class, 'cropsByGnDivision'])
        ->name('crops.by.gn.division');
});



    // Route::resource('livestocks', LivestockController::class);
    // Route::get('/beneficiaries/search-livestock', [LivestockController::class, 'searchLivestock'])->name('beneficiary.searchLivestock');
    // Route::get('/livestocks/{beneficiary_id}', [LivestockController::class, 'listLivestock'])->name('livestock.list');
    // Route::get('/livestocks/create/{beneficiary_id}', [LivestockController::class, 'create'])->name('livestocks.create');
    // Route::post('/livestocks/store', [LivestockController::class, 'store'])->name('livestocks.store');
    // Route::get('/livestocks/gn-division/{beneficiary_id}', [LivestockController::class, 'getGnDivisionName'])->name('livestock.getGnDivisionName');
    // Route::delete('/livestocks/{beneficiary_id}/{livestock}', [LivestockController::class, 'destroy'])->name('livestocks.destroy');
    // Route::put('/livestock/{id}', [LivestockController::class, 'update'])->name('livestock.update');
    // Route::get('/livestock/{id}/edit', [LivestockController::class, 'edit'])->name('livestocks.edit');
    // Route::put('/livestock/{id}', [LivestockController::class, 'update'])->name('livestocks.update');
    // Route::get('/livestocks/{beneficiary_id}/{livestock}/edit', [LivestockController::class, 'edit'])->name('livestocks.edit');
    // Route::delete('/livestocks/{livestock}', [LivestockController::class, 'destroy'])->name('livestocks.destroy');
    // Route::get('/livestocks', [LivestockController::class, 'index'])->name('livestocks.index');
    // Route::get('/livestocks/{beneficiary_id}', [LivestockController::class, 'listLivestock'])->name('livestocks.list');
    // Route::put('/livestocks/{id}', [LivestockController::class, 'update'])->name('livestocks.update');
    // Route::delete('/livestocks/{livestock_id}', [LivestockController::class, 'destroy'])->name('livestocks.destroy');
    // Route::get('/livestocks/get-production-focus/{type}', [LivestockController::class, 'getProductionFocusByLivestockType']);
    // Route::get('/livestocks/{id}', [LivestockController::class, 'show']);
    // Route::get('/livestocks/{id}', [LivestockController::class, 'index']);
    // Route::get('/livestocks/{id}', [LivestockController::class, 'show']);

    // Livestock Routes

    // Route::get('/livestocks/{beneficiary_id}', [LivestockController::class, 'listLivestock'])->name('livestock.list');
    // Route::get('/livestocks/create/{beneficiary_id}', [LivestockController::class, 'create'])->name('livestocks.create');
    // Route::get('/beneficiaries/search-livestock', [LivestockController::class, 'searchLivestock'])->name('beneficiary.searchLivestock');
    // Route::post('/livestocks/store', [LivestockController::class, 'store'])->name('livestocks.store');
    // Route::get('/livestocks/gn-division/{beneficiary_id}', [LivestockController::class, 'getGnDivisionName'])->name('livestock.getGnDivisionName');
    // Route::get('/livestocks/{beneficiary_id}/{livestock}/edit', [LivestockController::class, 'edit'])->name('livestocks.edit');
    // Route::put('/livestocks/{beneficiary_id}/{livestock}', [LivestockController::class, 'update'])->name('livestocks.update');
    // Route::delete('/livestocks/{beneficiary_id}/{livestock}', [LivestockController::class, 'destroy'])->name('livestocks.destroy');
    // Route::put('/livestock/{id}', [LivestockController::class, 'update'])->name('livestock.update');
    // //Route::get('/livestock/{id}/edit', [LivestockController::class, 'edit'])->name('livestocks.edit');
    // Route::put('/livestock/{id}', [LivestockController::class, 'update'])->name('livestocks.update');
    // //Route::get('/livestocks/{beneficiary_id}/{livestock}/edit', [LivestockController::class, 'edit'])->name('livestocks.edit');
    // Route::delete('/livestocks/{livestock}', [LivestockController::class, 'destroy'])->name('livestocks.destroy');
    // Route::delete('/livestocks/{beneficiary_id}/{livestock}', [LivestockController::class, 'destroy'])->name('livestocks.destroy');
    // //Route::get('/livestocks', [LivestockController::class, 'index'])->name('livestock.livestock_index');
    // Route::get('/livestocks', [LivestockController::class, 'index'])->name('livestocks.index');
    // Route::get('/livestocks/{beneficiary_id}', [LivestockController::class, 'listLivestock'])->name('livestocks.list');
    // Route::put('/livestocks/{id}', [LivestockController::class, 'update'])->name('livestocks.update');
    // Route::delete('/livestocks/{livestock_id}', [LivestockController::class, 'destroy'])->name('livestocks.destroy');
    // Route::get('/livestocks/{beneficiary_id}/{livestock_id}/edit', [LivestockController::class, 'edit'])
    // ->name('livestocks.edit');

    // Route::get('/livestocks/get-production-focus/{type}', [LivestockController::class, 'getProductionFocusByLivestockType']);


    Route::prefix('livestocks')->middleware('auth')->group(function () {

    // View all livestock records
    Route::get('/', [LivestockController::class, 'index'])
        ->name('livestocks.index')
        ->middleware('check.permission:livestocks,view');

    // View livestock by beneficiary
    Route::get('/{beneficiary_id}', [LivestockController::class, 'listLivestock'])
        ->name('livestocks.list')
        ->middleware('check.permission:livestocks,view');

    // Create form
    Route::get('/create/{beneficiary_id}', [LivestockController::class, 'create'])
        ->name('livestocks.create')
        ->middleware('check.permission:livestocks,add');

    // Store new record
    Route::post('/store', [LivestockController::class, 'store'])
        ->name('livestocks.store')
        ->middleware('check.permission:livestocks,add');

    // Edit form
    Route::get('/{beneficiary_id}/{livestock}/edit', [LivestockController::class, 'edit'])
        ->name('livestocks.edit')
        ->middleware('check.permission:livestocks,edit');

    // Update record (by beneficiary context)
    Route::put('/{beneficiary_id}/{livestock}', [LivestockController::class, 'update'])
        ->name('livestocks.update')
        ->middleware('check.permission:livestocks,edit');

    // Update record (by ID only)
    Route::put('/{id}', [LivestockController::class, 'update'])
        ->name('livestock.update')
        ->middleware('check.permission:livestocks,edit');

    // Delete (with beneficiary ID)
    Route::delete('/{beneficiary_id}/{livestock}', [LivestockController::class, 'destroy'])
        ->name('livestocks.destroy')
        ->middleware('check.permission:livestocks,delete');

    // Delete (only livestock ID)
    Route::delete('/{livestock_id}', [LivestockController::class, 'destroy'])
        ->name('livestocks.destroy')
        ->middleware('check.permission:livestocks,delete');

    // Get production focus based on livestock type
    Route::get('/get-production-focus/{type}', [LivestockController::class, 'getProductionFocusByLivestockType'])
        ->name('livestocks.getProductionFocus');

    // Get GN Division name of beneficiary
    Route::get('/gn-division/{beneficiary_id}', [LivestockController::class, 'getGnDivisionName'])
        ->name('livestocks.getGnDivisionName');
});


Route::middleware('auth')->group(function () {

    // Livestock Search
    Route::get('/beneficiaries/search-livestock', [LivestockController::class, 'searchLivestock'])
        ->name('beneficiary.searchLivestock')
        ->middleware('check.permission:livestocks,view');

    // Beneficiary List (used in livestock module)
    Route::get('/beneficiaries/list', [BeneficiaryController::class, 'list'])
        ->name('beneficiary.list')
        ->middleware('check.permission:livestocks,view');
});


    //add agriculture routes
    // Route::get('/agri', [AgricultureDataController::class, 'index'])->name('agri');
    // Route::get('/lstock', [LivestockDataController::class, 'index'])->name('livestock');



    // Fingerling Module
    // Route::resource('fingerling', FingerlingController::class);
    // Route::get('/fingerling', [FingerlingController::class, 'index'])->name('fingerling.index');
    // // Route::get('/fingerlings/search-fingerling', [FingerlingController::class, 'searchFingerling'])->name('fingerling.searchFingerling');
    // Route::get('/fingerling/create/{tank_id}', [FingerlingController::class, 'create'])->name('fingerling.create');
    // Route::post('/fingerling/store', [FingerlingController::class, 'store'])->name('fingerling.store');
    // Route::get('/fingerling/show/{tank_id}', [FingerlingController::class, 'show'])->name('fingerling.show');

    // Infrastructure
    // Route::resource('infrastructure', InfrastructureController::class);
    // Route::resource('infrastructure', InfrastructureController::class);
    // Route::get('reportInfrastructureCsv', [InfrastructureController::class, 'reportCsv'])->name('downloadInfrastructure.csv');
    // Route::post('/infrastructure/upload_csv', [InfrastructureController::class, 'uploadCsv'])->name('infrastructure.upload_csv');
    // Route::get('searchInfrastructure', [InfrastructureController::class, 'search'])->name('searchInfrastructure');

    // Infrastructure
    Route::prefix('infrastructure')->middleware('auth')->group(function () {

    // View all infrastructures
    Route::get('/', [InfrastructureController::class, 'index'])
        ->name('infrastructure.index')
        ->middleware('check.permission:infrastructure,view');

    // Create form
    Route::get('/create', [InfrastructureController::class, 'create'])
        ->name('infrastructure.create')
        ->middleware('check.permission:infrastructure,add');

    // Store infrastructure
    Route::post('/', [InfrastructureController::class, 'store'])
        ->name('infrastructure.store')
        ->middleware('check.permission:infrastructure,add');

    // Show details
    Route::get('/{infrastructure}', [InfrastructureController::class, 'show'])
        ->name('infrastructure.show')
        ->middleware('check.permission:infrastructure,view');

    // Edit form
    Route::get('/{infrastructure}/edit', [InfrastructureController::class, 'edit'])
        ->name('infrastructure.edit')
        ->middleware('check.permission:infrastructure,edit');

    // Update infrastructure
    Route::put('/{infrastructure}', [InfrastructureController::class, 'update'])
        ->name('infrastructure.update')
        ->middleware('check.permission:infrastructure,edit');

    // Delete infrastructure
    Route::delete('/{infrastructure}', [InfrastructureController::class, 'destroy'])
        ->name('infrastructure.destroy')
        ->middleware('check.permission:infrastructure,delete');

    // Upload CSV
    Route::post('/upload_csv', [InfrastructureController::class, 'uploadCsv'])
        ->name('infrastructure.upload_csv')
        ->middleware('check.permission:infrastructure,upload_csv');
});

// Outside prefix
Route::middleware(['auth', 'check.permission:infrastructure,view'])->group(function () {
    // CSV report download
    Route::get('reportInfrastructureCsv', [InfrastructureController::class, 'reportCsv'])
        ->name('downloadInfrastructure.csv');

    // Search
    Route::get('searchInfrastructure', [InfrastructureController::class, 'search'])
        ->name('searchInfrastructure');
});



    // Gallery
    // Route::resource('gallery', GalleryController::class);
    // Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    // Route::get('/gallery/album/{album}', [GalleryController::class, 'showAlbum'])->name('gallery.album');
    // Route::post('/gallery/album/{album}/upload', [GalleryController::class, 'uploadImage'])->name('gallery.image.upload');
    // Route::delete('/gallery/album/{album}/{id}', [GalleryController::class, 'deleteImage'])->name('gallery.image.delete');
    // Route::post('/gallery/album/{album}/folder', [GalleryController::class, 'storeFolder'])->name('folder.store');
    // Route::get('/gallery/album/{album}/folder/{folder}', [GalleryController::class, 'showFolder'])->name('gallery.folder');
    // Route::post('/gallery/album/{album}/folder/{folder}/upload', [GalleryController::class, 'uploadImage'])->name('gallery.image.upload');
    // Route::delete('/folder/{album}/{folder}', [GalleryController::class, 'destroyFolder'])->name('folder.destroy');
    // Route::delete('/gallery/{album}/{folder}/delete-images', [GalleryController::class, 'deleteImages'])->name('gallery.image.delete');

    // Gallery
    Route::prefix('gallery')->middleware('auth')->group(function () {

    // View Gallery
    Route::get('/', [GalleryController::class, 'index'])
        ->name('gallery.index')
        ->middleware('check.permission:gallery,view');

    // View Album
    Route::get('/album/{album}', [GalleryController::class, 'showAlbum'])
        ->name('gallery.album')
        ->middleware('check.permission:gallery,view');

    // Upload image to album
    Route::post('/album/{album}/upload', [GalleryController::class, 'uploadImage'])
        ->name('gallery.image.upload')
        ->middleware('check.permission:gallery,add');

    // Upload image to folder
    Route::post('/album/{album}/folder/{folder}/upload', [GalleryController::class, 'uploadImage'])
        ->name('gallery.image.upload')
        ->middleware('check.permission:gallery,add');

    // Delete individual image
    Route::delete('/album/{album}/{id}', [GalleryController::class, 'deleteImage'])
        ->name('gallery.image.delete')
        ->middleware('check.permission:gallery,delete');

    // Create folder in album
    Route::post('/album/{album}/folder', [GalleryController::class, 'storeFolder'])
        ->name('folder.store')
        ->middleware('check.permission:gallery,add');

    // View folder
    Route::get('/album/{album}/folder/{folder}', [GalleryController::class, 'showFolder'])
        ->name('gallery.folder')
        ->middleware('check.permission:gallery,view');

    // Delete folder
    Route::delete('/folder/{album}/{folder}', [GalleryController::class, 'destroyFolder'])
        ->name('folder.destroy')
        ->middleware('check.permission:gallery,delete');

    // Bulk delete images from folder
    Route::delete('/{album}/{folder}/delete-images', [GalleryController::class, 'deleteImages'])
        ->name('gallery.image.delete')
        ->middleware('check.permission:gallery,delete');
});


    // Protected Admin Routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
    });

    // Protected User Routes
    Route::middleware('role:user')->group(function () {
        Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    });

    // Additional Secured Routes




    Route::get('/Training', function () {
        return view('training.training_program');
    });



    //ASC controller

    // Route::get('/asc', [ASCController::class, 'index']);
    // Route::resource('asc_registration', AscRegistrationController::class);
    // Route::get('searchASC', [AscRegistrationController::class, 'search'])->name('searchASC');
    // Route::get('/downloadAscCsv', [AscRegistrationController::class, 'reportCsv'])->name('downloadAscCsv');
    // Route::post('/uploadAscCsv', [AscRegistrationController::class, 'uploadCsv'])->name('uploadAscCsv');

    //ASC

    // ASC Management Page (dashboard)
Route::get('/asc', [ASCController::class, 'index'])
    ->name('asc.index')
    ->middleware('auth', 'check.permission:asc_registration,view');

// ASC Registration CRUD + CSV with permissions
Route::prefix('asc_registration')->middleware('auth')->group(function () {
    Route::get('/', [AscRegistrationController::class, 'index'])
        ->name('asc_registration.index')
        ->middleware('check.permission:asc_registration,view');

    Route::get('/create', [AscRegistrationController::class, 'create'])
        ->name('asc_registration.create')
        ->middleware('check.permission:asc_registration,add');

    Route::post('/', [AscRegistrationController::class, 'store'])
        ->name('asc_registration.store')
        ->middleware('check.permission:asc_registration,add');

    Route::get('/{asc_registration}', [AscRegistrationController::class, 'show'])
        ->name('asc_registration.show')
        ->middleware('check.permission:asc_registration,view');

    Route::get('/{asc_registration}/edit', [AscRegistrationController::class, 'edit'])
        ->name('asc_registration.edit')
        ->middleware('check.permission:asc_registration,edit');

    Route::put('/{asc_registration}', [AscRegistrationController::class, 'update'])
        ->name('asc_registration.update')
        ->middleware('check.permission:asc_registration,edit');

    Route::delete('/{asc_registration}', [AscRegistrationController::class, 'destroy'])
        ->name('asc_registration.destroy')
        ->middleware('check.permission:asc_registration,delete');

    Route::post('/upload', [AscRegistrationController::class, 'uploadCsv'])
        ->name('asc_registration.upload_csv')
        ->middleware('check.permission:asc_registration,upload_csv');
});

// Outside prefix routes with view permission
Route::middleware('auth')->group(function () {
    Route::get('/downloadAscCsv', [AscRegistrationController::class, 'reportCsv'])
        ->name('downloadAscCsv')
        ->middleware('check.permission:asc_registration,view');

    Route::get('/searchASC', [AscRegistrationController::class, 'search'])
        ->name('searchASC')
        ->middleware('check.permission:asc_registration,view');
});


    //Grievance controller

    // Route::resource('grievances', GrievanceController::class);
    // Route::get('grievances/report/csv', [GrievanceController::class, 'reportCsv'])->name('grievances.report.csv');
    // Route::post('grievances/upload_csv', [GrievanceController::class, 'uploadCsv'])->name('grievances.upload_csv');
    // Route::get('/searchGrievances', [GrievanceController::class, 'search'])->name('searchGrievances');

    // // Officer routes
    // Route::get('/grievances/{grievance}/officer/create', [OfficerController::class, 'create'])->name('officer.create');
    // Route::post('/grievances/{grievance}/officer', [OfficerController::class, 'store'])->name('officer.store');
    // Route::get('/grievances/{grievance}/officers', [OfficerController::class, 'showOfficers'])->name('grievance.officers');

    // Grievance

    Route::prefix('grievances')->middleware('auth')->group(function () {

    // Index (View all)
    Route::get('/', [GrievanceController::class, 'index'])
        ->name('grievances.index')
        ->middleware('check.permission:grievances,view');

    // Create form
    Route::get('/create', [GrievanceController::class, 'create'])
        ->name('grievances.create')
        ->middleware('check.permission:grievances,add');

    // Store new record
    Route::post('/', [GrievanceController::class, 'store'])
        ->name('grievances.store')
        ->middleware('check.permission:grievances,add');

    // Show one record
    Route::get('/{grievance}', [GrievanceController::class, 'show'])
        ->name('grievances.show')
        ->middleware('check.permission:grievances,view');

    // Edit form
    Route::get('/{grievance}/edit', [GrievanceController::class, 'edit'])
        ->name('grievances.edit')
        ->middleware('check.permission:grievances,edit');

    // Update
    Route::put('/{grievance}', [GrievanceController::class, 'update'])
        ->name('grievances.update')
        ->middleware('check.permission:grievances,edit');

    // Delete
    Route::delete('/{grievance}', [GrievanceController::class, 'destroy'])
        ->name('grievances.destroy')
        ->middleware('check.permission:grievances,delete');

    // CSV Upload
    Route::post('/upload_csv', [GrievanceController::class, 'uploadCsv'])
        ->name('grievances.upload_csv')
        ->middleware('check.permission:grievances,upload_csv');
});

// Outside prefix - CSV Export & Search
Route::middleware('auth')->group(function () {
    Route::get('grievances/report/csv', [GrievanceController::class, 'reportCsv'])
        ->name('grievances.report.csv')
        ->middleware('check.permission:grievances,view');

    Route::get('/searchGrievances', [GrievanceController::class, 'search'])
        ->name('searchGrievances')
        ->middleware('check.permission:grievances,view');
});


Route::prefix('grievances/{grievance}')->middleware('auth')->group(function () {

    // Officer create form
    Route::get('/officer/create', [OfficerController::class, 'create'])
        ->name('officer.create')
        ->middleware('check.permission:officer,add');

    // Store officer
    Route::post('/officer', [OfficerController::class, 'store'])
        ->name('officer.store')
        ->middleware('check.permission:officer,add');

    // Show officers assigned to grievance
    Route::get('/officers', [OfficerController::class, 'showOfficers'])
        ->name('grievance.officers')
        ->middleware('check.permission:officer,view');
});



    // // Vegitable Routes
    // Route::resource('vegitable', VegitableController::class);

    // // Fruit Routes
    // Route::resource('fruit', FruitController::class);

    // // Homegarden Routes
    // Route::resource('homegarden', HomeGardenController::class);

    // //other crop routes
    // Route::resource('other_crops', OtherCropController::class);

    // // Dairy Routes
    // Route::resource('dairy', DairyController::class);

    // // Poultary Routes
    // Route::resource('poultary', PoultaryController::class);

    // // Goat Routes
    // Route::resource('goat', GoatController::class);

    // // Goat Routes
    // Route::resource('aquaculture', AquaCultureController::class);

    // Vegitable
Route::prefix('vegitable')->middleware('auth')->group(function () {
    Route::get('/create', [VegitableController::class, 'create'])
        ->name('vegitable.create')
        ->middleware('check.permission:vegitable,add');

    Route::post('/', [VegitableController::class, 'store'])
        ->name('vegitable.store')
        ->middleware('check.permission:vegitable,add');
});

// Fruit
Route::prefix('fruit')->middleware('auth')->group(function () {
    Route::get('/create', [FruitController::class, 'create'])
        ->name('fruit.create')
        ->middleware('check.permission:fruit,add');

    Route::post('/', [FruitController::class, 'store'])
        ->name('fruit.store')
        ->middleware('check.permission:fruit,add');
});

// Home Garden
Route::prefix('homegarden')->middleware('auth')->group(function () {
    Route::get('/create', [HomeGardenController::class, 'create'])
        ->name('homegarden.create')
        ->middleware('check.permission:homegarden,add');

    Route::post('/', [HomeGardenController::class, 'store'])
        ->name('homegarden.store')
        ->middleware('check.permission:homegarden,add');
});

// Other Crops
Route::prefix('other_crops')->middleware('auth')->group(function () {
    Route::get('/create', [OtherCropController::class, 'create'])
        ->name('other_crops.create')
        ->middleware('check.permission:other_crops,add');

    Route::post('/', [OtherCropController::class, 'store'])
        ->name('other_crops.store')
        ->middleware('check.permission:other_crops,add');
});

// Dairy
Route::prefix('dairy')->middleware('auth')->group(function () {
    Route::get('/create', [DairyController::class, 'create'])
        ->name('dairy.create')
        ->middleware('check.permission:dairy,add');

    Route::post('/', [DairyController::class, 'store'])
        ->name('dairy.store')
        ->middleware('check.permission:dairy,add');
});

// Poultry
Route::prefix('poultary')->middleware('auth')->group(function () {
    Route::get('/create', [PoultaryController::class, 'create'])
        ->name('poultary.create')
        ->middleware('check.permission:poultary,add');

    Route::post('/', [PoultaryController::class, 'store'])
        ->name('poultary.store')
        ->middleware('check.permission:poultary,add');
});

// Goat
Route::prefix('goat')->middleware('auth')->group(function () {
    Route::get('/create', [GoatController::class, 'create'])
        ->name('goat.create')
        ->middleware('check.permission:goat,add');

    Route::post('/', [GoatController::class, 'store'])
        ->name('goat.store')
        ->middleware('check.permission:goat,add');
});

// Aquaculture
Route::prefix('aquaculture')->middleware('auth')->group(function () {
    Route::get('/create', [AquaCultureController::class, 'create'])
        ->name('aquaculture.create')
        ->middleware('check.permission:aquaculture,add');

    Route::post('/', [AquaCultureController::class, 'store'])
        ->name('aquaculture.store')
        ->middleware('check.permission:aquaculture,add');
});


// Route::get('/agri', [AgricultureDataController::class, 'index'])->name('agri');
// Route::get('/lstock', [LivestockDataController::class, 'index'])->name('livestock');

Route::get('/agri', [AgricultureDataController::class, 'index'])
    ->name('agri')
    ->middleware(['auth', 'check.permission:agri,view']);

Route::get('/lstock', [LivestockDataController::class, 'index'])
    ->name('livestock')
    ->middleware(['auth', 'check.permission:livestock,view']);




    // Route::get('/agri', function () {
    //     return view('vegitable_dairy.agriculture');
    // })->name('agri');

    // Route::get('/lstock', function () {
    //     return view('vegitable_dairy.livestock');
    // })->name('livestock');

    // Route::middleware(['auth'])->group(function () {
    //     Route::get('/agri', function () {
    //         return view('vegitable_dairy.agriculture');
    //     })->name('agri')->middleware('check.permission:agriculture,view');

    //     Route::get('/lstock', function () {
    //         return view('vegitable_dairy.livestock');
    //     })->name('livestock')->middleware('check.permission:livestocks,view');
    // });



    //Agro
    // Route::resource('agro', AgroController::class);
    // Route::resource('agro', AgroController::class);
    // Route::post('agro/{agro}/upload-pdf', [AgroController::class, 'uploadPdf'])->name('agro.upload_pdf');
    // Route::get('agro/{agro}/view-pdf', [AgroController::class, 'viewPdf'])->name('agro.view_pdf');
    // Route::get('/agro/csv/generate', [AgroController::class, 'generateCsv'])->name('agro.csv.generate');
    // Route::post('/agro/csv/upload', [AgroController::class, 'uploadCsv'])->name('agro.csv.upload');
    // Route::get('/agrosearch', [AgroController::class, 'search'])->name('agrosearch');


    // // Shareholder Routes
    // Route::get('agro/{agroId}/shareholders/create', [ShareholderController::class, 'create'])->name('shareholder.create');
    // Route::post('agro/{agroId}/shareholders', [ShareholderController::class, 'store'])->name('shareholder.store');
    // Route::get('agro/{agroId}/shareholders', [ShareholderController::class, 'show'])->name('shareholder.view');
    // Route::get('shareholders/{id}/edit', [ShareholderController::class, 'edit'])->name('shareholder.edit');
    // Route::put('shareholders/{id}', [ShareholderController::class, 'update'])->name('shareholder.update');
    // Route::delete('shareholders/{id}', [ShareholderController::class, 'destroy'])->name('shareholder.destroy');


    //Agro
        Route::prefix('agro')->middleware('auth')->group(function () {
        Route::get('/', [AgroController::class, 'index'])
            ->name('agro.index')
            ->middleware('check.permission:agro,view');

        Route::get('/create', [AgroController::class, 'create'])
            ->name('agro.create')
            ->middleware('check.permission:agro,add');

        Route::post('/', [AgroController::class, 'store'])
            ->name('agro.store')
            ->middleware('check.permission:agro,add');

        Route::get('/{agro}/edit', [AgroController::class, 'edit'])
            ->name('agro.edit')
            ->middleware('check.permission:agro,edit');

        Route::put('/{agro}', [AgroController::class, 'update'])
            ->name('agro.update')
            ->middleware('check.permission:agro,edit');

        Route::delete('/{agro}', [AgroController::class, 'destroy'])
            ->name('agro.destroy')
            ->middleware('check.permission:agro,delete');

        Route::post('/{agro}/upload-pdf', [AgroController::class, 'uploadPdf'])
            ->name('agro.upload_pdf')
            ->middleware('check.permission:agro,upload_csv');

        Route::get('/{agro}/view-pdf', [AgroController::class, 'viewPdf'])
            ->name('agro.view_pdf')
            ->middleware('check.permission:agro,view');

        Route::get('/csv/generate', [AgroController::class, 'generateCsv'])
            ->name('agro.csv.generate')
            ->middleware('check.permission:agro,view');

        Route::post('/csv/upload', [AgroController::class, 'uploadCsv'])
            ->name('agro.csv.upload')
            ->middleware('check.permission:agro,upload_csv');

        Route::get('/search', [AgroController::class, 'search'])
            ->name('agrosearch')
            ->middleware('check.permission:agro,view');
    });


    // Shareholder Routes
    Route::prefix('agro/{agroId}/shareholders')->middleware('auth')->group(function () {
    Route::get('/', [ShareholderController::class, 'show'])
        ->name('shareholder.view')
        ->middleware('check.permission:shareholder,view');

    Route::get('/create', [ShareholderController::class, 'create'])
        ->name('shareholder.create')
        ->middleware('check.permission:shareholder,add');

    Route::post('/', [ShareholderController::class, 'store'])
        ->name('shareholder.store')
        ->middleware('check.permission:shareholder,add');
});

// ID-specific outside prefix
Route::middleware('auth')->group(function () {
    Route::get('shareholders/{id}/edit', [ShareholderController::class, 'edit'])
        ->name('shareholder.edit')
        ->middleware('check.permission:shareholder,edit');

    Route::put('shareholders/{id}', [ShareholderController::class, 'update'])
        ->name('shareholder.update')
        ->middleware('check.permission:shareholder,edit');

    Route::delete('shareholders/{id}', [ShareholderController::class, 'destroy'])
        ->name('shareholder.destroy')
        ->middleware('check.permission:shareholder,delete');
});




    // bene form
    // Route::get('/bene-form/search', [BeneFormController::class, 'search'])->name('bene-form.search');
    // Route::resource('bene-form', BeneFormController::class);

    // Route::get('/bene', function () {
    //     return view('bene_form.bene');
    // });

    // bene form
    // Bene Form Routes with Permission Middleware
    Route::prefix('bene-form')->middleware('auth')->group(function () {

        // View all
        Route::get('/', [BeneFormController::class, 'index'])
            ->name('bene-form.index')
            ->middleware('check.permission:bene_form,view');

        // Create
        Route::get('/create', [BeneFormController::class, 'create'])
            ->name('bene-form.create')
            ->middleware('check.permission:bene_form,add');

        Route::post('/', [BeneFormController::class, 'store'])
            ->name('bene-form.store')
            ->middleware('check.permission:bene_form,add');

        // Edit & Update
        Route::get('/{bene_form}/edit', [BeneFormController::class, 'edit'])
            ->name('bene-form.edit')
            ->middleware('check.permission:bene_form,edit');

        Route::put('/{bene_form}', [BeneFormController::class, 'update'])
            ->name('bene-form.update')
            ->middleware('check.permission:bene_form,edit');

        // Delete
        Route::delete('/{bene_form}', [BeneFormController::class, 'destroy'])
            ->name('bene-form.destroy')
            ->middleware('check.permission:bene_form,delete');

        // Search
        Route::get('/search', [BeneFormController::class, 'search'])
            ->name('bene-form.search')
            ->middleware('check.permission:bene_form,view');

        Route::get('/{bene_form}', [BeneFormController::class, 'show'])
        ->name('bene-form.show')
        ->middleware('check.permission:bene_form,view');
    });

    // Static page (optional view control if needed)
    Route::get('/bene', function () {
        return view('bene_form.bene');
    })->middleware(['auth', 'check.permission:bene_form,view']);


    //AWPB

    // Route::get('/awpb', [AWPBController::class, 'index'])->name('awpb.index');
    // Route::get('/awpb/create', [AWPBController::class, 'create'])->name('awpb.create');
    // Route::post('/awpb/store', [AWPBController::class, 'store'])->name('awpb.store');
    // Route::get('/awpb/show/{year}', [AWPBController::class, 'show'])->name('awpb.show');
    // Route::get('/awpb/download/{id}', [AWPBController::class, 'download'])->name('awpb.download');


    //AWPB

    // Route::get('/awpb', [AWPBController::class, 'index'])->name('awpb.index');
    // Route::get('/awpb/create', [AWPBController::class, 'create'])->name('awpb.create');
    // Route::post('/awpb/store', [AWPBController::class, 'store'])->name('awpb.store');
    // Route::get('/awpb/show/{year}', [AWPBController::class, 'show'])->name('awpb.show');
    // Route::get('/awpb/download/{id}', [AWPBController::class, 'download'])->name('awpb.download');

    //AWPB
    Route::prefix('awpb')->middleware('auth')->group(function () {

    // View AWPB dashboard/index
    Route::get('/', [AWPBController::class, 'index'])
        ->name('awpb.index')
        ->middleware('check.permission:awpb,view');

    // Show AWPB upload form
    Route::get('/create', [AWPBController::class, 'create'])
        ->name('awpb.create')
        ->middleware('check.permission:awpb,add');

    // Store uploaded AWPB file
    Route::post('/store', [AWPBController::class, 'store'])
        ->name('awpb.store')
        ->middleware('check.permission:awpb,add');

    // Show AWPB by year
    Route::get('/show/{year}', [AWPBController::class, 'show'])
        ->name('awpb.show')
        ->middleware('check.permission:awpb,view');

    // Download a specific AWPB file
    Route::get('/download/{id}', [AWPBController::class, 'download'])
        ->name('awpb.download')
        ->middleware('check.permission:awpb,view');
});


    //Cost Tab
    // Route::prefix('costtab')->group(function () {
    //     Route::get('/', [CostTabController::class, 'index'])->name('costtab.index');
    //     Route::get('/create', [CostTabController::class, 'create'])->name('costtab.create');
    //     Route::post('/store', [CostTabController::class, 'store'])->name('costtab.store');
    //     Route::get('/show/{id}', [CostTabController::class, 'show'])->name('costtab.show');
    //     Route::get('/download/{id}', [CostTabController::class, 'download'])->name('costtab.download');
    // });

    //Cost Tab
    Route::prefix('costtab')->middleware('auth')->group(function () {

        // View list of cost tabs
        Route::get('/', [CostTabController::class, 'index'])
            ->name('costtab.index')
            ->middleware('check.permission:costtab,view');

        // Create form
        Route::get('/create', [CostTabController::class, 'create'])
            ->name('costtab.create')
            ->middleware('check.permission:costtab,add');

        // Store new cost tab
        Route::post('/store', [CostTabController::class, 'store'])
            ->name('costtab.store')
            ->middleware('check.permission:costtab,add');

        // View specific cost tab
        Route::get('/show/{id}', [CostTabController::class, 'show'])
            ->name('costtab.show')
            ->middleware('check.permission:costtab,view');

        // Download PDF
        Route::get('/download/{id}', [CostTabController::class, 'download'])
            ->name('costtab.download')
            ->middleware('check.permission:costtab,view');

    });


    //Project Design Report
    // Route::prefix('projectdesignreport')->group(function () {
    //     Route::get('/', [ProjectDesignReportController::class, 'index'])->name('projectdesignreport.index');
    //     Route::get('/create', [ProjectDesignReportController::class, 'create'])->name('projectdesignreport.create');
    //     Route::post('/store', [ProjectDesignReportController::class, 'store'])->name('projectdesignreport.store');
    //     Route::get('/show/{id}', [ProjectDesignReportController::class, 'show'])->name('projectdesignreport.show');
    //     Route::get('/download/{id}', [ProjectDesignReportController::class, 'download'])->name('projectdesignreport.download');
    // });

    //Project Design Report
    Route::prefix('projectdesignreport')->middleware('auth')->group(function () {
    Route::get('/', [ProjectDesignReportController::class, 'index'])
        ->name('projectdesignreport.index')
        ->middleware('check.permission:projectdesignreport,view');

    Route::get('/create', [ProjectDesignReportController::class, 'create'])
        ->name('projectdesignreport.create')
        ->middleware('check.permission:projectdesignreport,add');

    Route::post('/store', [ProjectDesignReportController::class, 'store'])
        ->name('projectdesignreport.store')
        ->middleware('check.permission:projectdesignreport,add');

    Route::get('/show/{id}', [ProjectDesignReportController::class, 'show'])
        ->name('projectdesignreport.show')
        ->middleware('check.permission:projectdesignreport,view');

    Route::get('/download/{id}', [ProjectDesignReportController::class, 'download'])
        ->name('projectdesignreport.download')
        ->middleware('check.permission:projectdesignreport,view');
});



    //nrm training

    // Route::prefix('nrmtraining')->group(function () {
    //     // Route for listing all NRM trainings
    //     Route::get('/', [NrmController::class, 'index'])->name('nrm.index');

    //     // Route for creating a new training program (display form)
    //     Route::get('/create', [NrmController::class, 'create'])->name('nrm.create');

    //     // Route for storing a new training program
    //     Route::post('/', [NrmController::class, 'store'])->name('nrm.store');

    //     // Route for showing a specific training program
    //     Route::get('/{nrmtraining}', [NrmController::class, 'show'])->name('nrm.show');

    //     // Route for editing a specific training program (display form)
    //     Route::get('/{nrmtraining}/edit', [NrmController::class, 'edit'])->name('nrm.edit');

    //     // Route for updating a specific training program
    //     Route::put('/{nrmtraining}', [NrmController::class, 'update'])->name('nrm.update');

    //     // Route for deleting a specific training program
    //     Route::delete('/{nrmtraining}', [NrmController::class, 'destroy'])->name('nrm.destroy');

    //     // Route for searching within training programs
    //     //Route::get('/search', [NrmController::class, 'search'])->name('nrm.search');

    //     // Route for exporting training data to CSV
    //     //Route::get('/download-csv', [NrmController::class, 'downloadCsv'])->name('nrm.downloadCsv');


    //     // Route for uploading CSV and importing data
    //     Route::post('/upload-csv', [NrmController::class, 'uploadCsv'])->name('nrm.upload_csv');
    // });
    // Route::get('/download.csv', [NrmController::class, 'downloadCsv'])->name('nrmdownload.csv');
    // Route::get('/nrmtraining/search', [NrmController::class, 'search'])->name('nrm.search');
    // //Route::get('/nrmtraining/search', [NrmController::class, 'search'])->name('nrm.search');


    // // NRM Participants Routes
    // Route::prefix('nrm-participants')->group(function () {
    //     // List all participants for a specific NRM training program
    //     Route::get('/{nrm_training_id}', [NrmParticipantController::class, 'listParticipants'])
    //         ->name('nrm-participants.list');

    //     // Show the form to create a new NRM participant
    //     Route::get('/{nrm_training_id}/create', [NrmParticipantController::class, 'create'])
    //         ->name('nrm-participants.create');

    //     // Store a new participant for a specific NRM training program
    //     Route::post('/{nrm_training_id}', [NrmParticipantController::class, 'store'])
    //         ->name('nrm-participants.store');

    //     // Delete a participant from a specific NRM training program
    //     Route::delete('/{nrm_training_id}/{nrm_participant_id}', [NrmParticipantController::class, 'destroy'])
    //         ->name('nrm-participants.destroy');

    //     // Upload CSV and import NRM participants for a specific NRM training program
    //     Route::post('/{nrm_training_id}/upload-csv', [NrmParticipantController::class, 'uploadCsv'])
    //         ->name('nrm-participants.upload_csv');

    //     // Download CSV report of all NRM participants for a specific NRM training program
    //     Route::get('/{nrm_training_id}/download-csv', [NrmParticipantController::class, 'downloadCsv'])
    //         ->name('nrm-participants.download_csv');

    //     // Search within participants for a specific NRM training program
    //     Route::get('/{nrm_training_id}/search', [NrmParticipantController::class, 'search'])
    //         ->name('nrm-participants.search');
    // });



    // NRM Training Routes
    Route::prefix('nrmtraining')->middleware('auth')->group(function () {
    Route::get('/', [NrmController::class, 'index'])
        ->name('nrm.index')
        ->middleware('check.permission:nrm,view');

    Route::get('/create', [NrmController::class, 'create'])
        ->name('nrm.create')
        ->middleware('check.permission:nrm,add');

    Route::post('/', [NrmController::class, 'store'])
        ->name('nrm.store')
        ->middleware('check.permission:nrm,add');

    Route::get('/{nrmtraining}', [NrmController::class, 'show'])
        ->name('nrm.show')
        ->middleware('check.permission:nrm,view');

    Route::get('/{nrmtraining}/edit', [NrmController::class, 'edit'])
        ->name('nrm.edit')
        ->middleware('check.permission:nrm,edit');

    Route::put('/{nrmtraining}', [NrmController::class, 'update'])
        ->name('nrm.update')
        ->middleware('check.permission:nrm,edit');

    Route::delete('/{nrmtraining}', [NrmController::class, 'destroy'])
        ->name('nrm.destroy')
        ->middleware('check.permission:nrm,delete');

    Route::post('/upload-csv', [NrmController::class, 'uploadCsv'])
        ->name('nrm.upload_csv')
        ->middleware('check.permission:nrm,upload_csv');
});

Route::middleware('auth')->group(function () {
    Route::get('/download.csv', [NrmController::class, 'downloadCsv'])
        ->name('nrmdownload.csv')
        ->middleware('check.permission:nrm,view');

    Route::get('/nrmtraining/search', [NrmController::class, 'search'])
        ->name('nrm.search')
        ->middleware('check.permission:nrm,view');
});


    // NRM Participants Routes
    Route::prefix('nrm-participants')->middleware('auth')->group(function () {
    Route::get('/{nrm_training_id}', [NrmParticipantController::class, 'listParticipants'])
        ->name('nrm-participants.list')
        ->middleware('check.permission:nrm_participants,view');

    Route::get('/{nrm_training_id}/create', [NrmParticipantController::class, 'create'])
        ->name('nrm-participants.create')
        ->middleware('check.permission:nrm_participants,add');

    Route::post('/{nrm_training_id}', [NrmParticipantController::class, 'store'])
        ->name('nrm-participants.store')
        ->middleware('check.permission:nrm_participants,add');

    Route::delete('/{nrm_training_id}/{nrm_participant_id}', [NrmParticipantController::class, 'destroy'])
        ->name('nrm-participants.destroy')
        ->middleware('check.permission:nrm_participants,delete');

    Route::post('/{nrm_training_id}/upload-csv', [NrmParticipantController::class, 'uploadCsv'])
        ->name('nrm-participants.upload_csv')
        ->middleware('check.permission:nrm_participants,upload_csv');

    Route::get('/{nrm_training_id}/download-csv', [NrmParticipantController::class, 'downloadCsv'])
        ->name('nrm-participants.download_csv')
        ->middleware('check.permission:nrm_participants,view');

    Route::get('/{nrm_training_id}/search', [NrmParticipantController::class, 'search'])
        ->name('nrm-participants.search')
        ->middleware('check.permission:nrm_participants,view');
});



    //dashboard that we develop
    // Route::get('/dashboard', [BeneficiaryController::class, 'dashboard'])->name('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //staff profile

    // Route::prefix('staff_profile')->group(function () {
    //     Route::get('/', [StaffProfileController::class, 'index'])->name('staff_profile.index');        // List all profiles
    //     Route::get('/create', [StaffProfileController::class, 'create'])->name('staff_profile.create'); // Create form
    //     Route::post('/store', [StaffProfileController::class, 'store'])->name('staff_profile.store');   // Store new profile
    //     Route::get('/{staffProfile}', [StaffProfileController::class, 'show'])->name('staff_profile.show'); // View profile
    //     Route::get('/{staffProfile}/edit', [StaffProfileController::class, 'edit'])->name('staff_profile.edit'); // Edit form
    //     Route::put('/{staffProfile}', [StaffProfileController::class, 'update'])->name('staff_profile.update'); // Update profile
    //     Route::delete('/{staffProfile}', [StaffProfileController::class, 'destroy'])->name('staff_profile.destroy'); // Delete profile
    // });
    // Route::get('/staff_profile/{staffProfile}/edit', [StaffProfileController::class, 'edit'])->name('staff_profile.edit');
    // Route::put('/staff_profile/{staffProfile}', [StaffProfileController::class, 'update'])->name('staff_profile.update');
    // Route::get('/searchstaff', [StaffProfileController::class, 'search'])->name('searchstaff');
    // Route::get('/staff_profile/summary', [StaffProfileController::class, 'summary'])->name('staff_profile.summary');
    // Route::patch('/staff_profile/{staffProfile}/status', [StaffProfileController::class, 'updateStatus'])->name('staff_profile.updateStatus');
    // Route::post('/staff_profile/status/{id}', [StaffProfileController::class, 'updateStatus']);

    // View all staff profiles — for users with view access

    // Staff Profile Module Routes with Permission Middleware
    Route::prefix('staff_profile')->middleware('auth')->group(function () {
        Route::get('/', [StaffProfileController::class, 'index'])
            ->name('staff_profile.index')
            ->middleware('check.permission:staff_profile,view');

        Route::get('/create', [StaffProfileController::class, 'create'])
            ->name('staff_profile.create')
            ->middleware('check.permission:staff_profile,add');

        Route::post('/store', [StaffProfileController::class, 'store'])
            ->name('staff_profile.store')
            ->middleware('check.permission:staff_profile,add');

        Route::get('/{staffProfile}', [StaffProfileController::class, 'show'])
            ->name('staff_profile.show')
            ->middleware('check.permission:staff_profile,view');

        Route::get('/{staffProfile}/edit', [StaffProfileController::class, 'edit'])
            ->name('staff_profile.edit')
            ->middleware('check.permission:staff_profile,update');

        Route::put('/{staffProfile}', [StaffProfileController::class, 'update'])
            ->name('staff_profile.update')
            ->middleware('check.permission:staff_profile,update');

        Route::delete('/{staffProfile}', [StaffProfileController::class, 'destroy'])
            ->name('staff_profile.destroy')
            ->middleware('check.permission:staff_profile,delete');

        Route::get('/summary', [StaffProfileController::class, 'summary'])
            ->name('staff_profile.summary')
            ->middleware('check.permission:staff_profile,view');

        Route::patch('/{staffProfile}/status', [StaffProfileController::class, 'updateStatus'])
            ->name('staff_profile.updateStatus')
            ->middleware('check.permission:staff_profile,update');

        Route::post('/status/{id}', [StaffProfileController::class, 'updateStatus'])
            ->middleware('check.permission:staff_profile,update');

        Route::get('/search', [StaffProfileController::class, 'search'])
            ->name('searchstaff')
            ->middleware('check.permission:staff_profile,view');
    });



Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [UserPermissionController::class, 'index'])->name('admin.users');
    Route::get('/users/{user}/permissions', [UserPermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/users/{user}/permissions', [UserPermissionController::class, 'update'])->name('assign.permissions');
});



Route::get('/test-role', function () {
    return 'You passed the role check!';
})->middleware(['auth', 'role:admin']);

    // Route::prefix('expressions')->group(function () {
    //     Route::get('/', [EOIController::class, 'index'])->name('expressions.index');
    //     Route::get('/create', [EOIController::class, 'create'])->name('expressions.create');
    //     Route::post('/', [EOIController::class, 'store'])->name('expressions.store');
    //     Route::get('/{id}', [EOIController::class, 'show'])->name('expressions.show');
    //     Route::get('/{id}/edit', [EOIController::class, 'edit'])->name('expressions.edit');
    //     Route::put('/{id}', [EOIController::class, 'update'])->name('expressions.update');
    //     Route::delete('/{id}', [EOIController::class, 'destroy'])->name('expressions.destroy');
    // });
    // Route::patch('/expressions/{id}/update-status', [EOIController::class, 'updateStatus'])->name('expressions.updateStatus');


    // Expressions of Interest (EOI) Routes

    Route::prefix('expressions')->middleware('auth')->group(function () {
    // View all EOI records
    Route::get('/', [EOIController::class, 'index'])
        ->name('expressions.index')
        ->middleware('check.permission:expressions,view');

    Route::get('/evaluation-completed', [EOIController::class, 'evaluationCompleted'])
        ->name('expressions.evaluation-completed')
        ->middleware('check.permission:expressions,view');

    // Create form
    Route::get('/create', [EOIController::class, 'create'])
        ->name('expressions.create')
        ->middleware('check.permission:expressions,add');

    // Store new EOI
    Route::post('/', [EOIController::class, 'store'])
        ->name('expressions.store')
        ->middleware('check.permission:expressions,add');

    // Show single record
    Route::get('/{id}', [EOIController::class, 'show'])
        ->name('expressions.show')
        ->middleware('check.permission:expressions,view');

    // Edit form
    Route::get('/{id}/edit', [EOIController::class, 'edit'])
        ->name('expressions.edit')
        ->middleware('check.permission:expressions,edit');

    // Update action
    Route::put('/{id}', [EOIController::class, 'update'])
        ->name('expressions.update')
        ->middleware('check.permission:expressions,edit');

    // Delete action
    Route::delete('/{id}', [EOIController::class, 'destroy'])
        ->name('expressions.destroy')
        ->middleware('check.permission:expressions,delete');
});

// Status update route (outside the prefix group)
Route::patch('/expressions/{id}/update-status', [EOIController::class, 'updateStatus'])
    ->name('expressions.updateStatus')
    ->middleware(['auth', 'check.permission:expressions,edit']);



});

// Route::get('/dashboard', [BeneficiaryController::class, 'dashboard'])->name('dashboard');



///



//Route::get('/agriculture-data', [AgricultureDataController::class, 'index'])->name('agriculture.data');

// Route::prefix('staff_profile')->group(function () {
//     Route::get('/', [StaffProfileController::class, 'index'])->name('staff_profile.index');        // List all profiles
//     Route::get('/create', [StaffProfileController::class, 'create'])->name('staff_profile.create'); // Create form
//     Route::post('/store', [StaffProfileController::class, 'store'])->name('staff_profile.store');   // Store new profile
//     Route::get('/{staffProfile}', [StaffProfileController::class, 'show'])->name('staff_profile.show'); // View profile
//     Route::get('/{staffProfile}/edit', [StaffProfileController::class, 'edit'])->name('staff_profile.edit'); // Edit form
//     Route::put('/{staffProfile}', [StaffProfileController::class, 'update'])->name('staff_profile.update'); // Update profile
//     Route::delete('/{staffProfile}', [StaffProfileController::class, 'destroy'])->name('staff_profile.destroy'); // Delete profile
// });
// Route::get('/staff_profile/{staffProfile}/edit', [StaffProfileController::class, 'edit'])->name('staff_profile.edit');
// Route::put('/staff_profile/{staffProfile}', [StaffProfileController::class, 'update'])->name('staff_profile.update');

// Route::get('/searchstaff', [StaffProfileController::class, 'search'])->name('searchstaff');

// Route::get('/staff_profile/summary', [StaffProfileController::class, 'summary'])->name('staff_profile.summary');

//Fingerling

// Route::get('/fingerling', [FingerlingController::class, 'index'])->name('fingerling.index');
// // Route::get('/fingerlings/search-fingerling', [FingerlingController::class, 'searchFingerling'])->name('fingerling.searchFingerling');
// Route::get('/fingerling/create/{tank_id}', [FingerlingController::class, 'create'])->name('fingerling.create');
// Route::post('/fingerling/store', [FingerlingController::class, 'store'])->name('fingerling.store');
// Route::get('/fingerling/show/{tank_id}', [FingerlingController::class, 'show'])->name('fingerling.show');
// Route::delete('/fingerling/{id}', [FingerlingController::class, 'destroy'])->name('fingerling.destroy');
// // Route to show the edit form
// Route::get('/fingerling/{id}/edit', [FingerlingController::class, 'edit'])->name('fingerling.edit');

// // Route to update the fingerling record
// Route::put('/fingerling/{id}', [FingerlingController::class, 'update'])->name('fingerling.update');
// //
// Route::post('/fingerling/update-status/{tank}', [FingerlingController::class, 'updateStatus'])->name('fingerling.updateStatus');


//

//Fingerling

Route::prefix('fingerling')->middleware('auth')->group(function () {

    // View all fingerling records
    Route::get('/', [FingerlingController::class, 'index'])
        ->name('fingerling.index')
        ->middleware('check.permission:fingerling,view');

    // Create form
    Route::get('/create/{tank_id}', [FingerlingController::class, 'create'])
        ->name('fingerling.create')
        ->middleware('check.permission:fingerling,add');

    // Store new fingerling
    Route::post('/store', [FingerlingController::class, 'store'])
        ->name('fingerling.store')
        ->middleware('check.permission:fingerling,add');

    // Show tank-wise fingerling details
    Route::get('/show/{tank_id}', [FingerlingController::class, 'show'])
        ->name('fingerling.show')
        ->middleware('check.permission:fingerling,view');

    // Edit form
    Route::get('/{id}/edit', [FingerlingController::class, 'edit'])
        ->name('fingerling.edit')
        ->middleware('check.permission:fingerling,edit');

    // Update fingerling record
    Route::put('/{id}', [FingerlingController::class, 'update'])
        ->name('fingerling.update')
        ->middleware('check.permission:fingerling,edit');

    // Delete fingerling record
    Route::delete('/{id}', [FingerlingController::class, 'destroy'])
        ->name('fingerling.destroy')
        ->middleware('check.permission:fingerling,delete');

    // Update harvest status (session-only)
    Route::post('/update-status/{tank}', [FingerlingController::class, 'updateStatus'])
        ->name('fingerling.updateStatus')
        ->middleware('check.permission:fingerling,edit');

});

Route::get('/eoi/get-categories/{title}', [BeneficiaryController::class, 'getCategoriesByBusinessTitle'])
    ->name('beneficiary.eoi.categories')
    ->middleware('check.permission:beneficiary,view');

Route::get('/eoi/{id}/beneficiaries', [EOIController::class, 'viewEOIBeneficiaries'])
    ->name('eoi.beneficiaries') // This must match the name used in Blade
    ->middleware('check.permission:beneficiary,view');

Route::get('/eoi/completed', [EOIController::class, 'evaluationCompleted'])
    ->name('expressions.evaluation_completed')
    ->middleware('check.permission:beneficiary,view');

    Route::get('/eoi/add/{id}', [EOIController::class, 'createForBeneficiary'])
    ->name('beneficiary.eoi.add')
    ->middleware('check.permission:beneficiary,add');



Route::get('/eoi-form/create/{beneficiary_id}', [EOIBeneficiaryController::class, 'create'])
    ->name('eoi_form.create');

    Route::post('/eoi-form/store', [EOIBeneficiaryController::class, 'store'])->name('eoi_form.store');

   Route::get('/eoi-form/show/{beneficiary_id}', [EOIBeneficiaryController::class, 'show'])->name('eoi_form.show');

// Add this to web.php
Route::get('/eoi-form/edit/{id}', [EOIBeneficiaryController::class, 'edit'])->name('eoi_form.edit');

// Route::put('/eoi-form/update/{id}', [EOIBeneficiaryController::class, 'update'])->name('eoi_form.update');
Route::put('/eoi-form/{id}', [EOIBeneficiaryController::class, 'update'])->name('eoi_form.update');

Route::delete('/eoi-form/destroy/{id}', [EOIBeneficiaryController::class, 'destroy'])->name('eoi_form.destroy');


//Nutrient Rich Home Garden Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/nutrient-home', [NutrientRichHomeGardenController::class, 'index'])
        ->name('nutrient-home.index')
        ->middleware('check.permission:nutrient_rich_home_garden,view');

    Route::get('/nutrient-home/create/{beneficiaryId}', [NutrientRichHomeGardenController::class, 'create'])
        ->name('nutrient-home.create')
        ->middleware('check.permission:nutrient_rich_home_garden,add');

    Route::post('/nutrient-home/store', [NutrientRichHomeGardenController::class, 'store'])
        ->name('nutrient-home.store')
        ->middleware('check.permission:nutrient_rich_home_garden,add');

    Route::get('/nutrient-home/{id}/edit', [NutrientRichHomeGardenController::class, 'edit'])
        ->name('nutrient-home.edit')
        ->middleware('check.permission:nutrient_rich_home_garden,edit');

    Route::put('/nutrient-home/{id}', [NutrientRichHomeGardenController::class, 'update'])
        ->name('nutrient-home.update')
        ->middleware('check.permission:nutrient_rich_home_garden,edit');

    Route::delete('/nutrient-home/{id}', [NutrientRichHomeGardenController::class, 'destroy'])
        ->name('nutrient-home.destroy')
        ->middleware('check.permission:nutrient_rich_home_garden,delete');

    Route::get('/nutrient-home/{id}', [NutrientRichHomeGardenController::class, 'show'])
        ->name('nutrient-home.show')
        ->middleware('check.permission:nutrient_rich_home_garden,view');
});


//Progress Report Routes
Route::middleware(['auth'])->group(function () {
    // Hub
    Route::get('/progress', [ProgressReportController::class,'index'])->name('progress.index');

    // Monthly
    Route::get('/progress/monthly', [ProgressReportController::class,'monthlyIndex'])->name('progress.monthly.index');
    Route::get('/progress/monthly/create', [ProgressReportController::class,'monthlyCreate'])->name('progress.monthly.create');
    Route::post('/progress/monthly', [ProgressReportController::class,'monthlyStore'])->name('progress.monthly.store');

    // Quarterly
    Route::get('/progress/quarterly', [ProgressReportController::class,'quarterlyIndex'])->name('progress.quarterly.index');
    Route::get('/progress/quarterly/create', [ProgressReportController::class,'quarterlyCreate'])->name('progress.quarterly.create');
    Route::post('/progress/quarterly', [ProgressReportController::class,'quarterlyStore'])->name('progress.quarterly.store');

    // Annual
    Route::get('/progress/annual', [ProgressReportController::class,'annualIndex'])->name('progress.annual.index');
    Route::get('/progress/annual/create', [ProgressReportController::class,'annualCreate'])->name('progress.annual.create');
    Route::post('/progress/annual', [ProgressReportController::class,'annualStore'])->name('progress.annual.store');

    // File actions
    Route::get('/progress/file/{report}/view', [ProgressReportController::class,'viewFile'])->name('progress.file.view');
    Route::get('/progress/file/{report}/download', [ProgressReportController::class,'downloadFile'])->name('progress.file.download');
});



Route::patch('/staff_profile/{staffProfile}/status', [StaffProfileController::class, 'updateStatus'])->name('staff_profile.updateStatus');
Route::post('/staff_profile/status/{id}', [StaffProfileController::class, 'updateStatus']);




//Youth Enterprise

// Show list of all beneficiaries to link Youth Enterprise
Route::get('/youth', [YouthController::class, 'index'])->name('youth.index');

// Show form to create Youth Enterprise details for a beneficiary
Route::get('/youth/create/{beneficiary_id}', [YouthController::class, 'create'])->name('youth.create');

// Handle storing the submitted Youth Enterprise data
Route::post('/youth/store', [YouthController::class, 'store'])->name('youth.store');

Route::get('/youth/{id}/show', [YouthController::class, 'show'])->name('youth.show');

Route::get('/youth/{id}/edit', [YouthController::class, 'edit'])->name('youth.edit');
Route::put('/youth/{id}', [YouthController::class, 'update'])->name('youth.update');

Route::delete('/youth/{id}', [YouthController::class, 'destroy'])->name('youth.destroy');







//Youth Proposal

Route::resource('youth-proposals', YouthProposalController::class);
Route::patch('/youth-proposals/update-status/{id}', [YouthProposalController::class, 'updateStatus'])->name('youth-proposals.updateStatus');
Route::get('/youth-proposal/agreement-signed', [YouthProposalController::class, 'agreementSigned'])->name('youth-proposal.agreementSigned');

Route::get('/youth-proposals/{id}/beneficiaries', [YouthProposalController::class, 'showBeneficiaries'])->name('youth-proposals.beneficiaries');

Route::resource('agro-forest', AgroForestController::class);

// Logframe Main Routes
Route::get('/logframe', function () {
    return view('logframe.index');
})->name('logframe.index');


// Logframe Tank Routes
Route::get('/logframe/tanks',        [LogframeController::class, 'index'])->name('logframe.tanks.index');
Route::get('/logframe/tanks/create', [LogframeController::class, 'create'])->name('logframe.tanks.create');
Route::post('/logframe/tanks',       [LogframeController::class, 'store'])->name('logframe.tanks.store');
Route::delete('/logframe/tanks/{indicatorKey}', [LogframeController::class, 'destroy'])->name('logframe.tanks.destroy');

// Logframe Project Goal Routes
Route::get('/logframe/project-goal',        [ProjectGoalController::class, 'index'])->name('logframe.project-goal.index');
Route::get('/logframe/project-goal/create', [ProjectGoalController::class, 'create'])->name('logframe.project-goal.create');
Route::post('/logframe/project-goal',       [ProjectGoalController::class, 'store'])->name('logframe.project-goal.store');

// Logframe Indicator API routes
Route::prefix('api/logframe')->group(function () {
    Route::get('/indicators/{sectionKey}', [LogframeIndicatorController::class, 'getBySection'])->name('logframe.indicators.by-section');
    Route::get('/indicators', [LogframeIndicatorController::class, 'getAllForDisplay'])->name('logframe.indicators.all');
    Route::get('/indicators/{id}', [LogframeIndicatorController::class, 'show'])->name('logframe.indicators.show');
    Route::post('/indicators', [LogframeIndicatorController::class, 'store'])->name('logframe.indicators.store');
    Route::put('/indicators/{id}', [LogframeIndicatorController::class, 'update'])->name('logframe.indicators.update');
    Route::put('/indicators/{id}/year-data', [LogframeIndicatorController::class, 'updateYearData'])->name('logframe.indicators.update-year');
    Route::put('/indicators/{id}/meta', [LogframeIndicatorController::class, 'updateMeta'])->name('logframe.indicators.update-meta');
    Route::delete('/indicators/{id}', [LogframeIndicatorController::class, 'destroy'])->name('logframe.indicators.destroy');
});

Route::get('/gn-divisions', [GNDivisionController::class, 'getAll'])
    ->name('gn.divisions.all');