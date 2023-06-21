<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PacienteController;
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
	return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Paciente
Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente');
Route::get('/paciente/create', [PacienteController::class, 'create']);
Route::post('/paciente', [PacienteController::class, 'store']);
Route::get('/paciente/{paciente}/edit', [PacienteController::class, 'edit']);
Route::put('/paciente/{paciente}', [PacienteController::class, 'update']);
Route::delete('/paciente/{paciente}', [PacienteController::class, 'destroy']);


// Medicamento
Route::get('/medicamento', [MedicamentoController::class, 'index'])->name('medicamento');
Route::get('/medicamento/create', [MedicamentoController::class, 'create']);
Route::post('/medicamento', [MedicamentoController::class, 'store']);

Route::get('listaMedicamentoParaSelect', [MedicamentoController::class, 'listMedicamento']);

// Consulta
Route::get('/consulta', [ConsultaController::class, 'index'])->name('consulta');
Route::get('/consulta/create', [ConsultaController::class, 'create'])->name('crearConsulta');
Route::get('/consulta/{id}', [ConsultaController::class, 'edit']);

Route::post('/consulta/consultaPorPaciente',[ConsultaController::class,'consultaDePaciente']);

// Listar paciente por club
Route::post('listaPacientePorId', [ConsultaController::class, 'listaPacientePorClub']);

// Guardar paciente
Route::post('guardarPaciente', [ConsultaController::class, 'store']);





Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
