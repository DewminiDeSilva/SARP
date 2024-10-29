<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DSDivisionController;
use App\Http\Controllers\GNDivisionController;
use App\Http\Controllers\TankRehabilitationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TankController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ASCController;
use App\Http\Controllers\AscRegistrationController;
use App\Http\Controllers\CascadesController;
use App\Models\Beneficiary;
use App\Http\Controllers\CDFController;
use App\Http\Controllers\CDFMemberController;
use App\Http\Controllers\FarmerOrganizationController;
use App\Http\Controllers\FarmerMemberController;
use App\Models\FarmerOrganization;
use App\Http\Controllers\GrievanceController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\VegitableController;
use App\Http\Controllers\FruitController;
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
use App\Models\Nutrition;
use App\Http\Controllers\FFSTrainingController;
use App\Http\Controllers\FFSParticipantController;
use App\Http\Controllers\BeneFormController;
use App\Http\Controllers\NrmController;
use App\Http\Controllers\NrmParticipantController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    $maleCount = Beneficiary::where('gender', 'male')->count();
    $femaleCount = Beneficiary::where('gender', 'female')->count();
    $youthCount = Beneficiary::where('age','<', 30)->count();
    $middleAgeCount = Beneficiary::where('age','>=', 30)->count();

    return view('dashboard.dashboard', compact('maleCount', 'femaleCount', 'youthCount', 'middleAgeCount'));
});

Route::resource('beneficiary', BeneficiaryController::class);

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});
Route::get('/in', function () {
    return view('dashboard.dashboardC');
});
Route::get('/Training', function () {
    return view('training.training_program');
});

Route::get('family/create/{beneficiaryId}', [FamilyController::class, 'create'])->name('family/create');
Route::resource('family', FamilyController::class);

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
//Route::get('reportCsv', [TankRehabilitationController::class, 'reportCsv'])->name('downloadtank.csv');

Route::get('generateCsv', [BeneficiaryController::class, 'generateCsv'])->name('download.csv');
Route::resource('training', TrainingController::class);
Route::get('/downloadtraining.csv', [TrainingController::class, 'downloadCsv'])->name('downloadtraining.csv');
Route::post('/training/upload_csv', [TrainingController::class, 'uploadCsv'])->name('training.upload_csv');
Route::get('/searchTraining', [TrainingController::class, 'search'])->name('searchTraining');

Route::get('search', [BeneficiaryController::class, 'search'])->name('search');
Route::get('searchTank', [TankRehabilitationController::class, 'search'])->name('searchTank');
Route::get('/tank_rehabilitation', [TankRehabilitationController::class, 'index'])->name('tank_rehabilitation.index');
Route::get('/searchTank', [TankRehabilitationController::class, 'search'])->name('searchTank');


Route::get('/download-farmer-organization-csv', [FarmerOrganizationController::class, 'reportCsv'])->name('downloadfarmerorganization.csv');
Route::post('/farmerorganization/upload-csv', [FarmerOrganizationController::class, 'uploadCsv'])->name('farmerorganization.upload_csv');
Route::get('/farmerorganization/search', [FarmerOrganizationController::class, 'search'])->name('searchFarmerOrganization');
Route::resource('farmerorganization', FarmerOrganizationController::class);

Route::resource('farmermember', FarmerMemberController::class);
Route::get('farmermember/create/{farmerorganization_id}', [FarmerMemberController::class, 'create']);
Route::get('farmermember/create/{farmermember_id}', [FarmerMemberController::class, 'create'])->name('farmermember.create');
Route::get('farmer_member/{id}', [FarmerMemberController::class, 'show'])->name('farmer_member.show');
Route::get('/farmerorganization/{id}', [FarmerOrganizationController::class, 'show'])->name('farmerorganization.show');
Route::resource('farmer_member', FarmerMemberController::class);

Route::resource('cdf', CdfController::class);
Route::post('/cdf/upload-csv', [CdfController::class, 'uploadCsv'])->name('cdf.upload_csv');
Route::get('/download-cdf-csv', [CdfController::class, 'reportCsv'])->name('downloadcdf.csv');
Route::get('searchCDF', [CdfController::class, 'search'])->name('searchCDF');
Route::get('cdfs/{cdf}', [CDFController::class, 'show'])->name('cdfs.show');

Route::resource('cdfmembers', CDFMemberController::class);
Route::get('/cdfmembers', [CdfMemberController::class, 'index'])->name('cdfmembers.index');
Route::get('/cdfmembers/{id}', [CdfMemberController::class, 'show']);
Route::get('/cdfmembers/{id}/samearea', [CdfMemberController::class, 'showMembersInSameArea'])->name('cdfmembers.samearea');
Route::get('/cdfmembers/name/{name}/samearea', [CdfMemberController::class, 'showMembersInSameAreaByName'])->name('cdfmembers.samearea.name');
Route::get('/cdf/{cdf_name}/{cdf_address}/members', [CDFController::class, 'showMembers'])->name('cdf.showMembers');
Route::get('/cdf-members/{cdf_name}/{cdf_address}', [CDFController::class, 'showMembers']);

Route::get('/asc', [ASCController::class, 'index']);
Route::resource('asc_registration', AscRegistrationController::class);
Route::get('searchASC', [AscRegistrationController::class, 'search'])->name('searchASC');
Route::get('/downloadAscCsv', [AscRegistrationController::class, 'reportCsv'])->name('downloadAscCsv');
Route::post('/uploadAscCsv', [AscRegistrationController::class, 'uploadCsv'])->name('uploadAscCsv');

Route::resource('grievances', GrievanceController::class);

Route::get('grievances/report/csv', [GrievanceController::class, 'reportCsv'])->name('grievances.report.csv');
Route::post('grievances/upload_csv', [GrievanceController::class, 'uploadCsv'])->name('grievances.upload_csv');
//Route::get('/grievances/search', [GrievanceController::class, 'search'])->name('grievances.search');
// Route for grievances search
Route::get('/searchGrievances', [GrievanceController::class, 'search'])->name('searchGrievances');

// Officer routes
Route::get('/grievances/{grievance}/officer/create', [OfficerController::class, 'create'])->name('officer.create');
Route::post('/grievances/{grievance}/officer', [OfficerController::class, 'store'])->name('officer.store');
Route::get('/grievances/{grievance}/officers', [OfficerController::class, 'showOfficers'])->name('grievance.officers');

//Participants
Route::get('/training/{trainingId}/participants', [ParticipantController::class, 'listParticipants'])->name('participants.list');
Route::get('/training/{trainingId}/participants/create', [ParticipantController::class, 'create'])->name('participants.create');
Route::post('/training/{trainingId}/participants', [ParticipantController::class, 'store'])->name('participants.store');
Route::delete('training/{trainingId}/participants/{participantId}', [ParticipantController::class, 'destroy'])->name('participants.destroy');
Route::post('training/{trainingId}/participants/upload_csv', [ParticipantController::class, 'uploadCsv'])->name('participants.upload_csv');
Route::get('training/{trainingId}/participants/download_csv', [ParticipantController::class, 'downloadCsv'])->name('participants.download_csv');
Route::get('training/{trainingId}/participants/search', [ParticipantController::class, 'listParticipants'])->name('participants.search');


// Vegitable Routes
Route::resource('vegitable', VegitableController::class);

// Fruit Routes
Route::resource('fruit', FruitController::class);

// Homegarden Routes
Route::resource('homegarden', HomeGardenController::class);

// Dairy Routes
Route::resource('dairy', DairyController::class);

// Poultary Routes
Route::resource('poultary', PoultaryController::class);

// Goat Routes
Route::resource('goat', GoatController::class);

// Goat Routes
Route::resource('aquaculture', AquaCultureController::class);


Route::get('/agri', function () {
    return view('vegitable_dairy.agriculture');
})->name('agri');

Route::get('/lstock', function () {
    return view('vegitable_dairy.livestock');
})->name('livestock');


//Beneficiary List

Route::get('/beneficiaries/list', [BeneficiaryController::class, 'list'])->name('beneficiary.list');




// Routes for AgricultureData
Route::get('/agriculture', [AgriController::class, 'index'])->name('agriculture.index');
Route::post('/agriculture', [AgriController::class, 'store'])->name('agriculture.store');
//Route::get('agriculture/{agricultureData}', [AgriController::class, 'show'])->name('agriculture.show');
Route::get('agriculture/beneficiary/{beneficiaryId}', [AgriController::class, 'showByBeneficiary'])->name('agriculture.showByBeneficiary');
Route::get('/agriculture/create/{beneficiaryId?}', [AgriController::class, 'create'])->name('agriculture.create');
Route::get('/crops-by-gn-division/{gnDivision}', [AgriController::class, 'cropsByGnDivision'])->name('crops.by.gn.division');
Route::get('/crops-by-gn-division/{gn_division_id}', [AgriController::class, 'cropsByGnDivision'])->name('crops.by.gn.division');
Route::get('/get-gn-division-name/{beneficiaryId}', [AgriController::class, 'getGnDivisionName']);
Route::get('/agriculture/{id}/edit', [AgriController::class, 'edit'])->name('agriculture.edit');
Route::delete('/agriculture/{id}', [AgriController::class, 'destroy'])->name('agriculture.destroy');
Route::put('/agriculture/{id}', [AgriController::class, 'update'])->name('agriculture.update');
Route::get('/agriculture/search', [AgriController::class, 'search'])->name('agriculture.search');

//livestock


Route::get('/livestocks/{beneficiary_id}', [LivestockController::class, 'listLivestock'])->name('livestock.list');
Route::get('/livestocks/create/{beneficiary_id}', [LivestockController::class, 'create'])->name('livestocks.create');
Route::post('/livestocks/store', [LivestockController::class, 'store'])->name('livestocks.store');
Route::get('/livestocks/gn-division/{beneficiary_id}', [LivestockController::class, 'getGnDivisionName'])->name('livestock.getGnDivisionName');
//Route::get('/livestocks/{beneficiary_id}/{livestock}/edit', [LivestockController::class, 'edit'])->name('livestocks.edit');
//Route::put('/livestocks/{beneficiary_id}/{livestock}', [LivestockController::class, 'update'])->name('livestocks.update');
Route::delete('/livestocks/{beneficiary_id}/{livestock}', [LivestockController::class, 'destroy'])->name('livestocks.destroy');
Route::put('/livestock/{id}', [LivestockController::class, 'update'])->name('livestock.update');
Route::get('/livestock/{id}/edit', [LivestockController::class, 'edit'])->name('livestocks.edit');
Route::put('/livestock/{id}', [LivestockController::class, 'update'])->name('livestocks.update');
Route::get('/livestocks/{beneficiary_id}/{livestock}/edit', [LivestockController::class, 'edit'])->name('livestocks.edit');
Route::delete('/livestocks/{livestock}', [LivestockController::class, 'destroy'])->name('livestocks.destroy');
Route::delete('/livestocks/{beneficiary_id}/{livestock}', [LivestockController::class, 'destroy'])->name('livestocks.destroy');
//Route::get('/livestocks', [LivestockController::class, 'index'])->name('livestock.livestock_index');
Route::get('/livestocks', [LivestockController::class, 'index'])->name('livestocks.index');
Route::get('/livestocks/{beneficiary_id}', [LivestockController::class, 'listLivestock'])->name('livestocks.list');
Route::put('/livestocks/{id}', [LivestockController::class, 'update'])->name('livestocks.update');
Route::delete('/livestocks/{livestock_id}', [LivestockController::class, 'destroy'])->name('livestocks.destroy');

Route::get('/livestocks/get-production-focus/{type}', [LivestockController::class, 'getProductionFocusByLivestockType']);

//Route::post('/get-production-focus-options', [LivestockController::class, 'getProductionFocusOptions']);


//Agro
Route::resource('agro', AgroController::class);
// Routes for Agro PDF Upload and View
Route::resource('agro', AgroController::class);
Route::post('agro/{agro}/upload-pdf', [AgroController::class, 'uploadPdf'])->name('agro.upload_pdf');
Route::get('agro/{agro}/view-pdf', [AgroController::class, 'viewPdf'])->name('agro.view_pdf');

//Shareholder
// Shareholder Routes
Route::get('agro/{agroId}/shareholders/create', [ShareholderController::class, 'create'])->name('shareholder.create');
Route::post('agro/{agroId}/shareholders', [ShareholderController::class, 'store'])->name('shareholder.store');
Route::get('agro/{agroId}/shareholders', [ShareholderController::class, 'show'])->name('shareholder.view');
Route::get('shareholders/{id}/edit', [ShareholderController::class, 'edit'])->name('shareholder.edit');
Route::put('shareholders/{id}', [ShareholderController::class, 'update'])->name('shareholder.update');
Route::delete('shareholders/{id}', [ShareholderController::class, 'destroy'])->name('shareholder.destroy');

//Infrastructure

Route::resource('infrastructure', InfrastructureController::class);
Route::get('reportInfrastructureCsv', [InfrastructureController::class, 'reportCsv'])->name('downloadInfrastructure.csv');
Route::post('/infrastructure/upload_csv', [InfrastructureController::class, 'uploadCsv'])->name('infrastructure.upload_csv');
Route::get('searchInfrastructure', [InfrastructureController::class, 'search'])->name('searchInfrastructure');


// Nutrition Routes
Route::resource('nutrition', NutritionController::class);

// Custom routes for CSV downloads and searches if needed
Route::get('/nutrition/download-csv', [NutritionController::class, 'downloadCsv'])->name('nutrition.download_csv');
Route::post('/nutrition/upload-csv', [NutritionController::class, 'uploadCsv'])->name('nutrition.upload_csv');
Route::get('/searchNutrition', [NutritionController::class, 'search'])->name('nutrition.search');


// NutritionTrainee routes
Route::resource('nutrition_trainee', NutritionTraineeController::class);
Route::get('nutrition/{nutrition_id}/trainees', [NutritionTraineeController::class, 'index'])->name('nutrition_trainees.index');


// The resource method will automatically generate the following routes for the NutritionTrainee:

// GET     /nutrition_trainee            => index (List all trainees)
// GET     /nutrition_trainee/create     => create (Show form to create a new trainee)
// POST    /nutrition_trainee            => store (Store the new trainee data)
// GET     /nutrition_trainee/{id}       => show (Show details of a specific trainee)
// GET     /nutrition_trainee/{id}/edit  => edit (Show form to edit trainee)
// PUT     /nutrition_trainee/{id}       => update (Update the trainee data)
// DELETE  /nutrition_trainee/{id}       => destroy (Delete a specific trainee)


Route::resource('nutrition', NutritionController::class);
Route::get('nutrition/{nutrition}/trainees', [NutritionTraineeController::class, 'index'])->name('nutrition_trainee.index');
Route::get('nutrition/{nutrition}/trainees/create', [NutritionTraineeController::class, 'create'])->name('nutrition_trainee.create');
Route::post('nutrition/trainees', [NutritionTraineeController::class, 'store'])->name('nutrition_trainee.store');
Route::get('nutrition/trainees/{trainee}/edit', [NutritionTraineeController::class, 'edit'])->name('nutrition_trainee.edit');
Route::put('nutrition/trainees/{trainee}', [NutritionTraineeController::class, 'update'])->name('nutrition_trainee.update');
Route::delete('nutrition/trainees/{trainee}', [NutritionTraineeController::class, 'destroy'])->name('nutrition_trainee.destroy');
Route::get('/nutrition/create', [NutritionController::class, 'create'])->name('nutrition.create');

Route::post('/nutrition/upload-csv', [NutritionController::class, 'uploadCsv'])->name('nutrition.upload_csv');




Route::get('/nutrition/{nutrition_id}/trainees', [NutritionTraineeController::class, 'index'])->name('nutrition_trainee.index');
Route::get('/nutrition/{nutrition_id}/trainees/create', [NutritionTraineeController::class, 'create'])->name('nutrition_trainee.create');
Route::get('/nutrition/{nutrition_id}/trainees', [NutritionTraineeController::class, 'index'])->name('nutrition_trainee.trainee_index');
Route::get('/nutrition/{nutrition_id}/trainees', [NutritionTraineeController::class, 'index'])->name('nutrition_trainee.trainee_index');

Route::put('/nutrition_trainee/{id}', [NutritionTraineeController::class, 'update'])->name('nutrition_trainee.update');

Route::resource('ffs-training', FFSTrainingController::class);
// CSV Download for FFS Training Program
Route::get('/bene-form/search', [BeneFormController::class, 'search'])->name('bene-form.search');

Route::get('/searchffs-training', [FFSTrainingController::class, 'search'])->name('searchFFSTraining');

Route::get('/ffs-trainingdownload.csv', [FFSTrainingController::class, 'downloadCsv'])->name('downloadffs-training.csv');

// CSV Upload for FFS Training Program
Route::post('/ffs-training/upload_csv', [FFSTrainingController::class, 'uploadCsv'])->name('ffs-training.upload_csv');
//Route::get('ffs-training/download-csv', [FFSTrainingController::class, 'downloadCsv'])->name('downloadffs-training.csv');

// CSV Upload for FFS Training Program
//Route::post('ffs-training/upload-csv', [FFSTrainingController::class, 'uploadCsv'])->name('ffs-training.upload_csv');

// FFS Training Participants Management (if applicable)
Route::get('ffs-training/{ffsTraining}/participants', [FFSTrainingController::class, 'showParticipants'])->name('ffs-participants.list');
Route::get('ffs-training/{ffsTraining}/participants/create', [FFSTrainingController::class, 'createParticipant'])->name('ffs-participants.create');
//Route::get('/ffs-training/search', [FFSTrainingController::class, 'search'])->name('searchFFSTraining');

Route::get('reportCsv', [TankRehabilitationController::class, 'reportCsv'])->name('downloadtank.csv');
Route::post('/tank_rehabilitation/upload-csv', [TankRehabilitationController::class, 'uploadCsv'])->name('tank_rehabilitation.upload_csv');

//Route::get('/nutrition/download-csv', [NutritionController::class, 'downloadCsv'])->name('nutrition.download_csv');

//////


Route::get('reportCsv', [TankRehabilitationController::class, 'reportCsv'])->name('downloadtank.csv');
Route::get('reportCsv1', [NutritionController::class, 'reportCsv1'])->name('downloadnutrition.csv');


// FFS Participant Routes

Route::prefix('ffs-training/{ffs_training_id}/ffs-participants')->group(function () {
    Route::get('/', [FFSParticipantController::class, 'listParticipants'])->name('ffs-participants.list');
    Route::get('/create', [FFSParticipantController::class, 'create'])->name('ffs-participants.create');
    Route::post('/', [FFSParticipantController::class, 'store'])->name('ffs-participants.store');
    Route::delete('/{ffs_participant_id}', [FFSParticipantController::class, 'destroy'])->name('ffs-participants.destroy');
    Route::get('/download-csv', [FFSParticipantController::class, 'downloadCsv'])->name('ffs-participants.download_csv');
    //Route::get('/ffs-trainingdownload.csv', [FFSTrainingController::class, 'downloadCsv'])->name('downloadffs-training.csv');
    Route::post('/upload-csv', [FFSParticipantController::class, 'uploadCsv'])->name('ffs-participants.upload_csv');
    Route::get('/search', [FFSParticipantController::class, 'listParticipants'])->name('ffs-participants.search');


});

//bene_form
Route::resource('bene-form', BeneFormController::class);

//Route::get('/bene-form/search', [BeneFormController::class, 'search'])->name('bene-form.search');



Route::get('/bene', function () {
    return view('bene_form.bene');
});

Route::prefix('nrmtraining')->group(function () {
    // Route for listing all NRM trainings
    Route::get('/', [NrmController::class, 'index'])->name('nrm.index');

    // Route for creating a new training program (display form)
    Route::get('/create', [NrmController::class, 'create'])->name('nrm.create');

    // Route for storing a new training program
    Route::post('/', [NrmController::class, 'store'])->name('nrm.store');

    // Route for showing a specific training program
    Route::get('/{nrmtraining}', [NrmController::class, 'show'])->name('nrm.show');

    // Route for editing a specific training program (display form)
    Route::get('/{nrmtraining}/edit', [NrmController::class, 'edit'])->name('nrm.edit');

    // Route for updating a specific training program
    Route::put('/{nrmtraining}', [NrmController::class, 'update'])->name('nrm.update');

    // Route for deleting a specific training program
    Route::delete('/{nrmtraining}', [NrmController::class, 'destroy'])->name('nrm.destroy');

    // Route for searching within training programs
    //Route::get('/search', [NrmController::class, 'search'])->name('nrm.search');

    // Route for exporting training data to CSV
    //Route::get('/download-csv', [NrmController::class, 'downloadCsv'])->name('nrm.downloadCsv');


    // Route for uploading CSV and importing data
    Route::post('/upload-csv', [NrmController::class, 'uploadCsv'])->name('nrm.upload_csv');
});
Route::get('/download.csv', [NrmController::class, 'downloadCsv'])->name('nrmdownload.csv');
//Route::get('/nrmtraining/search', [NrmController::class, 'search'])->name('nrm.search');



// NRM Participants Routes
Route::prefix('nrm-participants')->group(function () {
    // List all participants for a specific NRM training program
    Route::get('/{nrm_training_id}', [NrmParticipantController::class, 'listParticipants'])
        ->name('nrm-participants.list');

    // Show the form to create a new NRM participant
    Route::get('/{nrm_training_id}/create', [NrmParticipantController::class, 'create'])
        ->name('nrm-participants.create');

    // Store a new participant for a specific NRM training program
    Route::post('/{nrm_training_id}', [NrmParticipantController::class, 'store'])
        ->name('nrm-participants.store');

    // Delete a participant from a specific NRM training program
    Route::delete('/{nrm_training_id}/{nrm_participant_id}', [NrmParticipantController::class, 'destroy'])
        ->name('nrm-participants.destroy');

    // Upload CSV and import NRM participants for a specific NRM training program
    Route::post('/{nrm_training_id}/upload-csv', [NrmParticipantController::class, 'uploadCsv'])
        ->name('nrm-participants.upload_csv');

    // Download CSV report of all NRM participants for a specific NRM training program
    Route::get('/{nrm_training_id}/download-csv', [NrmParticipantController::class, 'downloadCsv'])
        ->name('nrm-participants.download_csv');

    // Search within participants for a specific NRM training program
    Route::get('/{nrm_training_id}/search', [NrmParticipantController::class, 'search'])
        ->name('nrm-participants.search');
});

//Route::get('/nrmtraining', [NrmController::class, 'index'])->name('nrm-training.index');
//Route::get('/nrmtraining/search', [NrmController::class, 'search'])->name('nrm-training.search');
Route::get('/nrmtraining/search', [NrmController::class, 'search'])->name('nrm.search');


//benificiary

Route::prefix('beneficiary')->name('beneficiary.')->group(function () {
    Route::get('/', [BeneficiaryController::class, 'index'])->name('index');
    Route::get('/create', [BeneficiaryController::class, 'create'])->name('create');
    Route::post('/', [BeneficiaryController::class, 'store'])->name('store');
    Route::get('/{beneficiary}', [BeneficiaryController::class, 'show'])->name('show');
    Route::get('/{beneficiary}/edit', [BeneficiaryController::class, 'edit'])->name('edit');
    Route::put('/{beneficiary}', [BeneficiaryController::class, 'update'])->name('update');
    Route::delete('/{beneficiary}', [BeneficiaryController::class, 'destroy'])->name('destroy');
    Route::get('/search', [BeneficiaryController::class, 'search'])->name('search');
    Route::post('/upload-csv', [BeneficiaryController::class, 'uploadCsv'])->name('uploadCsv');
    Route::get('/generate-csv', [BeneficiaryController::class, 'generateCsv'])->name('generateCsv');
    Route::get('/report-csv', [BeneficiaryController::class, 'reportCsv'])->name('reportCsv');
    Route::get('/list', [BeneficiaryController::class, 'list'])->name('list');
});

Route::get('/dashboard', [BeneficiaryController::class, 'dashboard'])->name('dashboard');


///