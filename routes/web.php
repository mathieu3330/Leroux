<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ImageController;

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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/security', [ChecklistController::class, 'echafaudage'])->name('security');
    Route::post('/send-pdf', [ChecklistController::class, 'sendPdf'])->name('send-pdf');
    Route::view('/reception', 'reception')->name('reception');
    Route::get('/support', [ChecklistController::class, 'receptionCharpente'])->name('support');
    Route::get('/reception', [ChecklistController::class, 'receptionTravaux'])->name('reception');
    Route::get('/outillage', [ChecklistController::class, 'outillage'])->name('outillage');
    Route::get('/affectation', [ChecklistController::class, 'affectation'])->name('affectation');
    Route::get('/retour', [ChecklistController::class, 'retour'])->name('retour');
    Route::post('/submit-outillage', [ChecklistController::class, 'processOutillageForm'])->name('processOutillageForm');

    Route::get('/receptionSupport', [ChecklistController::class, 'receptionSupport'])->name('receptionSupport');

    Route::view('/question-receptionSupport', 'question-receptionSupport')->name('question');
    Route::view('/question-echafaudage', 'question-echafaudage')->name('question');
    Route::view('/question-projet', 'question-projet')->name('question');
    Route::view('/question-reception', 'question-reception')->name('question');
    Route::view('/question-support', 'question-support')->name('question');
    Route::view('/question-receptionTravaux', 'question-receptionTravaux')->name('question');
    Route::post('/upload-image', [ImageController::class, 'upload'])->name('upload.image');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('store-form', [ChecklistController::class, 'index']);
//Route::post('add-blog-post-form', [ChecklistController::class, 'store']);
Route::get('add-blog-post-form',  [ChecklistController::class,'store'])->name('storeResponse');

Route::get('/checklist/store/response', [ChecklistController::class,'store_response'])->name('storeResponse');


require __DIR__.'/auth.php';
