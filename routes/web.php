<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registerr', function () {
    return view('registerr');
});
Route::get('/loginn', function () {
    return view('loginn');
});
Route::get('/forgot-passwordd', function () {
    return view('forgot-passwordd');
});

Route::post('/userbac',[\App\Http\Controllers\StudentController::class,"store"])->name("user.bac");
Route::get('/eleves',[\App\Http\Controllers\StudentController::class,"index"])->name("students");
Route::get('/eleves/create',[\App\Http\Controllers\StudentController::class,"create"])->name("students.create");
Route::post('/eleves/create',[\App\Http\Controllers\StudentController::class,"store"])->name("students.store");
Route::get('/eleves/update/{student}',[\App\Http\Controllers\StudentController::class,"edit"])->name("students.edit");
Route::put('/eleves/update/{student}',[\App\Http\Controllers\StudentController::class,"update"])->name("students.update");
Route::delete('/eleves/delete/{student}',[\App\Http\Controllers\StudentController::class,"destroy"])->name("students.delete");
/********************************************************************************************************************************************/
Route::get('/enseignants',[\App\Http\Controllers\TeacherController::class,"index"])->name("teachers");
Route::post('/enseignants/create',[\App\Http\Controllers\TeacherController::class,"store"])->name("teachers.store");

/********************************************************************************************************************************************/
Route::get('/chat',[\App\Http\Controllers\ChatController::class,"index"])->name("chat");
Route::get('/chat/getMessage/{chatbox_id}',[\App\Http\Controllers\ChatController::class,"getMessage"])->name("chat.getmessage");
Route::post('/chat/sendMessage',[\App\Http\Controllers\ChatController::class,"sendMessage"])->name("chat.sendmessage");
Route::post('/chat/getBox',[\App\Http\Controllers\ChatController::class,"getBox"])->name("chat.getBox");
Route::post('/chat/getChatBox',[\App\Http\Controllers\ChatController::class,"getChatBox"])->name("chat.getChatBox");
/********************************************************************************************************************************************/
Route::get('/admin/reclamations',[\App\Http\Controllers\ReclamationController::class,"index"])->name("recadmin");
Route::get('/reclamations',[\App\Http\Controllers\ReclamationController::class,"mesreclamations"])->name("mesreclamations");
Route::get('/reclamations/create',[\App\Http\Controllers\ReclamationController::class,"create"])->name("reclamation.create");
Route::post('/reclamationajouter',[\App\Http\Controllers\ReclamationController::class,"store"])->name("reclamation.store");
Route::get('/reclamations/update/{reclamation}',[\App\Http\Controllers\ReclamationController::class,"edit"])->name("reclamation.edit");
Route::post('/reclamationmodifier',[\App\Http\Controllers\ReclamationController::class,"update"])->name("reclamation.update");
Route::post('/reclamationsupprimer',[\App\Http\Controllers\ReclamationController::class,"destroy"])->name("reclamation.delete");
Route::get('/reclamations/detail/{reclamation}',[\App\Http\Controllers\ReclamationController::class,"detail"])->name("reclamation.detail");
/********************************************************************************************************************************************/
Route::get('/cours/{matiere_id}',[\App\Http\Controllers\CoursController::class,"index"])->name("cours");
Route::get('/courscreate',[\App\Http\Controllers\CoursController::class,"create"])->name("cours.create");
Route::get('/supports',[\App\Http\Controllers\SupportController::class,"supports"])->name("cours.supports");
Route::get('/supports/bac/{bac_id}',[\App\Http\Controllers\SupportController::class,"messupports"])->name("cours.supports.bac");
Route::post('/supportdelete',[\App\Http\Controllers\SupportController::class,"delete"])->name("cours.support.delete");

Route::get('/courss/{matiere_id}',[\App\Http\Controllers\CoursController::class,"all"])->name("cours.all");
Route::get('/matieres',[\App\Http\Controllers\MatiereContoller::class,"index"])->name("matieres");
Route::get('/matieress',[\App\Http\Controllers\MatiereContoller::class,"all"])->name("matieres.all");
Route::post('/matierescours',[\App\Http\Controllers\CoursController::class,"matierescours"])->name("matieres.cours");
Route::post('/support/create',[\App\Http\Controllers\SupportController::class,"store"])->name("support.create");


/***  Admin  ***/
Route::get('/admin/bacs',[\App\Http\Controllers\BacController::class,"index"])->name("bacs");
Route::get('/admin/bac/{id}',[\App\Http\Controllers\BacController::class,"bac"])->name("bacs.bac");
Route::get('/admin/bac/matiere/add/{bac_id}',[\App\Http\Controllers\BacController::class,"create"])->name("bacs.create");
Route::post('/bacStore',[\App\Http\Controllers\BacController::class,"store"])->name("bacs.store");
Route::delete('/adminmatieredelete/{matiere_bac_id}/{bac_id}',[\App\Http\Controllers\BacController::class,"destroy"])->name("bac.matieres.delete.admin");

Route::get('/admin/enseignants',[\App\Http\Controllers\TeacherController::class,"enseignants"])->name("teachers.liste.admin");
Route::post('/admin/enseignant/confirm',[\App\Http\Controllers\TeacherController::class,"confirme"])->name("teachers.confirm.admin");
Route::post('/admin/enseignants/delete',[\App\Http\Controllers\TeacherController::class,"destroy"])->name("teachers.delete.admin");

Route::get('/admin/bac/matieres/{matiere_bac_id}',[\App\Http\Controllers\MatiereContoller::class,"cours"])->name("matieres.cours.admin");
Route::get('/admin/bac/cours/{matiere_bac_id}',[\App\Http\Controllers\MatiereContoller::class,"createcours"])->name("matieres.cours.create.admin");
Route::get('/admin/bac/coursedit/{cours}',[\App\Http\Controllers\MatiereContoller::class,"editcours"])->name("matieres.cours.edit.admin");
Route::post('/admincourscreate',[\App\Http\Controllers\MatiereContoller::class,"storecours"])->name("matieres.cours.store.admin");
Route::put('/admincoursedit/{cours}',[\App\Http\Controllers\MatiereContoller::class,"updatecours"])->name("matieres.cours.update.admin");
Route::delete('/admincoursdelete/{cours}/{matiere_bac_id}',[\App\Http\Controllers\MatiereContoller::class,"destroy"])->name("matieres.cours.delete.admin");

Route::get('/coursm/{matiere_bac_id}',[\App\Http\Controllers\BacController::class,"showmatieres"])->name("matieresmin");


Route::post('/photo/edit',[\App\Http\Controllers\HomeController::class,"photoedit"])->name("user.photo");
Route::get('/profile/edit',[\App\Http\Controllers\HomeController::class,"edit"])->name("user.profile.edit");
Route::post('/profile/update',[\App\Http\Controllers\HomeController::class,"update"])->name("user.profile.update");


Auth::routes();




