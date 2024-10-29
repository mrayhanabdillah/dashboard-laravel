<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\VoteTypeController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

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

Route::get('/', [HomeController::class, 'home']);
Route::get('vote/{id}', [ProgramController::class, 'programIndex'])->name('program-page');
Route::post('store-voting', [VotingController::class, 'store'])->name('store-voting');

Route::get('/test-email', function () {
		Mail::to('pbgarena081@gmail.com')->send(new TestMail);
        return redirect('/');
	});
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
	Route::get('profile', function () {
		return view('profile');
	})->name('profile');
	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');
    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');
    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    //Program Routes
    Route::prefix('program')->group(function () {
        Route::get('', [ProgramController::class, 'index'])->name('program');
        Route::get('create', [ProgramController::class, 'create'])->name('create-program');
        Route::post('store-program', [ProgramController::class, 'store'])->name('store-program');
        Route::put('update-program/{id}', [ProgramController::class, 'update'])->name('update-program');
        Route::get('delete-program/{uuid}', [ProgramController::class, 'destroy'])->name('delete-program');
    Route::get('active-program/{uuid}', [ProgramController::class, 'active'])->name('active-program');
    });
    Route::get('dashboard-program/{id}', [ProgramController::class, 'dashboard'])->name('dashboard-program');

    //Participants Routes
    Route::get('participants/{id}', [ParticipantController::class, 'index'])->name('participants-program');
    Route::get('participants-create/{id}', [ParticipantController::class, 'create'])->name('create-participant');
    Route::post('participants-store/{id}', [ParticipantController::class, 'store'])->name('store-participant');

    //Vote Types Routes
    Route::get('vote-types', [VoteTypeController::class, 'index'])->name('vote-types');
    Route::get('vote-types/create', [VoteTypeController::class, 'create'])->name('create-vote-types');
    Route::post('vote-types/store', [VoteTypeController::class, 'store'])->name('store-vote-types');
    Route::get('vote-types-active/{id}', [VoteTypeController::class, 'active'])->name('active-vote-types');

    //Voting Routes
    Route::get('voting-baru', [VotingController::class, 'votingBaru'])->name('voting-baru');
    Route::get('voting-valid', [VotingController::class, 'votingValid'])->name('voting-valid');
    Route::get('check-voting/{id}', [VotingController::class, 'validateIndex'])->name('check-voting');
    Route::get('validate-voting/{id}', [VotingController::class, 'validate_voting'])->name('validate-voting');
    Route::get('delete-voting/{id}', [VotingController::class, 'destroy'])->name('delete-voting');
    Route::get('participants-voting/{id}', [VotingController::class, 'participants'])->name('participants-voting');

    //Config Routes
    Route::get('config', [HomeController::class, 'config'])->name('config');
    Route::post('config/store', [HomeController::class, 'store'])->name('config-store');

    // Ticket Routes
    Route::get('tickets', [TicketController::class, 'index'])->name('tickets');
    Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets-create');
    Route::post('tickets/store', [TicketController::class, 'store'])->name('tickets-store');
    Route::post('tickets-buy/{id}', [TicketController::class, 'buy'])->name('tickets-buy');
    Route::get('validasi/ticket', [TicketController::class, 'newPayment'])->name('new-tiket');
    Route::get('valid/ticket', [TicketController::class, 'validPayment'])->name('valid-tiket');
    Route::get('detail-ticket/{id}', [TicketController::class, 'detailTiketBaru'])->name('detail-tiket');
    Route::get('valid-payment/{id}', [TicketController::class, 'validatePayment'])->name('valid-payment');
    Route::get('delete-payment/{id}', [TicketController::class, 'destroy'])->name('delete-payment');



    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
